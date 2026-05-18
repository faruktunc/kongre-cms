> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Testing actions

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

## Calling an action in a test

You can call an action by passing its name or class to `callAction()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can send invoices', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->callAction('send');

    expect($invoice->refresh())
        ->isSent()->toBeTrue();
});
```

## Testing table actions

To test table actions, you can use a `TestAction` object with the `table()` method. This object receives the name of the action you want to test, and replaces the name of the action in any testing method you want to use. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

$invoice = Invoice::factory()->create();

livewire(ListInvoices::class)
    ->callAction(TestAction::make('send')->table($invoice));

livewire(ListInvoices::class)
    ->assertActionVisible(TestAction::make('send')->table($invoice))

livewire(ListInvoices::class)
    ->assertActionExists(TestAction::make('send')->table($invoice))
```

### Testing table header actions

To test a header action, you can use the `table()` method without passing in a specific record to test with:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

livewire(ListInvoices::class)
    ->callAction(TestAction::make('create')->table());

livewire(ListInvoices::class)
    ->assertActionVisible(TestAction::make('create')->table())

livewire(ListInvoices::class)
    ->assertActionExists(TestAction::make('create')->table())
```

### Testing table bulk actions

To test a bulk action, first call `selectTableRecords()` and pass in any records you want to select. Then, use the `TestAction`'s `bulk()` method to specify the action you want to test. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

$invoices = Invoice::factory()->count(3)->create();

livewire(ListInvoices::class)
    ->selectTableRecords($invoices->pluck('id')->toArray())
    ->callAction(TestAction::make('send')->table()->bulk());

livewire(ListInvoices::class)
    ->assertActionVisible(TestAction::make('send')->table()->bulk())

livewire(ListInvoices::class)
    ->assertActionExists(TestAction::make('send')->table()->bulk())
```

## Testing actions in a schema

If an action belongs to a component in a resource's infolist, for example, if it is in the `belowContent()` method of an infolist entry, you can use the `TestAction` object with the `schemaComponent()` method. This object receives the name of the action you want to test and replaces the name of the action in any testing method you want to use. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

$invoice = Invoice::factory()->create();

livewire(EditInvoice::class)
    ->callAction(TestAction::make('send')->schemaComponent('customer_id'));

livewire(EditInvoice::class)
    ->assertActionVisible(TestAction::make('send')->schemaComponent('customer_id'))

livewire(EditInvoice::class)
    ->assertActionExists(TestAction::make('send')->schemaComponent('customer_id'))
```

## Testing actions inside another action's schema / form

If an action belongs to a component in another action's `schema()` (or `form()`), for example, if it is in the `belowContent()` method of a form field in an action modal, you can use the `TestAction` object with the `schemaComponent()` method. This object receives the name of the action you want to test and replaces the name of the action in any testing method you want to use. You should pass an array of `TestAction` objects in order, for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

$invoice = Invoice::factory()->create();

livewire(ManageInvoices::class)
    ->callAction([
        TestAction::make('view')->table($invoice),
        TestAction::make('send')->schemaComponent('customer.name'),
    ]);
    
livewire(ManageInvoices::class)
    ->assertActionVisible([
        TestAction::make('view')->table($invoice),
        TestAction::make('send')->schemaComponent('customer.name'),
    ]);
    
livewire(ManageInvoices::class)
    ->assertActionExists([
        TestAction::make('view')->table($invoice),
        TestAction::make('send')->schemaComponent('customer.name'),
    ]);
```

## Testing resource `getFormActions()`

For details on how to test custom actions in the `getFormActions()` of a resource page, refer to the [Testing resources](./testing-resources#testing-create--edit-page-getformactions) documentation.

## Testing forms in action modals

To pass an array of data into an action, use the `data` parameter:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can send invoices', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->callAction('send', data: [
            'email' => $email = fake()->email(),
        ])
        ->assertHasNoFormErrors();

    expect($invoice->refresh())
        ->isSent()->toBeTrue()
        ->recipient_email->toBe($email);
});
```

If you ever need to only set an action's data without immediately calling it, you can use `fillForm()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can send invoices', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->mountAction('send')
        ->fillForm([
            'email' => $email = fake()->email(),
        ])
});
```

### Testing validation errors in an action modal's form

`assertHasNoFormErrors()` is used to assert that no validation errors occurred when submitting the action form.

To check if a validation error has occurred with the data, use `assertHasFormErrors()`, similar to `assertHasErrors()` in Livewire:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can validate invoice recipient email', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->callAction('send', data: [
            'email' => Str::random(),
        ])
        ->assertHasFormErrors(['email' => ['email']]);
});
```

To check if an action is pre-filled with data, you can use the `assertSchemaStateSet()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can send invoices to the primary contact by default', function () {
    $invoice = Invoice::factory()->create();
    $recipientEmail = $invoice->company->primaryContact->email;

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->mountAction('send')
        ->assertSchemaStateSet([
            'email' => $recipientEmail,
        ])
        ->callMountedAction()
        ->assertHasNoFormErrors();

    expect($invoice->refresh())
        ->isSent()->toBeTrue()
        ->recipient_email->toBe($recipientEmail);
});
```

## Testing the content of an action modal

To assert the content of a modal, you should first mount the action (rather than call it which closes the modal). You can then use `assertMountedActionModalSee()`, `assertMountedActionModalDontSee()`, `assertMountedActionModalSeeHtml()` or `assertMountedActionModalDontSeeHtml()` to assert the modal contains the content that you expect it to:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('confirms the target address before sending', function () {
    $invoice = Invoice::factory()->create();
    $recipientEmail = $invoice->company->primaryContact->email;

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->mountAction('send')
        ->assertMountedActionModalSee($recipientEmail);
});
```

## Testing the existence of an action

To ensure that an action exists or doesn't, you can use the `assertActionExists()` or  `assertActionDoesNotExist()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can send but not unsend invoices', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionExists('send')
        ->assertActionDoesNotExist('unsend');
});
```

You may pass a function as an additional argument to assert that an action passes a given "truth test". This is useful for asserting that an action has a specific configuration:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use function Pest\Livewire\livewire;

it('has the correct description', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionExists('send', function (Action $action): bool {
            return $action->getModalDescription() === 'This will send an email to the customer\'s primary address, with the invoice attached as a PDF';
        });
});
```

## Testing the visibility of an action

To ensure an action is hidden or visible for a user, you can use the `assertActionHidden()` or `assertActionVisible()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can only print invoices', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionHidden('send')
        ->assertActionVisible('print');
});
```

## Testing disabled actions

To ensure an action is enabled or disabled for a user, you can use the `assertActionEnabled()` or `assertActionDisabled()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can only print a sent invoice', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionDisabled('send')
        ->assertActionEnabled('print');
});
```

To ensure sets of actions exist in the correct order, you can use `assertActionListInOrder()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can have actions in order', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionListInOrder(['send', 'export']);
});
```

To check if an action is hidden to a user, you can use the `assertActionHidden()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('can not send invoices', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionHidden('send');
});
```

## Testing the label of an action

To ensure an action has the correct label, you can use `assertActionHasLabel()` and `assertActionDoesNotHaveLabel()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('send action has correct label', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionHasLabel('send', 'Email Invoice')
        ->assertActionDoesNotHaveLabel('send', 'Send');
});
```

## Testing the icon of an action

To ensure an action's button is showing the correct icon, you can use `assertActionHasIcon()` or `assertActionDoesNotHaveIcon()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('when enabled the send button has correct icon', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionEnabled('send')
        ->assertActionHasIcon('send', 'envelope-open')
        ->assertActionDoesNotHaveIcon('send', 'envelope');
});
```

## Testing the color of an action

To ensure that an action's button is displaying the right color, you can use `assertActionHasColor()` or `assertActionDoesNotHaveColor()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('actions display proper colors', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionHasColor('delete', 'danger')
        ->assertActionDoesNotHaveColor('print', 'danger');
});
```

## Testing the URL of an action

To ensure an action has the correct URL, you can use `assertActionHasUrl()`, `assertActionDoesNotHaveUrl()`, `assertActionShouldOpenUrlInNewTab()`, and `assertActionShouldNotOpenUrlInNewTab()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('links to the correct Filament sites', function () {
    $invoice = Invoice::factory()->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->assertActionHasUrl('filament', 'https://filamentphp.com/')
        ->assertActionDoesNotHaveUrl('filament', 'https://github.com/filamentphp/filament')
        ->assertActionShouldOpenUrlInNewTab('filament')
        ->assertActionShouldNotOpenUrlInNewTab('github');
});
```

## Testing action arguments

To test action arguments, you can use a `TestAction` object with the `arguments()` method. This object receives the name of the action you want to test and replaces the name of the action in any testing method you want to use. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

$invoice = Invoice::factory()->create();

livewire(ManageInvoices::class)
    ->callAction(TestAction::make('send')->arguments(['invoice' => $invoice->getKey()]));

livewire(ManageInvoices::class)
    ->assertActionVisible(TestAction::make('send')->arguments(['invoice' => $invoice->getKey()]))

livewire(ManageInvoices::class)
    ->assertActionExists(TestAction::make('send')->arguments(['invoice' => $invoice->getKey()]))
```

## Testing if an action has been halted

To check if an action has been halted, you can use `assertActionHalted()`:

```php theme={"theme":"gruvbox-dark-hard"}
use function Pest\Livewire\livewire;

it('stops sending if invoice has no email address', function () {
    $invoice = Invoice::factory(['email' => null])->create();

    livewire(EditInvoice::class, [
        'invoice' => $invoice,
    ])
        ->callAction('send')
        ->assertActionHalted('send');
});
```

## Using action class names in tests

Filament includes a host of prebuilt actions such as `CreateAction`, `EditAction` and `DeleteAction`, and you can use these class names in your tests instead of action names, for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\CreateAction;
use function Pest\Livewire\livewire;

livewire(ManageInvoices::class)
    ->callAction(CreateAction::class)
```

If you have your own action classes in your app with a `make()` method, the name of your action is not discoverable by Filament unless it runs the `make()` method, which is not efficient. To use your own action class names in your tests, you can add an `#[ActionName]` attribute to your action class, which Filament can use to discover the name of your action. The name passed to the `#[ActionName]` attribute should be the same as the name of the action you would normally use in your tests. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Actions\ActionName;

#[ActionName('send')]
class SendInvoiceAction
{
    public static function make(): Action
    {
        return Action::make('send')
            ->requiresConfirmation()
            ->action(function () {
                // ...
            });
    }
}
```

Now, you can use the class name in your tests:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Invoices\Actions\SendInvoiceAction;
use Filament\Actions\Testing\TestAction;
use function Pest\Livewire\livewire;

$invoice = Invoice::factory()->create();

livewire(ManageInvoices::class)
    ->callAction(TestAction::make(SendInvoiceAction::class)->table($invoice);
```

If you have an action class that extends the `Action` class, you can add a `getDefaultName()` static method to the class, which will be used to discover the name of the action. It also allows users to omit the name of the action from the `make()` method when instantiating it. For example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

class SendInvoiceAction extends Action
{
    public static function getDefaultName(): string
    {
        return 'send';
    }

    protected function setUp(): void
    {
        parent::setUp();
        
        $this
            ->requiresConfirmation()
            ->action(function () {
                // ...
            });
    }
}
```

<EditOnGitHub version="5.x" path="docs/10-testing/05-testing-actions.md" />

<Footer />
