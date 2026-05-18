> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Testing schemas

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

## Filling a form in a test

To fill a form with data, pass the data to `fillForm()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

livewire(CreatePost::class)
    ->fillForm([
        'title' => fake()->sentence(),
        // ...
    ]);
```

> If you have multiple schemas on a Livewire component, you can specify which form you want to fill using `fillForm([...], 'createPostForm')`.

## Testing form field and infolist entry state

To check that a form has data, use `assertSchemaStateSet()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Support\Str;
use function Pest\Livewire\livewire;

it('can automatically generate a slug from the title', function () {
    $title = fake()->sentence();

    livewire(CreatePost::class)
        ->fillForm([
            'title' => $title,
        ])
        ->assertSchemaStateSet([
            'slug' => Str::slug($title),
        ]);
});
```

> If you have multiple schemas on a Livewire component, you can specify which schema you want to check using `assertSchemaStateSet([...], 'createPostForm')`.

You may also find it useful to pass a function to the `assertSchemaStateSet()` method, which allows you to access the form `$state` and perform additional assertions:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Support\Str;
use function Pest\Livewire\livewire;

it('can automatically generate a slug from the title without any spaces', function () {
    $title = fake()->sentence();

    livewire(CreatePost::class)
        ->fillForm([
            'title' => $title,
        ])
        ->assertSchemaStateSet(function (array $state): array {
            expect($state['slug'])
                ->not->toContain(' ');
                
            return [
                'slug' => Str::slug($title),
            ];
        });
});
```

You can return an array from the function if you want Filament to continue to assert the schema state after the function has been run.

## Testing form validation

Use `assertHasFormErrors()` to ensure that data is properly validated in a form:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can validate input', function () {
    livewire(CreatePost::class)
        ->fillForm([
            'title' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});
```

And `assertHasNoFormErrors()` to ensure there are no validation errors:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

livewire(CreatePost::class)
    ->fillForm([
        'title' => fake()->sentence(),
        // ...
    ])
    ->call('create')
    ->assertHasNoFormErrors();
```

> If you have multiple schemas on a Livewire component, you can pass the name of a specific form as the second parameter like `assertHasFormErrors(['title' => 'required'], 'createPostForm')` or `assertHasNoFormErrors([], 'createPostForm')`.

## Testing the existence of a form

To check that a Livewire component has a form, use `assertSchemaExists('form')`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has a form', function () {
    livewire(CreatePost::class)
        ->assertSchemaExists('form');
});
```

> If you have multiple schemas on a Livewire component, you can pass the name of a specific form like `assertSchemaExists('createPostForm')`.

## Testing the existence of form fields

To ensure that a form has a given field, pass the field name to `assertFormFieldExists()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has a title field', function () {
    livewire(CreatePost::class)
        ->assertFormFieldExists('title');
});
```

You may pass a function as an additional argument to assert that a field passes a given "truth test". This is useful for asserting that a field has a specific configuration:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('has a title field', function () {
    livewire(CreatePost::class)
        ->assertFormFieldExists('title', function (TextInput $field): bool {
            return $field->isDisabled();
        });
});
```

To assert that a form does not have a given field, pass the field name to `assertFormFieldDoesNotExist()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('does not have a conditional field', function () {
    livewire(CreatePost::class)
        ->assertFormFieldDoesNotExist('no-such-field');
});
```

> If you have multiple schemas on a Livewire component, you can specify which form you want to check for the existence of the field like `assertFormFieldExists('title', 'createPostForm')`.

## Testing the visibility of form fields

To ensure that a field is visible, pass the name to `assertFormFieldVisible()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('title is visible', function () {
    livewire(CreatePost::class)
        ->assertFormFieldVisible('title');
});
```

Or to ensure that a field is hidden you can pass the name to `assertFormFieldHidden()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('title is hidden', function () {
    livewire(CreatePost::class)
        ->assertFormFieldHidden('title');
});
```

<Tip>
  For both `assertFormFieldHidden()` and `assertFormFieldVisible()` you can pass the name of a specific form the field belongs to as the second argument like `assertFormFieldHidden('title', 'createPostForm')`.
</Tip>

## Testing disabled form fields

To ensure that a field is enabled, pass the name to `assertFormFieldEnabled()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('title is enabled', function () {
    livewire(CreatePost::class)
        ->assertFormFieldEnabled('title');
});
```

Or to ensure that a field is disabled you can pass the name to `assertFormFieldDisabled()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('title is disabled', function () {
    livewire(CreatePost::class)
        ->assertFormFieldDisabled('title');
});
```

<Tip>
  For both `assertFormFieldEnabled()` and `assertFormFieldDisabled()` you can pass the name of a specific form the field belongs to as the second argument like `assertFormFieldEnabled('title', 'createPostForm')`.
</Tip>

## Testing other schema components

If you need to check if a particular schema component exists rather than a field, you may use `assertSchemaComponentExists()`.  As components do not have names, this method uses the `key()` provided by the developer:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Section;

Section::make('Comments')
    ->key('comments-section')
    ->schema([
        //
    ])
```

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('comments section exists', function () {
    livewire(EditPost::class)
        ->assertSchemaComponentExists('comments-section');
});
```

To assert that a schema does not have a given component, pass the component key to `assertSchemaComponentDoesNotExist()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('does not have a conditional component', function () {
    livewire(CreatePost::class)
        ->assertSchemaComponentDoesNotExist('no-such-section');
});
```

To check if the component exists and passes a given truth test, you can pass a function to the `checkComponentUsing` argument of `assertSchemaComponentExists()`, returning true or false if the component passes the test or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Section;

use function Pest\Livewire\livewire;

test('comments section has heading', function () {
    livewire(EditPost::class)
        ->assertSchemaComponentExists(
            'comments-section',
            checkComponentUsing: function (Section $component): bool {
                return $component->getHeading() === 'Comments';
            },
        );
});
```

If you want more informative test results, you can embed an assertion within your truth test callback:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Section;
use Illuminate\Testing\Assert;

use function Pest\Livewire\livewire;

test('comments section is enabled', function () {
    livewire(EditPost::class)
        ->assertSchemaComponentExists(
            'comments-section',
            checkComponentUsing: function (Section $component): bool {
                Assert::assertTrue(
                    $component->isEnabled(),
                    'Failed asserting that comments-section is enabled.',
                );

                return true;
            },
        );
});
```

### Testing the visibility of schema components

To ensure that a schema component is visible, pass the key to `assertSchemaComponentVisible()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('comments section is visible', function () {
    livewire(EditPost::class)
        ->assertSchemaComponentVisible('comments-section');
});
```

Or to ensure that a schema component is hidden you can pass the key to `assertSchemaComponentHidden()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

test('comments section is hidden', function () {
    livewire(EditPost::class)
        ->assertSchemaComponentHidden('comments-section');
});
```

<Tip>
  For both `assertSchemaComponentHidden()` and `assertSchemaComponentVisible()` you can pass the name of a specific schema the component belongs to as the second argument like `assertSchemaComponentHidden('comments-section', 'createPostForm')`.
</Tip>

## Testing repeaters

Internally, repeaters generate UUIDs for items to keep track of them in the Livewire HTML easier. This means that when you are testing a form with a repeater, you need to ensure that the UUIDs are consistent between the form and the test. This can be tricky, and if you don't do it correctly, your tests can fail as the tests are expecting a UUID, not a numeric key.

However, since Livewire doesn't need to keep track of the UUIDs in a test, you can disable the UUID generation and replace them with numeric keys, using the `Repeater::fake()` method at the start of your test:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use function Pest\Livewire\livewire;

$undoRepeaterFake = Repeater::fake();

livewire(EditPost::class, ['record' => $post])
    ->assertSchemaStateSet([
        'quotes' => [
            [
                'content' => 'First quote',
            ],
            [
                'content' => 'Second quote',
            ],
        ],
        // ...
    ]);

$undoRepeaterFake();
```

You may also find it useful to test the number of items in a repeater by passing a function to the `assertSchemaStateSet()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Repeater;
use function Pest\Livewire\livewire;

$undoRepeaterFake = Repeater::fake();

livewire(EditPost::class, ['record' => $post])
    ->assertSchemaStateSet(function (array $state) {
        expect($state['quotes'])
            ->toHaveCount(2);
    });

$undoRepeaterFake();
```

### Testing repeater actions

In order to test that repeater actions are working as expected, you can utilize the `callFormComponentAction()` method to call your repeater actions and then [perform additional assertions](../testing#actions).

To interact with an action on a particular repeater item, you need to pass in the `item` argument with the key of that repeater item. If your repeater is reading from a relationship, you should prefix the ID (key) of the related record with `record-` to form the key of the repeater item:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Quote;
use Filament\Forms\Components\Repeater;
use function Pest\Livewire\livewire;

$quote = Quote::first();

livewire(EditPost::class, ['record' => $post])
    ->callAction(TestAction::make('sendQuote')->schemaComponent('quotes')->arguments([
        'item' => "record-{$quote->getKey()}",
    ]))
    ->assertNotified('Quote sent!');
```

## Testing builders

Internally, builders generate UUIDs for items to keep track of them in the Livewire HTML easier. This means that when you are testing a form with a builder, you need to ensure that the UUIDs are consistent between the form and the test. This can be tricky, and if you don't do it correctly, your tests can fail as the tests are expecting a UUID, not a numeric key.

However, since Livewire doesn't need to keep track of the UUIDs in a test, you can disable the UUID generation and replace them with numeric keys, using the `Builder::fake()` method at the start of your test:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;
use function Pest\Livewire\livewire;

$undoBuilderFake = Builder::fake();

livewire(EditPost::class, ['record' => $post])
    ->assertSchemaStateSet([
        'content' => [
            [
                'type' => 'heading',
                'data' => [
                    'content' => 'Hello, world!',
                    'level' => 'h1',
                ],
            ],
            [
                'type' => 'paragraph',
                'data' => [
                    'content' => 'This is a test post.',
                ],
            ],
        ],
        // ...
    ]);

$undoBuilderFake();
```

You may also find it useful to access test the number of items in a repeater by passing a function to the `assertSchemaStateSet()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;
use function Pest\Livewire\livewire;

$undoBuilderFake = Builder::fake();

livewire(EditPost::class, ['record' => $post])
    ->assertSchemaStateSet(function (array $state) {
        expect($state['content'])
            ->toHaveCount(2);
    });

$undoBuilderFake();
```

## Testing wizards

To go to a wizard's next step, use `goToNextWizardStep()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('moves to next wizard step', function () {
    livewire(CreatePost::class)
        ->goToNextWizardStep()
        ->assertHasFormErrors(['title']);
});
```

You can also go to the previous step by calling `goToPreviousWizardStep()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('moves to next wizard step', function () {
    livewire(CreatePost::class)
        ->goToPreviousWizardStep()
        ->assertHasFormErrors(['title']);
});
```

If you want to go to a specific step, use `goToWizardStep()`, then the `assertWizardCurrentStep` method which can ensure you are on the desired step without validation errors from the previous:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('moves to the wizards second step', function () {
    livewire(CreatePost::class)
        ->goToWizardStep(2)
        ->assertWizardCurrentStep(2);
});
```

If you have multiple schemas on a single Livewire component, any of the wizard test helpers can accept a `schema` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('moves to next wizard step only for fooForm', function () {
    livewire(CreatePost::class)
        ->goToNextWizardStep(schema: 'fooForm')
        ->assertHasFormErrors(['title'], schema: 'fooForm');
});
```

<EditOnGitHub version="5.x" path="docs/10-testing/04-testing-schemas.md" />

<Footer />
