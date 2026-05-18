> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Viewing records

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

<AutoScreenshot name="panels/resources/viewing" alt="Resource view page" version="5.x" />

## Creating a resource with a View page

To create a new resource with a View page, you can use the `--view` flag:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource User --view
```

## Using an infolist instead of a disabled form

By default, the View page will display a disabled form with the record's data. If you preferred to display the record's data in an "infolist", you can define an `infolist()` method on the resource class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists;
use Filament\Schemas\Schema;

public static function infolist(Schema $schema): Schema
{
    return $schema
        ->components([
            Infolists\Components\TextEntry::make('name'),
            Infolists\Components\TextEntry::make('email'),
            Infolists\Components\TextEntry::make('notes')
                ->columnSpanFull(),
        ]);
}
```

The `components()` method is used to define the structure of your infolist. It is an array of [entries](../infolists/overview#available-entries) and [layout components](../schemas/layouts#available-layout-components), in the order they should appear in your infolist.

Check out the Infolists docs for a [guide](../infolists) on how to build infolists with Filament.

## Adding a View page to an existing resource

If you want to add a View page to an existing resource, create a new page in your resource's `Pages` directory:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-page ViewUser --resource=UserResource --type=ViewRecord
```

You must register this new page in your resource's `getPages()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getPages(): array
{
    return [
        'index' => Pages\ListUsers::route('/'),
        'create' => Pages\CreateUser::route('/create'),
        'view' => Pages\ViewUser::route('/{record}'),
        'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
}
```

## Viewing records in modals

If your resource is simple, you may wish to view records in modals rather than on the [View page](./viewing-records). If this is the case, you can just [delete the view page](./overview#deleting-resource-pages).

If your resource doesn't contain a `ViewAction`, you can add one to the `$table->recordActions()` array:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->recordActions([
            ViewAction::make(),
            // ...
        ]);
}
```

## Customizing data before filling the form

You may wish to modify the data from a record before it is filled into the form. To do this, you may define a `mutateFormDataBeforeFill()` method on the View page class to modify the `$data` array, and return the modified version before it is filled into the form:

```php theme={"theme":"gruvbox-dark-hard"}
protected function mutateFormDataBeforeFill(array $data): array
{
    $data['user_id'] = auth()->id();

    return $data;
}
```

Alternatively, if you're viewing records in a modal action, check out the [Actions documentation](../actions/view#customizing-data-before-filling-the-form).

## Lifecycle hooks

Hooks may be used to execute code at various points within a page's lifecycle, like before a form is filled. To set up a hook, create a protected method on the View page class with the name of the hook:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    // ...

    protected function beforeFill(): void
    {
        // Runs before the disabled form fields are populated from the database. Not run on pages using an infolist.
    }

    protected function afterFill(): void
    {
        // Runs after the disabled form fields are populated from the database. Not run on pages using an infolist.
    }
}
```

## Authorization

For authorization, Filament will observe any [model policies](https://laravel.com/docs/authorization#creating-policies) that are registered in your app.

Users may access the View page if the `view()` method of the model policy returns `true`.

## Creating another View page

One View page may not be enough space to allow users to navigate a lot of information. You can create as many View pages for a resource as you want. This is especially useful if you are using [resource sub-navigation](./overview#resource-sub-navigation), as you are then easily able to switch between the different View pages.

To create a View page, you should use the `make:filament-page` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-page ViewCustomerContact --resource=CustomerResource --type=ViewRecord
```

You must register this new page in your resource's `getPages()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getPages(): array
{
    return [
        'index' => Pages\ListCustomers::route('/'),
        'create' => Pages\CreateCustomer::route('/create'),
        'view' => Pages\ViewCustomer::route('/{record}'),
        'view-contact' => Pages\ViewCustomerContact::route('/{record}/contact'),
        'edit' => Pages\EditCustomer::route('/{record}/edit'),
    ];
}
```

Now, you can define the `infolist()` or `form()` for this page, which can contain other components that are not present on the main View page:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Schema;

public function infolist(Schema $schema): Schema
{
    return $schema
        ->components([
            // ...
        ]);
}
```

## Customizing relation managers for a specific view page

You can specify which relation managers should appear on a view page by defining a `getAllRelationManagers()` method:

```php theme={"theme":"gruvbox-dark-hard"}
protected function getAllRelationManagers(): array
{
    return [
        CustomerAddressesRelationManager::class,
        CustomerContactsRelationManager::class,
    ];
}
```

This is useful when you have [multiple view pages](#creating-another-view-page) and need different relation managers on
each page:

```php theme={"theme":"gruvbox-dark-hard"}
// ViewCustomer.php
protected function getAllRelationManagers(): array
{
    return [
        RelationManagers\OrdersRelationManager::class,
        RelationManagers\SubscriptionsRelationManager::class,
    ];
}

// ViewCustomerContact.php 
protected function getAllRelationManagers(): array
{
    return [
        RelationManagers\ContactsRelationManager::class,
        RelationManagers\AddressesRelationManager::class,
    ];
}
```

If `getAllRelationManagers()` isn't defined, any relation managers defined in the resource will be used.

## Adding view pages to resource sub-navigation

If you're using [resource sub-navigation](./overview#resource-sub-navigation), you can register this page as normal in `getRecordSubNavigation()` of the resource:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Pages;
use Filament\Resources\Pages\Page;

public static function getRecordSubNavigation(Page $page): array
{
    return $page->generateNavigationItems([
        // ...
        Pages\ViewCustomerContact::class,
    ]);
}
```

## Custom page content

Each page in Filament has its own [schema](../schemas), which defines the overall structure and content. You can override the schema for the page by defining a `content()` method on it. The `content()` method for the View page contains the following components by default:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Schema;

public function content(Schema $schema): Schema
{
    return $schema
        ->components([
            $this->hasInfolist() // This method returns `true` if the page has an infolist defined
                ? $this->getInfolistContentComponent() // This method returns a component to display the infolist that is defined in this resource
                : $this->getFormContentComponent(), // This method returns a component to display the form that is defined in this resource
            $this->getRelationManagersContentComponent(), // This method returns a component to display the relation managers that are defined in this resource
        ]);
}
```

Inside the `components()` array, you can insert any [schema component](../schemas). You can reorder the components by changing the order of the array or remove any of the components that are not needed.

### Using a custom Blade view

For further customization opportunities, you can override the static `$view` property on the page class to a custom view in your app:

```php theme={"theme":"gruvbox-dark-hard"}
protected string $view = 'filament.resources.users.pages.view-user';
```

This assumes that you have created a view at `resources/views/filament/resources/users/pages/view-user.blade.php`:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament-panels::page>
    {{-- `$this->getRecord()` will return the current Eloquent record for this page --}}
    
    {{ $this->content }} {{-- This will render the content of the page defined in the `content()` method, which can be removed if you want to start from scratch --}}
</x-filament-panels::page>
```

<EditOnGitHub version="5.x" path="docs/03-resources/05-viewing-records.md" />

<Footer />
