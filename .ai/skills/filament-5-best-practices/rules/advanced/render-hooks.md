> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Render hooks

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

Filament allows you to render Blade content at various points in the frameworks views. It's useful for plugins to be able to inject HTML into the framework. Also, since Filament does not recommend publishing the views due to an increased risk of breaking changes, it's also useful for users.

## Registering render hooks

To register render hooks, you can call `FilamentView::registerRenderHook()` from a service provider or middleware. The first argument is the name of the render hook, and the second argument is a callback that returns the content to be rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

FilamentView::registerRenderHook(
    PanelsRenderHook::BODY_START,
    fn (): string => Blade::render('@livewire(\'livewire-ui-modal\')'),
);
```

You could also render view content from a file:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;

FilamentView::registerRenderHook(
    PanelsRenderHook::BODY_START,
    fn (): View => view('impersonation-banner'),
);
```

## Available render hooks

### Panel Builder render hooks

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\View\PanelsRenderHook;
```

* `PanelsRenderHook::AUTH_LOGIN_FORM_AFTER` - After login form
* `PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE` - Before login form
* `PanelsRenderHook::AUTH_PASSWORD_RESET_REQUEST_FORM_AFTER` - After password reset request form
* `PanelsRenderHook::AUTH_PASSWORD_RESET_REQUEST_FORM_BEFORE` - Before password reset request form
* `PanelsRenderHook::AUTH_PASSWORD_RESET_RESET_FORM_AFTER` - After password reset form
* `PanelsRenderHook::AUTH_PASSWORD_RESET_RESET_FORM_BEFORE` - Before password reset form
* `PanelsRenderHook::AUTH_REGISTER_FORM_AFTER` - After register form
* `PanelsRenderHook::AUTH_REGISTER_FORM_BEFORE` - Before register form
* `PanelsRenderHook::BODY_END` - Before `</body>`
* `PanelsRenderHook::BODY_START` - After `<body>`
* `PanelsRenderHook::CONTENT_AFTER` - After page content
* `PanelsRenderHook::CONTENT_BEFORE` - Before page content
* `PanelsRenderHook::CONTENT_END` - After page content, inside `<main>`
* `PanelsRenderHook::CONTENT_START` - Before page content, inside `<main>`
* `PanelsRenderHook::FOOTER` - Footer of the page
* `PanelsRenderHook::GLOBAL_SEARCH_AFTER` - After the [global search](../resources/global-search) container, inside the topbar
* `PanelsRenderHook::GLOBAL_SEARCH_BEFORE` - Before the [global search](../resources/global-search) container, inside the topbar
* `PanelsRenderHook::GLOBAL_SEARCH_END` - The end of the [global search](../resources/global-search) container
* `PanelsRenderHook::GLOBAL_SEARCH_START` - The start of the [global search](../resources/global-search) container
* `PanelsRenderHook::HEAD_END` - Before `</head>`
* `PanelsRenderHook::HEAD_START` - After `<head>`
* `PanelsRenderHook::LAYOUT_END` - End of the layout container, also [can be scoped](#scoping-render-hooks) to the page class
* `PanelsRenderHook::LAYOUT_START` - Start of the layout container, also [can be scoped](#scoping-render-hooks) to the page class
* `PanelsRenderHook::PAGE_END` - End of the page content container, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_FOOTER_WIDGETS_AFTER` - After the page footer widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_FOOTER_WIDGETS_BEFORE` - Before the page footer widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_FOOTER_WIDGETS_END` - End of the page footer widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_FOOTER_WIDGETS_START` - Start of the page footer widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_ACTIONS_AFTER` - After the page header actions, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_ACTIONS_BEFORE` - Before the page header actions, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_HEADING_AFTER` - After the page header heading, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_HEADING_BEFORE` - Before the page header heading, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_WIDGETS_AFTER` - After the page header widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_WIDGETS_BEFORE` - Before the page header widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_WIDGETS_END` - End of the page header widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_HEADER_WIDGETS_START` - Start of the page header widgets, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_START` - Start of the page content container, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_END_AFTER` - After the page sub navigation "end" sidebar position, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_END_BEFORE` - Before the page sub navigation "end" sidebar position, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_SELECT_AFTER` - After the page sub navigation select (for mobile), also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_SELECT_BEFORE` - Before the page sub navigation select (for mobile), also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_SIDEBAR_AFTER` - After the page sub navigation sidebar, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_SIDEBAR_BEFORE` - Before the page sub navigation sidebar, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_START_AFTER` - After the page sub navigation "start" sidebar position, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_START_BEFORE` - Before the page sub navigation "start" sidebar position, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_TOP_AFTER` - After the page sub navigation "top" tabs position, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::PAGE_SUB_NAVIGATION_TOP_BEFORE` - Before the page sub navigation "top" tabs position, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_AFTER` - After the resource table, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABLE_BEFORE` - Before the resource table, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABS_END` - The end of the filter tabs (after the last tab), also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_PAGES_LIST_RECORDS_TABS_START` - The start of the filter tabs (before the first tab), also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_PAGES_MANAGE_RELATED_RECORDS_TABLE_AFTER` - After the relation manager table, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_PAGES_MANAGE_RELATED_RECORDS_TABLE_BEFORE` - Before the relation manager table, also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_RELATION_MANAGER_AFTER` - After the relation manager table, also [can be scoped](#scoping-render-hooks) to the page or relation manager class
* `PanelsRenderHook::RESOURCE_RELATION_MANAGER_BEFORE` - Before the relation manager table, also [can be scoped](#scoping-render-hooks) to the page or relation manager class
* `PanelsRenderHook::RESOURCE_TABS_END` - The end of the resource tabs (after the last tab), also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::RESOURCE_TABS_START` - The start of the resource tabs (before the first tab), also [can be scoped](#scoping-render-hooks) to the page or resource class
* `PanelsRenderHook::SCRIPTS_AFTER` - After scripts are defined
* `PanelsRenderHook::SCRIPTS_BEFORE` - Before scripts are defined
* `PanelsRenderHook::SIDEBAR_LOGO_AFTER` - After the logo in the sidebar
* `PanelsRenderHook::SIDEBAR_LOGO_BEFORE` - Before the logo in the sidebar
* `PanelsRenderHook::SIDEBAR_NAV_END` - In the [sidebar](../navigation), before `</nav>`
* `PanelsRenderHook::SIDEBAR_NAV_START` - In the [sidebar](../navigation), after `<nav>`
* `PanelsRenderHook::SIMPLE_LAYOUT_END` - End of the simple layout container, also [can be scoped](#scoping-render-hooks) to the page class
* `PanelsRenderHook::SIMPLE_LAYOUT_START` - Start of the simple layout container, also [can be scoped](#scoping-render-hooks) to the page class
* `PanelsRenderHook::SIMPLE_PAGE_END` - End of the simple page content container, also [can be scoped](#scoping-render-hooks) to the page class
* `PanelsRenderHook::SIMPLE_PAGE_START` - Start of the simple page content container, also [can be scoped](#scoping-render-hooks) to the page class
* `PanelsRenderHook::SIDEBAR_FOOTER` - Pinned to the bottom of the sidebar, below the content
* `PanelsRenderHook::SIDEBAR_START` - Start of the sidebar container
* `PanelsRenderHook::STYLES_AFTER` - After styles are defined
* `PanelsRenderHook::STYLES_BEFORE` - Before styles are defined
* `PanelsRenderHook::TENANT_MENU_AFTER` - After the [tenant menu](../users/tenancy#customizing-the-tenant-menu)
* `PanelsRenderHook::TENANT_MENU_BEFORE` - Before the [tenant menu](../users/tenancy#customizing-the-tenant-menu)
* `PanelsRenderHook::TOPBAR_AFTER` - Below the topbar
* `PanelsRenderHook::TOPBAR_BEFORE` - Above the topbar
* `PanelsRenderHook::TOPBAR_END` - End of the topbar container
* `PanelsRenderHook::TOPBAR_LOGO_AFTER` - After the logo in the topbar
* `PanelsRenderHook::TOPBAR_LOGO_BEFORE` - Before the logo in the topbar
* `PanelsRenderHook::TOPBAR_START` - Start of the topbar container
* `PanelsRenderHook::USER_MENU_AFTER` - After the [user menu](../navigation/user-menu)
* `PanelsRenderHook::USER_MENU_BEFORE` - Before the [user menu](../navigation/user-menu)
* `PanelsRenderHook::USER_MENU_PROFILE_AFTER` - After the profile item in the [user menu](../navigation/user-menu)
* `PanelsRenderHook::USER_MENU_PROFILE_BEFORE` - Before the profile item in the [user menu](../navigation/user-menu)

### Table Builder render hooks

All these render hooks [can be scoped](#scoping-render-hooks) to any table Livewire component class. When using the Panel Builder, these classes might be the List or Manage page of a resource, or a relation manager. Table widgets are also Livewire component classes.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\View\TablesRenderHook;
```

* `TablesRenderHook::FILTER_INDICATORS` - Replace the existing filter indicators, receives `filterIndicators` data as `array<Filament\Tables\Filters\Indicator>`
* `TablesRenderHook::HEADER_CELL` - Replace the existing header cells, receives the `Filament\Tables\Columns\Column` object as `column` and `isReordering` in the data.
* `TablesRenderHook::SELECTION_INDICATOR_ACTIONS_AFTER` - After the "select all" and "deselect all" action buttons in the selection indicator bar
* `TablesRenderHook::SELECTION_INDICATOR_ACTIONS_BEFORE` - Before the "select all" and "deselect all" action buttons in the selection indicator bar
* `TablesRenderHook::HEADER_AFTER` - After the header container
* `TablesRenderHook::HEADER_BEFORE` - Before the header container
* `TablesRenderHook::TOOLBAR_AFTER` - After the toolbar container
* `TablesRenderHook::TOOLBAR_BEFORE` - Before the toolbar container
* `TablesRenderHook::TOOLBAR_END` - The end of the toolbar
* `TablesRenderHook::TOOLBAR_GROUPING_SELECTOR_AFTER` - After the [grouping](../tables/grouping) selector
* `TablesRenderHook::TOOLBAR_GROUPING_SELECTOR_BEFORE` - Before the [grouping](../tables/grouping) selector
* `TablesRenderHook::TOOLBAR_REORDER_TRIGGER_AFTER` - After the [reorder](../tables/overview#reordering-records) trigger
* `TablesRenderHook::TOOLBAR_REORDER_TRIGGER_BEFORE` - Before the [reorder](../tables/overview#reordering-records) trigger
* `TablesRenderHook::TOOLBAR_SEARCH_AFTER` - After the [search](../tables/overview#making-columns-sortable-and-searchable) container
* `TablesRenderHook::TOOLBAR_SEARCH_BEFORE` - Before the [search](../tables/overview#making-columns-sortable-and-searchable) container
* `TablesRenderHook::TOOLBAR_START` - The start of the toolbar
* `TablesRenderHook::TOOLBAR_COLUMN_MANAGER_TRIGGER_AFTER` - After the [column manager](../tables/columns/overview#toggling-column-visibility) trigger
* `TablesRenderHook::TOOLBAR_COLUMN_MANAGER_TRIGGER_BEFORE` - Before the [column manager](../tables/columns/overview#toggling-column-visibility) trigger

### Actions render hooks

All these render hooks [can be scoped](#scoping-render-hooks) to any Livewire component class. When using the Panel Builder, these classes might be the List or Manage page of a resource, or a relation manager.

Scoping is typically not enough in this case, as Livewire components can have multiple actions, so you can access the `action` data as `Filament\Actions\Action` to identify the specific action in all these render hooks.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\View\ActionsRenderHook;
```

* `ActionsRenderHook::MODAL_CUSTOM_CONTENT_AFTER` - After the [modal content](../actions/modals#custom-modal-content)
* `ActionsRenderHook::MODAL_CUSTOM_CONTENT_BEFORE` - Before the [modal content](../actions/modals#custom-modal-content)
* `ActionsRenderHook::MODAL_CUSTOM_CONTENT_FOOTER_AFTER` - After the [modal content footer](../actions/modals#adding-custom-modal-content-below-the-form)
* `ActionsRenderHook::MODAL_CUSTOM_CONTENT_FOOTER_BEFORE` - Before the [modal content footer](../actions/modals#adding-custom-modal-content-below-the-form)
* `ActionsRenderHook::MODAL_SCHEMA_AFTER` - After the [modal schema](../actions/modals#rendering-a-schema-in-a-modal)
* `ActionsRenderHook::MODAL_SCHEMA_BEFORE` - Before the [modal schema](../actions/modals#rendering-a-schema-in-a-modal)

### Widgets render hooks

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Widgets\View\WidgetsRenderHook;
```

* `WidgetsRenderHook::TABLE_WIDGET_END` - End of the [table widget](../widgets/overview#table-widgets), after the table itself, also [can be scoped](#scoping-render-hooks) to the table widget class
* `WidgetsRenderHook::TABLE_WIDGET_START` - Start of the [table widget](../widgets/overview#table-widgets), before the table itself, also [can be scoped](#scoping-render-hooks) to the table widget class

## Scoping render hooks

Some render hooks can be given a "scope", which allows them to only be output on a specific page or Livewire component. For instance, you might want to register a render hook for just 1 page. To do that, you can pass the class of the page or component as the second argument to `registerRenderHook()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

FilamentView::registerRenderHook(
    PanelsRenderHook::PAGE_START,
    fn (): View => view('warning-banner'),
    scopes: \App\Filament\Resources\Users\Pages\EditUser::class,
);
```

You can also pass an array of scopes to register the render hook for:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

FilamentView::registerRenderHook(
    PanelsRenderHook::PAGE_START,
    fn (): View => view('warning-banner'),
    scopes: [
        \App\Filament\Resources\Users\Pages\CreateUser::class,
        \App\Filament\Resources\Users\Pages\EditUser::class,
    ],
);
```

Some render hooks for the [Panel Builder](#panel-builder-render-hooks) allow you to scope hooks to all pages in a resource:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

FilamentView::registerRenderHook(
    PanelsRenderHook::PAGE_START,
    fn (): View => view('warning-banner'),
    scopes: \App\Filament\Resources\Users\UserResource::class,
);
```

### Retrieving the currently active scopes inside the render hook

The `$scopes` are passed to the render hook function, and you can use them to determine which page or component the render hook is being rendered on:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

FilamentView::registerRenderHook(
    PanelsRenderHook::PAGE_START,
    fn (array $scopes): View => view('warning-banner', ['scopes' => $scopes]),
    scopes: \App\Filament\Resources\Users\UserResource::class,
);
```

## Passing data to render hooks

Render hooks can receive "data" from when the hook is rendered. To access data from a render hook, you can inject it using an `array $data` parameter to the hook's rendering function:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Facades\FilamentView;
use Filament\Tables\View\TablesRenderHook;

FilamentView::registerRenderHook(
    TablesRenderHook::FILTER_INDICATORS,
    fn (array $data): View => view('filter-indicators', ['indicators' => $data['filterIndicators']]),
);
```

## Rendering hooks

Plugin developers might find it useful to expose render hooks to their users. You do not need to register them anywhere, simply output them in Blade like so:

```blade theme={"theme":"gruvbox-dark-hard"}
{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_START) }}
```

To provide [scope](#scoping-render-hooks) your render hook, you can pass it as the second argument to `renderHook()`. For instance, if your hook is inside a Livewire component, you can pass the class of the component using `static::class`:

```blade theme={"theme":"gruvbox-dark-hard"}
{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_START, scopes: $this->getRenderHookScopes()) }}
```

You can even pass multiple scopes as an array, and all render hooks that match any of the scopes will be rendered:

```blade theme={"theme":"gruvbox-dark-hard"}
{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_START, scopes: [static::class, \App\Filament\Resources\Users\UserResource::class]) }}
```

You can pass [data](#passing-data-to-render-hooks) to a render hook using a `data` argument to the `renderHook()` function:

```blade theme={"theme":"gruvbox-dark-hard"}
{{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Tables\View\TablesRenderHook::FILTER_INDICATORS, data: ['filterIndicators' => $filterIndicators]) }}
```

<EditOnGitHub version="5.x" path="docs/09-advanced/01-render-hooks.md" />

<Footer />
