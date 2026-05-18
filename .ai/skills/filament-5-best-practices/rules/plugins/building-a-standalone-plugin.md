> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Build a standalone plugin

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

## Preface

Please read the docs on [panel plugin development](../plugins/panel-plugins) and the [getting started guide](./getting-started) before continuing.

## Introduction

In this walkthrough, we'll build a simple plugin that adds a new form component that can be used in forms. This also means it will be available to users in their panels.

You can find the final code for this plugin at [https://github.com/awcodes/headings](https://github.com/awcodes/headings).

## Step 1: Create the plugin

First, we'll create the plugin using the steps outlined in the [getting started guide](./getting-started#creating-a-plugin).

## Step 2: Clean up

Next, we'll clean up the plugin to remove the boilerplate code we don't need. This will seem like a lot, but since this is a simple plugin, we can remove a lot of the boilerplate code.

Remove the following directories and files:

1. `bin`
2. `config`
3. `database`
4. `src/Commands`
5. `src/Facades`
6. `stubs`

Now we can clean up our `composer.json` file to remove unneeded options.

```json theme={"theme":"gruvbox-dark-hard"}
"autoload": {
    "psr-4": {
        // We can remove the database factories
        "Awcodes\\Headings\\Database\\Factories\\": "database/factories/"
    }
},
"extra": {
    "laravel": {
        // We can remove the facade
        "aliases": {
            "Headings": "Awcodes\\Headings\\Facades\\ClockWidget"
        }
    }
},
```

Normally, Filament recommends that users style their plugins with a custom filament theme, but for the sake of example let's provide our own stylesheet that can be loaded asynchronously using the new `x-load` features in Filament v3. So, let's update our `package.json` file to include `cssnano`, `postcss`, `postcss-cli` and `postcss-nesting` to build our stylesheet.

```json theme={"theme":"gruvbox-dark-hard"}
{
    "private": true,
    "scripts": {
        "build": "postcss resources/css/index.css -o resources/dist/headings.css"
    },
    "devDependencies": {
        "cssnano": "^6.0.1",
        "postcss": "^8.4.27",
        "postcss-cli": "^10.1.0",
        "postcss-nesting": "^13.0.0"
    }
}
```

Then we need to install our dependencies.

```bash theme={"theme":"gruvbox-dark-hard"}
npm install
```

We will also need to update our `postcss.config.js` file to configure postcss.

```js theme={"theme":"gruvbox-dark-hard"}
module.exports = {
    plugins: [
        require('postcss-nesting')(),
        require('cssnano')({
            preset: 'default',
        }),
    ],
};
```

You may also remove the testing directories and files, but we'll leave them in for now, although we won't be using them for this example, and we highly recommend that you write tests for your plugins.

## Step 3: Setting up the provider

Now that we have our plugin cleaned up, we can start adding our code. The boilerplate in the `src/HeadingsServiceProvider.php` file has a lot going on so, let's delete everything and start from scratch.

We need to be able to register our stylesheet with the Filament Asset Manager so that we can load it on demand in our Blade view. To do this, we'll need to add the following to the `packageBooted` method in our service provider.

***Note the `loadedOnRequest()` method. This is important, because it tells Filament to only load the stylesheet when it's needed.***

```php theme={"theme":"gruvbox-dark-hard"}
namespace Awcodes\Headings;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HeadingsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'headings';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('headings', __DIR__ . '/../resources/dist/headings.css')->loadedOnRequest(),
        ], 'awcodes/headings');
    }
}
```

## Step 4: Creating our component

Next, we'll need to create our component. Create a new file at `src/Heading.php` and add the following code.

```php theme={"theme":"gruvbox-dark-hard"}
namespace Awcodes\Headings;

use Closure;
use Filament\Schemas\Components\Component;
use Filament\Support\Colors\Color;
use Filament\Support\Concerns\HasColor;

class Heading extends Component
{
    use HasColor;

    protected string | int $level = 2;

    protected string | Closure $content = '';

    protected string $view = 'headings::heading';

    final public function __construct(string | int $level)
    {
        $this->level($level);
    }

    public static function make(string | int $level): static
    {
        return app(static::class, ['level' => $level]);
    }

    public function content(string | Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function level(string | int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getColor(): array
    {
        return $this->evaluate($this->color) ?? Color::Amber;
    }

    public function getContent(): string
    {
        return $this->evaluate($this->content);
    }

    public function getLevel(): string
    {
        return is_int($this->level) ? 'h' . $this->level : $this->level;
    }
}
```

## Step 5: Rendering our component

Next, we'll need to create the view for our component. Create a new file at `resources/views/heading.blade.php` and add the following code.

We are using x-load to asynchronously load stylesheet, so it's only loaded when necessary. You can learn more about this in the [Core Concepts](../advanced/assets#lazy-loading-css) section of the docs.

```blade theme={"theme":"gruvbox-dark-hard"}
@php
    $level = $getLevel();
    $color = $getColor();
@endphp

<{{ $level }}
    x-data
    x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('headings', package: 'awcodes/headings'))]"
    {{
        $attributes
            ->class([
                'headings-component',
                match ($color) {
                    'gray' => 'text-gray-600 dark:text-gray-400',
                    default => 'text-custom-500',
                },
            ])
            ->style([
                \Filament\Support\get_color_css_variables($color, [500]) => $color !== 'gray',
            ])
    }}
>
    {{ $getContent() }}
</{{ $level }}>
```

## Step 6: Adding some styles

Next, let's provide some custom styling for our field. We'll add the following to `resources/css/index.css`. And run `npm run build` to compile our CSS.

```css theme={"theme":"gruvbox-dark-hard"}
.headings-component {
    &:is(h1, h2, h3, h4, h5, h6) {
         font-weight: 700;
         letter-spacing: -.025em;
         line-height: 1.1;
     }

    &h1 {
         font-size: 2rem;
     }

    &h2 {
         font-size: 1.75rem;
     }

    &h3 {
         font-size: 1.5rem;
     }

    &h4 {
         font-size: 1.25rem;
     }

    &h5,
    &h6 {
         font-size: 1rem;
     }
}
```

Then we need to build our stylesheet.

```bash theme={"theme":"gruvbox-dark-hard"}
npm run build
```

## Step 7: Update your README

You'll want to update your `README.md` file to include instructions on how to install your plugin and any other information you want to share with users, Like how to use it in their projects. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Awcodes\Headings\Heading;

Heading::make(2)
    ->content('Product Information')
    ->color(Color::Lime),
```

And, that's it, our users can now install our plugin and use it in their projects.

<EditOnGitHub version="5.x" path="docs/11-plugins/04-building-a-standalone-plugin.md" />

<Footer />
