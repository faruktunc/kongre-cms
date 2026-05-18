> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Rendering a table in a Blade view

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

<Warning>
  Before proceeding, make sure `filament/tables` is installed in your project. You can check by running:

  ```bash theme={"theme":"gruvbox-dark-hard"}
  composer show filament/tables
  ```

  If it's not installed, consult the [installation guide](../introduction/installation#installing-the-individual-components) and configure the **individual components** according to the instructions.
</Warning>

## Setting up the Livewire component

First, generate a new Livewire component:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:livewire ListProducts
```

Then, render your Livewire component on the page:

```blade theme={"theme":"gruvbox-dark-hard"}
@livewire('list-products')
```

Alternatively, you can use a full-page Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Livewire\ListProducts;
use Illuminate\Support\Facades\Route;

Route::get('products', ListProducts::class);
```

## Adding the table

There are 3 tasks when adding a table to a Livewire component class:

1. Implement the `HasTable` and `HasSchemas` interfaces, and use the `InteractsWithTable` and `InteractsWithSchemas` traits.
2. Add a `table()` method, which is where you configure the table. [Add the table's columns, filters, and actions](../tables/overview#columns).
3. Make sure to define the base query that will be used to fetch rows in the table. For example, if you're listing products from your `Product` model, you will want to return `Product::query()`.

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Livewire;

use App\Models\Shop\Product;
use Filament\Actions\Concerns\InteractsWithActions;  
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListProducts extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithSchemas;
    use InteractsWithTable;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query())
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([
                // ...
            ])
            ->recordActions([
                // ...
            ])
            ->toolbarActions([
                // ...
            ]);
    }
    
    public function render(): View
    {
        return view('livewire.list-products');
    }
}
```

Finally, in your Livewire component's view, render the table:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    {{ $this->table }}
</div>
```

Visit your Livewire component in the browser, and you should see the table.

<Info>
  `filament/tables` also includes the following packages:

  * `filament/actions`
  * `filament/forms`
  * `filament/support`

  These packages allow you to use their components within Livewire components.
  For example, if your table uses [Actions](./action#setting-up-the-livewire-component), remember to implement the `HasActions` interface and include the `InteractsWithActions` trait.

  If you are using any other [Filament components](./overview#package-components) in your table, make sure to install and integrate the corresponding package as well.
</Info>

## Building a table for an Eloquent relationship

If you want to build a table for an Eloquent relationship, you can use the `relationship()` and `inverseRelationship()` methods on the `$table` instead of passing a `query()`. `HasMany`, `HasManyThrough`, `BelongsToMany`, `MorphMany` and `MorphToMany` relationships are compatible:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Category;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

public Category $category;

public function table(Table $table): Table
{
    return $table
        ->relationship(fn (): BelongsToMany => $this->category->products())
        ->inverseRelationship('categories')
        ->columns([
            TextColumn::make('name'),
        ]);
}
```

In this example, we have a `$category` property which holds a `Category` model instance. The category has a relationship named `products`. We use a function to return the relationship instance. This is a many-to-many relationship, so the inverse relationship is called `categories`, and is defined on the `Product` model. We just need to pass the name of this relationship to the `inverseRelationship()` method, not the whole instance.

Now that the table is using a relationship instead of a plain Eloquent query, all actions will be performed on the relationship instead of the query. For example, if you use a [`CreateAction`](../actions/create), the new product will be automatically attached to the category.

If your relationship uses a pivot table, you can use all pivot columns as if they were normal columns on your table, as long as they are listed in the `withPivot()` method of the relationship *and* inverse relationship definition.

Relationship tables are used in the Panel Builder as ["relation managers"](../resources/managing-relationships#creating-a-relation-manager). Most of the documented features for relation managers are also available for relationship tables. For instance, [attaching and detaching](../resources/managing-relationships#attaching-and-detaching-records) and [associating and dissociating](../resources/managing-relationships#associating-and-dissociating-records) actions.

## Generating table Livewire components with the CLI

It's advised that you learn how to set up a Livewire component with the Table Builder manually, but once you are confident, you can use the CLI to generate a table for you.

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:livewire-table Products/ListProducts
```

This will ask you for the name of a prebuilt model, for example `Product`. Finally, it will generate a new `app/Livewire/Products/ListProducts.php` component, which you can customize.

### Automatically generating table columns

Filament is also able to guess which table columns you want in the table, based on the model's database columns. You can use the `--generate` flag when generating your table:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:livewire-table Products/ListProducts --generate
```

<EditOnGitHub version="5.x" path="docs/12-components/02-table.md" />

<Footer />
