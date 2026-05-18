> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Code quality tips

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

## Using schema and table classes

Since many Filament methods define both the UI and the functionality of the app in just one method, it can be easy to end up with giant methods and files. These can be difficult to read, even if your code has a clean and consistent style.

Filament tries to mitigate some of this by providing dedicated schema and table classes when you generate a resource. These classes have a `configure()` method that accepts a `$schema` or `$table`. You can then call the `configure()` method from anywhere you want to define a schema or table.

For example, if you have the following `app/Filament/Resources/Customers/Schemas/CustomerForm.php` file:

```php theme={"theme":"gruvbox-dark-hard"}
namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                // ...
            ]);
    }
}
```

You can use this in the `form()` method of the resource:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Schemas\CustomerForm;
use Filament\Schemas\Schema;

public static function form(Schema $schema): Schema
{
    return CustomerForm::configure($schema);
}
```

You could do the same for the `table()`:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Schemas\CustomersTable;
use Filament\Tables\Table;

public static function table(Table $table): Table
{
    return CustomersTable::configure($table);
}
```

Or the `infolist()`:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Schemas\CustomerInfolist;
use Filament\Schemas\Schema;

public static function infolist(Schema $schema): Schema
{
    return CustomerInfolist::configure($schema);
}
```

These schema and table classes deliberately don't have a parent class or interface by default. If Filament were to enforce a method signature for the `configure()` method, you would not be able to pass your own configuration variables to the method, which could be useful if you wanted to reuse the same class in multiple places but with slight tweaks.

## Using component classes

Even if you are using [schema and table classes](#using-schema-and-table-classes) to keep the schema and table definitions in their own files, you can still end up with a very long `configure()` method. This is especially true if you are using a lot of components in your schema or table, or if the components require a lot of configuration.

You can mitigate this by creating dedicated classes for each component. For example, if you have a `TextInput` component that requires a lot of configuration, you can create a dedicated class for it:

```php theme={"theme":"gruvbox-dark-hard"}
namespace App\Filament\Resources\Customers\Schemas\Components;

use Filament\Forms\Components\TextInput;

class CustomerNameInput
{
    public static function make(): TextInput
    {
        return TextInput::make('name')
            ->label('Full name')
            ->required()
            ->maxLength(255)
            ->placeholder('Enter your full name')
            ->belowContent('This is the name that will be displayed on your profile.');
    }
}
```

You can then use this class in your schema or table:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Schemas\Components\CustomerNameInput;
use Filament\Schemas\Schema;

public static function configure(Schema $schema): Schema
{
    return $schema
        ->components([
            CustomerNameInput::make(),
            // ...
        ]);
}
```

You could do this with a number of different types of component. There are no enforced rules as to how these components should be named or where they should be stored. However, here are some ideas:

* **Schema components**: These could live in the `Schemas/Components` directory of the resource. They could be named after the component they are wrapping, for example `CustomerNameInput` or `CustomerCountrySelect`.
* **Table columns**: These could live in the `Tables/Columns` directory of the resource. They could be named after the column followed by `Column`, for example `CustomerNameColumn` or `CustomerCountryColumn`.
* **Table filters**: These could live in the `Tables/Filters` directory of the resource. They could be named after the filter followed by `Filter`, for example `CustomerCountryFilter` or `CustomerStatusFilter`.
* **Actions**: These could live in the `Actions` directory of the resource. They could be named after the action followed by `Action` or `BulkAction`, for example `EmailCustomerAction` or `UpdateCustomerCountryBulkAction`.

As a further example, here is a potential `EmailCustomerAction` class:

```php theme={"theme":"gruvbox-dark-hard"}
namespace App\Filament\Resources\Customers\Actions;

use App\Models\Customer;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;

class EmailCustomerAction
{
    public static function make(): Action
    {
        return Action::make('email')
            ->label('Send email')
            ->icon(Heroicon::Envelope)
            ->schema([
                TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Textarea::make('body')
                    ->autosize()
                    ->required(),
            ])
            ->action(function (Customer $customer, array $data) {
                // ...
            });
    }
}
```

And you could use it in the `getHeaderActions()` of a page:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Actions\EmailCustomerAction;

protected function getHeaderActions(): array
{
    return [
        EmailCustomerAction::make(),
    ];
}
```

Or you could use it on a table row:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Actions\EmailCustomerAction;
use Filament\Tables\Table;

public static function configure(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->recordActions([
            EmailCustomerAction::make(),
        ]);
}
```

<EditOnGitHub version="5.x" path="docs/03-resources/13-code-quality-tips.md" />

<Footer />
