> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Grouping rows

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

You may allow users to group table rows together using a common attribute. This is useful for displaying lots of data in a more organized way.

Groups can be set up using the name of the attribute to group by (e.g. `'status'`), or a `Group` object which allows you to customize the behavior of that grouping (e.g. `Group::make('status')->collapsible()`).

## Grouping rows by default

You may want to always group posts by a specific attribute. To do this, pass the group to the `defaultGroup()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->defaultGroup('status');
}
```

<AutoScreenshot name="tables/grouping" alt="Table with grouping" version="5.x" />

## Allowing users to choose between groupings

You may also allow users to pick between different groupings, by passing them in an array to the `groups()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            'status',
            'category',
        ]);
}
```

<AutoScreenshot name="tables/grouping-selectable" alt="Table with selectable grouping" version="5.x" />

You can use both `groups()` and `defaultGroup()` together to allow users to choose between different groupings, but have a default grouping set:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            'status',
            'category',
        ])
        ->defaultGroup('status');
}
```

## Grouping by a relationship attribute

You can also group by a relationship attribute using dot-syntax. For example, if you have an `author` relationship which has a `name` attribute, you can use `author.name` as the name of the attribute:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            'author.name',
        ]);
}
```

## Setting a grouping label

By default, the label of the grouping will be generated based on the attribute. You may customize it with a `Group` object, using the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('author.name')
                ->label('Author name'),
        ]);
}
```

## Setting a group title

By default, the title of a group will be the value of the attribute. You may customize it by returning a new title from the `getTitleFromRecordUsing()` method of a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->getTitleFromRecordUsing(fn (Post $record): string => ucfirst($record->status->getLabel())),
        ]);
}
```

### Disabling the title label prefix

By default, the title is prefixed with the label of the group. To disable this prefix, utilize the `titlePrefixedWithLabel(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->titlePrefixedWithLabel(false),
        ]);
}
```

## Setting a group description

You may also set a description for a group, which will be displayed underneath the group title. To do this, use the `getDescriptionFromRecordUsing()` method on a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->getDescriptionFromRecordUsing(fn (Post $record): string => $record->status->getDescription()),
        ]);
}
```

<AutoScreenshot name="tables/grouping-descriptions" alt="Table with group descriptions" version="5.x" />

## Setting a group key

By default, the key of a group will be the value of the attribute. It is used internally as a raw identifier of that group, instead of the [title](#setting-a-group-title). You may customize it by returning a new key from the `getKeyFromRecordUsing()` method of a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->getKeyFromRecordUsing(fn (Post $record): string => $record->status->value),
        ]);
}
```

## Date groups

When using a date-time column as a group, you may want to group by the date only, and ignore the time. To do this, use the `date()` method on a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('created_at')
                ->date(),
        ]);
}
```

<AutoScreenshot name="tables/grouping-date" alt="Table with date grouping" version="5.x" />

## Collapsible groups

You can allow rows inside a group to be collapsed underneath their group title. To enable this, use a `Group` object with the `collapsible()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('author.name')
                ->collapsible(),
        ]);
}
```

<AutoScreenshot name="tables/grouping-collapsible" alt="Table with collapsible groups" version="5.x" />

### Collapsing groups by default

By default, groups with the `collapsible()` method are expanded when the table loads.

If you want all groups to be collapsed by default when the table loads, use `$table->collapsedGroupsByDefault()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('author.name')
                ->collapsible(),
        ])
        ->collapsedGroupsByDefault();
}
```

## Summarising groups

You can use [summaries](./summaries) with groups to display a summary of the records inside a group. This works automatically if you choose to add a summariser to a column in a grouped table.

### Hiding the grouped rows and showing the summary only

You may hide the rows inside groups and just show the summary of each group using the `groupsOnly()` method. This is very useful in many reporting scenarios.

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

<AutoScreenshot name="tables/grouping-groups-only" alt="Table with groups only mode" version="5.x" />

## Customizing the Eloquent query ordering behavior

Some features require the table to be able to order an Eloquent query according to a group. You can customize how we do this using the `orderQueryUsing()` method on a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->orderQueryUsing(fn (Builder $query, string $direction) => $query->orderBy('status', $direction)),
        ]);
}
```

## Customizing the Eloquent query scoping behavior

Some features require the table to be able to scope an Eloquent query according to a group. You can customize how we do this using the `scopeQueryByKeyUsing()` method on a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->scopeQueryByKeyUsing(fn (Builder $query, string $key) => $query->where('status', $key)),
        ]);
}
```

## Customizing the Eloquent query grouping behavior

Some features require the table to be able to group an Eloquent query according to a group. You can customize how we do this using the `groupQueryUsing()` method on a `Group` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->groups([
            Group::make('status')
                ->groupQueryUsing(fn (Builder $query) => $query->groupBy('status')),
        ]);
}
```

## Customizing the groups dropdown trigger action

To customize the groups dropdown trigger button, you may use the `groupRecordsTriggerAction()` method, passing a closure that returns an action. All methods that are available to [customize action trigger buttons](../actions/overview) can be used:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            // ...
        ])
        ->groupRecordsTriggerAction(
            fn (Action $action) => $action
                ->button()
                ->label('Group records'),
        );
}
```

## Using the grouping settings dropdown on desktop

By default, the grouping settings dropdown will only be shown on mobile devices. On desktop devices, the grouping settings are in the header of the table. You can enable the dropdown on desktop devices too by using the `groupingSettingsInDropdownOnDesktop()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->groups([
            // ...
        ])
        ->groupingSettingsInDropdownOnDesktop();
}
```

## Hiding the grouping settings

You can hide the grouping settings interface using the `groupingSettingsHidden()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
		->defaultGroup('status')
        ->groupingSettingsHidden();
}
```

### Hiding the grouping direction setting only

You can hide the grouping direction select interface using the `groupingDirectionSettingHidden()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
		->defaultGroup('status')
        ->groupingDirectionSettingHidden();
}
```

<EditOnGitHub version="5.x" path="packages/tables/docs/07-grouping.md" />

<Footer />
