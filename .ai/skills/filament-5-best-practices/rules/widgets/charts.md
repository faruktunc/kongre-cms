> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Chart widgets

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

Filament comes with many "chart" widget templates, which you can use to display real-time, interactive charts.

Start by creating a widget with the command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-widget BlogPostsChart --chart
```

There is a single `ChartWidget` class that is used for all charts. The type of chart is set by the `getType()` method. In this example, that method returns the string `'line'`.

The `protected ?string $heading` variable is used to set the heading that describes the chart. If you need to set the heading dynamically, you can override the `getHeading()` method.

The `getData()` method is used to return an array of datasets and labels. Each dataset is a labeled array of points to plot on the chart, and each label is a string. This structure is identical to the [Chart.js](https://www.chartjs.org/docs) library, which Filament uses to render charts. You may use the [Chart.js documentation](https://www.chartjs.org/docs) to fully understand the possibilities to return from `getData()`, based on the chart type.

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected ?string $heading = 'Blog Posts';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
```

Now, check out your widget in the dashboard.

<AutoScreenshot name="widgets/chart/line" alt="Line chart" version="5.x" />

## Available chart types

Below is a list of available chart widget classes which you may extend, and their corresponding [Chart.js](https://www.chartjs.org/docs) documentation page, for inspiration on what to return from `getData()`:

* Bar chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/bar)
* Bubble chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/bubble)
* Doughnut chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/doughnut)
* Line chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/line)
* Pie chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/doughnut.html#pie)
* Polar area chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/polar)
* Radar chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/radar)
* Scatter chart - [Chart.js documentation](https://www.chartjs.org/docs/latest/charts/scatter)

For example, you could use a bar chart by returning `'bar'` from the `getType()` method:

<AutoScreenshot name="widgets/chart/bar" alt="Bar chart" version="5.x" />

Here are examples of the other available chart types:

<AutoScreenshot name="widgets/chart/pie" alt="Pie chart" version="5.x" />

<AutoScreenshot name="widgets/chart/doughnut" alt="Doughnut chart" version="5.x" />

<AutoScreenshot name="widgets/chart/radar" alt="Radar chart" version="5.x" />

<AutoScreenshot name="widgets/chart/polar-area" alt="Polar area chart" version="5.x" />

<AutoScreenshot name="widgets/chart/scatter" alt="Scatter chart" version="5.x" />

<AutoScreenshot name="widgets/chart/bubble" alt="Bubble chart" version="5.x" />

## Customizing the chart color

You can customize the [color](../styling/colors) of the chart data by setting the `$color` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected string $color = 'info';
```

If you're looking to customize the color further, or use multiple colors across multiple datasets, you can still make use of Chart.js's [color options](https://www.chartjs.org/docs/latest/general/colors.html) in the data:

```php theme={"theme":"gruvbox-dark-hard"}
protected function getData(): array
{
    return [
        'datasets' => [
            [
                'label' => 'Blog posts created',
                'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                'backgroundColor' => '#36A2EB',
                'borderColor' => '#9BD0F5',
            ],
        ],
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    ];
}
```

## Generating chart data from an Eloquent model

To generate chart data from an Eloquent model, Filament recommends that you install the `flowframe/laravel-trend` package. You can view the [documentation](https://github.com/Flowframe/laravel-trend).

Here is an example of generating chart data from a model using the `laravel-trend` package:

```php theme={"theme":"gruvbox-dark-hard"}
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

protected function getData(): array
{
    $data = Trend::model(BlogPost::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Blog posts',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
}
```

## Filtering chart data

### Basic Select filter

You can set up chart filters to change the data that is presented. Commonly, this is used to change the time period that chart data is rendered for.

To set a default filter value, set the `$filter` property:

```php theme={"theme":"gruvbox-dark-hard"}
public ?string $filter = 'today';
```

Then, define the `getFilters()` method to return an array of values and labels for your filter:

```php theme={"theme":"gruvbox-dark-hard"}
protected function getFilters(): ?array
{
    return [
        'today' => 'Today',
        'week' => 'Last week',
        'month' => 'Last month',
        'year' => 'This year',
    ];
}
```

You can use the active filter value within your `getData()` method:

```php theme={"theme":"gruvbox-dark-hard"}
protected function getData(): array
{
    $activeFilter = $this->filter;

    // ...
}
```

<AutoScreenshot name="widgets/chart/filter" alt="Chart with filter" version="5.x" />

### Custom filters

You can use [schema components](../schemas) to build custom filters for your chart widget. This approach offers a more flexible way to define filters.

To get started, use the `HasFiltersSchema` trait and implement the `filtersSchema()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;

class BlogPostsChart extends ChartWidget
{
    use HasFiltersSchema;
    
    // ...
    
    public function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            DatePicker::make('startDate')
                ->default(now()->subDays(30)),
            DatePicker::make('endDate')
                ->default(now()),
        ]);
    }
}
```

The filter values are accessible via the `$this->filters` array. You can use these values inside your `getData()` method:

```php theme={"theme":"gruvbox-dark-hard"}
protected function getData(): array
{
    $startDate = $this->filters['startDate'] ?? null;
    $endDate = $this->filters['endDate'] ?? null;

    return [
        // ...
    ];
}
```

The `$this->filters` array will always reflect the current form data. Please note that this data is not validated, as it is available live and not intended to be used for anything other than querying the database. You must ensure that the data is valid before using it.

<AutoScreenshot name="widgets/chart/custom-filters" alt="Chart with custom filters" version="5.x" />

<Info>
  If you want to add filters that apply to multiple widgets at once, see [filtering widget data](./overview#filtering-widget-data) in the dashboard.
</Info>

#### Deferring filter updates

By default, filters using the `filtersSchema()` method update the chart data immediately as they are changed. However, for complex queries or better user experience, you may want to **defer** filter updates until the user clicks an "Apply" button.

When deferred, filter changes are only applied when the user clicks the "Apply" button. This ensures that the chart only re-renders when the user has finished adjusting all of their filters.

The chart will display data using the default filter values when the page first loads, ensuring users see meaningful data immediately without needing to take action.

To enable deferred filters, set the `$hasDeferredFilters` property to `true`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;

class BlogPostsChart extends ChartWidget
{
    use HasFiltersSchema;

    protected bool $hasDeferredFilters = true;

    // ...
}
```

If you need dynamic control over whether filters are deferred, you may override the `hasDeferredFilters()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public function hasDeferredFilters(): bool
{
    return auth()->user()->prefersDeferredFilters();
}
```

#### Resetting filters to defaults

When using deferred filters, a "Reset" link appears in the filter dropdown footer alongside the "Apply" button. Clicking this link restores all filters to their default values as defined in the `filtersSchema()` method. For example, if you set `->default(now()->subDays(30))` on a `DatePicker`, the reset action will restore that default date, not an empty value.

#### Customizing filter actions

You may customize the apply and reset actions that appear when using deferred filters. All methods that are available to [customize action trigger buttons](../actions/overview) can be used:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

public function filtersApplyAction(Action $action): Action
{
    return $action
        ->label('Update Chart')
        ->color('success');
}

public function filtersResetAction(Action $action): Action
{
    return $action
        ->label('Clear Filters')
        ->color('danger');
}
```

## Live updating chart data (polling)

By default, chart widgets refresh their data every 5 seconds.

To customize this, you may override the `$pollingInterval` property on the class to a new interval:

```php theme={"theme":"gruvbox-dark-hard"}
protected ?string $pollingInterval = '10s';
```

Alternatively, you may disable polling altogether:

```php theme={"theme":"gruvbox-dark-hard"}
protected ?string $pollingInterval = null;
```

## Setting a maximum chart height

You may place a maximum height on the chart to ensure that it doesn't get too big, using the `$maxHeight` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected ?string $maxHeight = '300px';
```

<AutoScreenshot name="widgets/chart/max-height" alt="Chart with maximum height" version="5.x" />

## Setting chart configuration options

You may specify an `$options` variable on the chart class to control the many configuration options that the Chart.js library provides. For instance, you could turn off the [legend](https://www.chartjs.org/docs/latest/configuration/legend.html) for a line chart:

```php theme={"theme":"gruvbox-dark-hard"}
protected ?array $options = [
    'plugins' => [
        'legend' => [
            'display' => false,
        ],
    ],
];
```

Alternatively, you can override the `getOptions()` method to return a dynamic array of options:

```php theme={"theme":"gruvbox-dark-hard"}
protected function getOptions(): array
{
    return [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
    ];
}
```

These PHP arrays will get transformed into JSON objects when the chart is rendered. If you want to return raw JavaScript from this method instead, you can return a `RawJs` object. This is useful if you want to use a JavaScript callback function, for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\RawJs;

protected function getOptions(): RawJs
{
    return RawJs::make(<<<JS
        {
            scales: {
                y: {
                    ticks: {
                        callback: (value) => '€' + value,
                    },
                },
            },
        }
    JS);
}
```

## Adding a description

You may add a description, below the heading of the chart, using the `getDescription()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public function getDescription(): ?string
{
    return 'The number of blog posts published per month.';
}
```

<AutoScreenshot name="widgets/chart/description" alt="Chart with description" version="5.x" />

## Disabling lazy loading

By default, widgets are lazy-loaded. This means that they will only be loaded when they are visible on the page.

To disable this behavior, you may override the `$isLazy` property on the widget class:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $isLazy = false;
```

## Making the chart collapsible

You may allow the chart to be collapsible by setting the `$isCollapsible` property on the widget class to be `true`:

```php theme={"theme":"gruvbox-dark-hard"}
protected bool $isCollapsible = true;
```

<AutoScreenshot name="widgets/chart/collapsible" alt="Collapsible chart" version="5.x" />

## Using custom Chart.js plugins

Chart.js offers a powerful plugin system that allows you to extend its functionality and create custom chart behaviors. This guide details how to use them in a chart widget.

### Step 1: Install the plugin with NPM

To start with, install the plugin using NPM into your project. In this guide, we will install [`chartjs-plugin-datalabels`](https://chartjs-plugin-datalabels.netlify.app/guide/getting-started.html#installation):

```bash theme={"theme":"gruvbox-dark-hard"}
npm install chartjs-plugin-datalabels --save-dev
```

### Step 2: Create a JavaScript file importing the plugin

Create a new JavaScript file where you will define your custom plugin. In this guide, we'll call it `filament-chart-js-plugins.js`. Import the plugin, and add it to the `window.filamentChartJsPlugins` array:

```javascript theme={"theme":"gruvbox-dark-hard"}
import ChartDataLabels from 'chartjs-plugin-datalabels'


window.filamentChartJsPlugins ??= []
window.filamentChartJsPlugins.push(ChartDataLabels)
```

This is equivalent to including the plugins "inline" via `new Chart(..., { plugins: [...] })` when instantiating a Chart.js chart.

It's important to initialise the array if it has not been already, before pushing onto it. This ensures that multiple JavaScript files (especially those from Filament plugins) that register Chart.js plugins do not overwrite each other, regardless of the order they are booted in.

You can push as many plugins to the array as you would like to install, you do not need a separate file to import each plugin.

Additionally, you can also register any "global plugins" which will use `Chart.register([...])` in the `window.filamentChartJsGlobalPlugins` array:

```javascript theme={"theme":"gruvbox-dark-hard"}
import ChartDataLabels from 'chartjs-plugin-datalabels'


window.filamentChartJsGlobalPlugins ??= []
window.filamentChartJsGlobalPlugins.push(ChartDataLabels)
```

### Step 3: Compile the JavaScript file with Vite

Now, you need to build the JavaScript file with Vite, or your bundler of choice. Include the file in your Vite configuration (usually `vite.config.js`). For example:

```javascript theme={"theme":"gruvbox-dark-hard"}
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
                'resources/js/filament-chart-js-plugins.js', // Include the new file in the `input` array so it is built
            ],
        }),
    ],
});
```

Build the file with `npm run build`.

### Step 4: Register the JavaScript file in Filament

Filament needs to know to include this JavaScript file when rendering chart widgets. You can do this in the `boot()` method of a service provider like `AppServiceProvider`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Vite;

FilamentAsset::register([
    Js::make('chart-js-plugins', Vite::asset('resources/js/filament-chart-js-plugins.js'))->module(),
]);
```

You can find out more about [asset registration](../advanced/assets), and even [register assets for a specific panel](../panel-configuration#registering-assets-for-a-panel).

<EditOnGitHub version="5.x" path="packages/widgets/docs/03-charts.md" />

<Footer />
