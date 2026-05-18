> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Rendering a form in a Blade view

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
  Before proceeding, make sure `filament/forms` is installed in your project. You can check by running:

  ```bash theme={"theme":"gruvbox-dark-hard"}
  composer show filament/forms
  ```

  If it's not installed, consult the [installation guide](../introduction/installation#installing-the-individual-components) and configure the **individual components** according to the instructions.
</Warning>

## Setting up the Livewire component

First, generate a new Livewire component:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:livewire CreatePost
```

Then, render your Livewire component on the page:

```blade theme={"theme":"gruvbox-dark-hard"}
@livewire('create-post')
```

Alternatively, you can use a full-page Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;

Route::get('posts/create', CreatePost::class);
```

## Adding the form

<Warning>
  Before proceeding, please ensure that the **Forms package** is installed in your project. Consult the [installation guide](../introduction/installation#installing-the-individual-components) and configure the **individual components** according to the instructions.
</Warning>

There are 5 main tasks when adding a form to a Livewire component class. Each one is essential:

1. Implement the `HasSchemas` interface and use the `InteractsWithSchemas` trait.
2. Define a public Livewire property to store your form's data. In our example, we'll call this `$data`, but you can call it whatever you want.
3. Add a `form()` method, which is where you configure the form. [Add the form's schema](../forms/overview#form-schemas), and tell Filament to store the form data in the `$data` property (using `statePath('data')`).
4. Initialize the form with `$this->form->fill()` in `mount()`. This is imperative for every form that you build, even if it doesn't have any initial data.
5. Define a method to handle the form submission. In our example, we'll call this `create()`, but you can call it whatever you want. Inside that method, you can validate and get the form's data using `$this->form->getState()`. It's important that you use this method instead of accessing the `$this->data` property directly, because the form's data needs to be validated and transformed into a useful format before being returned.

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Livewire;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Illuminate\Contracts\View\View;
use Filament\Schemas\Schema;
use Livewire\Component;

class CreatePost extends Component implements HasSchemas
{
    use InteractsWithSchemas;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                MarkdownEditor::make('content'),
                // ...
            ])
            ->statePath('data');
    }
    
    public function create(): void
    {
        dd($this->form->getState());
    }
    
    public function render(): View
    {
        return view('livewire.create-post');
    }
}
```

Finally, in your Livewire component's view, render the form:

```blade theme={"theme":"gruvbox-dark-hard"}
<div>
    <form wire:submit="create">
        {{ $this->form }}
        
        <button type="submit">
            Submit
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>
```

<Info>
  `<x-filament-actions::modals />` is used to render form component [action modals](../actions/modals). The code can be put anywhere outside the `<form>` element, as long as it's within the Livewire component.
</Info>

Visit your Livewire component in the browser, and you should see the form components from `components()`:

Submit the form with data, and you'll see the form's data dumped to the screen. You can save the data to a model instead of dumping it:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;

public function create(): void
{
    Post::create($this->form->getState());
}
```

<Info>
  `filament/forms` also includes the following packages:

  * `filament/actions`
  * `filament/schemas`
  * `filament/support`

  These packages allow you to use their components within Livewire components.
  For example, if your form uses [Actions](../actions), remember to implement the `HasActions` interface and use the `InteractsWithActions` trait on your Livewire component class.

  If you are using any other [Filament components](./overview#package-components) in your form, make sure to install and integrate the corresponding package as well.
</Info>

## Initializing the form with data

To fill the form with data, just pass that data to the `$this->form->fill()` method. For example, if you're editing an existing post, you might do something like this:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;

public function mount(Post $post): void
{
    $this->form->fill($post->attributesToArray());
}
```

It's important that you use the `$this->form->fill()` method instead of assigning the data directly to the `$this->data` property. This is because the post's data needs to be internally transformed into a useful format before being stored.

## Setting a form model

Giving the `$form` access to a model is useful for a few reasons:

* It allows fields within that form to load information from that model. For example, select fields can [load their options from the database](../forms/select#integrating-with-an-eloquent-relationship) automatically.
* The form can load and save the model's relationship data automatically. For example, you have an Edit Post form, with a [Repeater](../forms/repeater#integrating-with-an-eloquent-relationship) which manages comments associated with that post. Filament will automatically load the comments for that post when you call `$this->form->fill([...])`, and save them back to the relationship when you call `$this->form->getState()`.
* Validation rules like `exists()` and `unique()` can automatically retrieve the database table name from the model.

It is advised to always pass the model to the form when there is one. As explained, it unlocks many new powers of Filament's form system.

To pass the model to the form, use the `$form->model()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Schema;

public Post $post;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            // ...
        ])
        ->statePath('data')
        ->model($this->post);
}
```

### Passing the form model after the form has been submitted

In some cases, the form's model is not available until the form has been submitted. For example, in a Create Post form, the post does not exist until the form has been submitted. Therefore, you can't pass it in to `$form->model()`. However, you can pass a model class instead:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Schemas\Schema;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            // ...
        ])
        ->statePath('data')
        ->model(Post::class);
}
```

On its own, this isn't as powerful as passing a model instance. For example, relationships won't be saved to the post after it is created. To do that, you'll need to pass the post to the form after it has been created, and call `saveRelationships()` to save the relationships to it:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;

public function create(): void
{
    $post = Post::create($this->form->getState());
    
    // Save the relationships from the form to the post after it is created.
    $this->form->model($post)->saveRelationships();
}
```

## Saving form data to individual properties

In all of our previous examples, we've been saving the form's data to the public `$data` property on the Livewire component. However, you can save the data to individual properties instead. For example, if you have a form with a `title` field, you can save the form's data to the `$title` property instead. To do this, don't pass a `statePath()` to the form at all. Ensure that all of your fields have their own **public** properties on the class.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

public ?string $title = null;

public ?string $content = null;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            TextInput::make('title')
                ->required(),
            MarkdownEditor::make('content'),
            // ...
        ]);
}
```

## Using multiple forms

Many forms can be defined using the `InteractsWithSchemas` trait. Each of the forms should use a method with the same name:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

public ?array $postData = [];

public ?array $commentData = [];

public function editPostForm(Schema $schema): Schema
{
    return $schema
        ->components([
            TextInput::make('title')
                ->required(),
            MarkdownEditor::make('content'),
            // ...
        ])
        ->statePath('postData')
        ->model($this->post);
}

public function createCommentForm(Schema $schema): Schema
{
    return $schema
        ->components([
            TextInput::make('name')
                ->required(),
            TextInput::make('email')
                ->email()
                ->required(),
            MarkdownEditor::make('content')
                ->required(),
            // ...
        ])
        ->statePath('commentData')
        ->model(Comment::class);
}
```

Now, each form is addressable by its name instead of `form`. For example, to fill the post form, you can use `$this->editPostForm->fill([...])`, or to get the data from the comment form you can use `$this->createCommentForm->getState()`.

You'll notice that each form has its own unique `statePath()`. Each form will write its state to a different array on your Livewire component, so it's important to define the public properties, `$postData` and `$commentData` in this example.

## Resetting a form's data

You can reset a form back to its default data at any time by calling `$this->form->fill()`. For example, you may wish to clear the contents of a form every time it's submitted:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Comment;

public function createComment(): void
{
    Comment::create($this->form->getState());

    // Reinitialize the form to clear its data.
    $this->form->fill();
}
```

## Generating form Livewire components with the CLI

It's advised that you learn how to set up a Livewire component with forms manually, but once you are confident, you can use the CLI to generate a form for you.

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-livewire-form RegistrationForm
```

This will generate a new `app/Livewire/RegistrationForm.php` component, which you can customize.

### Generating a form for an Eloquent model

Filament is also able to generate forms for a specific Eloquent model. These are more powerful, as they will automatically save the data in the form for you, and [ensure the form fields are properly configured](#setting-a-form-model) to access that model.

When generating a form with the `make:livewire-form` command, it will ask for the name of the model:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-livewire-form Products/CreateProduct
```

#### Generating an edit form for an Eloquent record

By default, passing a model to the `make:livewire-form` command will result in a form that creates a new record in your database. If you pass the `--edit` flag to the command, it will generate an edit form for a specific record. This will automatically fill the form with the data from the record, and save the data back to the model when the form is submitted.

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-livewire-form Products/EditProduct --edit
```

### Automatically generating form schemas

Filament is also able to guess which form fields you want in the schema, based on the model's database columns. You can use the `--generate` flag when generating your form:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-livewire-form Products/CreateProduct --generate
```

<EditOnGitHub version="5.x" path="docs/12-components/02-form.md" />

<Footer />
