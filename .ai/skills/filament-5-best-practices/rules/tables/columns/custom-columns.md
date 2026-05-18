> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Custom columns

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

You may create your own custom column classes and views, which you can reuse across your project, and even release as a plugin to the community.

To create a custom column class and view, you may use the following command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-table-column AudioPlayerColumn
```

This will create the following component class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Column;

class AudioPlayerColumn extends Column
{
    protected string $view = 'filament.tables.columns.audio-player-column';
}
```

It will also create a view file at `resources/views/filament/tables/columns/audio-player-column.blade.php`.

<Info>
  Filament table columns are **not** Livewire components. Defining public properties and methods on a table column class will not make them accessible in the Blade view.
</Info>

## Accessing the state of the column in the Blade view

Inside the Blade view, you may access the [state](./overview#column-content-state) of the column using the `$getState()` function:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    {{ $getState() }}
</div>
```

## Accessing the Eloquent record in the Blade view

Inside the Blade view, you may access the current table row's Eloquent record using the `$record` variable:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    {{ $record->name }}
</div>
```

## Accessing the current Livewire component instance in the Blade view

Inside the Blade view, you may access the current Livewire component instance using `$this`:

```blade theme={"theme":"gruvbox-dark-hard"}
@php
    use Filament\Resources\Users\RelationManagers\ConferencesRelationManager;
@endphp

<div>
    @if ($this instanceof ConferencesRelationManager)
        You are editing the conferences of a user.
    @endif
</div>
```

## Accessing the current column instance in the Blade view

Inside the Blade view, you may access the current column instance using `$column`. You can call public methods on this object to access other information that may not be available in variables:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    @if ($column->isLabelHidden())
        This is a new conference.
    @endif
</div>
```

## Adding a configuration method to a custom column class

You may add a public method to the custom column class that accepts a configuration value, stores it in a protected property, and returns it again from another public method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\Column;

class AudioPlayerColumn extends Column
{
    protected string $view = 'filament.tables.columns.audio-player-column';
    
    protected ?float $speed = null;

    public function speed(?float $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getSpeed(): ?float
    {
        return $this->speed;
    }
}
```

Now, in the Blade view for the custom column, you may access the speed using the `$getSpeed()` function:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    {{ $getSpeed() }}
</div>
```

Any public method that you define on the custom column class can be accessed in the Blade view as a variable function in this way.

To pass the configuration value to the custom column class, you may use the public method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Tables\Columns\AudioPlayerColumn;

AudioPlayerColumn::make('recording')
    ->speed(0.5)
```

## Allowing utility injection in a custom column configuration method

[Utility injection](./overview#column-utility-injection) is a powerful feature of Filament that allows users to configure a component using functions that can access various utilities. You can allow utility injection by ensuring that the parameter type and property type of the configuration allows the user to pass a `Closure`. In the getter method, you should pass the configuration value to the `$this->evaluate()` method, which will inject utilities into the user's function if they pass one, or return the value if it is static:

```php theme={"theme":"gruvbox-dark-hard"}
use Closure;
use Filament\Tables\Columns\Column;

class AudioPlayerColumn extends Column
{
    protected string $view = 'filament.tables.columns.audio-player-column';
    
    protected float | Closure | null $speed = null;

    public function speed(float | Closure | null $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getSpeed(): ?float
    {
        return $this->evaluate($this->speed);
    }
}
```

Now, you can pass a static value or a function to the `speed()` method, and [inject any utility](./overview#component-utility-injection) as a parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Tables\Columns\AudioPlayerColumn;

AudioPlayerColumn::make('recording')
    ->speed(fn (Conference $record): float => $record->isGlobal() ? 1 : 0.5)
```

<EditOnGitHub version="5.x" path="packages/tables/docs/02-columns/10-custom-columns.md" />

<Footer />
