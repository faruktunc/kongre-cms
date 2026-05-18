> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Layout

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

## The problem with traditional table layouts

Traditional tables are notorious for having bad responsiveness. On mobile, there is only so much flexibility you have when rendering content that is horizontally long:

* Allow the user to scroll horizontally to see more table content
* Hide non-important columns on smaller devices

Both of these are possible with Filament. Tables automatically scroll horizontally when they overflow anyway, and you may choose to show and hide columns based on the responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) of the browser. To do this, you may use a `visibleFrom()` or `hiddenFrom()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;

TextColumn::make('slug')
    ->visibleFrom('md')
```

This is fine, but there is still a glaring issue - **on mobile, the user is unable to see much information in a table row at once without scrolling**.

Filament offers two solutions to this problem:

1. **Simple stacking** - Use `stackedOnMobile()` to automatically stack all cells vertically on mobile without changing your column definitions
2. **Custom layouts** - Use `Split`, `Stack`, and other layout components for fine-grained control over how content appears at each breakpoint

## Stacking table cells on mobile

The simplest way to make your table responsive is to use the `stackedOnMobile()` method on the table. This automatically converts the traditional horizontal table layout into a vertical card-like layout on mobile screens, while preserving the standard table appearance on larger screens:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
            TextColumn::make('email'),
            TextColumn::make('phone'),
            TextColumn::make('job'),
        ])
        ->stackedOnMobile();
}
```

<AutoScreenshot name="tables/layout/stacked-on-mobile" alt="Table with stacked mobile layout on desktop" version="5.x" />

<AutoScreenshot name="tables/layout/stacked-on-mobile/mobile" alt="Table with stacked mobile layout on mobile" version="5.x" />

On mobile, each row displays as a card with the column label above its value. If you have sortable columns, a sort dropdown appears at the top of the table on mobile, allowing users to sort without the traditional header row. Bulk selection is also supported, with a checkbox appearing in the header area.

This approach works well when you want a quick responsive solution without restructuring your columns. However, for more complex layouts or fine-grained control over how content appears at different breakpoints, you may prefer to use the layout components described below.

## Custom column layouts

Filament lets you build responsive table-like interfaces, without touching HTML or CSS. These layouts let you define exactly where content appears in a table row, at each responsive breakpoint.

<AutoScreenshot name="tables/layout/demo" alt="Table with responsive layout" version="5.x" />

<AutoScreenshot name="tables/layout/demo/mobile" alt="Table with responsive layout on mobile" version="5.x" />

### Allowing columns to stack on mobile

Let's introduce a component - `Split`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;

Split::make([
    ImageColumn::make('avatar')
        ->circular(),
    TextColumn::make('name')
        ->weight(FontWeight::Bold)
        ->searchable()
        ->sortable(),
    TextColumn::make('email'),
])
```

<AutoScreenshot name="tables/layout/split" alt="Table with a split layout" version="5.x" />

<AutoScreenshot name="tables/layout/split/mobile" alt="Table with a split layout on mobile" version="5.x" />

A `Split` component is used to wrap around columns, and allow them to stack on mobile.

By default, columns within a split will appear aside each other all the time. However, you may choose a responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) where this behavior starts `from()`. Before this point, the columns will stack on top of each other:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

Split::make([
    ImageColumn::make('avatar')
        ->circular(),
    TextColumn::make('name')
        ->weight(FontWeight::Bold)
        ->searchable()
        ->sortable(),
    TextColumn::make('email'),
])->from('md')
```

In this example, the columns will only appear horizontally aside each other from `md` [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) devices onwards:

<AutoScreenshot name="tables/layout/split-desktop" alt="Table with a split layout on desktop" version="5.x" />

<AutoScreenshot name="tables/layout/split-desktop/mobile" alt="Table with a stacked layout on mobile" version="5.x" />

### Preventing a column from creating whitespace

Splits, like table columns, will automatically adjust their whitespace to ensure that each column has proportionate separation. You can prevent this from happening, using `grow(false)`. In this example, we will make sure that the avatar image will sit tightly against the name column:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

Split::make([
    ImageColumn::make('avatar')
        ->circular()
        ->grow(false),
    TextColumn::make('name')
        ->weight(FontWeight::Bold)
        ->searchable()
        ->sortable(),
    TextColumn::make('email'),
])
```

The other columns which are allowed to `grow()` will adjust to consume the newly-freed space:

<AutoScreenshot name="tables/layout/grow-disabled" alt="Table with a column that doesn't grow" version="5.x" />

<AutoScreenshot name="tables/layout/grow-disabled/mobile" alt="Table with a column that doesn't grow on mobile" version="5.x" />

### Stacking within a split

Inside a split, you may stack multiple columns on top of each other vertically. This allows you to display more data inside fewer columns on desktop:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

Split::make([
    ImageColumn::make('avatar')
        ->circular(),
    TextColumn::make('name')
        ->weight(FontWeight::Bold)
        ->searchable()
        ->sortable(),
    Stack::make([
        TextColumn::make('phone')
            ->icon('heroicon-m-phone'),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope'),
    ]),
])
```

<AutoScreenshot name="tables/layout/stack" alt="Table with a stack" version="5.x" />

<AutoScreenshot name="tables/layout/stack/mobile" alt="Table with a stack on mobile" version="5.x" />

#### Hiding a stack on mobile

Similar to individual columns, you may choose to hide a stack based on the responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) of the browser. To do this, you may use a `visibleFrom()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

Split::make([
    ImageColumn::make('avatar')
        ->circular(),
    TextColumn::make('name')
        ->weight(FontWeight::Bold)
        ->searchable()
        ->sortable(),
    Stack::make([
        TextColumn::make('phone')
            ->icon('heroicon-m-phone'),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope'),
    ])->visibleFrom('md'),
])
```

<AutoScreenshot name="tables/layout/stack-hidden-on-mobile" alt="Table with a stack" version="5.x" />

<AutoScreenshot name="tables/layout/stack-hidden-on-mobile/mobile" alt="Table with no stack on mobile" version="5.x" />

#### Aligning stacked content

By default, columns within a stack are aligned to the start. You may choose to align columns within a stack to the `Alignment::Center` or `Alignment::End`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

Split::make([
    ImageColumn::make('avatar')
        ->circular(),
    TextColumn::make('name')
        ->weight(FontWeight::Bold)
        ->searchable()
        ->sortable(),
    Stack::make([
        TextColumn::make('phone')
            ->icon('heroicon-m-phone')
            ->grow(false),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope')
            ->grow(false),
    ])
        ->alignment(Alignment::End)
        ->visibleFrom('md'),
])
```

Ensure that the columns within the stack have `grow(false)` set, otherwise they will stretch to fill the entire width of the stack and follow their own alignment configuration instead of the stack's.

<AutoScreenshot name="tables/layout/stack-aligned-right" alt="Table with a stack aligned right" version="5.x" />

#### Spacing stacked content

By default, stacked content has no vertical padding between columns. To add some, you may use the `space()` method, which accepts either `1`, `2`, or `3`, corresponding to [Tailwind's spacing scale](https://tailwindcss.com/docs/space):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;

Stack::make([
    TextColumn::make('phone')
        ->icon('heroicon-m-phone'),
    TextColumn::make('email')
        ->icon('heroicon-m-envelope'),
])->space(1)
```

<AutoScreenshot name="tables/layout/stack-spaced" alt="Table with spaced stacked content" version="5.x" />

### Controlling column width using a grid

Sometimes, using a `Split` creates inconsistent widths when columns contain lots of content. This is because it's powered by Flexbox internally and each row individually controls how much space is allocated to content.

Instead, you may use a `Grid` layout, which uses CSS Grid Layout to allow you to control column widths:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\TextColumn;

Grid::make([
    'lg' => 2,
])
    ->schema([
        TextColumn::make('phone')
            ->icon('heroicon-m-phone'),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope'),
    ])
```

These columns will always consume equal width within the grid, from the `lg` [breakpoint](https://tailwindcss.com/docs/responsive-design#overview).

<AutoScreenshot name="tables/layout/column-grid" alt="Table with a grid column layout" version="5.x" />

You may choose to customize the number of columns within the grid at other breakpoints:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;

Grid::make([
    'lg' => 2,
    '2xl' => 4,
])
    ->schema([
        Stack::make([
            TextColumn::make('name'),
            TextColumn::make('job'),
        ]),
        TextColumn::make('phone')
            ->icon('heroicon-m-phone'),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope'),
    ])
```

And you can even control how many grid columns will be consumed by each component at each [breakpoint](https://tailwindcss.com/docs/responsive-design#overview):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;

Grid::make([
    'lg' => 2,
    '2xl' => 5,
])
    ->schema([
        Stack::make([
            TextColumn::make('name'),
            TextColumn::make('job'),
        ])->columnSpan([
            'lg' => 'full',
            '2xl' => 2,
        ]),
        TextColumn::make('phone')
            ->icon('heroicon-m-phone')
            ->columnSpan([
                '2xl' => 2,
            ]),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope'),
    ])
```

### Collapsible content

When you're using a column layout like split or stack, then you can also add collapsible content. This is very useful for when you don't want to display all data in the table at once, but still want it to be accessible to the user if they need to access it, without navigating away.

Split and stack components can be made `collapsible()`, but there is also a dedicated `Panel` component that provides a pre-styled background color and border radius, to separate the collapsible content from the rest:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

[
    Split::make([
        ImageColumn::make('avatar')
            ->circular(),
        TextColumn::make('name')
            ->weight(FontWeight::Bold)
            ->searchable()
            ->sortable(),
    ]),
    Panel::make([
        Stack::make([
            TextColumn::make('phone')
                ->icon('heroicon-m-phone'),
            TextColumn::make('email')
                ->icon('heroicon-m-envelope'),
        ]),
    ])->collapsible(),
]
```

You can expand a panel by default using the `collapsed(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;

Panel::make([
    Split::make([
        TextColumn::make('phone')
            ->icon('heroicon-m-phone'),
        TextColumn::make('email')
            ->icon('heroicon-m-envelope'),
    ])->from('md'),
])->collapsed(false)
```

<AutoScreenshot name="tables/layout/collapsible" alt="Table with collapsible content" version="5.x" />

<AutoScreenshot name="tables/layout/collapsible/mobile" alt="Table with collapsible content on mobile" version="5.x" />

### Arranging records into a grid

Sometimes, you may find that your data fits into a grid format better than a list. Filament can handle that too!

Simply use the `$table->contentGrid()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            Stack::make([
                // Columns
            ]),
        ])
        ->contentGrid([
            'md' => 2,
            'xl' => 3,
        ]);
}
```

In this example, the rows will be displayed in a grid:

* On mobile, they will be displayed in 1 column only.
* From the `md` [breakpoint](https://tailwindcss.com/docs/responsive-design#overview), they will be displayed in 2 columns.
* From the `xl` [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) onwards, they will be displayed in 3 columns.

These settings are fully customizable, any [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) from `sm` to `2xl` can contain `1` to `12` columns.

<AutoScreenshot name="tables/layout/grid" alt="Table with grid layout" version="5.x" />

<AutoScreenshot name="tables/layout/grid/mobile" alt="Table with grid layout on mobile" version="5.x" />

### Custom HTML

You may add custom HTML to your table using a `View` component. It can even be `collapsible()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

[
    Split::make([
        ImageColumn::make('avatar')
            ->circular(),
        TextColumn::make('name')
            ->weight(FontWeight::Bold)
            ->searchable()
            ->sortable(),
    ]),
    View::make('users.table.collapsible-row-content')
        ->collapsible(),
]
```

Now, create a `/resources/views/users/table/collapsible-row-content.blade.php` file, and add in your HTML. You can access the table record using `$getRecord()`:

```blade theme={"theme":"gruvbox-dark-hard"}
<p class="px-4 py-3 bg-gray-100 rounded-lg">
    <span class="font-medium">
        Email address:
    </span>

    <span>
        {{ $getRecord()->email }}
    </span>
</p>
```

#### Embedding other components

You could even pass in columns or other layout components to the `components()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

[
    Split::make([
        ImageColumn::make('avatar')
            ->circular(),
        TextColumn::make('name')
            ->weight(FontWeight::Bold)
            ->searchable()
            ->sortable(),
    ]),
    View::make('users.table.collapsible-row-content')
        ->components([
            TextColumn::make('email')
                ->icon('heroicon-m-envelope'),
        ])
        ->collapsible(),
]
```

Now, render the components in the Blade file:

```blade theme={"theme":"gruvbox-dark-hard"}
<div class="px-4 py-3 bg-gray-100 rounded-lg">
    @foreach ($getComponents() as $layoutComponent)
        {{ $layoutComponent
            ->record($getRecord())
            ->recordKey($getRecordKey())
            ->rowLoop($getRowLoop())
            ->renderInLayout() }}
    @endforeach
</div>
```

<EditOnGitHub version="5.x" path="packages/tables/docs/05-layout.md" />

<Footer />
