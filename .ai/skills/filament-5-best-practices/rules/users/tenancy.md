> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Multi-tenancy

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

Multi-tenancy is a concept where a single instance of an application serves multiple customers. Each customer has their own data and access rules that prevent them from viewing or modifying each other's data. This is a common pattern in SaaS applications. Users often belong to groups of users (often called teams or organizations). Records are owned by the group, and users can be members of multiple groups. This is suitable for applications where users need to collaborate on data.

Multi-tenancy is a very sensitive topic. It's important to understand the security implications of multi-tenancy and how to properly implement it. If implemented partially or incorrectly, data belonging to one tenant may be exposed to another tenant. Filament provides a set of tools to help you implement multi-tenancy in your application, but it is up to you to understand how to use them.

<Warning>
  Filament does not provide any guarantees about the security of your application. It is your responsibility to ensure that your application is secure. Please see the [security](#tenancy-security) section for more information.
</Warning>

## Simple one-to-many tenancy

The term "multi-tenancy" is broad and may mean different things in different contexts. Filament's tenancy system implies that the user belongs to **many** tenants (*organizations, teams, companies, etc.*) and may switch between them.

If your case is simpler and you don't need a many-to-many relationship, then you don't need to set up the tenancy in Filament. You could use [observers](https://laravel.com/docs/eloquent#observers) and [global scopes](https://laravel.com/docs/eloquent#global-scopes) instead.

Let's say you have a database column `users.team_id`, you can scope all records to have the same `team_id` as the user using a [global scope](https://laravel.com/docs/eloquent#global-scopes):

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected static function booted(): void
    {
        static::addGlobalScope('team', function (Builder $query) {
            if (auth()->hasUser()) {
                $query->where('team_id', auth()->user()->team_id);
                // or with a `team` relationship defined:
                $query->whereBelongsTo(auth()->user()->team);
            }
        });
    }
}
```

To automatically set the `team_id` on the record when it's created, you can create an [observer](https://laravel.com/docs/eloquent#observers):

```php theme={"theme":"gruvbox-dark-hard"}
class PostObserver
{
    public function creating(Post $post): void
    {
        if (auth()->hasUser()) {
            $post->team_id = auth()->user()->team_id;
            // or with a `team` relationship defined:
            $post->team()->associate(auth()->user()->team);
        }
    }
}
```

## Setting up tenancy

To set up tenancy, you'll need to specify the "tenant" (like team or organization) model in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Team;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenant(Team::class);
}
```

You'll also need to tell Filament which tenants a user belongs to. You can do this by implementing the `HasTenants` interface on the `App\Models\User` model:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable implements FilamentUser, HasTenants
{
    // ...

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this->teams;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->teams()->whereKey($tenant)->exists();
    }
}
```

In this example, users belong to many teams, so there is a `teams()` relationship. The `getTenants()` method returns the teams that the user belongs to. Filament uses this to list the tenants that the user has access to.

<AutoScreenshot name="panels/tenancy" alt="A panel with multi-tenancy and a tenant switcher" version="5.x" />

For security, you also need to implement the `canAccessTenant()` method of the `HasTenants` interface to prevent users from accessing the data of other tenants by guessing their tenant ID and putting it into the URL.

You'll also want users to be able to [register new teams](#adding-a-tenant-registration-page).

## Adding a tenant registration page

A registration page will allow users to create a new tenant.

When visiting your app after logging in, users will be redirected to this page if they don't already have a tenant.

To set up a registration page, you'll need to create a new page class that extends `Filament\Pages\Tenancy\RegisterTenant`. This is a full-page Livewire component. You can put this anywhere you want, such as `app/Filament/Pages/Tenancy/RegisterTeam.php`:

```php theme={"theme":"gruvbox-dark-hard"}
namespace App\Filament\Pages\Tenancy;

use App\Models\Team;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Schema;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register team';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                // ...
            ]);
    }

    protected function handleRegistration(array $data): Team
    {
        $team = Team::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
```

You may add any [form components](../forms) to the `form()` method, and create the team inside the `handleRegistration()` method.

Now, we need to tell Filament to use this page. We can do this in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Tenancy\RegisterTeam;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantRegistration(RegisterTeam::class);
}
```

<AutoScreenshot name="panels/tenancy/registration" alt="Tenant registration page" version="5.x" />

### Customizing the tenant registration page

You can override any method you want on the base registration page class to make it act as you want. Even the `$view` property can be overridden to use a custom view of your choice.

## Adding a tenant profile page

A profile page will allow users to edit information about the tenant.

To set up a profile page, you'll need to create a new page class that extends `Filament\Pages\Tenancy\EditTenantProfile`. This is a full-page Livewire component. You can put this anywhere you want, such as `app/Filament/Pages/Tenancy/EditTeamProfile.php`:

```php theme={"theme":"gruvbox-dark-hard"}
namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Schemas\Schema;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                // ...
            ]);
    }
}
```

You may add any [form components](../forms) to the `form()` method. They will get saved directly to the tenant model.

Now, we need to tell Filament to use this page. We can do this in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Tenancy\EditTeamProfile;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantProfile(EditTeamProfile::class);
}
```

<AutoScreenshot name="panels/tenancy/profile" alt="Tenant profile page" version="5.x" />

### Customizing the tenant profile page

You can override any method you want on the base profile page class to make it act as you want. Even the `$view` property can be overridden to use a custom view of your choice.

## Accessing the current tenant

Anywhere in the app, you can access the tenant model for the current request using `Filament::getTenant()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Facades\Filament;

$tenant = Filament::getTenant();
```

## Billing

### Using Laravel Spark

Filament provides a billing integration with [Laravel Spark](https://spark.laravel.com). Your users can start subscriptions and manage their billing information.

To install the integration, first [install Spark](https://spark.laravel.com/docs/installation) and configure it for your tenant model.

Now, you can install the Filament billing provider for Spark using Composer:

```bash theme={"theme":"gruvbox-dark-hard"}
composer require filament/spark-billing-provider
```

In the [configuration](../panel-configuration), set Spark as the `tenantBillingProvider()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Billing\Providers\SparkBillingProvider;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantBillingProvider(new SparkBillingProvider());
}
```

Now, you're all good to go! Users can manage their billing by clicking a link in the tenant menu.

### Requiring a subscription

To require a subscription to use any part of the app, you can use the `requiresTenantSubscription()` configuration method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->requiresTenantSubscription();
}
```

Now, users will be redirected to the billing page if they don't have an active subscription.

#### Requiring a subscription for specific resources and pages

Sometimes, you may wish to only require a subscription for certain [resources](../resources/overview) and [custom pages](../navigation/custom-pages) in your app. You can do this by returning `true` from the `isTenantSubscriptionRequired()` method on the resource or page class:

```php theme={"theme":"gruvbox-dark-hard"}
public static function isTenantSubscriptionRequired(Panel $panel): bool
{
    return true;
}
```

If you're using the `requiresTenantSubscription()` configuration method, then you can return `false` from this method to allow access to the resource or page as an exception.

### Writing a custom billing integration

Billing integrations are quite simple to write. You just need a class that implements the `Filament\Billing\Providers\Contracts\Provider` interface. This interface has two methods.

`getRouteAction()` is used to get the route action that should be run when the user visits the billing page. This could be a callback function, or the name of a controller, or a Livewire component - anything that works when using `Route::get()` in Laravel normally. For example, you could put in a simple redirect to your own billing page using a callback function.

`getSubscribedMiddleware()` returns the name of a middleware that should be used to check if the tenant has an active subscription. This middleware should redirect the user to the billing page if they don't have an active subscription.

Here's an example billing provider that uses a callback function for the route action and a middleware for the subscribed middleware:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Http\Middleware\RedirectIfUserNotSubscribed;
use Filament\Billing\Providers\Contracts\BillingProvider;
use Illuminate\Http\RedirectResponse;

class ExampleBillingProvider implements BillingProvider
{
    public function getRouteAction(): string
    {
        return function (): RedirectResponse {
            return redirect('https://billing.example.com');
        };
    }

    public function getSubscribedMiddleware(): string
    {
        return RedirectIfUserNotSubscribed::class;
    }
}
```

### Customizing the billing route slug

You can customize the URL slug used for the billing route using the `tenantBillingRouteSlug()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantBillingRouteSlug('billing');
}
```

## Customizing the tenant menu

The tenant-switching menu is featured in the admin layout. It's fully customizable.

Each menu item is represented by an [action](../actions), and can be customized in the same way. To register new items, you can pass the actions to the `tenantMenuItems()` method of the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Pages\Settings;
use Filament\Actions\Action;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMenuItems([
            Action::make('settings')
                ->url(fn (): string => Settings::getUrl())
                ->icon('heroicon-m-cog-8-tooth'),
            // ...
        ]);
}
```

### Allowing the tenants to be searched

You can use the `searchableTenantMenu()` method in the [configuration](../panel-configuration) to allow the tenants to be searched:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->searchableTenantMenu();
}
```

This is automatically enabled when there are more than 10 tenants in a user's list. You can disable it using `searchableTenantMenu(false)`.

### Customizing the registration link

To customize the [registration](#adding-a-tenant-registration-page) link in the tenant menu, register a new item with the `register` array key, and pass a function that [customizes the action](../actions) object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMenuItems([
            'register' => fn (Action $action) => $action->label('Register new team'),
            // ...
        ]);
}
```

### Customizing the profile link

To customize the user profile link at the start of the tenant menu, register a new item with the `profile` array key, and pass a function that [customizes the action](../actions) object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMenuItems([
            'profile' => fn (Action $action) => $action->label('Edit team profile'),
            // ...
        ]);
}
```

### Customizing the billing link

To customize the billing link in the tenant menu, register a new item with the `profile` array key, and pass a function that [customizes the action](../actions) object:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMenuItems([
            'billing' => fn (Action $action) => $action->label('Manage subscription'),
            // ...
        ]);
}
```

### Conditionally hiding tenant menu items

You can also conditionally hide a tenant menu item by using the `visible()` or `hidden()` methods, passing in a condition to check. Passing a function will defer condition evaluation until the menu is actually being rendered:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('settings')
    ->visible(fn (): bool => auth()->user()->can('manage-team'))
    // or
    ->hidden(fn (): bool => ! auth()->user()->can('manage-team'))
```

### Sending a `POST` HTTP request from a tenant menu item

You can send a `POST` HTTP request from a tenant menu item by passing a URL to the `url()` method, and also using `postToUrl()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;

Action::make('lockSession')
    ->url(fn (): string => route('lock-session'))
    ->postToUrl()
```

### Disabling the tenant switcher

By default, users can switch between tenants using the tenant menu. If you want to keep the tenant menu visible but prevent users from switching tenants, you can use the `tenantSwitcher()` method in the [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantSwitcher(false);
}
```

This keeps the tenant menu visible, showing the current tenant name and any custom menu items, but hides the list of other tenants. This is useful when you want to display tenant information without allowing switching, or when switching should be controlled through other means.

### Hiding the tenant menu

You can hide the tenant menu by using the `tenantMenu(false)`

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMenu(false);
}
```

However, this is a sign that Filament's tenancy feature is not suitable for your project. If each user only belongs to one tenant, you should stick to [simple one-to-many tenancy](#simple-one-to-many-tenancy).

## Setting up avatars

Out of the box, Filament uses [ui-avatars.com](https://ui-avatars.com) to generate avatars based on a user's name. However, if your user model has an `avatar_url` attribute, that will be used instead. To customize how Filament gets a user's avatar URL, you can implement the `HasAvatar` contract:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Model;

class Team extends Model implements HasAvatar
{
    // ...

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }
}
```

The `getFilamentAvatarUrl()` method is used to retrieve the avatar of the current user. If `null` is returned from this method, Filament will fall back to [ui-avatars.com](https://ui-avatars.com).

You can easily swap out [ui-avatars.com](https://ui-avatars.com) for a different service, by creating a new avatar provider. [You can learn how to do this here.](./overview#using-a-different-avatar-provider)

## Configuring the tenant relationships

When creating and listing records associated with a Tenant, Filament needs access to two Eloquent relationships for each resource - an "ownership" relationship that is defined on the resource model class, and a relationship on the tenant model class. By default, Filament will attempt to guess the names of these relationships based on standard Laravel conventions. For example, if the tenant model is `App\Models\Team`, it will look for a `team()` relationship on the resource model class. And if the resource model class is `App\Models\Post`, it will look for a `posts()` relationship on the tenant model class.

### Customizing the ownership relationship name

You can customize the name of the ownership relationship used across all resources at once, using the `ownershipRelationship` argument on the `tenant()` configuration method. In this example, resource model classes have an `owner` relationship defined:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Team;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenant(Team::class, ownershipRelationship: 'owner');
}
```

Alternatively, you can set the `$tenantOwnershipRelationshipName` static property on the resource class, which can then be used to customize the ownership relationship name that is just used for that resource. In this example, the `Post` model class has an `owner` relationship defined:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Resource;

class PostResource extends Resource
{
    protected static ?string $tenantOwnershipRelationshipName = 'owner';

    // ...
}
```

### Customizing the resource relationship name

You can set the `$tenantRelationshipName` static property on the resource class, which can then be used to customize the relationship name that is used to fetch that resource. In this example, the tenant model class has an `blogPosts` relationship defined:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Resource;

class PostResource extends Resource
{
    protected static ?string $tenantRelationshipName = 'blogPosts';

    // ...
}
```

## Configuring the slug attribute

When using a tenant like a team, you might want to add a slug field to the URL rather than the team's ID. You can do that with the `slugAttribute` argument on the `tenant()` configuration method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Team;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenant(Team::class, slugAttribute: 'slug');
}
```

## Configuring the name attribute

By default, Filament will use the `name` attribute of the tenant to display its name in the app. To change this, you can implement the `HasName` contract:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;

class Team extends Model implements HasName
{
    // ...

    public function getFilamentName(): string
    {
        return "{$this->name} {$this->subscription_plan}";
    }
}
```

The `getFilamentName()` method is used to retrieve the name of the current user.

## Setting the current tenant label

Inside the tenant switcher, you may wish to add a small label like "Active team" above the name of the current team. You can do this by implementing the `HasCurrentTenantLabel` method on the tenant model:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\HasCurrentTenantLabel;
use Illuminate\Database\Eloquent\Model;

class Team extends Model implements HasCurrentTenantLabel
{
    // ...

    public function getCurrentTenantLabel(): string
    {
        return 'Active team';
    }
}
```

## Setting the default tenant

When signing in, Filament will redirect the user to the first tenant returned from the `getTenants()` method.

Sometimes, you might wish to change this. For example, you might store which team was last active, and redirect the user to that team instead.

To customize this, you can implement the `HasDefaultTenant` contract on the user:

```php theme={"theme":"gruvbox-dark-hard"}
<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasDefaultTenant;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model implements FilamentUser, HasDefaultTenant, HasTenants
{
    // ...

    public function getDefaultTenant(Panel $panel): ?Model
    {
        return $this->latestTeam;
    }

    public function latestTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'latest_team_id');
    }
}
```

## Applying middleware to tenant-aware routes

You can apply extra middleware to all tenant-aware routes by passing an array of middleware classes to the `tenantMiddleware()` method in the [panel configuration file](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMiddleware([
            // ...
        ]);
}
```

By default, middleware will be run when the page is first loaded, but not on subsequent Livewire AJAX requests. If you want to run middleware on every request, you can make it persistent by passing `true` as the second argument to the `tenantMiddleware()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMiddleware([
            // ...
        ], isPersistent: true);
}
```

## Adding a tenant route prefix

By default the URL structure will put the tenant ID or slug immediately after the panel path. If you wish to prefix it with another URL segment, use the `tenantRoutePrefix()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Team;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->path('admin')
        ->tenant(Team::class)
        ->tenantRoutePrefix('team');
}
```

Before, the URL structure was `/admin/1` for tenant 1. Now, it is `/admin/team/1`.

## Using a domain to identify the tenant

When using a tenant, you might want to use domain or subdomain routing like `team1.example.com/posts` instead of a route prefix like `/team1/posts` . You can do that with the `tenantDomain()` method, alongside the `tenant()` configuration method. The `tenant` argument corresponds to the slug attribute of the tenant model:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Team;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenant(Team::class, slugAttribute: 'slug')
        ->tenantDomain('{tenant:slug}.example.com');
}
```

In the above examples, the tenants live on subdomains of the main app domain. You may also set the system up to resolve the entire domain from the tenant as well:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Team;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenant(Team::class, slugAttribute: 'domain')
        ->tenantDomain('{tenant:domain}');
}
```

In this example, the `domain` attribute should contain a valid domain host, like `example.com` or `subdomain.example.com`.

<Info>
  When using a parameter for the entire domain (`tenantDomain('{tenant:domain}')`), Filament will register a [global route parameter pattern](https://laravel.com/docs/routing#parameters-global-constraints) for all `tenant` parameters in the application to be `[a-z0-9.\-]+`. This is because Laravel does not allow the `.` character in route parameters by default. This might conflict with other panels using tenancy, or other parts of your application that use a `tenant` route parameter.
</Info>

## Disabling tenancy for a resource

By default, all resources within a panel with tenancy will be scoped to the current tenant. If you have resources that are shared between tenants, you can disable tenancy for them by setting the `$isScopedToTenant` static property to `false` on the resource class:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $isScopedToTenant = false;
```

### Disabling tenancy for all resources

If you wish to opt-in to tenancy for each resource instead of opting-out, you can call `Resource::scopeToTenant(false)` inside a service provider's `boot()` method or a middleware:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Resource;

Resource::scopeToTenant(false);
```

Now, you can opt-in to tenancy for each resource by setting the `$isScopedToTenant` static property to `true` on a resource class:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $isScopedToTenant = true;
```

## Tenancy security

It's important to understand the security implications of multi-tenancy and how to properly implement it. If implemented partially or incorrectly, data belonging to one tenant may be exposed to another tenant. Filament provides a set of tools to help you implement multi-tenancy in your application, but it is up to you to understand how to use them. Filament does not provide any guarantees about the security of your application. It is your responsibility to ensure that your application is secure.

Below is a list of features that Filament provides to help you implement multi-tenancy in your application:

* Automatic global scoping of Eloquent model queries for [tenant-aware](#disabling-tenancy-for-a-resource) resources that belong to the panel with tenancy enabled. The query used to fetch records for a resource is automatically scoped to the current tenant. This query is used to render the resource's list table, and is also used to resolve records from the current URL when editing or viewing a record. This means that if a user attempts to view a record that does not belong to the current tenant, they will receive a 404 error.
  * A [tenant-aware](#disabling-tenancy-for-a-resource) resource has to exist in the panel with tenancy enabled for the resource's model to have the global scope applied. If you want to scope the queries for a model that does not have a corresponding resource, you must [use middleware to apply additional global scopes](#using-tenant-aware-middleware-to-apply-additional-global-scopes) for that model.
  * The global scopes are applied after the tenant has been identified from the request. This happens during the middleware stack of panel requests. If you make a query before the tenant has been identified, such as from early middleware in the stack or in a service provider, the query will not be scoped to the current tenant. To guarantee that middleware runs after the current tenant is identified, you should register it as [tenant middleware](#applying-middleware-to-tenant-aware-routes).
  * As per the point above, queries made outside the panel with tenancy enabled do not have access to the current tenant, so are not scoped. If in doubt, please check if your queries are properly scoped or not before deploying your application.
  * If you need to disable the tenancy global scope for a specific query, you can use the `withoutGlobalScope(filament()->getTenancyScopeName())` method on the query.
  * If any of your queries disable all global scopes, the tenancy global scope will be disabled as well. You should be careful when using this method, as it can lead to data leakage. If you need to disable all global scopes except the tenancy global scope, you can use the `withoutGlobalScopes()` method passing an array of the global scopes you want to disable.

* Automatic association of newly created Eloquent models with the current tenant. When a new record is created for a [tenant-aware](#disabling-tenancy-for-a-resource) resource, the tenant is automatically associated with the record. This means that the record will belong to the current tenant, as the foreign key column is automatically set to the tenant's ID. This is done by Filament registering an event listener for the `creating` and `created` events on the resource's Eloquent model.
  * A [tenant-aware](#disabling-tenancy-for-a-resource) resource has to exist in the panel with tenancy enabled for the resource's model to have the automatic association to happen. If you want automatic association for a model that does not have a corresponding resource, you must [register a listener for the `creating` event](https://laravel.com/docs/eloquent#events) for that model, and associate the `filament()->getTenant()` with it.
  * The events run after the tenant has been identified from the request. This happens during the middleware stack of panel requests. If you create a model before the tenant has been identified, such as from early middleware in the stack or in a service provider, it will not be associated with the current tenant. To guarantee that middleware runs after the current tenant is identified, you should register it as [tenant middleware](#applying-middleware-to-tenant-aware-routes).
  * As per the point above, models created outside the panel with tenancy enabled do not have access to the current tenant, so are not associated. If in doubt, please check if your models are properly associated or not before deploying your application.
  * If you need to disable the automatic association for a particular model, you can [mute the events](https://laravel.com/docs/eloquent#muting-events) temporarily while you create it. If any of your code currently does this or removes event listeners permanently, you should check this is not affecting the tenancy feature.

### `unique` and `exists` validation

Laravel's `unique` and `exists` validation rules do not use Eloquent models to query the database by default, so it will not use any global scopes defined on the model, including for multi-tenancy. As such, even if there is a soft-deleted record with the same value in a different tenant, the validation will fail.

If you would like two tenants to have complete data separation, you should use the `scopedUnique()` or `scopedExists()` methods instead, which replace Laravel's `unique` and `exists` implementations with ones that uses the model to query the database, applying any global scopes defined on the model, including for multi-tenancy:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\TextInput;

TextInput::make('email')
    ->scopedUnique()
    // or
    ->scopedExists()
```

For more information, see the [validation documentation](../forms/validation) for [`unique()`](../forms/validation#unique) and [`exists()`](../forms/validation#exists).

### Using tenant-aware middleware to apply additional global scopes

Since only models with resources that exist in the panel are automatically scoped to the current tenant, it might be useful to apply additional tenant scoping to other Eloquent models while they are being used in your panel. This would allow you to forget about scoping your queries to the current tenant, and instead have the scoping applied automatically. To do this, you can create a new middleware class like `ApplyTenantScopes`:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:middleware ApplyTenantScopes
```

Inside the `handle()` method, you can apply any global scopes that you wish:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Author;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ApplyTenantScopes
{
    public function handle(Request $request, Closure $next)
    {
        Author::addGlobalScope(
            'tenant',
            fn (Builder $query) => $query->whereBelongsTo(Filament::getTenant()),
        );

        return $next($request);
    }
}
```

You can now [register this middleware](#applying-middleware-to-tenant-aware-routes) for all tenant-aware routes, and ensure that it is used across all Livewire AJAX requests by making it persistent:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->tenantMiddleware([
            ApplyTenantScopes::class,
        ], isPersistent: true);
}
```

<EditOnGitHub version="5.x" path="docs/07-users/03-tenancy.md" />

<Footer />
