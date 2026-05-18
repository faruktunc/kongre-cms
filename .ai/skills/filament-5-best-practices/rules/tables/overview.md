> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Overview

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

Tables are a common UI pattern for displaying lists of records in web applications. Filament provides a PHP-based API for defining tables with many features, while also being incredibly customizable.

<AutoScreenshot name="tables/example" alt="Table" version="5.x" />

### Defining table columns

The basis of any table is rows and columns. Filament uses Eloquent to get the data for rows in the table, and you are responsible for defining the columns that are used in that row.

Filament includes many column types prebuilt for you, and you can [view a full list here](./columns/overview). You can even [create your own custom column types](./columns/custom-columns) to display data in whatever way you need.

Columns are stored in an array, as objects within the `$table->columns()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('title'),
            TextColumn::make('slug'),
            IconColumn::make('is_featured')
                ->boolean(),
        ]);
}
```

<AutoScreenshot name="tables/overview/columns" alt="Table with columns" version="5.x" />

In this example, there are 3 columns in the table. The first two display [text](./columns/text) - the title and slug of each row in the table. The third column displays an [icon](./columns/icon), either a green check or a red cross depending on if the row is featured or not.

#### Making columns sortable and searchable

You can easily modify columns by chaining methods onto them. For example, you can make a column [searchable](./columns/overview#searching) using the `searchable()` method. Now, there will be a search field in the table, and you will be able to filter rows by the value of that column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->searchable()
```

<AutoScreenshot name="tables/overview/searchable-columns" alt="Table with searchable column" version="5.x" />

You can make multiple columns searchable, and Filament will be able to search for matches within any of them, all at once.

You can also make a column [sortable](./columns/overview#sorting) using the `sortable()` method. This will add a sort button to the column header, and clicking it will sort the table by that column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('title')
    ->sortable()
```

<AutoScreenshot name="tables/overview/sortable-columns" alt="Table with sortable column" version="5.x" />

#### Accessing related data from columns

You can also display data in a column that belongs to a relationship. For example, if you have a `Post` model that belongs to a `User` model (the author of the post), you can display the user's name in the table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('author.name')
```

<AutoScreenshot name="tables/overview/relationship-columns" alt="Table with relationship column" version="5.x" />

In this case, Filament will search for an `author` relationship on the `Post` model, and then display the `name` attribute of that relationship. We call this "dot notation", and you can use it to display any attribute of any relationship, even nested relationships. Filament uses this dot notation to eager-load the results of that relationship for you.

For more information about column relationships, visit the [Relationships section](./columns/overview#displaying-data-from-relationships).

#### Adding new columns alongside existing columns

While the `columns()` method redefines all columns for a table, you may sometimes want to add columns to an existing configuration without overriding it completely. This is particularly useful when you have global column configurations that should appear across multiple tables.

Filament provides the `pushColumns()` method for this purpose. Unlike `columns()`, which replaces the entire column configuration, `pushColumns()` appends new columns to any existing ones.

This is especially powerful when combined with [global table settings](#global-settings) in the `boot()` method of a service provider, such as `AppServiceProvider`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

Table::configureUsing(function (Table $table) {
    $table
        ->pushColumns([
            TextColumn::make('created_at')
                ->label('Created')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')
                ->label('Updated')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ]);
});
```

### Defining table filters

As well as making columns `searchable()`, which allows the user to filter the table by searching the content of columns, you can also allow the users to filter rows in the table in other ways. [Filters](./filters) can be defined in the `$table->filters()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->filters([
            Filter::make('is_featured')
                ->query(fn (Builder $query) => $query->where('is_featured', true)),
            SelectFilter::make('status')
                ->options([
                    'draft' => 'Draft',
                    'reviewing' => 'Reviewing',
                    'published' => 'Published',
                ]),
        ]);
}
```

<AutoScreenshot name="tables/overview/filters" alt="Table with filters" version="5.x" />

In this example, we have defined 2 table filters. On the table, there is now a "filter" icon button in the top corner. Clicking it will open a dropdown with the 2 filters we have defined.

The first filter is rendered as a checkbox. When it's checked, only featured rows in the table will be displayed. When it's unchecked, all rows will be displayed.

The second filter is rendered as a select dropdown. When a user selects an option, only rows with that status will be displayed. When no option is selected, all rows will be displayed.

You can use any [schema component](../schemas) to build the UI for a filter. For example, you could create [a custom date range filter](./filters/custom).

### Defining table actions

Filament's tables can use [actions](../actions/overview). They are buttons that can be added to the [end of any table row](./actions#record-actions), or even in the [header](./actions#header-actions) of a table. For instance, you may want an action to "create" a new record in the header, and then "edit" and "delete" actions on each row. [Bulk actions](./actions#bulk-actions) can be used to execute code when records in the table are selected.

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->recordActions([
            Action::make('feature')
                ->action(function (Post $record) {
                    $record->is_featured = true;
                    $record->save();
                })
                ->hidden(fn (Post $record): bool => $record->is_featured),
            Action::make('unfeature')
                ->action(function (Post $record) {
                    $record->is_featured = false;
                    $record->save();
                })
                ->visible(fn (Post $record): bool => $record->is_featured),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
}
```

<AutoScreenshot name="tables/overview/actions" alt="Table with actions" version="5.x" />

In this example, we define 2 actions for table rows. The first action is a "feature" action. When clicked, it will set the `is_featured` attribute on the record to `true` - which is written within the `action()` method. Using the `hidden()` method, the action will be hidden if the record is already featured. The second action is an "unfeature" action. When clicked, it will set the `is_featured` attribute on the record to `false`. Using the `visible()` method, the action will be hidden if the record is not featured.

We also define a bulk action. When bulk actions are defined, each row in the table will have a checkbox. This bulk action is [built-in to Filament](../actions/delete#bulk-delete), and it will delete all selected records. However, you can [write your own custom bulk actions](./actions#bulk-actions) easily too.

<AutoScreenshot name="tables/overview/actions-modal" alt="Table with action modal open" version="5.x" />

Actions can also open modals to request confirmation from the user, as well as render forms inside to collect extra data. It's a good idea to read the [Actions documentation](../actions) to learn more about their extensive capabilities throughout Filament.

## Pagination

By default, Filament tables will be paginated. The user can choose between 5, 10, 25, and 50 records per page. If there are more records than the selected number, the user can navigate between pages using the pagination buttons.

<AutoScreenshot name="tables/pagination/default" alt="Table with default pagination" version="5.x" />

### Customizing the pagination options

You may customize the options for the paginated records per page select by passing them to the `paginated()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->paginated([10, 25, 50, 100, 'all']);
}
```

<Warning>
  Be aware when using very high numbers and `all` as large number of records can cause performance issues.
</Warning>

### Customizing the default pagination page option

To customize the default number of records shown use the `defaultPaginationPageOption()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->defaultPaginationPageOption(25);
}
```

<Info>
  Make sure that the default pagination page option is included in the [pagination options](#customizing-the-pagination-options).
</Info>

### Displaying links to the first and the last pagination page

To add "extreme" links to the first and the last page using the `extremePaginationLinks()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->extremePaginationLinks();
}
```

<AutoScreenshot name="tables/pagination/extreme" alt="Table with extreme pagination links" version="5.x" />

### Using simple pagination

You may use simple pagination by using the `paginationMode(PaginationMode::Simple)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\PaginationMode;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->paginationMode(PaginationMode::Simple);
}
```

<AutoScreenshot name="tables/pagination/simple" alt="Table with simple pagination" version="5.x" />

### Using cursor pagination

You may use cursor pagination by using the `paginationMode(PaginationMode::Cursor)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\PaginationMode;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->paginationMode(PaginationMode::Cursor);
}
```

<AutoScreenshot name="tables/pagination/cursor" alt="Table with cursor pagination" version="5.x" />

### Preventing query string conflicts with the pagination page

By default, Livewire stores the pagination state in a `page` parameter of the URL query string. If you have multiple tables on the same page, this will mean that the pagination state of one table may be overwritten by the state of another table.

To fix this, you may define a `$table->queryStringIdentifier()`, to return a unique query string identifier for that table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->queryStringIdentifier('users');
}
```

### Disabling pagination

By default, tables will be paginated. To disable this, you should use the `$table->paginated(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->paginated(false);
}
```

## Record URLs (clickable rows)

You may allow table rows to be completely clickable by using the `$table->recordUrl()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

public function table(Table $table): Table
{
    return $table
        ->recordUrl(
            fn (Model $record): string => route('posts.edit', ['record' => $record]),
        );
}
```

When using a [resource](../resources) table, the URL for each row is usually already set up for you, but this method can be called to override the default URL for each row.

<Tip>
  You can also [override the URL](./columns/overview#opening-urls) for a specific column, or [trigger an action](./columns/overview#triggering-actions) when a column is clicked.
</Tip>

You may also open the URL in a new tab:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->openRecordUrlInNewTab();
}
```

## Reordering records

To allow the user to reorder records using drag and drop in your table, you can use the `$table->reorderable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->reorderable('sort');
}
```

The `sort` database column in this example will be used to store the order of records in the table. Whenever you order a database query using that column, they will be returned in the defined order. If you're using mass assignment protection on your model, you will also need to add the `sort` attribute to the `$fillable` array there.

When making the table reorderable, a new button will be available on the table to toggle reordering.

<AutoScreenshot name="tables/reordering" alt="Table with reorderable rows" version="5.x" />

The `reorderable()` method accepts the name of a column to store the record order in. If you use something like [`spatie/eloquent-sortable`](https://github.com/spatie/eloquent-sortable) with an order column such as `order_column`, you may use this instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->reorderable('order_column');
}
```

The `reorderable()` method also accepts a boolean condition as its second parameter, allowing you to conditionally enable reordering:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->reorderable('sort', auth()->user()->isAdmin());
}
```

You can pass a `direction` parameter as `desc` to reorder the records in descending order instead of ascending:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->reorderable('sort', direction: 'desc');
}
```

### Enabling pagination while reordering

Pagination will be disabled in reorder mode to allow you to move records between pages. It is generally a bad experience to have pagination while reordering, but if would like to override this use `$table->paginatedWhileReordering()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->paginatedWhileReordering();
}
```

### Customizing the reordering trigger action

To customize the reordering trigger button, you may use the `reorderRecordsTriggerAction()` method, passing a closure that returns an action. All methods that are available to [customize action trigger buttons](../actions/overview) can be used:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->reorderRecordsTriggerAction(
            fn (Action $action, bool $isReordering) => $action
                ->button()
                ->label($isReordering ? 'Disable reordering' : 'Enable reordering'),
        );
}
```

<AutoScreenshot name="tables/reordering/custom-trigger-action" alt="Table with reorderable rows and a custom trigger action" version="5.x" />

### Running code before and after reordering

You may run code before or after a record is reordered using the `beforeReordering()` and `afterReordering()` methods. Both methods accept a function that receives the new `$order` array of record keys:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->reorderable('sort')
        ->beforeReordering(function (array $order): void {
            // Runs before records are reordered in the database.
        })
        ->afterReordering(function (array $order): void {
            // Runs after records are reordered in the database.
        });
}
```

## Customizing the table header

You can add a heading to a table using the `$table->heading()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->heading('Clients')
        ->columns([
            // ...
        ]);
```

You can also add a description below the heading using the `$table->description()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->heading('Clients')
        ->description('Manage your clients here.')
        ->columns([
            // ...
        ]);
```

<AutoScreenshot name="tables/heading" alt="Table with heading and description" version="5.x" />

You can pass a view to the `$table->header()` method to customize the entire header HTML:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->header(view('tables.header', [
            'heading' => 'Clients',
        ]))
        ->columns([
            // ...
        ]);
```

## Polling table content

You may poll table content so that it refreshes at a set interval, using the `$table->poll()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->poll('10s');
}
```

## Deferring loading

Tables with lots of data might take a while to load, in which case you can load the table data asynchronously using the `deferLoading()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->deferLoading();
}
```

## Searching records with Laravel Scout

While Filament doesn't provide a direct integration with [Laravel Scout](https://laravel.com/docs/scout), you may use the `searchUsing()` method with a `whereKey()` clause to filter the query for Scout results:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->searchUsing(fn (Builder $query, string $search) => $query->whereKey(Post::search($search)->keys()));
```

Under normal circumstances Scout uses the `whereKey()` (`whereIn()`) method to retrieve results internally, so there is no performance penalty for using it.

For the global search input to show, at least one column in the table needs to be `searchable()`. Alternatively, if you are using Scout to control which columns are searchable already, you can simply pass `searchable()` to the entire table instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->searchable();
}
```

## Styling table rows

### Striped table rows

To enable striped table rows, you can use the `striped()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->striped();
}
```

<AutoScreenshot name="tables/striped" alt="Table with striped rows" version="5.x" />

### Custom row classes

You may want to conditionally style rows based on the record data. This can be achieved by specifying a string or array of CSS classes to be applied to the row using the `$table->recordClasses()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Closure;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

public function table(Table $table): Table
{
    return $table
        ->recordClasses(fn (Post $record) => match ($record->status) {
            'draft' => 'draft-post-table-row',
            'reviewing' => 'reviewing-post-table-row',
            'published' => 'published-post-table-row',
            default => null,
        });
}
```

<AutoScreenshot name="tables/custom-row-classes" alt="Table with custom row classes" version="5.x" />

## Global settings

To customize the default configuration used for all tables, you can call the static `configureUsing()` method from the `boot()` method of a service provider. The function will be run for each table that gets created:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

Table::configureUsing(function (Table $table): void {
    $table
        ->reorderableColumns()
        ->filtersLayout(FiltersLayout::AboveContentCollapsible)
        ->paginationPageOptions([10, 25, 50]);
});
```

<EditOnGitHub version="5.x" path="packages/tables/docs/01-overview.md" />

<Footer />
