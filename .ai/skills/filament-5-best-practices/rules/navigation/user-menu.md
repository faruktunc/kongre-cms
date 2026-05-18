> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# User menu

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

The user menu is featured in the top right corner of the admin layout. It's fully customizable.

Each menu item is represented by an [action](../actions), and can be customized in the same way. To register new items, you can pass the actions to the `userMenuItems()` method of the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Settings;
use Filament\Actions\Action;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->userMenuItems([
            Action::make('settings')
                ->url(fn (): string => Settings::getUrl())
                ->icon('heroicon-o-cog-6-tooth'),
            // ...
        ]);
}
```

<AutoScreenshot name="panels/navigation/user-menu" alt="User menu with custom menu item" version="5.x" />

## Moving the user menu to the sidebar

By default, the user menu is positioned in the topbar. If the topbar is disabled, it is added to the sidebar.

You can choose to always move it to the sidebar by passing a `position` argument to the `userMenu()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Enums\UserMenuPosition;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->userMenu(position: UserMenuPosition::Sidebar);
}
```

<AutoScreenshot name="panels/navigation/user-menu-sidebar" alt="User menu moved to the sidebar" version="5.x" />

## Customizing the profile link

To customize the user profile link at the start of the user menu, register a new item with the `profile` array key, and pass a function that [customizes the action](../actions) object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->userMenuItems([
            'profile' => fn (Action $action) => $action->label('Edit profile'),
            // ...
        ]);
}
```

For more information on creating a profile page, check out the [authentication features documentation](../users#authentication-features).

## Customizing the logout link

To customize the user logout link at the end of the user menu, register a new item with the `logout` array key, and pass a function that [customizes the action](../actions) object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->userMenuItems([
            'logout' => fn (Action $action) => $action->label('Log out'),
            // ...
        ]);
}
```

## Conditionally hiding user menu items

You can also conditionally hide a user menu item by using the `visible()` or `hidden()` methods, passing in a condition to check. Passing a function will defer condition evaluation until the menu is actually being rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Payment;
use Filament\Actions\Action;

Action::make('payments')
    ->visible(fn (): bool => auth()->user()->can('viewAny', Payment::class))
    // or
    ->hidden(fn (): bool => ! auth()->user()->can('viewAny', Payment::class))
```

## Sending a `POST` HTTP request from a user menu item

You can send a `POST` HTTP request from a user menu item by passing a URL to the `url()` method, and also using `postToUrl()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('lockSession')
    ->url(fn (): string => route('lock-session'))
    ->postToUrl()
```

## Disabling the user menu

You may disable the user menu entirely by passing `false` to the `userMenu()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->userMenu(false);
}
```

<EditOnGitHub version="5.x" path="docs/06-navigation/03-user-menu.md" />

<Footer />
