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

By default, all `App\Models\User`s can access Filament locally. To allow them to access Filament in production, you must take a few extra steps to ensure that only the correct users have access to the app.

<AutoScreenshot name="panels/login" alt="The default login page" version="5.x" />

## Authorizing access to the panel

To set up your `App\Models\User` to access Filament in non-local environments, you must implement the `FilamentUser` contract:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    // ...

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }
}
```

The `canAccessPanel()` method returns `true` or `false` depending on whether the user is allowed to access the `$panel`. In this example, we check if the user's email ends with `@yourdomain.com` and if they have verified their email address.

Since you have access to the current `$panel`, you can write conditional checks for separate panels. For example, only restricting access to the admin panel while allowing all users to access the other panels of your app:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    // ...

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        }

        return true;
    }
}
```

## Authorizing access to Resources

See the [Authorization](../resources/overview#authorization) section in the Resource documentation for controlling access to Resource pages and their data records.

## Setting up user avatars

Out of the box, Filament uses [ui-avatars.com](https://ui-avatars.com) to generate avatars based on a user's name. However, if your user model has an `avatar_url` attribute, that will be used instead. To customize how Filament gets a user's avatar URL, you can implement the `HasAvatar` contract:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    // ...

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }
}
```

The `getFilamentAvatarUrl()` method is used to retrieve the avatar of the current user. If `null` is returned from this method, Filament will fall back to [ui-avatars.com](https://ui-avatars.com).

### Using a different avatar provider

You can easily swap out [ui-avatars.com](https://ui-avatars.com) for a different service, by creating a new avatar provider.

In this example, we create a new file at `app/Filament/AvatarProviders/BoringAvatarsProvider.php` for [boringavatars.com](https://boringavatars.com). The `get()` method accepts a user model instance and returns an avatar URL for that user:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Filament\AvatarProviders;

use Filament\AvatarProviders\Contracts;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class BoringAvatarsProvider implements Contracts\AvatarProvider
{
    public function get(Model | Authenticatable $record): string
    {
        $name = str(Filament::getNameForDefaultAvatar($record))
            ->trim()
            ->explode(' ')
            ->map(fn (string $segment): string => filled($segment) ? mb_substr($segment, 0, 1) : '')
            ->join(' ');

        return 'https://source.boringavatars.com/beam/120/' . urlencode($name);
    }
}
```

Now, register this new avatar provider in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\AvatarProviders\BoringAvatarsProvider;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->defaultAvatarProvider(BoringAvatarsProvider::class);
}
```

## Configuring the user's name attribute

By default, Filament will use the `name` attribute of the user to display their name in the app. To change this, you can implement the `HasName` contract:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasName
{
    // ...

    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
```

The `getFilamentName()` method is used to retrieve the name of the current user.

## Authentication features

You can easily enable authentication features for a panel in the configuration file:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->login()
        ->registration()
        ->passwordReset()
        ->emailVerification()
        ->emailChangeVerification()
        ->profile();
}
```

<AutoScreenshot name="panels/registration" alt="The default registration page" version="5.x" />

<AutoScreenshot name="panels/password-reset" alt="The default password reset page" version="5.x" />

<AutoScreenshot name="panels/profile" alt="The default profile page" version="5.x" />

Filament also supports multi-factor authentication, which you can learn about in the [Multi-factor authentication](./multi-factor-authentication) section.

### Customizing the authentication features

If you'd like to replace these pages with your own, you can pass in any Filament page class to these methods.

Most people will be able to make their desired customizations by extending the base page class from the Filament codebase, overriding methods like `form()`, and then passing the new page class in to the configuration:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Auth\EditProfile;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->profile(EditProfile::class);
}
```

In this example, we will customize the profile page. We need to create a new PHP class at `app/Filament/Pages/Auth/EditProfile.php`:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
```

This class extends the base profile page class from the Filament codebase. Other page classes you could extend include:

* `Filament\Auth\Pages\Login`
* `Filament\Auth\Pages\Register`
* `Filament\Auth\Pages\EmailVerification\EmailVerificationPrompt`
* `Filament\Auth\Pages\PasswordReset\RequestPasswordReset`
* `Filament\Auth\Pages\PasswordReset\ResetPassword`

In the `form()` method of the example, we call methods like `getNameFormComponent()` to get the default form components for the page. You can customize these components as required. For all the available customization options, see the base `EditProfile` page class in the Filament codebase - it contains all the methods that you can override to make changes.

#### Customizing an authentication field without needing to re-define the form

If you'd like to customize a field in an authentication form without needing to define a new `form()` method, you could extend the specific field method and chain your customizations:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Component;

protected function getPasswordFormComponent(): Component
{
    return parent::getPasswordFormComponent()
        ->revealable(false);
}
```

### Email change verification

If you're using the `profile()` feature with the `emailChangeVerification()` feature, users that change their email address from the profile form will be required to verify their new email address before they can log in with it. This is done by sending a verification email to the new address, which contains a link that the user must click to verify their new email address. The email address in the database is not updated until the user clicks the link in the email.

The link that a user is sent is valid for 60 minutes. At the same time as the email to the new address is sent, an email to the old address is also sent, with a link to block the change. This is a security feature to potentially prevent a user from being affected by a malicious actor.

### Using a sidebar on the profile page

By default, the profile page does not use the standard page layout with a sidebar. This is so that it works with the [tenancy](./tenancy) feature, otherwise it would not be accessible if the user had no tenants, since the sidebar links are routed to the current tenant.

If you aren't using [tenancy](./tenancy) in your panel, and you'd like the profile page to use the standard page layout with a sidebar, you can pass the `isSimple: false` parameter to `$panel->profile()` when registering the page:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->profile(isSimple: false);
}
```

### Customizing the authentication route slugs

You can customize the URL slugs used for the authentication routes in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->loginRouteSlug('login')
        ->registrationRouteSlug('register')
        ->passwordResetRoutePrefix('password-reset')
        ->passwordResetRequestRouteSlug('request')
        ->passwordResetRouteSlug('reset')
        ->emailVerificationRoutePrefix('email-verification')
        ->emailVerificationPromptRouteSlug('prompt')
        ->emailVerificationRouteSlug('verify')
        ->emailChangeVerificationRoutePrefix('email-change-verification')
        ->emailChangeVerificationRouteSlug('verify');
}
```

### Setting the authentication guard

To set the authentication guard that Filament uses, you can pass in the guard name to the `authGuard()` [configuration](../panel-configuration) method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->authGuard('web');
}
```

### Setting the password broker

To set the password broker that Filament uses, you can pass in the broker name to the `authPasswordBroker()` [configuration](../panel-configuration) method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->authPasswordBroker('users');
}
```

### Disabling revealable password inputs

By default, all password inputs in authentication forms are [`revealable()`](../forms/text-input#revealable-password-inputs). This allows the user to see a plain text version of the password they're typing by clicking a button. To disable this feature, you can pass `false` to the `revealablePasswords()` [configuration](../panel-configuration) method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->revealablePasswords(false);
}
```

You could also disable this feature on a per-field basis by calling `->revealable(false)` on the field object when [extending the base page class](#customizing-an-authentication-field-without-needing-to-re-define-the-form).

## Setting up guest access to a panel

By default, Filament expects to work with authenticated users only. To allow guests to access a panel, you need to avoid using components which expect a signed-in user (such as profiles, avatars), and remove the built-in Authentication middleware:

* Remove the default `Authenticate::class` from the `authMiddleware()` array in the panel configuration.
* Remove `->login()` and any other [authentication features](#authentication-features) from the panel.
* Remove the default `AccountWidget` from the `widgets()` array, because it reads the current user's data.

### Authorizing guests in policies

When present, Filament relies on [Laravel Model Policies](https://laravel.com/docs/authorization#generating-policies) for access control. To give read-access for [guest users in a model policy](https://laravel.com/docs/authorization#guest-users), create the Policy and update the `viewAny()` and `view()` methods, changing the `User $user` param to `?User $user` so that it's optional, and `return true;`. Alternatively, you can remove those methods from the policy entirely.

<EditOnGitHub version="5.x" path="docs/07-users/01-overview.md" />

<Footer />
