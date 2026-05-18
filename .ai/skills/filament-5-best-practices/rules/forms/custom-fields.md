> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Custom fields

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

Livewire components are PHP classes that have their state stored in the user's browser. When a network request is made, the state is sent to the server, and filled into public properties on the Livewire component class, where it can be accessed in the same way as any other class property in PHP can be.

Imagine you had a Livewire component with a public property called `$name`. You could bind that property to an input field in the HTML of the Livewire component in one of two ways: with the [`wire:model` attribute](https://livewire.laravel.com/docs/properties#data-binding), or by [entangling](https://livewire.laravel.com/docs/javascript#the-wire-object) it with an Alpine.js property:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <input wire:model="name" />
    
    <!-- Or -->
    
    <div x-data="{ state: $wire.$entangle('name') }">
        <input x-model="state" />
    </div>
</x-dynamic-component>
```

When the user types into the input field, the `$name` property is updated in the Livewire component class. When the user submits the form, the `$name` property is sent to the server, where it can be saved.

This is the basis of how fields work in Filament. Each field is assigned to a public property in the Livewire component class, which is where the state of the field is stored. We call the name of this property the "state path" of the field. You can access the state path of a field using the `$getStatePath()` function in the field's view:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <input wire:model="{{ $getStatePath() }}" />

    <!-- Or -->
    
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <input x-model="state" />
    </div>
</x-dynamic-component>
```

If your component heavily relies on third party libraries, we advise that you asynchronously load the Alpine.js component using the Filament asset system. This ensures that the Alpine.js component is only loaded when it's needed, and not on every page load. To find out how to do this, check out our [Assets documentation](../advanced/assets#asynchronous-alpinejs-components).

### Custom field classes

You may create your own custom field classes and views, which you can reuse across your project, and even release as a plugin to the community.

To create a custom field class and view, you may use the following command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-form-field LocationPicker
```

This will create the following component class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';
}
```

It will also create a view file at `resources/views/filament/forms/components/location-picker.blade.php`.

<Info>
  Filament form fields are **not** Livewire components. Defining public properties and methods on a form field class will not make them accessible in the Blade view.
</Info>

## Accessing the state of another component in the Blade view

Inside the Blade view, you may access the state of another component in the schema using the `$get()` function:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    {{ $get('email') }}
</x-dynamic-component>
```

<Tip>
  Unless a form field is [reactive](../forms/overview#the-basics-of-reactivity), the Blade view will not refresh when the value of the field changes, only when the next user interaction occurs that makes a request to the server. If you need to react to changes in a field's value, it should be `live()`.
</Tip>

## Accessing the Eloquent record in the Blade view

Inside the Blade view, you may access the current Eloquent record using the `$record` variable:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    {{ $record->name }}
</x-dynamic-component>
```

## Accessing the current operation in the Blade view

Inside the Blade view, you may access the current operation, usually `create`, `edit` or `view`, using the `$operation` variable:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @if ($operation === 'create')
        This is a new conference.
    @else
        This is an existing conference.
    @endif
</x-dynamic-component>
```

## Accessing the current Livewire component instance in the Blade view

Inside the Blade view, you may access the current Livewire component instance using `$this`:

```blade theme={"theme":"gruvbox-dark-hard"}
@php
    use Filament\Resources\Users\RelationManagers\ConferencesRelationManager;
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @if ($this instanceof ConferencesRelationManager)
        You are editing conferences the of a user.
    @endif
</x-dynamic-component>
```

## Accessing the current field instance in the Blade view

Inside the Blade view, you may access the current field instance using `$field`. You can call public methods on this object to access other information that may not be available in variables:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @if ($field->getState())
        This is a new conference.
    @endif
</x-dynamic-component>
```

## Adding a configuration method to a custom field class

You may add a public method to the custom field class that accepts a configuration value, stores it in a protected property, and returns it again from another public method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';
    
    protected ?float $zoom = null;

    public function zoom(?float $zoom): static
    {
        $this->zoom = $zoom;

        return $this;
    }

    public function getZoom(): ?float
    {
        return $this->zoom;
    }
}
```

Now, in the Blade view for the custom field, you may access the zoom using the `$getZoom()` function:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    {{ $getZoom() }}
</x-dynamic-component>
```

Any public method that you define on the custom field class can be accessed in the Blade view as a variable function in this way.

To pass the configuration value to the custom field class, you may use the public method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Forms\Components\LocationPicker;

LocationPicker::make('location')
    ->zoom(0.5)
```

## Allowing utility injection in a custom field configuration method

[Utility injection](./overview#field-utility-injection) is a powerful feature of Filament that allows users to configure a component using functions that can access various utilities. You can allow utility injection by ensuring that the parameter type and property type of the configuration allows the user to pass a `Closure`. In the getter method, you should pass the configuration value to the `$this->evaluate()` method, which will inject utilities into the user's function if they pass one, or return the value if it is static:

```php theme={"theme":"gruvbox-dark-hard"}
use Closure;
use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';
    
    protected float | Closure | null $zoom = null;

    public function zoom(float | Closure | null $zoom): static
    {
        $this->zoom = $zoom;

        return $this;
    }

    public function getZoom(): ?float
    {
        return $this->evaluate($this->zoom);
    }
}
```

Now, you can pass a static value or a function to the `zoom()` method, and [inject any utility](./overview#component-utility-injection) as a parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Forms\Components\LocationPicker;

LocationPicker::make('location')
    ->zoom(fn (Conference $record): float => $record->isGlobal() ? 1 : 0.5)
```

## Obeying state binding modifiers

When you bind a field to a state path, you may use the `defer` modifier to ensure that the state is only sent to the server when the user submits the form, or whenever the next Livewire request is made. This is the default behavior.

However, you may use the [`live()`](./overview#the-basics-of-reactivity) on a field to ensure that the state is sent to the server immediately when the user interacts with the field. This allows for lots of advanced use cases as explained in the [reactivity](./overview#the-basics-of-reactivity) section of the documentation.

Filament provides a `$applyStateBindingModifiers()` function that you may use in your view to apply any state binding modifiers to a `wire:model` or `$wire.$entangle()` binding:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <input {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}" />

    <!-- Or -->

    <div x-data="{ state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }} }">
        <input x-model="state" />
    </div>
</x-dynamic-component>
```

## Calling field methods from JavaScript

Sometimes you need to call a method on the field class from JavaScript in the Blade view. For example, you might want to fetch data asynchronously, process a file upload, or perform some server-side computation. Filament provides a way to expose methods on your field class to JavaScript using the `#[ExposedLivewireMethod]` attribute.

### Exposing a method

To expose a method to JavaScript, add the `#[ExposedLivewireMethod]` attribute to a public method on your custom field class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Field;
use Filament\Support\Components\Attributes\ExposedLivewireMethod;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';

    #[ExposedLivewireMethod]
    public function geocodeAddress(string $address): array
    {
        // Perform geocoding logic...

        return [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
    }
}
```

<Info>
  Only methods marked with `#[ExposedLivewireMethod]` can be called from JavaScript. This is a security measure to prevent arbitrary method execution.
</Info>

### Calling the method from JavaScript

In your Blade view, you may call the exposed method using `$wire.callSchemaComponentMethod()`. The first argument is the component's key (available via `$getKey()`), and the second argument is the method name. You may pass arguments as a third argument:

```blade theme={"theme":"gruvbox-dark-hard"}
@php
    $key = $getKey();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            address: '',
            coordinates: null,
            async geocode() {
                this.coordinates = await $wire.callSchemaComponentMethod(
                    @js($key),
                    'geocodeAddress',
                    { address: this.address },
                )
            },
        }"
    >
        <input type="text" x-model="address" />
        <button type="button" x-on:click="geocode">Geocode</button>

        <template x-if="coordinates">
            <p x-text="`${coordinates.latitude}, ${coordinates.longitude}`"></p>
        </template>
    </div>
</x-dynamic-component>
```

### Preventing re-renders

By default, calling an exposed method will trigger a re-render of the Livewire component. If your method doesn't need to update the UI, you may add Livewire's `#[Renderless]` attribute alongside `#[ExposedLivewireMethod]` to skip the re-render:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Field;
use Filament\Support\Components\Attributes\ExposedLivewireMethod;
use Livewire\Attributes\Renderless;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';

    #[ExposedLivewireMethod]
    #[Renderless]
    public function geocodeAddress(string $address): array
    {
        // ...
    }
}
```

<EditOnGitHub version="5.x" path="packages/forms/docs/22-custom-fields.md" />

<Footer />
