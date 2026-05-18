> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Multi-factor authentication

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

Users in Filament can sign in with their email address and password by default. However, you can enable multi-factor authentication (MFA) to add an extra layer of security to your users' accounts.

When MFA is enabled, users must perform an extra step before they are authenticated and have access to the application.

<AutoScreenshot name="panels/mfa-challenge" alt="The multi-factor authentication challenge page" version="5.x" />

Filament includes two methods of MFA which you can enable out of the box:

* [App authentication](#app-authentication) uses a Google Authenticator-compatible app (such as the Google Authenticator, Authy, or Microsoft Authenticator apps) to generate a time-based one-time password (TOTP) that is used to verify the user.
* [Email authentication](#email-authentication) sends a one-time code to the user's email address, which they must enter to verify their identity.

In Filament, users set up multi-factor authentication from their [profile page](./overview#authentication-features). If you use Filament's profile page feature, setting up multi-factor authentication will automatically add the correct UI elements to the profile page:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->profile();
}
```

<AutoScreenshot name="panels/mfa" alt="Multi-factor authentication options on the profile page" version="5.x" />

## App authentication

To enable app authentication in a panel, you must first add a new column to your `users` table (or whichever table is being used for your "authenticatable" Eloquent model in this panel). The column needs to store the secret key used to generate and verify the time-based one-time passwords. It can be a normal `text()` column in a migration:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->text('app_authentication_secret')->nullable();
});
```

In the `User` model, you should implement the `HasAppAuthentication` interface and use the `InteractsWithAppAuthentication` trait which provides the necessary methods to interact with the secret code and other information about the integration:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Auth\MultiFactor\App\Concerns\InteractsWithAppAuthentication;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAppAuthentication, MustVerifyEmail
{
    use InteractsWithAppAuthentication;
    
    // ...
}
```

<Tip>
  Filament provides a default implementation for speed and simplicity, but you could implement the required methods yourself and customize the column name or store the secret in a completely separate table.
</Tip>

Finally, you should activate the app authentication feature in your panel. To do this, use the `multiFactorAuthentication()` method in the [configuration](../panel-configuration), and pass a `AppAuthentication` instance to it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make(),
        ]);
}
```

### Setting up app recovery codes

If your users lose access to their two-factor authentication app, they will be unable to sign in to your application. To prevent this, you can generate a set of recovery codes that users can use to sign in if they lose access to their two-factor authentication app.

In a similar way to the `app_authentication_secret` column, you should add a new column to your `users` table (or whichever table is being used for your "authenticatable" Eloquent model in this panel). The column needs to store the recovery codes. It can be a normal `text()` column in a migration:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->text('app_authentication_recovery_codes')->nullable();
});
```

Next, you should implement the `HasAppAuthenticationRecovery` interface on the `User` model and use the `InteractsWithAppAuthenticationRecovery` trait which provides Filament with the necessary methods to interact with the recovery codes:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Auth\MultiFactor\App\Concerns\InteractsWithAppAuthentication;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthenticationRecovery;
use Filament\Auth\MultiFactor\App\Concerns\InteractsWithAppAuthenticationRecovery;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAppAuthentication, HasAppAuthenticationRecovery, MustVerifyEmail
{
    use InteractsWithAppAuthentication;
    use InteractsWithAppAuthenticationRecovery;
    
    // ...
}
```

<Tip>
  Filament provides a default implementation for speed and simplicity, but you could implement the required methods yourself and customize the column name or store the recovery codes in a completely separate table.
</Tip>

Finally, you should activate the app authentication recovery codes feature in your panel. To do this, pass the `recoverable()` method to the `AppAuthentication` instance in the `multiFactorAuthentication()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make()
                ->recoverable(),
        ]);
}
```

#### Changing the number of recovery codes that are generated

By default, Filament generates 8 recovery codes for each user. If you want to change this, you can use the `recoveryCodeCount()` method on the `AppAuthentication` instance in the `multiFactorAuthentication()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make()
                ->recoverable()
                ->recoveryCodeCount(10),
        ]);
}
```

#### Preventing users from regenerating their recovery codes

By default, users can visit their profile to regenerate their recovery codes. If you want to prevent this, you can use the `regenerableRecoveryCodes(false)` method on the `AppAuthentication` instance in the `multiFactorAuthentication()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make()
                ->recoverable()
                ->regenerableRecoveryCodes(false),
        ]);
}
```

### Changing the app code expiration time

App codes are issued using a time-based one-time password (TOTP) algorithm, which means that they are only valid for a short period of time before and after the time they are generated. The time is defined in a "window" of time. By default, Filament uses an expiration window of `8`, which creates a 4-minute validity period on either side of the generation time (8 minutes in total).

To change the window, for example to only be valid for 2 minutes after it is generated, you can use the `codeWindow()` method on the `AppAuthentication` instance, set to `4`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make()
                ->codeWindow(4),
        ]);
}
```

### Customizing the app authentication brand name

Each app authentication integration has a "brand name" that is displayed in the authentication app. By default, this is the name of your app. If you want to change this, you can use the `brandName()` method on the `AppAuthentication` instance in the `multiFactorAuthentication()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make()
                ->brandName('Filament Demo'),
        ]);
}
```

## Email authentication

Email authentication sends the user one-time codes to their email address, which they must enter to verify their identity.

To enable email authentication in a panel, you must first add a new column to your `users` table (or whichever table is being used for your "authenticatable" Eloquent model in this panel). The column needs to store a boolean indicating whether or not email authentication is enabled:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('users', function (Blueprint $table) {
    $table->boolean('has_email_authentication')->default(false);
});
```

Next, you should implement the `HasEmailAuthentication` interface on the `User` model and use the `InteractsWithEmailAuthentication` trait which provides Filament with the necessary methods to interact with the column that indicates whether or not email authentication is enabled:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\Email\Contracts\HasEmailAuthentication;
use Filament\Auth\MultiFactor\Email\Concerns\InteractsWithEmailAuthentication;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasEmailAuthentication, MustVerifyEmail
{
    use InteractsWithEmailAuthentication;
    
    // ...
}
```

<Tip>
  Filament provides a default implementation for speed and simplicity, but you could implement the required methods yourself and customize the column name or store the value in a completely separate table.
</Tip>

Finally, you should activate the email authentication feature in your panel. To do this, use the `multiFactorAuthentication()` method in the [configuration](../panel-configuration), and pass an `EmailAuthentication` instance to it:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\Email\EmailAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            EmailAuthentication::make(),
        ]);
}
```

### Changing the email code expiration time

Email codes are issued with a lifetime of 4 minutes, after which they expire.

To change the expiration period, for example to only be valid for 2 minutes after codes are generated, you can use the `codeExpiryMinutes()` method on the `EmailAuthentication` instance, set to `2`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\Email\EmailAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            EmailAuthentication::make()
                ->codeExpiryMinutes(2),
        ]);
}
```

## Requiring multi-factor authentication

By default, users are not required to set up multi-factor authentication. You can require users to configure it by passing `isRequired: true` as a parameter to the `multiFactorAuthentication()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->multiFactorAuthentication([
            AppAuthentication::make(),
        ], isRequired: true);
}
```

When this is enabled, users will be prompted to set up multi-factor authentication after they sign in, if they have not already done so.

## Security notes about multi-factor authentication

In Filament, the multi-factor authentication process occurs before the user is actually authenticated into the app. This allows you to be sure that no users can authenticate and access the app without passing the multi-factor authentication step. You do not need to remember to add middleware to any of your authenticated routes to ensure that users completed the multi-factor authentication step.

However, if you have other parts of your Laravel app that authenticate users, please bear in mind that they will not be challenged for multi-factor authentication if they are already authenticated elsewhere and then visit the panel, unless [multi-factor authentication is required](#requiring-multi-factor-authentication) and they have not set it up yet.

<EditOnGitHub version="5.x" path="docs/07-users/02-multi-factor-authentication.md" />

<Footer />
