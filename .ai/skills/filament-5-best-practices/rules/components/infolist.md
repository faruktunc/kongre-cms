> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Rendering an infolist in a Blade view

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
  Before proceeding, make sure `filament/infolists` is installed in your project. You can check by running:

  ```bash theme={"theme":"gruvbox-dark-hard"}
  composer show filament/infolists
  ```

  If it's not installed, consult the [installation guide](../introduction/installation#installing-the-individual-components) and configure the **individual components** according to the instructions.
</Warning>

## Setting up the Livewire component

First, generate a new Livewire component:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:livewire ViewProduct
```

Then, render your Livewire component on the page:

```blade theme={"theme":"gruvbox-dark-hard"}
@livewire('view-product')
```

Alternatively, you can use a full-page Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Livewire\ViewProduct;
use Illuminate\Support\Facades\Route;

Route::get('products/{product}', ViewProduct::class);
```

You must use the `InteractsWithSchemas` trait, and implement the `HasSchemas` interface on your Livewire component class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Livewire\Component;

class ViewProduct extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    // ...
}
```

## Adding the infolist

Next, add a method to the Livewire component which accepts an `$infolist` object, modifies it, and returns it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Schema;

public function productInfolist(Schema $schema): Schema
{
    return $schema
        ->record($this->product)
        ->components([
            // ...
        ]);
}
```

Finally, render the infolist in the Livewire component's view:

```blade theme={"theme":"gruvbox-dark-hard"}
{{ $this->productInfolist }}
```

<Info>
  `filament/infolists` also includes the following packages:

  * `filament/actions`
  * `filament/schemas`
  * `filament/support`

  These packages allow you to use their components within Livewire components.
  For example, if your infolist uses [Actions](../actions), remember to implement the `HasActions` interface and use the `InteractsWithActions` trait on your Livewire component class.

  If you are using any other [Filament components](./overview#package-components) in your infolist, make sure to install and integrate the corresponding package as well.
</Info>

## Passing data to the infolist

You can pass data to the infolist in two ways:

Either pass an Eloquent model instance to the `record()` method of the infolist, to automatically map all the model attributes and relationships to the entries in the infolist's schema:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

public function productInfolist(Schema $schema): Schema
{
    return $schema
        ->record($this->product)
        ->components([
            TextEntry::make('name'),
            TextEntry::make('category.name'),
            // ...
        ]);
}
```

Alternatively, you can pass an array of data to the `state()` method of the infolist, to manually map the data to the entries in the infolist's schema:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

public function productInfolist(Schema $schema): Schema
{
    return $schema
        ->constantState([
            'name' => 'MacBook Pro',
            'category' => [
                'name' => 'Laptops',
            ],
            // ...
        ])
        ->components([
            TextEntry::make('name'),
            TextEntry::make('category.name'),
            // ...
        ]);
}
```

<EditOnGitHub version="5.x" path="docs/12-components/02-infolist.md" />

<Footer />
