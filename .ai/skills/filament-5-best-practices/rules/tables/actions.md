> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Actions

export const AutoScreenshot = ({name, alt, version}) => {
  const [loaded, setLoaded] = useState(false);
  return <div className="not-prose border-standard relative mt-4 min-h-10 rounded-2xl">
      <div className={`absolute inset-0 flex items-center px-3.5 py-3 transition-opacity ${loaded ? 'opacity-0' : 'opacity-100'}`}>
        <svg className="h-4 w-4 animate-spin text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
        </svg>
        <span className="ml-2 text-sm text-gray-600 dark:text-gray-300">
          Loading preview
        </span>
      </div>

      <img src={`/docs/images/${version}/light/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`rounded-2xl transition-opacity dark:hidden ${loaded ? 'opacity-100' : 'opacity-0'}`} />

      <img src={`/docs/images/${version}/dark/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`hidden rounded-2xl transition-opacity dark:block ${loaded ? 'opacity-100' : 'opacity-0'}`} />
    </div>;
};

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

## Introduction

Filament's tables can use [Actions](../actions). They are buttons that can be added to the [end of any table row](#record-actions), or even in the [header](#header-actions) or [toolbar](#toolbar-actions) of a table. For instance, you may want an action to "create" a new record in the header, and then "edit" and "delete" actions on each row. [Bulk actions](#bulk-actions) can be used to execute code when records in the table are selected. Additionally, actions can be added to any [table column](#column-actions), such that each cell in that column is a trigger for your action.

It's highly advised that you read the documentation about [customizing action trigger buttons](../actions/overview) and [action modals](../actions/modals) to that you are aware of the full capabilities of actions.

## Record actions

Action buttons can be rendered at the end of each table row. You can put them in the `$table->recordActions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->recordActions([
            // ...
        ]);
}
```

Actions may be created using the static `make()` method, passing its unique name.

You can then pass a function to `action()` which executes the task, or a function to `url()` which creates a link:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

Action::make('edit')
    ->url(fn (Post $record): string => route('posts.edit', $record))
    ->openUrlInNewTab()

Action::make('delete')
    ->requiresConfirmation()
    ->action(fn (Post $record) => $record->delete())
```

All methods on the action accept callback functions, where you can access the current table `$record` that was clicked.

<AutoScreenshot name="tables/actions/simple" alt="Table with actions" version="5.x" />

### Positioning record actions before columns

By default, the record actions in your table are rendered in the final cell of each row. You may move them before the columns by using the `position` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->recordActions([
            // ...
        ], position: RecordActionsPosition::BeforeColumns);
}
```

<AutoScreenshot name="tables/actions/before-columns" alt="Table with actions before columns" version="5.x" />

### Positioning record actions before the checkbox column

By default, the record actions in your table are rendered in the final cell of each row. You may move them before the checkbox column by using the `position` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->recordActions([
            // ...
        ], position: RecordActionsPosition::BeforeCells);
}
```

### Global record action settings

To customize the default configuration used for ungrouped record actions, you can use `modifyUngroupedRecordActionsUsing()` from a [`Table::configureUsing()` function](./overview#global-settings) in the `boot()` method of a service provider:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Tables\Table;

Table::configureUsing(function (Table $table): void {
    $table
        ->modifyUngroupedRecordActionsUsing(fn (Action $action) => $action->iconButton());
});
```

<AutoScreenshot name="tables/actions/before-cells" alt="Table with actions before cells" version="5.x" />

### Accessing the selected table rows

You may want an action to be able to access all the selected rows in the table. Usually, this is done with a [bulk action](#bulk-actions) in the header of the table. However, you may want to do this with a row action, where the selected rows provide context for the action.

For example, you may want to have a row action that copies the row data to all the selected records. To force the table to be selectable, even if there aren't bulk actions defined, you need to use the `selectable()` method. To allow the action to access the selected records, you need to use the `accessSelectedRecords()` method. Then, you can use the `$selectedRecords` parameter in your action to access the selected records:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

public function table(Table $table): Table
{
    return $table
        ->selectable()
        ->recordActions([
            Action::make('copyToSelected')
                ->accessSelectedRecords()
                ->action(function (Model $record, Collection $selectedRecords) {
                    $selectedRecords->each(
                        fn (Model $selectedRecord) => $selectedRecord->update([
                            'is_active' => $record->is_active,
                        ]),
                    );
                }),
        ]);
}
```

## Bulk actions

Tables also support "bulk actions". These can be used when the user selects rows in the table. Traditionally, when rows are selected, a "bulk actions" button appears. When the user clicks this button, they are presented with a dropdown menu of actions to choose from. You can put them in the `$table->toolbarActions()` or `$table->headerActions()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            // ...
        ]);
}
```

Bulk actions may be created using the static `make()` method, passing its unique name. You should then pass a callback to `action()` which executes the task:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

BulkAction::make('delete')
    ->requiresConfirmation()
    ->action(fn (Collection $records) => $records->each->delete())
```

The function allows you to access the current table `$records` that are selected. It is an Eloquent collection of models.

<AutoScreenshot name="tables/actions/bulk" alt="Table with bulk action" version="5.x" />

### Authorizing bulk actions

When using a bulk action, you may check a policy method for each record that is selected. This is useful for checking if the user has permission to perform the action on each record. You can use the `authorizeIndividualRecords()` method, passing the name of a policy method, which will be called for each record. If the policy denies authorization, the record will not be present in the bulk action's `$records` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

BulkAction::make('delete')
    ->requiresConfirmation()
    ->authorizeIndividualRecords('delete')
    ->action(fn (Collection $records) => $records->each->delete())
```

### Bulk action notifications

After a bulk action is completed, you may want to send a notification to the user with a summary of the action's success. This is especially useful if you're using [authorization](#authorizing-bulk-actions) for individual records, as the user may not know how many records were actually affected.

To send a notification after the bulk action is completed, you should set the `successNotificationTitle()` and `failureNotificationTitle()`:

* The `successNotificationTitle()` is used as the title of the notification when all records have been successfully processed.
* The `failureNotificationTitle()` is used as the title of the notification when some or all of the records failed to be processed. By passing a function to this methods, you can inject the `$successCount` and `$failureCount` parameters, to provide this information to the user.

For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

BulkAction::make('delete')
    ->requiresConfirmation()
    ->authorizeIndividualRecords('delete')
    ->action(fn (Collection $records) => $records->each->delete())
    ->successNotificationTitle('Deleted users')
    ->failureNotificationTitle(function (int $successCount, int $totalCount): string {
        if ($successCount) {
            return "{$successCount} of {$totalCount} users deleted";
        }

        return 'Failed to delete any users';
    })
```

You can also use a special [authorization response object](https://laravel.com/docs/authorization#policy-responses) in a policy method to provide a custom message about why the authorization failed. The special object is called `DenyResponse` and replaces `Response::deny()`, allowing the developer to pass a function as the message which can receive information about how many records were denied by that authorization check:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\User;
use Filament\Support\Authorization\DenyResponse;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function delete(User $user, User $model): bool | Response
    {
        if (! $model->is_admin) {
            return true;
        }

        return DenyResponse::make('cannot_delete_admin', message: function (int $failureCount, int $totalCount): string {
            if (($failureCount === 1) && ($totalCount === 1)) {
                return 'You cannot delete an admin user.';
            }

            if ($failureCount === $totalCount) {
                return 'All users selected were admin users.';
            }

            if ($failureCount === 1) {
                return 'One of the selected users was an admin user.';
            }

            return "{$failureCount} of the selected users were admin users.";
        });
    }
}
```

The first argument to the `make()` method is a unique key to identify that failure type. If multiple failures of that key are detected, they are grouped together and only one message is generated. If there are multiple points of failure in the policy method, each response object can have its own key, and the messages will be concatenated together in the notification.

#### Reporting failures in bulk action processing

Alongside [individual record authorization](#authorizing-bulk-actions) messages, you can also report failures in the bulk action processing itself. This is useful if you want to provide a message for each record that failed to be processed for a particular reason, even after authorization passes. This is done by injecting the `Action` instance into the `action()` function, and calling the `reportBulkProcessingFailure()` method on it, passing a key and message function similar to `DenyResponse`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

BulkAction::make('delete')
    ->requiresConfirmation()
    ->authorizeIndividualRecords('delete')
    ->action(function (BulkAction $action, Collection $records) {
        $records->each(function (Model $record) use ($action) {
            $record->delete() || $action->reportBulkProcessingFailure(
                'deletion_failed',
                message: function (int $failureCount, int $totalCount): string {
                    if (($failureCount === 1) && ($totalCount === 1)) {
                        return 'One user failed to delete.';
                    }
        
                    if ($failureCount === $totalCount) {
                        return 'All users failed to delete.';
                    }
        
                    if ($failureCount === 1) {
                        return 'One of the selected users failed to delete.';
                    }
        
                    return "{$failureCount} of the selected users failed to delete.";
                },
            );
        });
    })
    ->successNotificationTitle('Deleted users')
    ->failureNotificationTitle(function (int $successCount, int $totalCount): string {
        if ($successCount) {
            return "{$successCount} of {$totalCount} users deleted";
        }

        return 'Failed to delete any users';
    })
```

The `delete()` method on an Eloquent model returns `false` if the deletion fails, so you can use that to determine if the record was deleted successfully. The `reportBulkProcessingFailure()` method will then add a failure message to the notification, which will be displayed when the action is completed.

The `reportBulkProcessingFailure()` method can be called at multiple points during the action execution for different reasons, but you should only call it once per record. You should not proceed with the action for that particular record once you have called the method for it.

### Grouping bulk actions

You may use a `BulkActionGroup` object to [group multiple bulk actions together](../actions/grouping-actions) in a dropdown. Any bulk actions that remain outside the `BulkActionGroup` will be rendered next to the dropdown's trigger button:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            BulkActionGroup::make([
                BulkAction::make('delete')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->delete()),
                BulkAction::make('forceDelete')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->forceDelete()),
            ]),
            BulkAction::make('export')->button()->action(fn (Collection $records) => ...),
        ]);
}
```

<AutoScreenshot name="tables/actions/bulk-not-grouped" alt="Table with grouped and ungrouped bulk actions" version="5.x" />

Alternatively, if all of your bulk actions are grouped, you can use the shorthand `groupedBulkActions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groupedBulkActions([
            BulkAction::make('delete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->delete()),
            BulkAction::make('forceDelete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->forceDelete()),
        ]);
}
```

### Deselecting records once a bulk action has finished

You may deselect the records after a bulk action has been executed using the `deselectRecordsAfterCompletion()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

BulkAction::make('delete')
    ->action(fn (Collection $records) => $records->each->delete())
    ->deselectRecordsAfterCompletion()
```

### Disabling bulk actions for some rows

You may conditionally disable bulk actions for a specific record:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            // ...
        ])
        ->checkIfRecordIsSelectableUsing(
            fn (Model $record): bool => $record->status === Status::Enabled,
        );
}
```

### Limiting the number of selectable records

You may restrict how many records the user can select in total:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            // ...
        ])
        ->maxSelectableRecords(4);
}
```

### Preventing bulk-selection of all pages

The `selectCurrentPageOnly()` method can be used to prevent the user from easily bulk-selecting all records in the table at once, and instead only allows them to select one page at a time:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            // ...
        ])
        ->selectCurrentPageOnly();
}
```

### Restricting bulk selection to groups only

The `selectGroupsOnly()` method can be used to restrict bulk selection to only records within the same group, preventing bulk selection across multiple groups at once:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            // ...
        ])
        ->selectGroupsOnly();
}
```

### Improving the performance of bulk actions

By default, a bulk action will load all Eloquent records into memory before passing them to the `action()` function.

If you are processing a large number of records, you may want to use the `chunkSelectedRecords()` method to fetch a smaller number of records at a time. This will reduce the memory usage of your application:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Support\LazyCollection;

BulkAction::make()
    ->chunkSelectedRecords(250)
    ->action(function (LazyCollection $records) {
        // Process the records...
    })
```

You can still loop through the `$records` collection as normal, but the collection will be a `LazyCollection` instead of a normal collection.

You can also prevent Filament from fetching the Eloquent models in the first place, and instead just pass the IDs of the selected records to the `action()` function. This is useful if you are processing a large number of records, and you don't need to load them into memory:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkAction;
use Illuminate\Support\Collection;

BulkAction::make()
    ->fetchSelectedRecords(false)
    ->action(function (Collection $records) {
        // Process the records...
    })
```

## Header actions

Both actions and [bulk actions](#bulk-actions) can be rendered in the header of the table. You can put them in the `$table->headerActions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->headerActions([
            // ...
        ]);
}
```

This is useful for things like "create" actions, which are not related to any specific table row, or bulk actions that need to be more visible.

<AutoScreenshot name="tables/actions/header" alt="Table with header actions" version="5.x" />

## Toolbar actions

Both actions and [bulk actions](#bulk-actions) can be rendered in the toolbar of the table. You can put them in the `$table->toolbarActions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->toolbarActions([
            // ...
        ]);
}
```

This is useful for things like "create" actions, which are not related to any specific table row, or bulk actions that need to be more visible.

<AutoScreenshot name="tables/actions/toolbar" alt="Table with toolbar actions" version="5.x" />

## Column actions

Actions can be added to columns, such that when a cell in that column is clicked, it acts as the trigger for an action. You can learn more about [column actions](./columns/overview#triggering-actions) in the documentation.

## Grouping actions

You may use an `ActionGroup` object to group multiple table actions together in a dropdown:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->recordActions([
            ActionGroup::make([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]),
            // ...
        ]);
}
```

You may find out more about customizing action groups in the [Actions documentation](../actions/grouping-actions).

<AutoScreenshot name="tables/actions/group" alt="Table with action group" version="5.x" />

<EditOnGitHub version="5.x" path="packages/tables/docs/04-actions.md" />

<Footer />
