> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Singular resources

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

## Overview

Resources aren't the only way to interact with Eloquent records in a Filament panel. Even though resources may solve many of your requirements, the "index" (root) page of a resource contains a table with a list of records in that resource.

Sometimes there is no need for a table that lists records in a resource. There is only a single record that the user interacts with. If it doesn't yet exist when the user visits the page, it gets created when the form is first submitted by the user to save it. If the record already exists, it is loaded into the form when the page is first loaded, and updated when the form is submitted.

For example, a CMS might have a `Page` Eloquent model and a `PageResource`, but you may also want to create a singular page outside the `PageResource` for editing the "homepage" of the website. This allows the user to directly edit the homepage without having to navigate to the `PageResource` and find the homepage record in the table.

Other examples of this include a "Settings" page, or a "Profile" page for the currently logged-in user. For these use cases, though, we recommend that you use the [Spatie Settings plugin](https://filamentphp.com/plugins/filament-spatie-settings) and the [Profile](../users/overview#authentication-features) features of Filament, which require less code to implement.

<AutoScreenshot name="panels/resources/singular" alt="A singular resource page for managing a homepage" version="5.x" />

## Creating a singular resource

Although there is no specific "singular resource" feature in Filament, it is a highly-requested behavior and can be implemented quite simply using a [custom page](../navigation/custom-pages) with a [form](../forms). This guide will explain how to do this.

Firstly, create a [custom page](../navigation/custom-pages):

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-page ManageHomepage
```

This command will create two files - a page class in the `/Filament/Pages` directory of your resource directory, and a Blade view in the `/filament/pages` directory of the resource views directory.

The page class should contain the following elements:

* A `$data` property, which will hold the current state of the form.
* A `mount()` method, which will load the current record from the database and fill the form with its data. If the record doesn't exist, `null` will be passed to the `fill()` method of the form, which will assign any default values to the form fields.
* A `form()` method, which will define the form schema. The form contains fields in the `components()` method. The `record()` method should be used to specify the record that the form should load relationship data from. The `statePath()` method should be used to specify the name of the property (`$data`) where the form's state should be stored.
* A `save()` method, which will save the form data to the database. The `getState()` method runs form validation and returns valid form data. This method should check if the record already exists, and if not, create a new one. The `wasRecentlyCreated` property of the model can be used to determine if the record was just created, and if so then any relationships should be saved as well. A notification is sent to the user to confirm that the record was saved.
* A `getRecord()` method, while not strictly necessary, is a good idea to have. This method will return the Eloquent record that the form is editing. It can be used across the other methods to avoid code duplication.

```php theme={"theme":"gruvbox-dark-hard"}
namespace App\Filament\Pages;

use App\Models\WebsitePage;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;

/**
 * @property-read Schema $form
 */
class ManageHomepage extends Page
{
    protected string $view = 'filament.pages.manage-homepage';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    RichEditor::make('content'),
                    // ...
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        $record = $this->getRecord();
        
        if (! $record) {
            $record = new WebsitePage();
            $record->is_homepage = true;
        }
        
        $record->fill($data);
        $record->save();
        
        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Saved')
            ->send();
    }
    
    public function getRecord(): ?WebsitePage
    {
        return WebsitePage::query()
            ->where('is_homepage', true)
            ->first();
    }
}
```

The page Blade view should render the form:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::page>
    {{ $this->form }}
</x-filament::page>
```

<EditOnGitHub version="5.x" path="docs/03-resources/09-singular.md" />

<Footer />
