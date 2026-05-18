> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Testing tables

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

## Testing that a table can render

To ensure a table component renders, use the `assertSuccessful()` Livewire helper:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can render page', function () {
    livewire(ListPosts::class)
        ->assertSuccessful();
});
```

To test which records are shown, you can use `assertCanSeeTableRecords()`, `assertCanNotSeeTableRecords()` and `assertCountTableRecords()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('cannot display trashed posts by default', function () {
    $posts = Post::factory()->count(4)->create();
    $trashedPosts = Post::factory()->trashed()->count(6)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts)
        ->assertCanNotSeeTableRecords($trashedPosts)
        ->assertCountTableRecords(4);
});
```

> If your table uses pagination, `assertCanSeeTableRecords()` will only check for records on the first page. To switch page, call `call('gotoPage', 2)`.

> If your table uses `deferLoading()`, you should call `loadTable()` before `assertCanSeeTableRecords()`.

## Testing columns

To ensure that a certain column is rendered, pass the column name to `assertCanRenderTableColumn()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can render post titles', function () {
    Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanRenderTableColumn('title');
});
```

This helper will get the HTML for this column, and check that it is present in the table.

For testing that a column is not rendered, you can use `assertCanNotRenderTableColumn()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can not render post comments', function () {
    Post::factory()->count(10)->create()

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanNotRenderTableColumn('comments');
});
```

This helper will assert that the HTML for this column is not shown by default in the present table.

### Testing that a column can be searched

To search the table, call the `searchTable()` method with your search query.

You can then use `assertCanSeeTableRecords()` to check your filtered table records, and use `assertCanNotSeeTableRecords()` to assert that some records are no longer in the table:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can search posts by title', function () {
    $posts = Post::factory()->count(10)->create();

    $title = $posts->first()->title;

    livewire(PostResource\Pages\ListPosts::class)
        ->searchTable($title)
        ->assertCanSeeTableRecords($posts->where('title', $title))
        ->assertCanNotSeeTableRecords($posts->where('title', '!=', $title));
});
```

To search individual columns, you can pass an array of searches to `searchTableColumns()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can search posts by title column', function () {
    $posts = Post::factory()->count(10)->create();

    $title = $posts->first()->title;

    livewire(PostResource\Pages\ListPosts::class)
        ->searchTableColumns(['title' => $title])
        ->assertCanSeeTableRecords($posts->where('title', $title))
        ->assertCanNotSeeTableRecords($posts->where('title', '!=', $title));
});
```

### Testing that a column can be sorted

To sort table records, you can call `sortTable()`, passing the name of the column to sort by. You can use `'desc'` in the second parameter of `sortTable()` to reverse the sorting direction.

Once the table is sorted, you can ensure that the table records are rendered in order using `assertCanSeeTableRecords()` with the `inOrder` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can sort posts by title', function () {
    Post::factory()->count(10)->create();

    $sortedPostsAsc = Post::query()->orderBy('title')->get();
    $sortedPostsDesc = Post::query()->orderBy('title', 'desc')->get();

    livewire(PostResource\Pages\ListPosts::class)
        ->sortTable('title')
        ->assertCanSeeTableRecords($sortedPostsAsc, inOrder: true)
        ->sortTable('title', 'desc')
        ->assertCanSeeTableRecords($sortedPostsDesc, inOrder: true);
});
```

<Info>
  Filament tables use a SQL `order` statement to sort records before they are output. Different database drivers can use different sorting strategies, and they can differ from PHP's own sorting strategy, so you should ensure that test records are sorted using `orderBy()` on a database query rather than `sortBy()` on a collection of models.
</Info>

### Testing the state of a column

To assert that a certain column has a state or does not have a state for a record you can use `assertTableColumnStateSet()` and `assertTableColumnStateNotSet()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can get post author names', function () {
    $posts = Post::factory()->count(10)->create();

    $post = $posts->first();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableColumnStateSet('author.name', $post->author->name, record: $post)
        ->assertTableColumnStateNotSet('author.name', 'Anonymous', record: $post);
});
```

To assert that a certain column has a formatted state or does not have a formatted state for a record you can use `assertTableColumnFormattedStateSet()` and `assertTableColumnFormattedStateNotSet()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can get post author names', function () {
    $post = Post::factory(['name' => 'John Smith'])->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableColumnFormattedStateSet('author.name', 'Smith, John', record: $post)
        ->assertTableColumnFormattedStateNotSet('author.name', $post->author->name, record: $post);
});
```

### Testing the existence of a column

To ensure that a column exists, you can use the `assertTableColumnExists()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has an author column', function () {
    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableColumnExists('author');
});
```

You may pass a function as an additional argument to assert that a column passes a given "truth test". This is useful for asserting that a column has a specific configuration. You can also pass in a record as the third parameter, which is useful if your check is dependent on which table row is being rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;
use Filament\Tables\Columns\TextColumn;

it('has an author column', function () {
    $post = Post::factory()->create();
    
    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableColumnExists('author', function (TextColumn $column): bool {
            return $column->getDescriptionBelow() === $post->subtitle;
        }, $post);
});
```

### Testing the visibility of a column

To ensure that a particular user cannot see a column, you can use the `assertTableColumnVisible()` and `assertTableColumnHidden()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('shows the correct columns', function () {
    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableColumnVisible('created_at')
        ->assertTableColumnHidden('author');
});
```

### Testing the description of a column

To ensure a column has the correct description above or below you can use the `assertTableColumnHasDescription()` and `assertTableColumnDoesNotHaveDescription()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has the correct descriptions above and below author', function () {
    $post = Post::factory()->create();

    livewire(PostsTable::class)
        ->assertTableColumnHasDescription('author', 'Author! ↓↓↓', $post, 'above')
        ->assertTableColumnHasDescription('author', 'Author! ↑↑↑', $post)
        ->assertTableColumnDoesNotHaveDescription('author', 'Author! ↑↑↑', $post, 'above')
        ->assertTableColumnDoesNotHaveDescription('author', 'Author! ↓↓↓', $post);
});
```

### Testing the extra attributes of a column

To ensure that a column has the correct extra attributes, you can use the `assertTableColumnHasExtraAttributes()` and `assertTableColumnDoesNotHaveExtraAttributes()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('displays author in red', function () {
    $post = Post::factory()->create();

    livewire(PostsTable::class)
        ->assertTableColumnHasExtraAttributes('author', ['class' => 'text-danger-500'], $post)
        ->assertTableColumnDoesNotHaveExtraAttributes('author', ['class' => 'text-primary-500'], $post);
});
```

### Testing the options in a `SelectColumn`

If you have a select column, you can ensure it has the correct options with `assertTableSelectColumnHasOptions()` and `assertTableSelectColumnDoesNotHaveOptions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has the correct statuses', function () {
    $post = Post::factory()->create();

    livewire(PostsTable::class)
        ->assertTableSelectColumnHasOptions('status', ['unpublished' => 'Unpublished', 'published' => 'Published'], $post)
        ->assertTableSelectColumnDoesNotHaveOptions('status', ['archived' => 'Archived'], $post);
});
```

## Testing filters

To filter the table records, you can use the `filterTable()` method, along with `assertCanSeeTableRecords()` and `assertCanNotSeeTableRecords()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can filter posts by `is_published`', function () {
    $posts = Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts)
        ->filterTable('is_published')
        ->assertCanSeeTableRecords($posts->where('is_published', true))
        ->assertCanNotSeeTableRecords($posts->where('is_published', false));
});
```

For a simple filter, this will just enable the filter.

If you'd like to set the value of a `SelectFilter` or `TernaryFilter`, pass the value as a second argument:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can filter posts by `author_id`', function () {
    $posts = Post::factory()->count(10)->create();

    $authorId = $posts->first()->author_id;

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts)
        ->filterTable('author_id', $authorId)
        ->assertCanSeeTableRecords($posts->where('author_id', $authorId))
        ->assertCanNotSeeTableRecords($posts->where('author_id', '!=', $authorId));
});
```

### Resetting filters in a test

To reset all filters to their original state, call `resetTableFilters()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can reset table filters', function () {
    $posts = Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->resetTableFilters();
});
```

### Removing filters in a test

To remove a single filter you can use `removeTableFilter()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('filters list by published', function () {
    $posts = Post::factory()->count(10)->create();

    $unpublishedPosts = $posts->where('is_published', false)->get();

    livewire(PostsTable::class)
        ->filterTable('is_published')
        ->assertCanNotSeeTableRecords($unpublishedPosts)
        ->removeTableFilter('is_published')
        ->assertCanSeeTableRecords($posts);
});
```

To remove all filters you can use `removeTableFilters()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can remove all table filters', function () {
    $posts = Post::factory()->count(10)->forAuthor()->create();

    $unpublishedPosts = $posts
        ->where('is_published', false)
        ->where('author_id', $posts->first()->author->getKey());

    livewire(PostsTable::class)
        ->filterTable('is_published')
        ->filterTable('author', $author)
        ->assertCanNotSeeTableRecords($unpublishedPosts)
        ->removeTableFilters()
        ->assertCanSeeTableRecords($posts);
});
```

### Testing the visibility of a filter

To ensure that a particular user cannot see a filter, you can use the `assertTableFilterVisible()` and `assertTableFilterHidden()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('shows the correct filters', function () {
    livewire(PostsTable::class)
        ->assertTableFilterVisible('created_at')
        ->assertTableFilterHidden('author');
});
```

### Testing the existence of a filter

To ensure that a filter exists, you can use the `assertTableFilterExists()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has an author filter', function () {
    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableFilterExists('author');
});
```

You may pass a function as an additional argument to assert that a filter passes a given "truth test". This is useful for asserting that a filter has a specific configuration:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;
use Filament\Tables\Filters\SelectFilter;

it('has an author filter', function () {
    livewire(PostResource\Pages\ListPosts::class)
        ->assertTableFilterExists('author', function (SelectFilter $column): bool {
            return $column->getLabel() === 'Select author';
        });
});
```

## Testing summaries

To test that a summary calculation is working, you may use the `assertTableColumnSummarySet()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can average values in a column', function () {
    $posts = Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts)
        ->assertTableColumnSummarySet('rating', 'average', $posts->avg('rating'));
});
```

The first argument is the column name, the second is the summarizer ID, and the third is the expected value.

Note that the expected and actual values are normalized, such that `123.12` is considered the same as `"123.12"`, and `['Fred', 'Jim']` is the same as `['Jim', 'Fred']`.

You may set a summarizer ID by passing it to the `make()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->summarize(Average::make('average'))
```

The ID should be unique between summarizers in that column.

### Testing summaries on only one pagination page

To calculate the average for only one pagination page, use the `isCurrentPaginationPageOnly` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can average values in a column', function () {
    $posts = Post::factory()->count(20)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts->take(10))
        ->assertTableColumnSummarySet('rating', 'average', $posts->take(10)->avg('rating'), isCurrentPaginationPageOnly: true);
});
```

### Testing a range summarizer

To test a range, pass the minimum and maximum value into a tuple-style `[$minimum, $maximum]` array:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can average values in a column', function () {
    $posts = Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts)
        ->assertTableColumnSummarySet('rating', 'range', [$posts->min('rating'), $posts->max('rating')]);
});
```

## Testing toggleable columns

By default, only columns that are toggled on by default in the table will be rendered and testable. You can toggle all columns in the table on using `toggleAllTableColumns()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can toggle all columns', function () {
    livewire(PostResource\Pages\ListPosts::class)
        ->toggleAllTableColumns();
});
```

You can also toggle all columns off using `toggleAllTableColumns(false)`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can toggle all columns off', function () {
    livewire(PostResource\Pages\ListPosts::class)
        ->toggleAllTableColumns(false);
});
```

<EditOnGitHub version="5.x" path="docs/10-testing/03-testing-tables.md" />

<Footer />
