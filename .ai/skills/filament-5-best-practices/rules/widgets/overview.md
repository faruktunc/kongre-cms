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

Filament allows you to build dynamic dashboards, comprised of "widgets". Each widget is an element on the dashboard that displays data in a specific way. For example, you can display [stats](./stats-overview), [chart](./charts), or a [table](#table-widgets).

<AutoScreenshot name="panels/dashboard" alt="Dashboard with widgets" version="5.x" />

## Creating a widget

To create a widget, you can use the `make:filament-widget` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-widget MyWidget
```

This command will ask you which type of widget you want to create. You can choose from the following options:

* **Custom**: A custom widget that you can build from scratch.
* **Chart**: A widget that displays a [chart](./charts).
* **Stats overview**: A widget that displays [statistics](./stats-overview).
* **Table**: A widget that displays a [table](#table-widgets).

## Sorting widgets

Each widget class contains a `$sort` property that may be used to change its order on the page, relative to other widgets:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?int $sort = 2;
```

## Customizing the dashboard page

If you want to customize the dashboard class, for example, to [change the number of widget columns](#customizing-the-widgets-grid), create a new file at `app/Filament/Pages/Dashboard.php`:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    // ...
}
```

Finally, remove the original `Dashboard` class from [configuration file](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
        ->pages([]);
}
```

If you don't discover pages with `discoverPages()` in the directory you created the new dashboard class, you should manually register the class in the `pages()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Dashboard;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->pages([
            Dashboard::class,
        ]);
}
```

### Creating multiple dashboards

If you want to create multiple dashboards, you can do so by repeating [the process described above](#customizing-the-dashboard-page). Creating new pages that extend the `Dashboard` class will allow you to create as many dashboards as you need.

You will also need to define the URL path to the extra dashboard, otherwise it will be at `/`:

```php theme={"theme":"gruvbox-dark-hard"}
protected static string $routePath = 'finance';
```

You may also customize the title of the dashboard by overriding the `$title` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $title = 'Finance dashboard';
```

The primary dashboard shown to a user is the first one they have access to (controlled by [`canAccess()` method](../navigation/custom-pages#authorization)), according to the defined navigation sort order.

The default sort order for dashboards is `-2`. You can control the sort order of custom dashboards with `$navigationSort`:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?int $navigationSort = 15;
```

### Customizing the widgets' grid

You may change how many grid columns are used to display widgets.

Firstly, you must [replace the original Dashboard page](#customizing-the-dashboard-page).

Now, in your new `app/Filament/Pages/Dashboard.php` file, you may override the `getColumns()` method to return a number of grid columns to use:

```php theme={"theme":"gruvbox-dark-hard"}
public function getColumns(): int | array
{
    return 2;
}
```

#### Responsive widgets grid

You may wish to change the number of widget grid columns based on the responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) of the browser. You can do this using an array that contains the number of columns that should be used at each breakpoint:

```php theme={"theme":"gruvbox-dark-hard"}
public function getColumns(): int | array
{
    return [
        'md' => 4,
        'xl' => 5,
    ];
}
```

This pairs well with [responsive widget widths](#responsive-widget-widths).

#### Customizing widget width

You may customize the width of a widget using the `$columnSpan` property. You may use a number between 1 and 12 to indicate how many columns the widget should span, or `full` to make it occupy the full width of the page:

```php theme={"theme":"gruvbox-dark-hard"}
protected int | string | array $columnSpan = 'full';
```

##### Responsive widget widths

You may wish to change the widget width based on the responsive [breakpoint](https://tailwindcss.com/docs/responsive-design#overview) of the browser. You can do this using an array that contains the number of columns that the widget should occupy at each breakpoint:

```php theme={"theme":"gruvbox-dark-hard"}
protected int | string | array $columnSpan = [
    'md' => 2,
    'xl' => 3,
];
```

This is especially useful when using a [responsive widgets grid](#responsive-widgets-grid).

<AutoScreenshot name="panels/dashboard-column-spans" alt="Dashboard with customized widget column spans" version="5.x" />

## Conditionally hiding widgets

You may override the static `canView()` method on widgets to conditionally hide them:

```php theme={"theme":"gruvbox-dark-hard"}
public static function canView(): bool
{
    return auth()->user()->isAdmin();
}
```

## Table widgets

You may easily add tables to your dashboard. Start by creating a widget with the command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-widget LatestOrders --table
```

You may now [customize the table](../tables) by editing the widget file.

## Custom widgets

To get started building a `BlogPostsOverview` widget:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-widget BlogPostsOverview
```

This command will create two files - a widget class in the `/Widgets` directory of the Filament directory, and a view in the `/widgets` directory of the Filament views directory.

The class is a [Livewire component](https://livewire.laravel.com/docs/components), so any Livewire features are available to you. The Blade view can contain any HTML you like, and you can access any public Livewire properties in the view. You can also access the Livewire component instance in the view using `$this`.

## Filtering widget data

You may add a form to the dashboard that allows the user to filter the data displayed across all widgets. When the filters are updated, the widgets will be reloaded with the new data.

Firstly, you must [replace the original Dashboard page](#customizing-the-dashboard-page).

Now, in your new `app/Filament/Pages/Dashboard.php` file, you may add the `HasFiltersForm` trait, and add the `filtersForm()` method to return form components:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate'),
                        DatePicker::make('endDate'),
                        // ...
                    ])
                    ->columns(3),
            ]);
    }
}
```

<AutoScreenshot name="panels/dashboard-filters" alt="Dashboard with filter form" version="5.x" />

In widget classes that require data from the filters, you need to add the `InteractsWithPageFilters` trait, which will allow you to use the `$this->pageFilters` property to access the raw data from the filters form:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\BlogPost;
use Carbon\CarbonImmutable;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;

class BlogPostsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    public function getStats(): array
    {
        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;

        return [
            StatsOverviewWidget\Stat::make(
                label: 'Total posts',
                value: BlogPost::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            ),
            // ...
        ];
    }
}
```

The `$this->pageFilters` array will always reflect the current form data. Please note that this data is not validated, as it is available live and not intended to be used for anything other than querying the database. You must ensure that the data is valid before using it. In this example, we check if the start date is set before using it in the query.

### Filtering widget data using an action modal

Alternatively, you can swap out the filters form for an action modal, that can be opened by clicking a button in the header of the page. There are many benefits to using this approach:

* The filters form is not always visible, which allows you to use the full height of the page for widgets.
* The filters do not update the widgets until the user clicks the "Apply" button, which means that the widgets are not reloaded until the user is ready. This can improve performance if the widgets are expensive to load.
* Validation can be performed on the filters form, which means that the widgets can rely on the fact that the data is valid - the user cannot submit the form until it is. Canceling the modal will discard the user's changes.

To use an action modal instead of a filters form, you can use the `HasFiltersAction` trait instead of `HasFiltersForm`. Then, register the `FilterAction` class as an action in `getHeaderActions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Actions\FilterAction;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;

class Dashboard extends BaseDashboard
{
    use HasFiltersAction;
    
    protected function getHeaderActions(): array
    {
        return [
            FilterAction::make()
                ->schema([
                    DatePicker::make('startDate'),
                    DatePicker::make('endDate'),
                    // ...
                ]),
        ];
    }
}
```

Handling data from the filter action is the same as handling data from the filters header form, except that the data is validated before being passed to the widget. The `InteractsWithPageFilters` trait still applies.

<AutoScreenshot name="panels/dashboard-filter-action" alt="Dashboard with filter action modal" version="5.x" />

### Persisting widget filters in the user's session

By default, the dashboard filters applied will persist in the user's session between page loads. To disable this, override the `$persistsFiltersInSession` property in the dashboard page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    protected bool $persistsFiltersInSession = false;
}
```

Alternatively, override the `persistsFiltersInSession()` method in the dashboard page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function persistsFiltersInSession(): bool
    {
        return false;
    }
}
```

## Disabling the default widgets

By default, two widgets are displayed on the dashboard. These widgets can be disabled by updating the `widgets()` array of the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->widgets([]);
}
```

<EditOnGitHub version="5.x" path="packages/widgets/docs/01-overview.md" />

<Footer />
