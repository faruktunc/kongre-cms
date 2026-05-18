> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Configurable resources and pages

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

Sometimes you need to register the same resource or page multiple times with different configurations. For example, an "Orders" resource might appear as both "Active Orders" and "Archived Orders" in the sidebar, each with different query scopes, navigation labels, and URL slugs - but sharing the same underlying resource class.

Configurable resources and pages allow you to register a single class multiple times in a panel, each with a unique configuration key and its own set of options. Each configuration gets its own routes, navigation items, and URL slugs, while the resource or page class can use the active configuration to adjust its behavior at runtime.

<Info>
  While this guide is in the plugins section, configurable resources and pages work in any `PanelProvider` - you don't need to be building a plugin to use them. They are especially useful for plugins because they let plugin authors expose flexible configuration to their users.
</Info>

## Creating a resource configuration class

To make a resource configurable, you first need a configuration class. This class extends `ResourceConfiguration` and defines the options that can vary between registrations:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\ResourceConfiguration;

class OrderResourceConfiguration extends ResourceConfiguration
{
    protected bool $isArchived = false;

    protected ?string $navigationLabel = null;

    protected ?string $navigationGroup = null;

    public function archived(bool $condition = true): static
    {
        $this->isArchived = $condition;

        return $this;
    }

    public function isArchived(): bool
    {
        return $this->isArchived;
    }

    public function navigationLabel(string $label): static
    {
        $this->navigationLabel = $label;

        return $this;
    }

    public function getNavigationLabel(): ?string
    {
        return $this->navigationLabel;
    }

    public function navigationGroup(string $group): static
    {
        $this->navigationGroup = $group;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return $this->navigationGroup;
    }
}
```

The configuration class follows the same [fluent API patterns](../plugins/panel-plugins#configuring-plugins-per-panel) as the rest of Filament - setter methods return `$this` for chaining, and getter methods retrieve stored values.

<Tip>
  The `ResourceConfiguration` base class already includes a `slug()` method for overriding the URL slug. You only need to add properties specific to your plugin.
</Tip>

## Linking the configuration class to a resource

Set the `$configurationClass` property on your resource to link it with the configuration class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Resource;

class OrderResource extends Resource
{
    protected static ?string $configurationClass = OrderResourceConfiguration::class;

    // ...
}
```

This enables the `make()` method on the resource, which creates a new configuration instance that can be registered on a panel.

## Registering configurations on a panel

You may register one or more configurations using the `make()` method. Each configuration needs a unique key:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\OrderResource;

public function panel(Panel $panel): Panel
{
    return $panel
        ->resources([
            // "Active orders" configuration
            OrderResource::make('active')
                ->navigationLabel('Active Orders')
                ->navigationGroup('Orders'),
            // "Archived orders" configuration
            OrderResource::make('archived')
                ->navigationLabel('Archived Orders')
                ->navigationGroup('Orders')
                ->archived(),
        ]);
}
```

Each configured registration gets its own routes and navigation items. The configuration key (`'active'`, `'archived'`) is used internally to identify each registration.

You may also register the resource class on its own alongside configurations if you want a default (unconfigured) registration as well. This is optional - you can register only configurations if that's all you need:

```php theme={"theme":"gruvbox-dark-hard"}
$panel->resources([
    OrderResource::class, // Optional default registration
    OrderResource::make('active'),
    OrderResource::make('archived')
        ->archived(),
]);
```

<Tip>
  If you're building a [plugin class](./panel-plugins#configuring-the-panel-with-a-plugin-class), you would register configurations inside the `register(Panel $panel)` method instead. See [using configurable resources in a plugin class](#using-configurable-resources-in-a-plugin-class) for a complete example.
</Tip>

### URL slugs

When you register the resource class on its own (without a configuration), it uses the resource's default URL slug - for example, `/orders`.

When you register a configuration with a key, the key is appended to the resource's base slug. For example, `OrderResource::make('active')` would be accessible at `/orders/active`, and `OrderResource::make('archived')` at `/orders/archived`.

You may use `slug()` to override the entire slug for a configuration instead of using the default `{base}/{key}` pattern:

```php theme={"theme":"gruvbox-dark-hard"}
OrderResource::make('archived')
    ->slug('order-archive') // accessible at `/order-archive` instead of `/orders/archived`
    ->archived(),
```

## Using the configuration at runtime

Inside your resource class, call `static::getConfiguration()` to retrieve the active configuration for the current request. This returns `null` when the resource is accessed via its default (unconfigured) registration:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class OrderResource extends Resource
{
    protected static ?string $configurationClass = OrderResourceConfiguration::class;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if ($configuration = static::getConfiguration()) {
            if ($configuration->isArchived()) {
                $query->where('archived_at', '!=', null);
            }
        }

        return $query;
    }

    public static function getNavigationLabel(): string
    {
        if ($configuration = static::getConfiguration()) {
            if ($label = $configuration->getNavigationLabel()) {
                return $label;
            }
        }

        return parent::getNavigationLabel();
    }

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        if ($configuration = static::getConfiguration()) {
            if ($group = $configuration->getNavigationGroup()) {
                return $group;
            }
        }

        return parent::getNavigationGroup();
    }

    // ...
}
```

You can use `static::hasConfiguration()` as a shorthand to check if a configuration is currently active:

```php theme={"theme":"gruvbox-dark-hard"}
if (static::hasConfiguration()) {
    // Running inside a configured registration
}
```

## Generating URLs for a specific configuration

When generating URLs for a configured resource, pass the `configuration` argument to `getUrl()`:

```php theme={"theme":"gruvbox-dark-hard"}
// URL for the default (unconfigured) registration
OrderResource::getUrl();

// URL for the "active" configuration
OrderResource::getUrl(configuration: 'active');

// URL for a specific page within the "archived" configuration
OrderResource::getUrl('edit', ['record' => $order], configuration: 'archived');
```

When you're already inside a configured request (e.g., in a resource page), `getUrl()` automatically uses the current configuration context. You only need to pass the `configuration` argument when linking to a different configuration from the one you're currently in.

## Configurable pages

Pages follow the same pattern as resources. The key differences are:

* Your configuration class extends `PageConfiguration` instead of `ResourceConfiguration`
* You register configurations using `$panel->pages()` instead of `$panel->resources()`
* Since pages are Livewire components, you can read configuration values in `mount()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Page;

class SettingsPage extends Page
{
    protected static ?string $configurationClass = SettingsPageConfiguration::class;

    public function mount(): void
    {
        if ($configuration = static::getConfiguration()) {
            $this->settingsCategory = $configuration->getSettingsCategory();
        }
    }

    // ...
}
```

```php theme={"theme":"gruvbox-dark-hard"}
$panel->pages([
    SettingsPage::make('general')
        ->slug('general-settings')
        ->settingsCategory('general'),
    SettingsPage::make('advanced')
        ->slug('advanced-settings')
        ->settingsCategory('advanced'),
]);
```

## Temporarily switching configuration context

You may use `withConfiguration()` to execute code in the context of a specific configuration. This is useful when you need to generate URLs or access configuration values for a registration other than the currently active one:

```php theme={"theme":"gruvbox-dark-hard"}
$archivedUrl = OrderResource::withConfiguration('archived', function () {
    return OrderResource::getUrl('index');
});
```

## Using configurable resources in a plugin class

Here's a complete example of a plugin that exposes configurable resources to its users:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Contracts\Plugin;
use Filament\Panel;

class TasksPlugin implements Plugin
{
    /** @var array<TaskResourceConfiguration> */
    protected array $taskResourceConfigurations = [];

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'tasks';
    }

    /**
     * @param  array<TaskResourceConfiguration>  $configurations
     */
    public function taskResources(array $configurations): static
    {
        $this->taskResourceConfigurations = $configurations;

        return $this;
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            TaskResource::class,
            ...$this->taskResourceConfigurations,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
```

Users of the plugin can then register multiple task views:

```php theme={"theme":"gruvbox-dark-hard"}
use Vendor\TasksPlugin\TasksPlugin;
use Vendor\TasksPlugin\TaskResource;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugin(
            TasksPlugin::make()
                ->taskResources([
                    TaskResource::make('my-tasks')
                        ->ownedByCurrentUser(),
                    TaskResource::make('team-tasks')
                        ->ownedByCurrentTeam(),
                ])
        );
}
```

<EditOnGitHub version="5.x" path="docs/11-plugins/05-configurable-resources-and-pages.md" />

<Footer />
