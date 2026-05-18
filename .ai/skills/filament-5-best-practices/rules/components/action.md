> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Rendering an action in a Livewire component

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
  Before proceeding, make sure `filament/actions` is installed in your project. You can check by running:

  ```bash theme={"theme":"gruvbox-dark-hard"}
  composer show filament/actions
  ```

  If it's not installed, consult the [installation guide](../introduction/installation#installing-the-individual-components) and configure the **individual components** according to the instructions.
</Warning>

## Setting up the Livewire component

First, generate a new Livewire component:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:livewire ManagePost
```

Then, render your Livewire component on the page:

```blade theme={"theme":"gruvbox-dark-hard"}
@livewire('manage-post')
```

Alternatively, you can use a full-page Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Livewire\ManagePost;
use Illuminate\Support\Facades\Route;

Route::get('posts/{post}/manage', ManagePost::class);
```

You must use the `InteractsWithActions` and `InteractsWithSchemas` traits, and implement the `HasActions` and `HasSchemas` interfaces on your Livewire component class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Livewire\Component;

class ManagePost extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    // ...
}
```

## Adding the action

Add a method that returns your action. The method must share the exact same name as the action, or the name followed by `Action`:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Livewire\Component;

class ManagePost extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Post $post;

    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->color('danger')
            ->requiresConfirmation()
            ->action(fn () => $this->post->delete());
    }
    
    // This method name also works, since the action name is `delete`:
    // public function delete(): Action
    
    // This method name does not work, since the action name is `delete`, not `deletePost`:
    // public function deletePost(): Action

    // ...
}
```

Finally, you need to render the action in your view. To do this, you can use `{{ $this->deleteAction }}`, where you replace `deleteAction` with the name of your action method:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    {{ $this->deleteAction }}

    <x-filament-actions::modals />
</div>
```

You also need `<x-filament-actions::modals />` which injects the HTML required to render action modals. This only needs to be included within the Livewire component once, regardless of how many actions you have for that component.

<Info>
  `filament/actions` also includes the following packages:

  * `filament/forms`
  * `filament/infolists`
  * `filament/notifications`
  * `filament/support`

  These packages allow you to use their components within Livewire components.
  For example, if your action uses [Notifications](./notifications), remember to include `@livewire('notifications')` in your layout and add `@import '../../vendor/filament/notifications/resources/css/index.css'` to your CSS file.

  If you are using any other [Filament components](./overview#package-components) in your action, make sure to install and integrate the corresponding package as well.
</Info>

## Passing action arguments

Sometimes, you may wish to pass arguments to your action. For example, if you're rendering the same action multiple times in the same view, but each time for a different model, you could pass the model ID as an argument, and then retrieve it later. To do this, you can invoke the action in your view and pass in the arguments as an array:

```php theme={"theme":"gruvbox-dark-hard"}
<div>
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>

        {{ ($this->deleteAction)(['post' => $post->id]) }}
    @endforeach

    <x-filament-actions::modals />
</div>
```

Now, you can access the post ID in your action method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

public function deleteAction(): Action
{
    return Action::make('delete')
        ->color('danger')
        ->requiresConfirmation()
        ->action(function (array $arguments) {
            $post = Post::find($arguments['post']);

            $post?->delete();
        });
}
```

## Hiding actions in a Livewire view

If you use `hidden()` or `visible()` to control if an action is rendered, you should wrap the action in an `@if` check for `isVisible()`:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    @if ($this->deleteAction->isVisible())
        {{ $this->deleteAction }}
    @endif
    
    {{-- Or --}}
    
    @if (($this->deleteAction)(['post' => $post->id])->isVisible())
        {{ ($this->deleteAction)(['post' => $post->id]) }}
    @endif
</div>
```

The `hidden()` and `visible()` methods also control if the action is `disabled()`, so they are still useful to protect the action from being run if the user does not have permission. Encapsulating this logic in the `hidden()` or `visible()` of the action itself is good practice otherwise you need to define the condition in the view and in `disabled()`.

You can also take advantage of this to hide any wrapping elements that may not need to be rendered if the action is hidden:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    @if ($this->deleteAction->isVisible())
        <div>
            {{ $this->deleteAction }}
        </div>
    @endif
</div>
```

## Grouping actions in a Livewire view

You may [group actions together into a dropdown menu](../actions/grouping-actions) by using the `<x-filament-actions::group>` Blade component, passing in the `actions` array as an attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    <x-filament-actions::group :actions="[
        $this->editAction,
        $this->viewAction,
        $this->deleteAction,
    ]" />

    <x-filament-actions::modals />
</div>
```

You can also pass in any attributes to customize the appearance of the trigger button and dropdown:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    <x-filament-actions::group
        :actions="[
            $this->editAction,
            $this->viewAction,
            $this->deleteAction,
        ]"
        label="Actions"
        icon="heroicon-m-ellipsis-vertical"
        color="primary"
        size="md"
        tooltip="More actions"
        dropdown-placement="bottom-start"
    />

    <x-filament-actions::modals />
</div>
```

## Chaining actions

You can chain multiple actions together, by calling the `replaceMountedAction()` method to replace the current action with another when it has finished:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Actions\Action;

public function editAction(): Action
{
    return Action::make('edit')
        ->schema([
            // ...
        ])
        // ...
        ->action(function (array $arguments) {
            $post = Post::find($arguments['post']);

            // ...

            $this->replaceMountedAction('publish', $arguments);
        });
}

public function publishAction(): Action
{
    return Action::make('publish')
        ->requiresConfirmation()
        // ...
        ->action(function (array $arguments) {
            $post = Post::find($arguments['post']);

            $post->publish();
        });
}
```

Now, when the first action is submitted, the second action will open in its place. The [arguments](#passing-action-arguments) that were originally passed to the first action get passed to the second action, so you can use them to persist data between requests.

If the first action is canceled, the second one is not opened. If the second action is canceled, the first one has already run and cannot be cancelled.

## Programmatically triggering actions

Sometimes you may need to trigger an action without the user clicking on the built-in trigger button, especially from JavaScript. Here is an example action which could be registered on a Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

public function testAction(): Action
{
    return Action::make('test')
        ->requiresConfirmation()
        ->action(function (array $arguments) {
            dd('Test action called', $arguments);
        });
}
```

You can trigger that action from a click in your HTML using the `wire:click` attribute, calling the `mountAction()` method and optionally passing in any arguments that you want to be available:

```blade theme={"theme":"gruvbox-dark-hard"}
<button wire:click="mountAction('test', { id: 12345 })">
    Button
</button>
```

To trigger that action from JavaScript, you can use the [`$wire` utility](https://livewire.laravel.com/docs/alpine#controlling-livewire-from-alpine-using-wire), passing in the same arguments:

```js theme={"theme":"gruvbox-dark-hard"}
$wire.mountAction('test', { id: 12345 })
```

<EditOnGitHub version="5.x" path="docs/12-components/02-action.md" />

<Footer />
