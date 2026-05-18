> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Overview

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

## Introduction

Notifications are sent using a `Notification` object that's constructed through a fluent API. Calling the `send()` method on the `Notification` object will dispatch the notification and display it in your application. As the session is used to flash notifications, they can be sent from anywhere in your code, including JavaScript, not just Livewire components.

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Livewire\Component;

class EditPost extends Component
{
    public function save(): void
    {
        // ...

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
```

<AutoScreenshot name="notifications/success" alt="Success notification" version="5.x" />

## Setting a title

The main message of the notification is shown in the title. You can set the title as follows:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->send();
```

The title text can contain basic, safe HTML elements. To generate safe HTML with Markdown, you can use the [`Str::markdown()` helper](https://laravel.com/docs/strings#method-str-markdown): `title(Str::markdown('Saved **successfully**'))`

<Danger>
  Filament's built-in HTML sanitizer permits inline `style` attributes in order to support rich text formatting features such as font colors, text highlighting, and image sizing. This means that CSS properties like `background: url(...)` or `position: fixed` will not be stripped from sanitized HTML. If your content comes from untrusted users, you should consider restricting the default configuration. See the [security documentation](../advanced/security#customizing-the-sanitizer) for details on how to customize the sanitizer.
</Danger>

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .send()
```

## Setting an icon

Optionally, a notification can have an [icon](../styling/icons) that's displayed in front of its content. You may also set a color for the icon, which is gray by default:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->icon('heroicon-o-document-text')
    ->iconColor('success')
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .icon('heroicon-o-document-text')
    .iconColor('success')
    .send()
```

<AutoScreenshot name="notifications/icon" alt="Notification with icon" version="5.x" />

Notifications often have a status like `success`, `warning`, `danger` or `info`. Instead of manually setting the corresponding [icons](../styling/icons) and [colors](../styling/colors), there's a `status()` method which you can pass the status. You may also use the dedicated `success()`, `warning()`, `danger()` and `info()` methods instead. So, cleaning up the above example would look like this:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .send()
```

<AutoScreenshot name="notifications/statuses" alt="Notifications with various statuses" version="5.x" />

## Setting a background color

Notifications have no background color by default. You may want to provide additional context to your notification by setting a color as follows:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->color('success')
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .color('success')
    .send()
```

<AutoScreenshot name="notifications/color" alt="Notification with background color" version="5.x" />

## Setting a duration

By default, notifications are shown for 6 seconds before they're automatically closed. You may specify a custom duration value in milliseconds as follows:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->duration(5000)
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .duration(5000)
    .send()
```

If you prefer setting a duration in seconds instead of milliseconds, you can do so:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->seconds(5)
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .seconds(5)
    .send()
```

You might want some notifications to not automatically close and require the user to close them manually. This can be achieved by making the notification persistent:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->persistent()
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .persistent()
    .send()
```

## Setting body text

Additional notification text can be shown in the `body()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->body('Changes to the post have been saved.')
    ->send();
```

The body text can contain basic, safe HTML elements. To generate safe HTML with Markdown, you can use the [`Str::markdown()` helper](https://laravel.com/docs/strings#method-str-markdown): `body(Str::markdown('Changes to the **post** have been saved.'))`

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .body('Changes to the post have been saved.')
    .send()
```

<AutoScreenshot name="notifications/body" alt="Notification with body text" version="5.x" />

## Adding actions to notifications

Notifications support [Actions](../actions/overview), which are buttons that render below the content of the notification. They can open a URL or dispatch a Livewire event. Actions can be defined as follows:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->body('Changes to the post have been saved.')
    ->actions([
        Action::make('view')
            ->button(),
        Action::make('undo')
            ->color('gray'),
    ])
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .body('Changes to the post have been saved.')
    .actions([
        new FilamentNotificationAction('view')
            .button(),
        new FilamentNotificationAction('undo')
            .color('gray'),
    ])
    .send()
```

<AutoScreenshot name="notifications/actions" alt="Notification with actions" version="5.x" />

You can learn more about how to style action buttons [here](../actions/overview).

### Opening URLs from notification actions

You can open a URL, optionally in a new tab, when clicking on an action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->body('Changes to the post have been saved.')
    ->actions([
        Action::make('view')
            ->button()
            ->url(route('posts.show', $post), shouldOpenInNewTab: true),
        Action::make('undo')
            ->color('gray'),
    ])
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .body('Changes to the post have been saved.')
    .actions([
        new FilamentNotificationAction('view')
            .button()
            .url('/view')
            .openUrlInNewTab(),
        new FilamentNotificationAction('undo')
            .color('gray'),
    ])
    .send()
```

<Danger>
  If you are passing user-controlled data to the `url()` method, you should validate that the URL does not use a dangerous scheme such as `javascript:` or `data:`. Failing to do so could expose your application to XSS attacks.
</Danger>

### Dispatching Livewire events from notification actions

Sometimes you want to execute additional code when a notification action is clicked. This can be achieved by setting a Livewire event which should be dispatched on clicking the action. You may optionally pass an array of data, which will be available as parameters in the event listener on your Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->body('Changes to the post have been saved.')
    ->actions([
        Action::make('view')
            ->button()
            ->url(route('posts.show', $post), shouldOpenInNewTab: true),
        Action::make('undo')
            ->color('gray')
            ->dispatch('undoEditingPost', [$post->id]),
    ])
    ->send();
```

You can also `dispatchSelf` and `dispatchTo`:

```php theme={"theme":"gruvbox-dark-hard"}
Action::make('undo')
    ->color('gray')
    ->dispatchSelf('undoEditingPost', [$post->id])

Action::make('undo')
    ->color('gray')
    ->dispatchTo('another_component', 'undoEditingPost', [$post->id])
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .body('Changes to the post have been saved.')
    .actions([
        new FilamentNotificationAction('view')
            .button()
            .url('/view')
            .openUrlInNewTab(),
        new FilamentNotificationAction('undo')
            .color('gray')
            .dispatch('undoEditingPost'),
    ])
    .send()
```

Similarly, `dispatchSelf` and `dispatchTo` are also available:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotificationAction('undo')
    .color('gray')
    .dispatchSelf('undoEditingPost')

new FilamentNotificationAction('undo')
    .color('gray')
    .dispatchTo('another_component', 'undoEditingPost')
```

### Closing notifications from actions

After opening a URL or dispatching an event from your action, you may want to close the notification right away:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Notifications\Notification;

Notification::make()
    ->title('Saved successfully')
    ->success()
    ->body('Changes to the post have been saved.')
    ->actions([
        Action::make('view')
            ->button()
            ->url(route('posts.show', $post), shouldOpenInNewTab: true),
        Action::make('undo')
            ->color('gray')
            ->dispatch('undoEditingPost', [$post->id])
            ->close(),
    ])
    ->send();
```

Or with JavaScript:

```js theme={"theme":"gruvbox-dark-hard"}
new FilamentNotification()
    .title('Saved successfully')
    .success()
    .body('Changes to the post have been saved.')
    .actions([
        new FilamentNotificationAction('view')
            .button()
            .url('/view')
            .openUrlInNewTab(),
        new FilamentNotificationAction('undo')
            .color('gray')
            .dispatch('undoEditingPost')
            .close(),
    ])
    .send()
```

## Using the JavaScript objects

The JavaScript objects (`FilamentNotification` and `FilamentNotificationAction`) are assigned to `window.FilamentNotification` and `window.FilamentNotificationAction`, so they are available in on-page scripts.

You may also import them in a bundled JavaScript file:

```js theme={"theme":"gruvbox-dark-hard"}
import { Notification, NotificationAction } from '../../vendor/filament/notifications/dist/index.js'


// ...
```

## Closing a notification with JavaScript

Once a notification has been sent, you can close it on demand by dispatching a browser event on the window called `close-notification`.

The event needs to contain the ID of the notification you sent. To get the ID, you can use the `getId()` method on the `Notification` object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

$notification = Notification::make()
    ->title('Hello')
    ->persistent()
    ->send()

$notificationId = $notification->getId()
```

To close the notification, you can dispatch the event from Livewire:

```php theme={"theme":"gruvbox-dark-hard"}
$this->dispatch('close-notification', id: $notificationId);
```

Or from JavaScript, in this case Alpine.js:

```blade theme={"theme":"gruvbox-dark-hard"}
<button x-on:click="$dispatch('close-notification', { id: notificationId })" type="button">
    Close Notification
</button>
```

If you are able to retrieve the notification ID, persist it, and then use it to close the notification, that is the recommended approach, as IDs are generated uniquely, and you will not risk closing the wrong notification. However, if it is not possible to persist the random ID, you can pass in a custom ID when sending the notification:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Notification;

Notification::make('greeting')
    ->title('Hello')
    ->persistent()
    ->send()
```

In this case, you can close the notification by dispatching the event with the custom ID:

```blade theme={"theme":"gruvbox-dark-hard"}
<button x-on:click="$dispatch('close-notification', { id: 'greeting' })" type="button">
    Close Notification
</button>
```

Please be aware that if you send multiple notifications with the same ID, you may experience unexpected side effects, so random IDs are recommended.

## Positioning notifications

You can configure the alignment of the notifications in a service provider or middleware, by calling `Notifications::alignment()` and `Notifications::verticalAlignment()`. You can pass `Alignment::Start`, `Alignment::Center`, `Alignment::End`, `VerticalAlignment::Start`, `VerticalAlignment::Center` or `VerticalAlignment::End`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Notifications\Livewire\Notifications;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;

Notifications::alignment(Alignment::Start);
Notifications::verticalAlignment(VerticalAlignment::End);
```

<AutoScreenshot name="notifications/positioning" alt="Notification positioned at the bottom start of the page" version="5.x" />

<EditOnGitHub version="5.x" path="packages/notifications/docs/01-overview.md" />

<Footer />
