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

Resources are static classes that are used to build CRUD interfaces for your Eloquent models. They describe how administrators should be able to interact with data from your app using tables and forms.

<AutoScreenshot name="panels/resources/listing" alt="A resource listing page" version="5.x" />

## Creating a resource

To create a resource for the `App\Models\Customer` model:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer
```

This will create several files in the `app/Filament/Resources` directory:

```
.
+-- Customers
|   +-- CustomerResource.php
|   +-- Pages
|   |   +-- CreateCustomer.php
|   |   +-- EditCustomer.php
|   |   +-- ListCustomers.php
|   +-- Schemas
|   |   +-- CustomerForm.php
|   +-- Tables
|   |   +-- CustomersTable.php
```

Your new resource class lives in `CustomerResource.php`.

The classes in the `Pages` directory are used to customize the pages in the app that interact with your resource. They're all full-page [Livewire](https://livewire.laravel.com) components that you can customize in any way you wish.

The classes in the `Schemas` directory are used to define the content of the [forms](../forms) and [infolists](../infolists) for your resource. The classes in the `Tables` directory are used to build the table for your resource.

<Tip>
  Have you created a resource, but it's not appearing in the navigation menu? If you have a [model policy](#authorization), make sure you return `true` from the `viewAny()` method.
</Tip>

### Simple (modal) resources

Sometimes, your models are simple enough that you only want to manage records on one page, using modals to create, edit and delete records. To generate a simple resource with modals:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer --simple
```

Your resource will have a "Manage" page, which is a List page with modals added.

Additionally, your simple resource will have no `getRelations()` method, as [relation managers](./managing-relationships) are only displayed on the Edit and View pages, which are not present in simple resources. Everything else is the same.

<AutoScreenshot name="panels/resources/simple-modal-create" alt="Simple (modal) resource create modal" version="5.x" />

<AutoScreenshot name="panels/resources/simple-modal-edit" alt="Simple (modal) resource edit modal" version="5.x" />

### Automatically generating forms and tables

If you'd like to save time, Filament can automatically generate the [form](#resource-forms) and [table](#resource-tables) for you, based on your model's database columns, using `--generate`:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer --generate
```

### Handling soft-deletes

By default, you will not be able to interact with deleted records in the app. If you'd like to add functionality to restore, force-delete and filter trashed records in your resource, use the `--soft-deletes` flag when generating the resource:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer --soft-deletes
```

You can find out more about soft-deleting [here](./deleting-records#handling-soft-deletes).

### Generating a View page

By default, only List, Create and Edit pages are generated for your resource. If you'd also like a [View page](./viewing-records), use the `--view` flag:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer --view
```

### Specifying a custom model namespace

By default, Filament will assume that your model exists in the `App\Models` directory. You can pass a different namespace for the model using the `--model-namespace` flag:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer --model-namespace=Custom\\Path\\Models
```

In this example, the model should exist at `Custom\Path\Models\Customer`. Please note the double backslashes `\\` in the command that are required.

Now when [generating the resource](#automatically-generating-forms-and-tables), Filament will be able to locate the model and read the database schema.

### Generating the model, migration and factory at the same time

If you'd like to save time when scaffolding your resources, Filament can also generate the model, migration and factory for the new resource at the same time using the `--model`, `--migration` and `--factory` flags in any combination:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Customer --model --migration --factory
```

## Record titles

A `$recordTitleAttribute` may be set for your resource, which is the name of the column on your model that can be used to identify it from others.

For example, this could be a blog post's `title` or a customer's `name`:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $recordTitleAttribute = 'name';
```

This is required for features like [global search](./global-search) to work.

<Tip>
  You may specify the name of an [Eloquent accessor](https://laravel.com/docs/eloquent-mutators#defining-an-accessor) if just one column is inadequate at identifying a record.
</Tip>

## Resource forms

Resource classes contain a `form()` method that is used to build the forms on the [Create](./creating-records) and [Edit](./editing-records) pages.

By default, Filament creates a form schema file for you, which is referenced in the `form()` method. This is to keep your resource class clean and organized, otherwise it can get quite large:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Schemas\CustomerForm;
use Filament\Schemas\Schema;

public static function form(Schema $schema): Schema
{
    return CustomerForm::configure($schema);
}
```

In the `CustomerForm` class, you can define the fields and layout of your form:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

public static function configure(Schema $schema): Schema
{
    return $schema
        ->components([
            TextInput::make('name')->required(),
            TextInput::make('email')->email()->required(),
            // ...
        ]);
}
```

The `components()` method is used to define the structure of your form. It is an array of [fields](../forms/overview#available-fields) and [layout components](../schemas/layouts#available-layout-components), in the order they should appear in your form.

Check out the Forms docs for a [guide](../forms) on how to build forms with Filament.

<Tip>
  If you would prefer to define the form directly in the resource class, you can do so and delete the form schema class altogether:

  ```php theme={"theme":"gruvbox-dark-hard"}
  use Filament\Forms\Components\TextInput;
  use Filament\Schemas\Schema;

  public static function form(Schema $schema): Schema
  {
      return $schema
          ->components([
              TextInput::make('name')->required(),
              TextInput::make('email')->email()->required(),
              // ...
          ]);
  }
  ```
</Tip>

### Hiding components based on the current operation

The `hiddenOn()` method of form components allows you to dynamically hide fields based on the current page or action.

In this example, we hide the `password` field on the `edit` page:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Operation;

TextInput::make('password')
    ->password()
    ->required()
    ->hiddenOn(Operation::Edit),
```

Alternatively, we have a `visibleOn()` shortcut method for only showing a field on one page or action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Operation;

TextInput::make('password')
    ->password()
    ->required()
    ->visibleOn(Operation::Create),
```

## Resource tables

Resource classes contain a `table()` method that is used to build the table on the [List page](./listing-records).

By default, Filament creates a table file for you, which is referenced in the `table()` method. This is to keep your resource class clean and organized, otherwise it can get quite large:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Tables\CustomersTable;
use Filament\Tables\Table;

public static function table(Table $table): Table
{
    return CustomersTable::configure($table);
}
```

In the `CustomersTable` class, you can define the columns, filters and actions of the table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

public static function configure(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name'),
            TextColumn::make('email'),
            // ...
        ])
        ->filters([
            Filter::make('verified')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
            // ...
        ])
        ->recordActions([
            EditAction::make(),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
}
```

Check out the [tables](../tables) docs to find out how to add table columns, filters, actions and more.

<Tip>
  If you would prefer to define the table directly in the resource class, you can do so and delete the table class altogether:

  ```php theme={"theme":"gruvbox-dark-hard"}
  use Filament\Actions\BulkActionGroup;
  use Filament\Actions\DeleteBulkAction;
  use Filament\Actions\EditAction;
  use Filament\Tables\Columns\TextColumn;
  use Filament\Tables\Filters\Filter;
  use Filament\Tables\Table;
  use Illuminate\Database\Eloquent\Builder;

  public static function table(Table $table): Table
  {
      return $table
          ->columns([
              TextColumn::make('name'),
              TextColumn::make('email'),
              // ...
          ])
          ->filters([
              Filter::make('verified')
                  ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
              // ...
          ])
          ->recordActions([
              EditAction::make(),
          ])
          ->toolbarActions([
              BulkActionGroup::make([
                  DeleteBulkAction::make(),
              ]),
          ]);
  }
  ```
</Tip>

## Customizing the model label

Each resource has a "model label" which is automatically generated from the model name. For example, an `App\Models\Customer` model will have a `customer` label.

The label is used in several parts of the UI, and you may customize it using the `$modelLabel` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $modelLabel = 'cliente';
```

Alternatively, you may use the `getModelLabel()` to define a dynamic label:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getModelLabel(): string
{
    return __('filament/resources/customer.label');
}
```

### Customizing the plural model label

Resources also have a "plural model label" which is automatically generated from the model label. For example, a `customer` label will be pluralized into `customers`.

You may customize the plural version of the label using the `$pluralModelLabel` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $pluralModelLabel = 'clientes';
```

Alternatively, you may set a dynamic plural label in the `getPluralModelLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getPluralModelLabel(): string
{
    return __('filament/resources/customer.plural_label');
}
```

### Automatic model label capitalization

By default, Filament will automatically capitalize each word in the model label, for some parts of the UI. For example, in page titles, the navigation menu, and the breadcrumbs.

If you want to disable this behavior for a resource, you can set `$hasTitleCaseModelLabel` in the resource:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $hasTitleCaseModelLabel = false;
```

## Resource navigation items

Filament will automatically generate a navigation menu item for your resource using the [plural label](#plural-label).

If you'd like to customize the navigation item label, you may use the `$navigationLabel` property:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $navigationLabel = 'Mis Clientes';
```

Alternatively, you may set a dynamic navigation label in the `getNavigationLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationLabel(): string
{
    return __('filament/resources/customer.navigation_label');
}
```

### Setting a resource navigation icon

The `$navigationIcon` property supports the name of any Blade component. By default, [Heroicons](https://heroicons.com) are installed. However, you may create your own custom icon components or install an alternative library if you wish.

```php theme={"theme":"gruvbox-dark-hard"}
use BackedEnum;

protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';
```

Alternatively, you may set a dynamic navigation icon in the `getNavigationIcon()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use BackedEnum;
use Illuminate\Contracts\Support\Htmlable;

public static function getNavigationIcon(): string | BackedEnum | Htmlable | null
{
    return 'heroicon-o-user-group';
}
```

### Sorting resource navigation items

The `$navigationSort` property allows you to specify the order in which navigation items are listed:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?int $navigationSort = 2;
```

Alternatively, you may set a dynamic navigation item order in the `getNavigationSort()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationSort(): ?int
{
    return 2;
}
```

### Grouping resource navigation items

You may group navigation items by specifying a `$navigationGroup` property:

```php theme={"theme":"gruvbox-dark-hard"}
use UnitEnum;

protected static string | UnitEnum | null $navigationGroup = 'Shop';
```

Alternatively, you may use the `getNavigationGroup()` method to set a dynamic group label:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationGroup(): ?string
{
    return __('filament/navigation.groups.shop');
}
```

#### Grouping resource navigation items under other items

You may group navigation items as children of other items, by passing the label of the parent item as the `$navigationParentItem`:

```php theme={"theme":"gruvbox-dark-hard"}
use UnitEnum;

protected static ?string $navigationParentItem = 'Products';

protected static string | UnitEnum | null $navigationGroup = 'Shop';
```

As seen above, if the parent item has a navigation group, that navigation group must also be defined, so the correct parent item can be identified.

You may also use the `getNavigationParentItem()` method to set a dynamic parent item label:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getNavigationParentItem(): ?string
{
    return __('filament/navigation.groups.shop.items.products');
}
```

<Tip>
  If you're reaching for a third level of navigation like this, you should consider using [clusters](../navigation/clusters) instead, which are a logical grouping of resources and [custom pages](../navigation/custom-pages), which can share their own separate navigation.
</Tip>

## Generating URLs to resource pages

Filament provides a `getUrl()` static method on resource classes to generate URLs to resources and specific pages within them. Traditionally, you would need to construct the URL by hand or by using Laravel's `route()` helper, but these methods depend on knowledge of the resource's slug or route naming conventions.

The `getUrl()` method, without any arguments, will generate a URL to the resource's [List page](./listing-records):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\CustomerResource;

CustomerResource::getUrl(); // /admin/customers
```

You may also generate URLs to specific pages within the resource. The name of each page is the array key in the `getPages()` array of the resource. For example, to generate a URL to the [Create page](./creating-records):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\CustomerResource;

CustomerResource::getUrl('create'); // /admin/customers/create
```

Some pages in the `getPages()` method use URL parameters like `record`. To generate a URL to these pages and pass in a record, you should use the second argument:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\CustomerResource;

CustomerResource::getUrl('edit', ['record' => $customer]); // /admin/customers/edit/1
```

In this example, `$customer` can be an Eloquent model object, or an ID.

### Generating URLs to resource modals

This can be especially useful if you are using [simple resources](#simple-modal-resources) with only one page.

To generate a URL for an action in the resource's table, you should pass the `tableAction` and `tableActionRecord` as URL parameters:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\CustomerResource;
use Filament\Actions\EditAction;

CustomerResource::getUrl(parameters: [
    'tableAction' => EditAction::getDefaultName(),
    'tableActionRecord' => $customer,
]); // /admin/customers?tableAction=edit&tableActionRecord=1
```

Or if you want to generate a URL for an action on the page like a `CreateAction` in the header, you can pass it in to the `action` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\CustomerResource;
use Filament\Actions\CreateAction;

CustomerResource::getUrl(parameters: [
    'action' => CreateAction::getDefaultName(),
]); // /admin/customers?action=create
```

### Generating URLs to resources in other panels

If you have multiple panels in your app, `getUrl()` will generate a URL within the current panel. You can also indicate which panel the resource is associated with, by passing the panel ID to the `panel` argument:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\CustomerResource;

CustomerResource::getUrl(panel: 'marketing');
```

## Customizing the resource Eloquent query

Within Filament, every query to your resource model will start with the `getEloquentQuery()` method.

Because of this, it's very easy to apply your own query constraints or [model scopes](https://laravel.com/docs/eloquent#query-scopes) that affect the entire resource:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->where('is_active', true);
}
```

### Disabling global scopes

By default, Filament will observe all global scopes that are registered to your model. However, this may not be ideal if you wish to access, for example, soft-deleted records.

To overcome this, you may override the `getEloquentQuery()` method that Filament uses:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->withoutGlobalScopes();
}
```

Alternatively, you may remove specific global scopes:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->withoutGlobalScopes([ActiveScope::class]);
}
```

More information about removing global scopes may be found in the [Laravel documentation](https://laravel.com/docs/eloquent#removing-global-scopes).

## Customizing the resource URL

By default, Filament will generate a URL based on the name of the resource. You can customize this by setting the `$slug` property on the resource:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $slug = 'pending-orders';
```

## Resource sub-navigation

Sub-navigation allows the user to navigate between different pages within a resource. Typically, all pages in the sub-navigation will be related to the same record in the resource. For example, in a Customer resource, you may have a sub-navigation with the following pages:

* View customer, a [`ViewRecord` page](./viewing-records) that provides a read-only view of the customer's details.
* Edit customer, an [`EditRecord` page](./editing-records) that allows the user to edit the customer's details.
* Edit customer contact, an [`EditRecord` page](./editing-records) that allows the user to edit the customer's contact details. You can [learn how to create more than one Edit page](./editing-records#creating-another-edit-page).
* Manage addresses, a [`ManageRelatedRecords` page](./managing-relationships#relation-pages) that allows the user to manage the customer's addresses.
* Manage payments, a [`ManageRelatedRecords` page](./managing-relationships#relation-pages) that allows the user to manage the customer's payments.

To add a sub-navigation to each "singular record" page in the resource, you can add the `getRecordSubNavigation()` method to the resource class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Pages\Page;

public static function getRecordSubNavigation(Page $page): array
{
    return $page->generateNavigationItems([
        ViewCustomer::class,
        EditCustomer::class,
        EditCustomerContact::class,
        ManageCustomerAddresses::class,
        ManageCustomerPayments::class,
    ]);
}
```

Each item in the sub-navigation can be customized using the [same navigation methods as normal pages](../navigation).

<AutoScreenshot name="panels/resources/sub-navigation" alt="Resource with sub-navigation" version="5.x" />

<Tip>
  If you're looking to add sub-navigation to switch *between* entire resources and [custom pages](../navigation/custom-pages), you might be looking for [clusters](../navigation/clusters), which are used to group these together. The `getRecordSubNavigation()` method is intended to construct a navigation between pages that relate to a particular record *inside* a resource.
</Tip>

### Setting the sub-navigation position for a resource

The sub-navigation is rendered at the start of the page by default. You may change the position for all pages in a resource by setting the `$subNavigationPosition` property on the resource. The value may be `SubNavigationPosition::Start`, `SubNavigationPosition::End`, or `SubNavigationPosition::Top` to render the sub-navigation as tabs:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Pages\Enums\SubNavigationPosition;

protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;
```

<AutoScreenshot name="panels/resources/sub-navigation-end" alt="Resource with end sub-navigation position" version="5.x" />

The `SubNavigationPosition::Top` option renders the sub-navigation as tabs above the page content:

<AutoScreenshot name="panels/resources/sub-navigation-top" alt="Resource with top sub-navigation position" version="5.x" />

## Deleting resource pages

If you'd like to delete a page from your resource, you can just delete the page file from the `Pages` directory of your resource, and its entry in the `getPages()` method.

For example, you may have a resource with records that may not be created by anyone. Delete the `Create` page file, and then remove it from `getPages()`:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getPages(): array
{
    return [
        'index' => ListCustomers::route('/'),
        'edit' => EditCustomer::route('/{record}/edit'),
    ];
}
```

Deleting a page will not delete any actions that link to that page. Any actions will open a modal instead of sending the user to the non-existent page. For instance, the `CreateAction` on the List page, the `EditAction` on the table or View page, or the `ViewAction` on the table or Edit page. If you want to remove those buttons, you must delete the actions as well.

## Security

## Authorization

For authorization, Filament will observe any [model policies](https://laravel.com/docs/authorization#creating-policies) that are registered in your app. The following methods are used:

* `viewAny()` is used to completely hide resources from the navigation menu, and prevents the user from accessing any pages.
* `create()` is used to control [creating new records](./creating-records).
* `update()` is used to control [editing a record](./editing-records).
* `view()` is used to control [viewing a record](./viewing-records).
* `delete()` is used to prevent a single record from being deleted. `deleteAny()` is used to prevent records from being bulk deleted. Filament uses the `deleteAny()` method because iterating through multiple records and checking the `delete()` policy is not very performant. When using a `DeleteBulkAction`, if you want to call the `delete()` method for each record anyway, you should use the `DeleteBulkAction::make()->authorizeIndividualRecords()` method. Any records that fail the authorization check will not be processed.
* `forceDelete()` is used to prevent a single soft-deleted record from being force-deleted. `forceDeleteAny()` is used to prevent records from being bulk force-deleted. Filament uses the `forceDeleteAny()` method because iterating through multiple records and checking the `forceDelete()` policy is not very performant. When using a `ForceDeleteBulkAction`, if you want to call the `forceDelete()` method for each record anyway, you should use the `ForceDeleteBulkAction::make()->authorizeIndividualRecords()` method. Any records that fail the authorization check will not be processed.
* `restore()` is used to prevent a single soft-deleted record from being restored. `restoreAny()` is used to prevent records from being bulk restored. Filament uses the `restoreAny()` method because iterating through multiple records and checking the `restore()` policy is not very performant. When using a `RestoreBulkAction`, if you want to call the `restore()` method for each record anyway, you should use the `RestoreBulkAction::make()->authorizeIndividualRecords()` method. Any records that fail the authorization check will not be processed.
* `reorder()` is used to control [reordering records in a table](./listing-records#reordering-records).

### Skipping authorization

If you'd like to skip authorization for a resource, you may set the `$shouldSkipAuthorization` property to `true`:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $shouldSkipAuthorization = true;
```

### Protecting model attributes

Filament will expose all model attributes to JavaScript, except if they are `$hidden` on your model. This is Livewire's behavior for model binding. We preserve this functionality to facilitate the dynamic addition and removal of form fields after they are initially loaded, while preserving the data they may need.

<Danger>
  While attributes may be visible in JavaScript, only those with a form field are actually editable by the user. This is not an issue with mass assignment.
</Danger>

To remove certain attributes from JavaScript on the Edit and View pages, you may override [the `mutateFormDataBeforeFill()` method](./editing-records#customizing-data-before-filling-the-form):

```php theme={"theme":"gruvbox-dark-hard"}
protected function mutateFormDataBeforeFill(array $data): array
{
    unset($data['is_admin']);

    return $data;
}
```

In this example, we remove the `is_admin` attribute from JavaScript, as it's not being used by the form.

<EditOnGitHub version="5.x" path="docs/03-resources/01-overview.md" />

<Footer />
