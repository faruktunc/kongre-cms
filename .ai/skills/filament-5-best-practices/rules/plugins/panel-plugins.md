> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Plugin development

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

The basis of Filament plugins are Laravel packages. They are installed into your Filament project via Composer, and follow all the standard techniques, like using service providers to register routes, views, and translations. If you're new to Laravel package development, here are some resources that can help you grasp the core concepts:

* [The Package Development section of the Laravel docs](https://laravel.com/docs/packages) serves as a great reference guide.
* [Spatie's Package Training course](https://spatie.be/products/laravel-package-training) is a good instructional video series to teach you the process step by step.
* [Spatie's Package Tools](https://github.com/spatie/laravel-package-tools) allows you to simplify your service provider classes using a fluent configuration object.

Filament plugins build on top of the concepts of Laravel packages and allow you to ship and consume reusable features for any Filament panel. They can be added to each panel one at a time, and are also configurable differently per-panel.

## Configuring the panel with a plugin class

A plugin class is used to allow your package to interact with a panel [configuration](../panel-configuration) file. It's a simple PHP class that implements the `Plugin` interface. 3 methods are required:

* The `getId()` method returns the unique identifier of the plugin amongst other plugins. Please ensure that it is specific enough to not clash with other plugins that might be used in the same project.
* The `register()` method allows you to use any [configuration](../panel-configuration) option that is available to the panel. This includes registering [resources](../resources/overview), [custom pages](../navigation/custom-pages), [themes](../styling/overview#creating-a-custom-theme), [render hooks](../panel-configuration#render-hooks) and more.
* The `boot()` method is run only when the panel that the plugin is being registered to is actually in-use. It is executed by a middleware class.

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace DanHarrin\FilamentBlog;

use DanHarrin\FilamentBlog\Pages\Settings;
use DanHarrin\FilamentBlog\Resources\CategoryResource;
use DanHarrin\FilamentBlog\Resources\PostResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class BlogPlugin implements Plugin
{
    public function getId(): string
    {
        return 'blog';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                PostResource::class,
                CategoryResource::class,
            ])
            ->pages([
                Settings::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
```

The users of your plugin can add it to a panel by instantiating the plugin class and passing it to the `plugin()` method of the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use DanHarrin\FilamentBlog\BlogPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugin(new BlogPlugin());
}
```

### Fluently instantiating the plugin class

You may want to add a `make()` method to your plugin class to provide a fluent interface for your users to instantiate it. In addition, by using the container (`app()`) to instantiate the plugin object, it can be replaced with a different implementation at runtime:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Contracts\Plugin;

class BlogPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }
    
    // ...
}
```

Now, your users can use the `make()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use DanHarrin\FilamentBlog\BlogPlugin;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugin(BlogPlugin::make());
}
```

### Configuring plugins per-panel

You may add other methods to your plugin class, which allow your users to configure it. We suggest that you add both a setter and a getter method for each option you provide. You should use a property to store the preference in the setter and retrieve it again in the getter:

```php theme={"theme":"gruvbox-dark-hard"}
use DanHarrin\FilamentBlog\Resources\AuthorResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class BlogPlugin implements Plugin
{
    protected bool $hasAuthorResource = false;
    
    public function authorResource(bool $condition = true): static
    {
        // This is the setter method, where the user's preference is
        // stored in a property on the plugin object.
        $this->hasAuthorResource = $condition;
    
        // The plugin object is returned from the setter method to
        // allow fluent chaining of configuration options.
        return $this;
    }
    
    public function hasAuthorResource(): bool
    {
        // This is the getter method, where the user's preference
        // is retrieved from the plugin property.
        return $this->hasAuthorResource;
    }
    
    public function register(Panel $panel): void
    {
        // Since the `register()` method is executed after the user
        // configures the plugin, you can access any of their
        // preferences inside it.
        if ($this->hasAuthorResource()) {
            // Here, we only register the author resource on the
            // panel if the user has requested it.
            $panel->resources([
                AuthorResource::class,
            ]);
        }
    }
    
    // ...
}
```

Additionally, you can use the unique ID of the plugin to access any of its configuration options from outside the plugin class. To do this, pass the ID to the `filament()` method:

```php theme={"theme":"gruvbox-dark-hard"}
filament('blog')->hasAuthorResource()
```

You may wish to have better type safety and IDE autocompletion when accessing configuration. It's completely up to you how you choose to achieve this, but one idea could be adding a static method to the plugin class to retrieve it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Contracts\Plugin;

class BlogPlugin implements Plugin
{
    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }
    
    // ...
}
```

Now, you can access the plugin configuration using the new static method:

```php theme={"theme":"gruvbox-dark-hard"}
BlogPlugin::get()->hasAuthorResource()
```

## Distributing a panel in a plugin

It's very easy to distribute an entire panel in a Laravel package. This way, a user can simply install your plugin and have an entirely new part of their app pre-built.

When [configuring](../panel-configuration) a panel, the configuration class extends the `PanelProvider` class, and that is a standard Laravel service provider. You can use it as a service provider in your package:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace DanHarrin\FilamentBlog;

use Filament\Panel;
use Filament\PanelProvider;

class BlogPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('blog')
            ->path('blog')
            ->resources([
                // ...
            ])
            ->pages([
                // ...
            ])
            ->widgets([
                // ...
            ])
            ->middleware([
                // ...
            ])
            ->authMiddleware([
                // ...
            ]);
    }
}
```

You should then register it as a service provider in the `composer.json` of your package:

```json theme={"theme":"gruvbox-dark-hard"}
"extra": {
    "laravel": {
        "providers": [
            "DanHarrin\\FilamentBlog\\BlogPanelProvider"
        ]
    }
}
```

<EditOnGitHub version="5.x" path="docs/11-plugins/02-panel-plugins.md" />

<Footer />
