> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Filter layout

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

## Positioning filters into grid columns

To change the number of columns that filters may occupy, you may use the `filtersFormColumns()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ])
        ->filtersFormColumns(3);
}
```

<AutoScreenshot name="tables/filters/grid-columns" alt="Table with filters in grid columns" version="5.x" />

## Controlling the width of the filters dropdown

To customize the dropdown width, you may use the `filtersFormWidth()` method, and specify a width - `ExtraSmall`, `Small`, `Medium`, `Large`, `ExtraLarge`, `TwoExtraLarge`, `ThreeExtraLarge`, `FourExtraLarge`, `FiveExtraLarge`, `SixExtraLarge` or `SevenExtraLarge`. By default, the width is `ExtraSmall`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\Width;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ])
        ->filtersFormWidth(Width::FourExtraLarge);
}
```

## Controlling the maximum height of the filters dropdown

To add a maximum height to the filters' dropdown content, so that they scroll, you may use the `filtersFormMaxHeight()` method, passing a [CSS length](https://developer.mozilla.org/en-US/docs/Web/CSS/length):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ])
        ->filtersFormMaxHeight('400px');
}
```

## Displaying filters in a modal

To render the filters in a modal instead of in a dropdown, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ], layout: FiltersLayout::Modal);
}
```

<AutoScreenshot name="tables/filters/modal" alt="Table with filters in a modal" version="5.x" />

You may use the [trigger action API](./overview#customizing-the-filters-trigger-action) to [customize the modal](../../actions/modals), including [using a `slideOver()`](../../actions/modals#using-a-slide-over-instead-of-a-modal).

## Displaying filters above the table content

To render the filters above the table content instead of in a dropdown, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ], layout: FiltersLayout::AboveContent);
}
```

<AutoScreenshot name="tables/filters/above-content" alt="Table with filters above content" version="5.x" />

### Allowing filters above the table content to be collapsed

To allow the filters above the table content to be collapsed, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ], layout: FiltersLayout::AboveContentCollapsible);
}
```

<AutoScreenshot name="tables/filters/above-content-collapsible" alt="Table with collapsible filters above content" version="5.x" />

## Displaying filters below the table content

To render the filters below the table content instead of in a dropdown, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ], layout: FiltersLayout::BelowContent);
}
```

<AutoScreenshot name="tables/filters/below-content" alt="Table with filters below content" version="5.x" />

## Displaying filters to the left or right of the table content

To render the filters to the left (before) or right (after) of the table content instead of in a dropdown, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ], layout: FiltersLayout::BeforeContent); // or `FiltersLayout::AfterContent`
}
```

<AutoScreenshot name="tables/filters/before-content" alt="Table with filters before content" version="5.x" />

<AutoScreenshot name="tables/filters/after-content" alt="Table with filters after content" version="5.x" />

### Allowing filters to be collapsible when displayed to the left or right of the table content

To allow the filters to be collapsible when displayed to the left or right of the table content, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ], layout: FiltersLayout::BeforeContentCollapsible); // or `FiltersLayout::AfterContentCollapsible`
}
```

## Hiding the filter indicators

To hide the active filters indicators above the table, you may use `hiddenFilterIndicators()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ])
        ->hiddenFilterIndicators();
}
```

## Customizing the filter form schema

You may customize the [form schema](../../schemas/layouts) of the entire filter form at once, in order to rearrange filters into your desired layout, and use any of the [layout components](../../schemas/layouts) available to forms. To do this, use the `filterFormSchema()` method, passing a closure function that receives the array of defined `$filters` that you can insert:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Section;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            Filter::make('is_featured'),
            Filter::make('published_at'),
            Filter::make('author'),
        ])
        ->filtersFormColumns(2)
        ->filtersFormSchema(fn (array $filters): array => [
            Section::make('Visibility')
                ->description('These filters affect the visibility of the records in the table.')
                ->schema([
                    $filters['is_featured'],
                    $filters['published_at'],
                ])
                    ->columns(2)
                ->columnSpanFull(),
            $filters['author'],
        ]);
}
```

In this example, we have put two of the filters inside a [section](../../schemas/sections) component, and used the `columns()` method to specify that the section should have two columns. We have also used the `columnSpanFull()` method to specify that the section should span the full width of the filter form, which is also 2 columns wide. We have inserted each filter into the form schema by using the filter's name as the key in the `$filters` array.

<AutoScreenshot name="tables/filters/custom-form-schema" alt="Table with custom filter form schema" version="5.x" />

## Displaying the reset action in the footer

By default, the reset action appears in the header of the filters form. You may move it to the footer, next to the apply action, using the `filtersResetActionPosition()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersResetActionPosition;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            // ...
        ])
        ->filtersResetActionPosition(FiltersResetActionPosition::Footer);
}
```

<EditOnGitHub version="5.x" path="packages/tables/docs/03-filters/06-layout.md" />

<Footer />
