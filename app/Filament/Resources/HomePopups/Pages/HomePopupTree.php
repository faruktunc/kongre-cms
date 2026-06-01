<?php

namespace App\Filament\Resources\HomePopups\Pages;

use App\Filament\Resources\HomePopups\HomePopupResource;
use App\Models\HomePopup;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use SolutionForest\FilamentTree\Resources\Pages\TreePage;

class HomePopupTree extends TreePage
{
    protected static string $resource = HomePopupResource::class;

    protected static int $maxDepth = 1;

    protected ?string $treeTitle = 'Pop-up Sıralaması';

    protected bool $enableTreeTitle = true;

    public function getTitle(): string
    {
        return 'Ana Sayfa Pop-up Mesajları';
    }

    public function getTreeRecordTitle(?Model $record = null): string
    {
        if (! $record instanceof HomePopup) {
            return '';
        }

        $title = filled($record->title) ? $record->title : 'Pop-up #'.$record->id;

        return $title.($record->is_active ? '' : ' (pasif)');
    }

    public function getTreeRecordIcon(?Model $record = null): ?string
    {
        return $record instanceof HomePopup ? 'heroicon-o-megaphone' : null;
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

    /**
     * @return array{reload: bool}
     */
    public function updateTree(?array $list = null): array
    {
        $needReload = false;

        if ($list) {
            $records = $this->getRecords()->keyBy(fn ($record) => $record->getAttributeValue($record->getKeyName()));
            $unnestedArr = [];

            $this->flattenTreeList($unnestedArr, $list);

            foreach ($unnestedArr as $id => $data) {
                /** @var HomePopup|null $model */
                $model = $records->get($id);

                if (! $model instanceof HomePopup) {
                    continue;
                }

                $model->parent_id = HomePopup::defaultParentKey();
                $model->order = $data['order'];

                if ($model->isDirty(['parent_id', 'order'])) {
                    $model->save();
                    $needReload = true;
                }
            }
        }

        if ($needReload) {
            Notification::make()
                ->success()
                ->title('Pop-up sıralaması güncellendi.')
                ->send();

            $this->dispatch('refreshTree');
        }

        return ['reload' => $needReload];
    }

    private function flattenTreeList(array &$result, array $current): void
    {
        foreach ($current as $index => $item) {
            $key = data_get($item, 'id');

            if ($key === null) {
                continue;
            }

            $result[$key] = [
                'order' => $index + 1,
            ];
        }
    }
}
