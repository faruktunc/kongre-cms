> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Panel configuration

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

By default, the configuration file is located at `app/Providers/Filament/AdminPanelProvider.php`. Keep reading to learn more about [panels](#introducing-panels) and how each has [its own configuration file](#creating-a-new-panel).

## Introducing panels

By default, when you install the package, there is one panel that has been set up for you - and it lives on `/admin`. All the [resources](./resources/overview), [custom pages](./navigation/custom-pages), and [dashboard widgets](./widgets/overview) you create get registered to this panel.

However, you can create as many panels as you want, and each can have its own set of resources, pages and widgets.

For example, you could build a panel where users can log in at `/app` and access their dashboard, and admins can log in at `/admin` and manage the app. The `/app` panel and the `/admin` panel have their own resources, since each group of users has different requirements. Filament allows you to do that by providing you with the ability to create multiple panels.

### The default admin panel

When you run `filament:install`, a new file is created in `app/Providers/Filament` - `AdminPanelProvider.php`. This file contains the configuration for the `/admin` panel.

When this documentation refers to the "configuration", this is the file you need to edit. It allows you to completely customize the app.

### Creating a new panel

To create a new panel, you can use the `make:filament-panel` command, passing in the unique name of the new panel:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-panel app
```

This command will create a new panel called "app". A configuration file will be created at `app/Providers/Filament/AppPanelProvider.php`. You can access this panel at `/app`, but you can [customize the path](#changing-the-path) if you don't want that.

Since this configuration file is also a [Laravel service provider](https://laravel.com/docs/providers), it needs to be registered in `bootstrap/providers.php` (Laravel 11 app structure and above) or `config/app.php` (Laravel 10 app structure and below). Filament will attempt to do this for you, but if you get an error while trying to access your panel then this process has probably failed.

## Changing the path

In a panel configuration file, you can change the path that the app is accessible at using the `path()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->path('app');
}
```

If you want the app to be accessible without any prefix, you can set this to be an empty string:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->path('');
}
```

Make sure your `routes/web.php` file doesn't already define the `''` or `'/'` route, as it will take precedence.

## Render hooks

[Render hooks](./advanced/render-hooks) allow you to render Blade content at various points in the framework views. You can [register global render hooks](./advanced/render-hooks#registering-render-hooks) in a service provider or middleware, but it also allows you to register render hooks that are specific to a panel. To do that, you can use the `renderHook()` method on the panel configuration object. Here's an example, integrating [`wire-elements/modal`](https://github.com/wire-elements/modal) with Filament:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->renderHook(
            PanelsRenderHook::BODY_START,
            fn (): string => Blade::render('@livewire(\'livewire-ui-modal\')'),
        );
}
```

A full list of available render hooks can be found [here](./advanced/render-hooks#available-render-hooks).

## Setting a domain

By default, Filament will respond to requests from all domains. If you'd like to scope it to a specific domain, you can use the `domain()` method, similar to [`Route::domain()` in Laravel](https://laravel.com/docs/routing#route-group-subdomain-routing):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->domain('admin.example.com');
}
```

## Customizing the maximum content width

By default, Filament will restrict the width of the content on the page, so it doesn't become too wide on large screens. To change this, you may use the `maxContentWidth()` method. Options correspond to [Tailwind's max-width scale](https://tailwindcss.com/docs/max-width). The options are `ExtraSmall`, `Small`, `Medium`, `Large`, `ExtraLarge`, `TwoExtraLarge`, `ThreeExtraLarge`, `FourExtraLarge`, `FiveExtraLarge`, `SixExtraLarge`, `SevenExtraLarge`, `Full`, `MinContent`, `MaxContent`, `FitContent`,  `Prose`, `ScreenSmall`, `ScreenMedium`, `ScreenLarge`, `ScreenExtraLarge` and `ScreenTwoExtraLarge`. The default is `SevenExtraLarge`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;
use Filament\Support\Enums\Width;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->maxContentWidth(Width::Full);
}
```

<AutoScreenshot name="panels/configuration/content-width-full" alt="Panel with full content width" version="5.x" />

If you'd like to set the max content width for pages of the type `SimplePage`, like login and registration pages, you may do so using the `simplePageMaxContentWidth()` method. The default is `Large`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;
use Filament\Support\Enums\Width;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->simplePageMaxContentWidth(Width::Small);
}
```

<AutoScreenshot name="panels/configuration/simple-page-max-content-width" alt="Login page with small max content width" version="5.x" />

## Setting the default sub-navigation position

Sub-navigation is rendered at the start of each page by default. It can be customized per-page, per-resource and per-cluster, but you can also customize it for the entire panel at once using the `subNavigationPosition()` method. The value may be `SubNavigationPosition::Start`, `SubNavigationPosition::End`, or `SubNavigationPosition::Top` to render the sub-navigation as tabs:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->subNavigationPosition(SubNavigationPosition::End);
}
```

## Lifecycle hooks

Hooks may be used to execute code during a panel's lifecycle. `bootUsing()` is a hook that gets run on every request that takes place within that panel. If you have multiple panels, only the current panel's `bootUsing()` will be run. The function gets run from middleware, after all service providers have been booted:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->bootUsing(function (Panel $panel) {
            // ...
        });
}
```

## SPA mode

SPA mode utilizes [Livewire's `wire:navigate` feature](https://livewire.laravel.com/docs/navigate) to make your server-rendered panel feel like a single-page-application, with less delay between page loads and a loading bar for longer requests. To enable SPA mode on a panel, you can use the `spa()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->spa();
}
```

### Disabling SPA navigation for specific URLs

By default, when enabling SPA mode, any URL that lives on the same domain as the current request will be navigated to using Livewire's [`wire:navigate`](https://livewire.laravel.com/docs/navigate) feature. If you want to disable this for specific URLs, you can use the `spaUrlExceptions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Posts\PostResource;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->spa()
        ->spaUrlExceptions(fn (): array => [
            url('/admin'),
            PostResource::getUrl(),
        ]);
}
```

<Info>
  In this example, we are using [`getUrl()`](./resources/overview#generating-urls-to-resource-pages) on a resource to get the URL to the resource's index page. This feature requires the panel to already be registered though, and the configuration is too early in the request lifecycle to do that. You can use a function to return the URLs instead, which will be resolved when the panel has been registered.
</Info>

These URLs need to exactly match the URL that the user is navigating to, including the domain and protocol. If you'd like to use a pattern to match multiple URLs, you can use an asterisk (`*`) as a wildcard character:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->spa()
        ->spaUrlExceptions([
            '*/admin/posts/*',
        ]);
}
```

### Enabling SPA prefetching

SPA prefetching enhances the user experience by automatically prefetching pages when users hover over links, making navigation feel even more responsive. This feature utilizes [Livewire's `wire:navigate.hover` functionality](https://livewire.laravel.com/docs/navigate#prefetching-links).

To enable SPA mode with prefetching, you can pass the `hasPrefetching: true` parameter to the `spa()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->spa(hasPrefetching: true);
}
```

When prefetching is enabled, all links within your panel will automatically include `wire:navigate.hover`, which prefetches the page content when users hover over the link. This works seamlessly with [URL exceptions](#disabling-spa-navigation-for-specific-urls) - any URLs excluded from SPA mode will also be excluded from prefetching.

<Info>
  Prefetching only works when SPA mode is enabled. If you disable SPA mode, prefetching will also be disabled automatically.
</Info>

<Warning>
  Prefetching heavy pages can lead to increased bandwidth usage and server load, especially if users hover over many links in quick succession. Use this feature judiciously, particularly if your app has pages with large amounts of data or complex queries.
</Warning>

## Unsaved changes alerts

You may alert users if they attempt to navigate away from a page without saving their changes. This is applied on [Create](./resources/creating-records) and [Edit](./resources/editing-records) pages of a resource, as well as any open action modals. To enable this feature, you can use the `unsavedChangesAlerts()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->unsavedChangesAlerts();
}
```

## Enabling database transactions

By default, Filament does not wrap operations in database transactions, and allows the user to enable this themselves when they have tested to ensure that their operations are safe to be wrapped in a transaction. However, you can enable database transactions at once for all operations by using the `databaseTransactions()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->databaseTransactions();
}
```

For any actions you do not want to be wrapped in a transaction, you can use the `databaseTransaction(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
CreateAction::make()
    ->databaseTransaction(false)
```

And for any pages like [Create resource](./resources/creating-records) and [Edit resource](./resources/editing-records), you can define the `$hasDatabaseTransactions` property to `false` on the page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected ?bool $hasDatabaseTransactions = false;

    // ...
}
```

### Opting in to database transactions for specific actions and pages

Instead of enabling database transactions everywhere and opting out of them for specific actions and pages, you can opt in to database transactions for specific actions and pages.

For actions, you can use the `databaseTransaction()` method:

```php theme={"theme":"gruvbox-dark-hard"}
CreateAction::make()
    ->databaseTransaction()
```

For pages like [Create resource](./resources/creating-records) and [Edit resource](./resources/editing-records), you can define the `$hasDatabaseTransactions` property to `true` on the page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected ?bool $hasDatabaseTransactions = true;

    // ...
}
```

## Registering assets for a panel

You can register [assets](./advanced/assets) that will only be loaded on pages within a specific panel, and not in the rest of the app. To do that, pass an array of assets to the `assets()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->assets([
            Css::make('custom-stylesheet', resource_path('css/custom.css')),
            Js::make('custom-script', resource_path('js/custom.js')),
        ]);
}
```

Before these [assets](./advanced/assets) can be used, you'll need to run `php artisan filament:assets`.

## Applying middleware

You can apply extra middleware to all routes by passing an array of middleware classes to the `middleware()` method in the configuration:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->middleware([
            // ...
        ]);
}
```

By default, middleware will be run when the page is first loaded, but not on subsequent Livewire AJAX requests. If you want to run middleware on every request, you can make it persistent by passing `true` as the second argument to the `middleware()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->middleware([
            // ...
        ], isPersistent: true);
}
```

### Applying middleware to authenticated routes

You can apply middleware to all authenticated routes by passing an array of middleware classes to the `authMiddleware()` method in the configuration:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->authMiddleware([
            // ...
        ]);
}
```

By default, middleware will be run when the page is first loaded, but not on subsequent Livewire AJAX requests. If you want to run middleware on every request, you can make it persistent by passing `true` as the second argument to the `authMiddleware()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->authMiddleware([
            // ...
        ], isPersistent: true);
}
```

## Disabling broadcasting

By default, Laravel Echo will automatically connect for every panel, if credentials have been set up in the [published `config/filament.php` configuration file](./introduction/installation#publishing-configuration). To disable this automatic connection in a panel, you can use the `broadcasting(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->broadcasting(false);
}
```

## Strict authorization mode

By default, when Filament authorizes the user access to a resource, it will first check if the policy exists for that model, and if it does, it will check if a method exists on the policy to perform the action. If the policy or policy method does not exist, it will grant the user access to the resource, as it assumes you have not set up authorization yet, or you do not require it.

If you would prefer Filament to throw an exception if the policy or policy method does not exist, you can enable strict authorization mode using the `strictAuthorization()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->strictAuthorization();
}
```

## Configuring error notifications

When Laravel's debug mode is disabled, Filament will replace Livewire's full-screen error modals with neater flash notifications. You can disable this behavior using the `errorNotifications(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->errorNotifications(false);
}
```

You may customize the error notification text by passing strings to the `title` and `body` parameters of the `registerErrorNotification()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->registerErrorNotification(
            title: 'An error occurred',
            body: 'Please try again later.',
        );
}
```

You may also register error notification text for a specific HTTP status code, such as `404`, by passing that status code in the `statusCode` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->registerErrorNotification(
            title: 'An error occurred',
            body: 'Please try again later.',
        )
        ->registerErrorNotification(
            title: 'Record not found',
            body: 'A record you are looking for does not exist.',
            statusCode: 404,
        );
}
```

You may also choose to hide a notification for a specific HTTP status code, such as `403`, by passing that status code to the `hiddenErrorNotification()` method. A hidden status code will still be caught by filament, but no notification will be shown.

Alternatively, you can use the `disabledErrorNotification()` method to fall back to Livewire's built-in error handling for that status code. This is useful if you want to hook into the Livewire error handling system to customize the error handling behavior for a specific status code but maintain Filament's error notification system for everything else.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->registerErrorNotification(
            title: 'An error occurred',
            body: 'Please try again later.',
        )
        ->hiddenErrorNotification(403)
        ->disabledErrorNotification(503);
}
```

You can also enable or disable error notifications for specific pages in a panel by setting the `$hasErrorNotifications` property on the page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected ?bool $hasErrorNotifications = true;

    // or

    protected ?bool $hasErrorNotifications = false;

    // ...
}
```

If you would like to run custom code to check if error notifications should be shown, you can use the `hasErrorNotifications()` method on the page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function hasErrorNotifications(): bool
    {
        return FeatureFlag::active();
    }

    // ...
}
```

You may also register error notification text by calling the `registerErrorNotification()` method on the page class from inside the `setUpErrorNotifications()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function setUpErrorNotifications(): void
    {
        $this->registerErrorNotification(
            title: 'An error occurred',
            body: 'Please try again later.',
        );
    }

    // ...
}
```

You can also register error notification text for a specific HTTP status code, such as `404`, by passing that status code in the `statusCode` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function setUpErrorNotifications(): void
    {
        $this->registerErrorNotification(
            title: 'An error occurred',
            body: 'Please try again later.',
        );

        $this->registerErrorNotification(
            title: 'Record not found',
            body: 'A record you are looking for does not exist.',
            statusCode: 404,
        );
    }

    // ...
}
```

You may also choose to hide a notification for a specific HTTP status code, such as `403`, by passing that status code to the `hiddenErrorNotification()` method. A hidden status code will still be caught by filament, but no notification will be shown.

Alternatively, you can use the `disabledErrorNotification()` method to fall back to Livewire's built-in error handling for that status code. This is useful if you want to hook into the Livewire error handling system to customize the error handling behavior for a specific status code but maintain Filament's error notification system for everything else.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function setUpErrorNotifications(): void
    {
        $this->registerErrorNotification(
            title: 'An error occurred',
            body: 'Please try again later.',
        );

        $this->hiddenErrorNotification(403);

        $this->disabledErrorNotification(503);
    }

    // ...
}
```

<EditOnGitHub version="5.x" path="docs/05-panel-configuration.md" />

<Footer />
