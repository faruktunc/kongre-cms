<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use SolutionForest\FilamentTree\Resources\Pages\TreePage;

class PageTree extends TreePage
{
    protected static string $resource = PageResource::class;

    protected static int $maxDepth = 2;

    protected ?string $treeTitle = 'Sayfa Yapısı';

    protected bool $enableTreeTitle = true;

    public function getTitle(): string
    {
        return 'Sayfa Ağacı';
    }

    public function getTreeRecordTitle(?Model $record = null): string
    {
        if (! $record instanceof Page) {
            return '';
        }

        return $record->title.($record->is_active ? '' : ' (pasif)');
    }

    public function getTreeRecordIcon(?Model $record = null): ?string
    {
        if (! $record instanceof Page) {
            return null;
        }

        return $record->getAttribute('parent_id') === Page::defaultParentKey()
            ? 'heroicon-o-document-text'
            : 'heroicon-o-document';
    }

    protected function hasDeleteAction(): bool
    {
        return true;
    }

    protected function hasEditAction(): bool
    {
        return true;
    }

    protected function hasViewAction(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return $record instanceof Page && ! $record->isStaticPage();
    }

    /**
     * @return array{reload: bool}
     */
    public function updateTree(?array $list = null): array
    {
        $staticIds = Page::staticIds();
        $needReload = false;

        if ($list) {
            $records = $this->getRecords()->keyBy(fn ($record) => $record->getAttributeValue($record->getKeyName()));
            $unnestedArr = [];
            $defaultParentId = $this->getTreeRootLevelKey();
            $this->flattenTreeList($unnestedArr, $list, $defaultParentId);

            $unnestedArrData = collect($unnestedArr)
                ->map(fn (array $data, $id) => ['data' => $data, 'model' => $records->get($id)])
                ->filter(fn (array $arr) => ! is_null($arr['model']));

            foreach ($unnestedArrData as $arr) {
                /** @var Page $model */
                $model = $arr['model'];
                [$newParentId, $newOrder] = [$arr['data']['parent_id'], $arr['data']['order']];

                if (! $model instanceof Page) {
                    continue;
                }

                // "/" slug'ına sahip sayfanın sırası sabittir
                if ($model->slug === '/') {
                    continue;
                }

                // Statik sayfalar kök seviyede kalmalı
                if ($model->isStaticPage() && $newParentId !== $defaultParentId) {
                    continue;
                }

                // Hiçbir sayfa statik bir sayfanın altına taşınamaz
                if (in_array($newParentId, $staticIds, true)) {
                    continue;
                }

                $parentColumnName = $model->determineParentColumnName();
                $orderColumnName = $model->determineOrderColumnName();
                $newParentId = $newParentId === $defaultParentId ? $model::defaultParentKey() : $newParentId;

                $model->{$parentColumnName} = $newParentId;
                $model->{$orderColumnName} = $newOrder;

                if ($model->isDirty([$parentColumnName, $orderColumnName])) {
                    $model->save();
                    $needReload = true;
                }
            }
        }

        if ($needReload) {
            Notification::make()
                ->success()
                ->title('Sayfa ağacı güncellendi.')
                ->send();

            $this->dispatch('refreshTree');
        }

        return ['reload' => $needReload];
    }

    private function flattenTreeList(array &$result, array $current, mixed $parent): void
    {
        foreach ($current as $index => $item) {
            $key = data_get($item, 'id');
            $result[$key] = [
                'parent_id' => $parent,
                'order' => $index + 1,
            ];
            if (isset($item['children']) && count($item['children'])) {
                $this->flattenTreeList($result, $item['children'], $key);
            }
        }
    }
}
