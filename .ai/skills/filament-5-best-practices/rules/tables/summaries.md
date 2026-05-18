> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Summaries

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

You may render a "summary" section below your table content. This is great for displaying the results of calculations such as averages, sums, counts, and ranges of the data in your table.

By default, there will be a single summary line for the current page of data, and an additional summary line for the totals for all data if multiple pages are available. You may also add summaries for [groups](./grouping) of records, see ["Summarising groups of rows"](#summarising-groups-of-rows).

"Summarizer" objects can be added to any [table column](./columns) using the `summarize()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->summarize(Average::make())
```

Multiple "summarizers" may be added to the same column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->numeric()
    ->summarize([
        Average::make(),
        Range::make(),
    ])
```

> The first column in a table may not use summarizers. That column is used to render the heading and subheading/s of the summary section.

<AutoScreenshot name="tables/summaries" alt="Table with summaries" version="5.x" />

## Available summarizers

Filament ships with four types of summarizer:

* [Average](#average)
* [Count](#count)
* [Range](#range)
* [Sum](#sum)

You may also [create your own custom summarizers](#custom-summaries) to display data in whatever way you wish.

## Average

Average can be used to calculate the average of all values in the dataset:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->summarize(Average::make())
```

In this example, all ratings in the table will be added together and divided by the number of ratings.

<AutoScreenshot name="tables/summaries/average" alt="Table with average summary" version="5.x" />

## Count

Count can be used to find the total number of values in the dataset. Unless you just want to calculate the number of rows, you will probably want to [scope the dataset](#scoping-the-dataset) as well:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Query\Builder;

IconColumn::make('is_published')
    ->boolean()
    ->summarize(
        Count::make()->query(fn (Builder $query) => $query->where('is_published', true)),
    ),
```

In this example, the table will calculate how many posts are published.

### Counting the occurrence of icons

Using a count on an [icon column](./columns/icon) allows you to use the `icons()` method, which gives the user a visual representation of how many of each icon are in the table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Query\Builder;

IconColumn::make('is_published')
    ->boolean()
    ->summarize(Count::make()->icons()),
```

<AutoScreenshot name="tables/summaries/count" alt="Table with icon count summary" version="5.x" />

## Range

Range can be used to calculate the minimum and maximum value in the dataset:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Range::make())
```

In this example, the minimum and maximum price in the table will be found.

<AutoScreenshot name="tables/summaries/range" alt="Table with range summary" version="5.x" />

### Date range

You may format the range as dates using the `minimalDateTimeDifference()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('created_at')
    ->dateTime()
    ->summarize(Range::make()->minimalDateTimeDifference())
```

This method will present the minimal difference between the minimum and maximum date. For example:

* If the minimum and maximum dates are different days, only the dates will be displayed.
* If the minimum and maximum dates are on the same day at different times, both the date and time will be displayed.
* If the minimum and maximum dates and times are identical, they will only appear once.

### Text range

You may format the range as text using the `minimalTextualDifference()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('sku')
    ->summarize(Range::make()->minimalTextualDifference())
```

This method will present the minimal difference between the minimum and maximum. For example:

* If the minimum and maximum start with different letters, only the first letters will be displayed.
* If the minimum and maximum start with the same letter, more of the text will be rendered until a difference is found.
* If the minimum and maximum are identical, they will only appear once.

### Including null values in the range

By default, we will exclude null values from the range. If you would like to include them, you may use the `excludeNull(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('sku')
    ->summarize(Range::make()->excludeNull(false))
```

## Sum

Sum can be used to calculate the total of all values in the dataset:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make())
```

In this example, all prices in the table will be added together.

<AutoScreenshot name="tables/summaries/sum" alt="Table with sum summary" version="5.x" />

## Setting a label

You may set a summarizer's label using the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->label('Total'))
```

### Hiding a summarizer's label

It may be tempting to set the label to an empty string to hide it, but this is not recommended. Setting the label to an empty string will not communicate the purpose of the summarizer to screen readers, even if the purpose is clear visually. Instead, you should use the `hiddenLabel()` method, so it is hidden visually but still accessible to screen readers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->hiddenLabel())
```

You can also conditionally hide the label:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->hiddenLabel(FeatureFlag::active()))
```

## Scoping the dataset

You may apply a database query scope to a summarizer's dataset using the `query()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Query\Builder;

TextColumn::make('rating')
    ->summarize(
        Average::make()->query(fn (Builder $query) => $query->where('is_published', true)),
    ),
```

In this example, now only rows where `is_published` is set to `true` will be used to calculate the average.

This feature is especially useful with the [count](#count) summarizer, as it can count how many records in the dataset pass a test:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Query\Builder;

IconColumn::make('is_published')
    ->boolean()
    ->summarize(
        Count::make()->query(fn (Builder $query) => $query->where('is_published', true)),
    ),
```

In this example, the table will calculate how many posts are published.

## Formatting

### Number formatting

The `numeric()` method allows you to format an entry as a number:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->summarize(Average::make()->numeric())
```

If you would like to customize the number of decimal places used to format the number with, you can use the `decimalPlaces` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->summarize(Average::make()->numeric(
        decimalPlaces: 0,
    ))
```

By default, your app's locale will be used to format the number suitably. If you would like to customize the locale used, you can pass it to the `locale` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('rating')
    ->summarize(Average::make()->numeric(
        locale: 'nl',
    ))
```

### Currency formatting

The `money()` method allows you to easily format monetary values, in any currency:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->money('EUR'))
```

There is also a `divideBy` argument for `money()` that allows you to divide the original value by a number before formatting it. This could be useful if your database stores the price in cents, for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->money('EUR', divideBy: 100))
```

By default, your app's locale will be used to format the money suitably. If you would like to customize the locale used, you can pass it to the `locale` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->money('EUR', locale: 'nl'))
```

If you would like to customize the number of decimal places used to format the number with, you can use the `decimalPlaces` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('price')
    ->summarize(Sum::make()->money('EUR', decimalPlaces: 3))
```

### Limiting text length

You may `limit()` the length of the summary's value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('sku')
    ->summarize(Range::make()->limit(5))
```

### Adding a prefix or suffix

You may add a prefix or suffix to the summary's value:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\HtmlString;

TextColumn::make('volume')
    ->summarize(Sum::make()
        ->prefix('Total volume: ')
        ->suffix(new HtmlString(' m&sup3;'))
    )
```

## Custom summaries

You may create a custom summary by returning the value from the `using()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Query\Builder;

TextColumn::make('name')
    ->summarize(Summarizer::make()
        ->label('First last name')
        ->using(fn (Builder $query): string => $query->min('last_name')))
```

The callback has access to the database `$query` builder instance to perform calculations with. It should return the value to display in the table.

## Conditionally hiding the summary

To hide a summary, you may pass a boolean, or a function that returns a boolean, to the `hidden()` method. If you need it, you can access the Eloquent query builder instance for that summarizer via the `$query` argument of the function:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('sku')
    ->summarize(Summarizer::make()
        ->hidden(fn (Builder $query): bool => ! $query->exists()))
```

Alternatively, you can use the `visible()` method to achieve the opposite effect:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

TextColumn::make('sku')
    ->summarize(Summarizer::make()
        ->visible(fn (Builder $query): bool => $query->exists()))
```

## Summarising groups of rows

You can use summaries with [groups](./grouping) to display a summary of the records inside a group. This works automatically if you choose to add a summariser to a column in a grouped table.

### Hiding the grouped rows and showing the summary only

You may hide the rows inside groups and just show the summary of each group using the `groupsOnly()` method. This is beneficial in many reporting scenarios.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('views_count')
                ->summarize(Sum::make()),
            TextColumn::make('likes_count')
                ->summarize(Sum::make()),
        ])
        ->defaultGroup('category')
        ->groupsOnly();
}
```

## Hiding summary rows

By default, both the page summary and total summary rows are displayed when columns have summarizers. You can control which summary rows appear using the `summaries()` method on the table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->summaries(
            pageCondition: false,
            allTableCondition: false
        );
}
```

`pageCondition` controls whether the "this page" summary row is shown, and `allTableCondition` controls whether the total summary row for the entire table is shown.

This is useful when using [group summaries](#summarising-groups-of-rows) where you only want to display summaries per group, or when the page summary is redundant and you only need the total across all records.

<EditOnGitHub version="5.x" path="packages/tables/docs/06-summaries.md" />

<Footer />
