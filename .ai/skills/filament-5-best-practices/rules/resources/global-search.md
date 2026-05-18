> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Global search

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

Global search allows you to search across all of your resource records, from anywhere in the app.

<AutoScreenshot name="panels/resources/global-search" alt="Global search" version="5.x" />

## Setting global search result titles

To enable global search on your model, you must [set a title attribute](./overview#record-titles) for your resource:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $recordTitleAttribute = 'title';
```

This attribute is used to retrieve the search result title for that record.

<Warning>
  Your resource needs to have an Edit or View page to allow the global search results to link to a URL, otherwise no results will be returned for this resource.
</Warning>

You may customize the title further by overriding `getGlobalSearchResultTitle()` method. It may return a plain text string, or an instance of `Illuminate\Support\HtmlString` or `Illuminate\Contracts\Support\Htmlable`. This allows you to render HTML, or even Markdown, in the search result title:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Contracts\Support\Htmlable;

public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
{
    return $record->name;
}
```

## Globally searching across multiple columns

If you would like to search across multiple columns of your resource, you may override the `getGloballySearchableAttributes()` method. "Dot notation" allows you to search inside relationships:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getGloballySearchableAttributes(): array
{
    return ['title', 'slug', 'author.name', 'category.name'];
}
```

## Adding extra details to global search results

Search results can display "details" below their title, which gives the user more information about the record. To enable this feature, you must override the `getGlobalSearchResultDetails()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getGlobalSearchResultDetails(Model $record): array
{
    return [
        'Author' => $record->author->name,
        'Category' => $record->category->name,
    ];
}
```

In this example, the category and author of the record will be displayed below its title in the search result.

<AutoScreenshot name="panels/resources/global-search-details" alt="Global search with extra details" version="5.x" />

However, the `category` and `author` relationships will be lazy-loaded, which will result in poor results performance. To [eager-load](https://laravel.com/docs/eloquent-relationships#eager-loading) these relationships, we must override the `getGlobalSearchEloquentQuery()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getGlobalSearchEloquentQuery(): Builder
{
    return parent::getGlobalSearchEloquentQuery()->with(['author', 'category']);
}
```

## Customizing global search result URLs

Global search results will link to the [Edit page](./editing-records) of your resource, or the [View page](./viewing-records) if the user does not have [edit permissions](./editing-records#authorization). To customize this, you may override the `getGlobalSearchResultUrl()` method and return a route of your choice:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getGlobalSearchResultUrl(Model $record): string
{
    return UserResource::getUrl('edit', ['record' => $record]);
}
```

## Adding actions to global search results

Global search supports actions, which are buttons that render below each search result. They can open a URL or dispatch a Livewire event.

Actions can be defined as follows:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

public static function getGlobalSearchResultActions(Model $record): array
{
    return [
        Action::make('edit')
            ->url(static::getUrl('edit', ['record' => $record])),
    ];
}
```

You can learn more about how to style action buttons [here](../actions/overview).

<AutoScreenshot name="panels/resources/global-search-actions" alt="Global search with actions" version="5.x" />

### Opening URLs from global search actions

You can open a URL, optionally in a new tab, when clicking on an action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('view')
    ->url(static::getUrl('view', ['record' => $record]), shouldOpenInNewTab: true)
```

### Dispatching Livewire events from global search actions

Sometimes you want to execute additional code when a global search result action is clicked. This can be achieved by setting a Livewire event which should be dispatched on clicking the action. You may optionally pass an array of data, which will be available as parameters in the event listener on your Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('quickView')
    ->dispatch('quickView', [$record->id])
```

## Limiting the number of global search results

By default, global search will return up to 50 results per resource. You can customize this on the resource label by overriding the `$globalSearchResultsLimit` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static int $globalSearchResultsLimit = 20;
```

## Moving the global search to the sidebar

By default, the global search field is positioned in the topbar. If the topbar is disabled, it is added to the sidebar.

You can choose to always move it to the sidebar by passing a `position` argument to the `globalSearch()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Enums\GlobalSearchPosition;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearch(position: GlobalSearchPosition::Sidebar);
}
```

## Sorting global search results

By default, global search results are ordered alphabetically by resource name. You can customize this order by setting the `$globalSearchSort` property on your resource:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?int $globalSearchSort = 3;
```

Now, navigation items with a lower sort value will appear before those with a higher sort value - the order is ascending.

## Disabling global search

As [explained above](#title), global search is automatically enabled once you set a title attribute for your resource. Sometimes you may want to specify the title attribute while not enabling global search.

This can be achieved by disabling global search in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearch(false);
}
```

## Requiring resources to opt in to global search

By default, all resources with a [title attribute](#setting-global-search-result-titles) are included in global search results. If you'd prefer resources to explicitly opt in, you can use the `globalSearchResourceOptIn()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearchResourceOptIn();
}
```

Now, only resources that explicitly set `$isGloballySearchable` to `true` will be included in global search results:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $isGloballySearchable = true;
```

Resources that do not declare this property will be excluded from global search, even if they have a title attribute set.

## Registering global search key bindings

The global search field can be opened using keyboard shortcuts. To configure these, pass the `globalSearchKeyBindings()` method to the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearchKeyBindings(['command+k', 'ctrl+k']);
}
```

## Configuring the global search debounce

Global search has a default debounce time of 500ms, to limit the number of requests that are made while the user is typing. You can alter this by using the `globalSearchDebounce()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearchDebounce('750ms');
}
```

## Configuring the global search field suffix

Global search field by default doesn't include any suffix. You may customize it using the `globalSearchFieldSuffix()` method in the [configuration](../panel-configuration).

If you want to display the currently configured [global search key bindings](#registering-global-search-key-bindings) in the suffix, you can use the `globalSearchFieldKeyBindingSuffix()` method, which will display the first registered key binding as the suffix of the global search field:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearchFieldKeyBindingSuffix();
}
```

<AutoScreenshot name="panels/resources/global-search-key-binding" alt="Global search field with key binding suffix" version="5.x" />

To customize the suffix yourself, you can pass a string or function to the `globalSearchFieldSuffix()` method. For example, to provide a custom key binding suffix for each platform manually:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;
use Filament\Support\Enums\Platform;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
            Platform::Windows, Platform::Linux => 'CTRL+K',
            Platform::Mac => '⌘K',
            default => null,
        });
}
```

## Disabling search term splitting

By default, the global search will split the search term into individual words and search for each word separately. This allows for more flexible search queries. However, it can have a negative impact on performance when large datasets are involved. You can disable this behavior by setting the `$shouldSplitGlobalSearchTerms` property to `false` on the resource:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?bool $shouldSplitGlobalSearchTerms = false;
```

<EditOnGitHub version="5.x" path="docs/03-resources/10-global-search.md" />

<Footer />
