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

By default, Filament will register navigation items for each of your [resources](../resources/overview), [custom pages](./custom-pages), and [clusters](./clusters). These classes contain static properties and methods that you can override, to configure that navigation item.

If you're looking to add a second layer of navigation to your app, you can use [clusters](./clusters). These are useful for grouping resources and pages together.

## Customizing a navigation item's label

By default, the navigation label is generated from the resource or page's name. You may customize this using the `$navigationLabel` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $navigationLabel = 'Custom Navigation Label';
```

Alternatively, you may override the `getNavigationLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationLabel(): string
{
    return 'Custom Navigation Label';
}
```

## Customizing a navigation item's icon

To customize a navigation item's [icon](../styling/icons), you may override the `$navigationIcon` property on the [resource](../resources/overview) or [page](./custom-pages) class:

```php theme={"theme":"gruvbox-dark-hard"}
use BackedEnum;
use Filament\Support\Icons\Heroicon;

protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedDocumentText;
```

<AutoScreenshot name="panels/navigation/change-icon" alt="Changed navigation item icon" version="5.x" />

If you set `$navigationIcon = null` on all items within the same navigation group, those items will be joined with a vertical bar below the group label.

### Switching navigation item icon when it is active

You may assign a navigation [icon](../styling/icons) which will only be used for active items using the `$activeNavigationIcon` property:

```php theme={"theme":"gruvbox-dark-hard"}
use BackedEnum;
use Filament\Support\Icons\Heroicon;

protected static string | BackedEnum | null $activeNavigationIcon = Heroicon::OutlinedDocumentText;
```

<AutoScreenshot name="panels/navigation/active-icon" alt="Different navigation item icon when active" version="5.x" />

## Sorting navigation items

By default, navigation items are sorted alphabetically. You may customize this using the `$navigationSort` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?int $navigationSort = 3;
```

Now, navigation items with a lower sort value will appear before those with a higher sort value - the order is ascending.

<AutoScreenshot name="panels/navigation/sort-items" alt="Sort navigation items" version="5.x" />

## Adding a badge to a navigation item

To add a badge next to the navigation item, you can use the `getNavigationBadge()` method and return the content of the badge:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}
```

<AutoScreenshot name="panels/navigation/badge" alt="Navigation item with badge" version="5.x" />

If a badge value is returned by `getNavigationBadge()`, it will display using the primary color by default. To style the badge contextually, return either `danger`, `gray`, `info`, `primary`, `success` or `warning` from the `getNavigationBadgeColor()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationBadgeColor(): ?string
{
    return static::getModel()::count() > 10 ? 'warning' : 'primary';
}
```

<AutoScreenshot name="panels/navigation/badge-color" alt="Navigation item with badge color" version="5.x" />

A custom tooltip for the navigation badge can be set in `$navigationBadgeTooltip`:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $navigationBadgeTooltip = 'The number of users';
```

Or it can be returned from `getNavigationBadgeTooltip()`:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationBadgeTooltip(): ?string
{
    return 'The number of users';
}
```

<AutoScreenshot name="panels/navigation/badge-tooltip" alt="Navigation item with badge tooltip" version="5.x" />

## Grouping navigation items

You may group navigation items by specifying a `$navigationGroup` property on a [resource](../resources/overview) and [custom page](./custom-pages):

```php theme={"theme":"gruvbox-dark-hard"}
use UnitEnum;

protected static string | UnitEnum | null $navigationGroup = 'Settings';
```

<AutoScreenshot name="panels/navigation/group" alt="Grouped navigation items" version="5.x" />

All items in the same navigation group will be displayed together under the same group label, "Settings" in this case. Ungrouped items will remain at the start of the navigation.

### Grouping navigation items under other items

You may group navigation items as children of other items, by passing the label of the parent item as the `$navigationParentItem`:

```php theme={"theme":"gruvbox-dark-hard"}
use UnitEnum;

protected static ?string $navigationParentItem = 'Notifications';

protected static string | UnitEnum | null $navigationGroup = 'Settings';
```

You may also use the `getNavigationParentItem()` method to set a dynamic parent item label:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationParentItem(): ?string
{
    return __('filament/navigation.groups.settings.items.notifications');
}
```

As seen above, if the parent item has a navigation group, that navigation group must also be defined, so the correct parent item can be identified.

<Tip>
  If you're reaching for a third level of navigation like this, you should consider using [clusters](./clusters) instead, which are a logical grouping of resources and custom pages, which can share their own separate navigation.
</Tip>

### Customizing navigation groups

You may customize navigation groups by calling `navigationGroups()` in the [configuration](../panel-configuration), and passing `NavigationGroup` objects in order:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\Support\Icons\Heroicon;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->navigationGroups([
            NavigationGroup::make()
                 ->label('Shop')
                 ->icon(Heroicon::OutlinedShoppingCart),
            NavigationGroup::make()
                ->label('Blog')
                ->icon(Heroicon::OutlinedPencil),
            NavigationGroup::make()
                ->label(fn (): string => __('navigation.settings'))
                ->icon(Heroicon::OutlinedCog6Tooth)
                ->collapsed(),
        ]);
}
```

In this example, we pass in a custom `icon()` for the groups, and make one `collapsed()` by default.

#### Ordering navigation groups

By using `navigationGroups()`, you are defining a new order for the navigation groups. If you just want to reorder the groups and not define an entire `NavigationGroup` object, you may just pass the labels of the groups in the new order:

```php theme={"theme":"gruvbox-dark-hard"}
$panel
    ->navigationGroups([
        'Shop',
        'Blog',
        'Settings',
    ])
```

#### Making navigation groups not collapsible

By default, navigation groups are collapsible.

<AutoScreenshot name="panels/navigation/group-collapsible" alt="Collapsible navigation groups" version="5.x" />

You may disable this behavior by calling `collapsible(false)` on the `NavigationGroup` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Navigation\NavigationGroup;
use Filament\Support\Icons\Heroicon;

NavigationGroup::make()
    ->label('Settings')
    ->icon(Heroicon::OutlinedCog6Tooth)
    ->collapsible(false);
```

<AutoScreenshot name="panels/navigation/group-not-collapsible" alt="Not collapsible navigation groups" version="5.x" />

Or, you can do it globally for all groups in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->collapsibleNavigationGroups(false);
}
```

#### Adding extra HTML attributes to navigation groups

You can pass extra HTML attributes to the navigation group, which will be merged onto the outer DOM element. Pass an array of attributes to the `extraSidebarAttributes()` or `extraTopbarAttributes()` method, where the key is the attribute name and the value is the attribute value:

```php theme={"theme":"gruvbox-dark-hard"}
NavigationGroup::make()
    ->extraSidebarAttributes(['class' => 'featured-sidebar-group']),
    ->extraTopbarAttributes(['class' => 'featured-topbar-group']),
```

The `extraSidebarAttributes()` will be applied to navigation group elements contained in the sidebar, and the `extraTopbarAttributes()` will only be applied to topbar navigation group dropdowns when using [top navigation](#using-top-navigation).

### Registering navigation groups with an enum

You can use an enum class to register navigation groups, which allows you to control their labels, icons, and order in a single place, without needing to register them in the [configuration](../panel-configuration).

To do this, you can create an enum class with cases for each group:

```php theme={"theme":"gruvbox-dark-hard"}
enum NavigationGroup
{
    case Shop;
    
    case Blog;
    
    case Settings;
}
```

The order that the cases are defined in will control the order of the navigation groups.

To use an enum navigation group for a resource or custom page, you can set the `$navigationGroup` property to the enum case:

```php theme={"theme":"gruvbox-dark-hard"}
protected static string | UnitEnum | null $navigationGroup = NavigationGroup::Shop;
```

You can also implement the `HasLabel` interface on the enum class, to define a custom label for each group:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Contracts\HasLabel;

enum NavigationGroup implements HasLabel
{
    case Shop;
    
    case Blog;
    
    case Settings;

    public function getLabel(): string
    {
        return match ($this) {
            self::Shop => __('navigation-groups.shop'),
            self::Blog => __('navigation-groups.blog'),
            self::Settings => __('navigation-groups.settings'),
        };
    }
}
```

You can also implement the `HasIcon` interface on the enum class, to define a custom icon for each group:

```php theme={"theme":"gruvbox-dark-hard"}
use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationGroup implements HasIcon
{
    case Shop;
    
    case Blog;
    
    case Settings;

    public function getIcon(): string | BackedEnum | Htmlable | null
    {
        return match ($this) {
            self::Shop => Heroicon::OutlinedShoppingCart,
            self::Blog => Heroicon::OutlinedPencil,
            self::Settings => Heroicon::OutlinedCog6Tooth,
        };
    }
}
```

## Collapsible sidebar on desktop

To make the sidebar collapsible on desktop as well as mobile, you can use the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->sidebarCollapsibleOnDesktop();
}
```

<AutoScreenshot name="panels/navigation/sidebar-collapsible-on-desktop" alt="Collapsible sidebar on desktop" version="5.x" />

By default, when you collapse the sidebar on desktop, the navigation icons still show. You can fully collapse the sidebar using the `sidebarFullyCollapsibleOnDesktop()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->sidebarFullyCollapsibleOnDesktop();
}
```

<AutoScreenshot name="panels/navigation/sidebar-fully-collapsible-on-desktop" alt="Fully collapsible sidebar on desktop" version="5.x" />

### Navigation groups in a collapsible sidebar on desktop

<Info>
  This section only applies to `sidebarCollapsibleOnDesktop()`, not `sidebarFullyCollapsibleOnDesktop()`, since the fully collapsible UI just hides the entire sidebar instead of changing its design.
</Info>

When using a collapsible sidebar on desktop, you will also often be using [navigation groups](#grouping-navigation-items). By default, the labels of each navigation group will be hidden when the sidebar is collapsed, since there is no space to display them. Even if the navigation group itself is [collapsible](#making-navigation-groups-not-collapsible), all items will still be visible in the collapsed sidebar, since there is no group label to click on to expand the group.

These issues can be solved, to achieve a very minimal sidebar design, by [passing an `icon()`](#customizing-navigation-groups) to the navigation group objects. When an icon is defined, the icon will be displayed in the collapsed sidebar instead of the items at all times. When the icon is clicked, a dropdown will open to the side of the icon, revealing the items in the group.

When passing an icon to a navigation group, even if the items also have icons, the expanded sidebar UI will not show the item icons. This is to keep the navigation hierarchy clear, and the design minimal. However, the icons for the items will be shown in the collapsed sidebar's dropdowns though, since the hierarchy is already clear from the fact that the dropdown is open.

<AutoScreenshot name="panels/navigation/sidebar-collapsible-with-group-icons" alt="Collapsible sidebar with navigation group icons" version="5.x" />

## Registering custom navigation items

To register new navigation items, you can use the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\Support\Icons\Heroicon;
use function Filament\Support\original_request;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->navigationItems([
            NavigationItem::make('Analytics')
                ->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
                ->icon(Heroicon::OutlinedPresentationChartLine)
                ->group('Reports')
                ->sort(3),
            NavigationItem::make('dashboard')
                ->label(fn (): string => __('filament-panels::pages/dashboard.title'))
                ->url(fn (): string => Dashboard::getUrl())
                ->isActiveWhen(fn () => original_request()->routeIs('filament.admin.pages.dashboard')),
            // ...
        ]);
}
```

## Conditionally hiding navigation items

You can also conditionally hide a navigation item by using the `visible()` or `hidden()` methods, passing in a condition to check:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Navigation\NavigationItem;

NavigationItem::make('Analytics')
    ->visible(fn(): bool => auth()->user()->can('view-analytics'))
    // or
    ->hidden(fn(): bool => ! auth()->user()->can('view-analytics')),
```

## Disabling resource or page navigation items

To prevent resources or pages from showing up in navigation, you may use:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $shouldRegisterNavigation = false;
```

Or, you may override the `shouldRegisterNavigation()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function shouldRegisterNavigation(): bool
{
    return false;
}
```

Please note that these methods do not control direct access to the resource or page. They only control whether the resource or page will show up in the navigation. If you want to also control access, then you should use [resource authorization](../resources#authorization) or [page authorization](./custom-pages#authorization).

## Using top navigation

By default, Filament will use a sidebar navigation. You may use a top navigation instead by using the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->topNavigation();
}
```

<AutoScreenshot name="panels/navigation/top-navigation" alt="Top navigation" version="5.x" />

## Customizing the width of the sidebar

You can customize the width of the sidebar by passing it to the `sidebarWidth()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->sidebarWidth('40rem');
}
```

<AutoScreenshot name="panels/styling/sidebar-width" alt="Panel with custom sidebar width" version="5.x" />

Additionally, if you are using the `sidebarCollapsibleOnDesktop()` method, you can customize width of the collapsed icons by using the `collapsedSidebarWidth()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->sidebarCollapsibleOnDesktop()
        ->collapsedSidebarWidth('9rem');
}
```

## Advanced navigation customization

The `navigation()` method can be called from the [configuration](../panel-configuration). It allows you to build a custom navigation that overrides Filament's automatically generated items. This API is designed to give you complete control over the navigation.

### Registering custom navigation items

To register navigation items, call the `items()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Settings;
use App\Filament\Resources\Users\UserResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\Support\Icons\Heroicon;
use function Filament\Support\original_request;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->items([
                NavigationItem::make('Dashboard')
                    ->icon(Heroicon::OutlinedHome)
                    ->isActiveWhen(fn (): bool => original_request()->routeIs('filament.admin.pages.dashboard'))
                    ->url(fn (): string => Dashboard::getUrl()),
                ...UserResource::getNavigationItems(),
                ...Settings::getNavigationItems(),
            ]);
        });
}
```

<AutoScreenshot name="panels/navigation/custom-items" alt="Custom navigation items" version="5.x" />

### Registering custom navigation groups

If you want to register groups, you can call the `groups()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\HomePageSettings;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Pages\PageResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->groups([
                NavigationGroup::make('Website')
                    ->items([
                        ...PageResource::getNavigationItems(),
                        ...CategoryResource::getNavigationItems(),
                        ...HomePageSettings::getNavigationItems(),
                    ]),
            ]);
        });
}
```

### Disabling navigation

You may disable navigation entirely by passing `false` to the `navigation()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->navigation(false);
}
```

<AutoScreenshot name="panels/navigation/disabled-navigation" alt="Disabled navigation sidebar" version="5.x" />

Alternatively, you may pass a closure that returns a boolean to decide dynamically. Returning `false` hides the navigation, while returning `true` renders the default auto-discovered navigation items. This is useful for flows such as onboarding or setup wizards where the navigation should only appear once the user has reached a particular state:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->navigation(fn (): bool => auth()->user()->hasCompletedOnboarding());
}
```

### Disabling the topbar

You may disable topbar entirely by passing `false` to the `topbar()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->topbar(false);
}
```

### Replacing the sidebar and topbar Livewire components

You may completely replace the Livewire components that are used to render the sidebar and topbar, passing your own Livewire component class name into the `sidebarLivewireComponent()` or `topbarLivewireComponent()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Livewire\Sidebar;
use App\Livewire\Topbar;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->sidebarLivewireComponent(Sidebar::class)
        ->topbarLivewireComponent(Topbar::class);
}
```

## Disabling breadcrumbs

The default layout will show breadcrumbs to indicate the location of the current page within the hierarchy of the app.

You may disable breadcrumbs in your [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->breadcrumbs(false);
}
```

## Reloading the sidebar and topbar

Once a page in the panel is loaded, the sidebar and topbar are not reloaded until you navigate away from the page, or until a menu item is clicked to trigger an action. You can manually reload these components to update them by dispatching a `refresh-sidebar` or `refresh-topbar` browser event.

To dispatch an event from PHP, you can call the `$this->dispatch()` method from any Livewire component, such as a page class, relation manager class, or widget class:

```php theme={"theme":"gruvbox-dark-hard"}
$this->dispatch('refresh-sidebar');
```

When your code does not live inside a Livewire component, such as when you have a custom action class, you can inject the `$livewire` argument into a closure function, and call `dispatch()` on that:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Livewire\Component;

Action::make('create')
    ->action(function (Component $livewire) {
        // ...
    
        $livewire->dispatch('refresh-sidebar');
    })
```

Alternatively, you can dispatch an event from JavaScript using the `$dispatch()` Alpine.js helper method, or the native browser `window.dispatchEvent()` method:

```html theme={"theme":"gruvbox-dark-hard"}
<button x-on:click="$dispatch('refresh-sidebar')" type="button">
    Refresh Sidebar
</button>
```

```javascript theme={"theme":"gruvbox-dark-hard"}
window.dispatchEvent(new CustomEvent('refresh-sidebar'));
```

<EditOnGitHub version="5.x" path="docs/06-navigation/01-overview.md" />

<Footer />
