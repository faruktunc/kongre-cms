> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Modular architecture (DDD)

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

When building large-scale applications with Filament, you may want to organize your code using Domain-Driven Design (DDD) principles, splitting your application into self-contained modules. This guide explains how to integrate Filament with modular architecture packages like [InterNACHI/Modular](https://github.com/InterNACHI/modular).

## The modular approach

In a modular architecture, each domain of your application is structured as a separate Composer package, typically located in an `app-modules/` directory. Each module contains its own:

* Models and business logic
* Filament resources, pages, and widgets
* Service provider
* Routes, views, and configurations
* Tests

This approach offers several benefits:

* Clear separation of concerns between domains
* Easier team collaboration (different teams can own different modules)
* Better testability and maintainability
* Ability to reuse modules across projects

## Setting up InterNACHI/Modular

First, install the modular package:

```bash theme={"theme":"gruvbox-dark-hard"}
composer require internachi/modular
```

Create a new module:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:module alerts
```

This scaffolds a module structure:

```
.
+-- app-modules
|   +-- alerts
|   |   +-- composer.json
|   |   +-- src
|   |   |   +-- Providers
|   |   |   |   +-- AlertsServiceProvider.php
|   |   +-- routes
|   |   +-- resources
|   |   +-- database
|   |   +-- tests
```

### Configuring the module's composer.json

Each module should require `filament/filament` and define its service provider:

```json theme={"theme":"gruvbox-dark-hard"}
{
    "name": "my-app/alerts",
    "type": "library",
    "require": {
        "filament/filament": "^5.0"
    },
    "autoload": {
        "psr-4": {
            "Modules\\Alerts\\": "src/"
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "Modules\\Alerts\\Providers\\AlertsServiceProvider"
            ]
        }
    }
}
```

## Creating a Filament plugin for your module

Each module should define its own Filament plugin that registers its resources, pages, and widgets:

```php theme={"theme":"gruvbox-dark-hard"}
namespace Modules\Alerts;

use Filament\Contracts\Plugin;
use Filament\Panel;

class AlertsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'alerts';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverResources(
                in: __DIR__ . '/Filament/Resources',
                for: 'Modules\\Alerts\\Filament\\Resources',
            )
            ->discoverPages(
                in: __DIR__ . '/Filament/Pages',
                for: 'Modules\\Alerts\\Filament\\Pages',
            )
            ->discoverWidgets(
                in: __DIR__ . '/Filament/Widgets',
                for: 'Modules\\Alerts\\Filament\\Widgets',
            );
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
```

## Registering plugins conditionally for specific panels

When you have multiple panels (e.g., `admin`, `app`, `portal`), you'll often want certain modules to only register their plugins for specific panels. Use `Panel::configureUsing()` in your module's service provider to conditionally register plugins.

### Basic conditional registration

To register a plugin for all panels except one:

```php theme={"theme":"gruvbox-dark-hard"}
namespace Modules\Alerts\Providers;

use Filament\Panel;
use Illuminate\Support\ServiceProvider;
use Modules\Alerts\AlertsPlugin;

class AlertsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Panel::configureUsing(function (Panel $panel): void {
            if ($panel->getId() !== 'admin') {
                return;
            }

            $panel->plugin(AlertsPlugin::make());
        });
    }
}
```

### Using a match statement for multiple panels

When you need to register a plugin for specific panels or configure it differently per panel, use a `match` statement that calls `$panel->plugin()` directly:

```php theme={"theme":"gruvbox-dark-hard"}
namespace Modules\Alerts\Providers;

use Filament\Panel;
use Illuminate\Support\ServiceProvider;
use Modules\Alerts\AlertsPlugin;

class AlertsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Panel::configureUsing(function (Panel $panel): void {
            match ($panel->getId()) {
                'admin' => $panel->plugin(
                    AlertsPlugin::make()->enableAdminFeatures(),
                ),
                'staff' => $panel->plugin(
                    AlertsPlugin::make(),
                ),
                default => null,
            };
        });
    }
}
```

This approach lets you configure each plugin instance differently based on the panel, while panels not matched in the statement simply don't receive the plugin.

## Module directory structure

A well-organized module with Filament integration might look like this:

```
.
+-- app-modules
|   +-- alerts
|   |   +-- composer.json
|   |   +-- config
|   |   |   +-- alerts.php
|   |   +-- database
|   |   |   +-- factories
|   |   |   +-- migrations
|   |   |   +-- seeders
|   |   +-- resources
|   |   |   +-- views
|   |   |   |   +-- filament
|   |   |   |   |   +-- pages
|   |   +-- routes
|   |   |   +-- web.php
|   |   +-- src
|   |   |   +-- AlertsPlugin.php
|   |   |   +-- Filament
|   |   |   |   +-- Pages
|   |   |   |   +-- Resources
|   |   |   |   |   +-- Alerts
|   |   |   |   |   |   +-- AlertResource.php
|   |   |   |   |   |   +-- Pages
|   |   |   |   |   |   |   +-- CreateAlert.php
|   |   |   |   |   |   |   +-- EditAlert.php
|   |   |   |   |   |   |   +-- ListAlerts.php
|   |   |   |   +-- Widgets
|   |   |   +-- Models
|   |   |   |   +-- Alert.php
|   |   |   +-- Providers
|   |   |   |   +-- AlertsServiceProvider.php
|   |   +-- tests
```

## Sharing resources between panels

Sometimes you may want a resource to appear in multiple panels with different configurations. You can achieve this by using resource discovery with panel-specific customizations:

```php theme={"theme":"gruvbox-dark-hard"}
namespace Modules\Users;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Modules\Users\Filament\Resources\UserResource;

class UsersPlugin implements Plugin
{
    protected bool $canManageRoles = false;

    public function getId(): string
    {
        return 'users';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function canManageRoles(bool $condition = true): static
    {
        $this->canManageRoles = $condition;

        return $this;
    }

    public function hasRoleManagement(): bool
    {
        return $this->canManageRoles;
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            UserResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
```

Then register with different capabilities:

```php theme={"theme":"gruvbox-dark-hard"}
Panel::configureUsing(function (Panel $panel): void {
    match ($panel->getId()) {
        'admin' => $panel->plugin(
            UsersPlugin::make()->canManageRoles(),
        ),
        'staff' => $panel->plugin(
            UsersPlugin::make(),
        ),
        default => null,
    };
});
```

<Info>
  The `Panel::configureUsing()` approach is powerful because it allows modules to configure themselves without requiring changes to your panel provider files. When you add or remove a module, its Filament integration is automatically handled.
</Info>

## Registering Livewire components from modules

If your module contains custom Livewire components used by Filament (such as custom pages or widgets), you can register them in the plugin's `boot()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Livewire\Livewire;
use Modules\Alerts\Filament\Pages\AlertsDashboard;

public function boot(Panel $panel): void
{
    Livewire::component('alerts-dashboard', AlertsDashboard::class);
}
```

<EditOnGitHub version="5.x" path="docs/09-advanced/05-modular-architecture.md" />

<Footer />
