> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Deploying to production

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

Deploying a Laravel app using Filament to production is similar to deploying any other Laravel app. However, there are a few additional steps you should take to ensure that your Filament panel is optimized for performance and security.

For tips focused on local development performance, see [Optimizing local development](./introduction/optimizing-local-development).

## Ensure that users are authorized to access panels

When Filament detects that your app's `APP_ENV` is not `local`, it will require you to set up authorization for your users. This is to ensure that only authorized users can access your Filament panel in production, while keeping the local environment easy to get started with.

To authorize users to access a panel, you should follow the [guide in the users section](./users/overview#authorizing-access-to-the-panel).

<Warning>
  If you do not follow these steps and your user model does not implement the `FilamentUser` interface, no users will be able to sign in to your panel in production.
</Warning>

## Improving Filament panel performance

### Optimizing Filament for production

To optimize Filament for production, you should run the following command in your deployment script:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan filament:optimize
```

This command will [cache the Filament components](#caching-filament-components) and additionally the [Blade Icons](#caching-blade-icons), which can significantly improve the performance of your Filament panels. This command is a shorthand for the commands `php artisan filament:cache-components` and `php artisan icons:cache`.

To clear the caches at once, you can run:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan filament:optimize-clear
```

#### Caching Filament components

If you're not using the [`filament:optimize` command](#optimizing-filament-for-production), you may wish to consider running `php artisan filament:cache-components` in your deployment script, especially if you have large numbers of components (resources, pages, widgets, relation managers, custom Livewire components, etc.). This will create cache files in the `bootstrap/cache/filament` directory of your application, which contain indexes for each type of component. This can significantly improve the performance of Filament in some apps, as it reduces the number of files that need to be scanned and auto-discovered for components.

However, if you are actively developing your app locally, you should avoid using this command, as it will prevent any new components from being discovered until the cache is cleared or rebuilt.

You can clear the cache at any time without rebuilding it by running `php artisan filament:clear-cached-components`.

#### Caching Blade Icons

If you're not using the [`filament:optimize` command](#optimizing-filament-for-production), you may wish to consider running `php artisan icons:cache` locally, and also in your deployment script. This is because Filament uses the [Blade Icons](https://blade-ui-kit.com/blade-icons) package, which can be much more performant when cached.

### Enabling OPcache on your server

To check if [OPcache](https://www.php.net/manual/en/book.opcache.php) is enabled, run:

```bash theme={"theme":"gruvbox-dark-hard"}
php -r "echo 'opcache.enable => ' . ini_get('opcache.enable') . PHP_EOL;"
```

You should see `opcache.enable => 1`. If not, enable it by adding the following line to your `php.ini`:

```ini theme={"theme":"gruvbox-dark-hard"}
opcache.enable=1 # Enable OPcache
```

From the [Laravel Forge documentation](https://forge.laravel.com/docs/servers/php.html#opcache):

<Tip>
  Optimizing the PHP OPcache for production will configure OPcache to store your compiled PHP code in memory to greatly improve performance.
</Tip>

Please use a search engine to find the relevant OPcache setup instructions for your environment.

### Optimizing your Laravel app

You should also consider optimizing your Laravel app for production by running `php artisan optimize` in your deployment script. This will cache the configuration files and routes.

## Ensuring assets are up to date

During the Filament installation process, Filament adds the `php artisan filament:upgrade` command to the `composer.json` file, in the `post-autoload-dump` script. This command will ensure that your assets are up to date whenever you download the package.

We strongly suggest that this script remains in your `composer.json` file, otherwise you may run into issues with missing or outdated assets in your production environment. However, if you must remove it, make sure that the command is run manually in your deployment process.

<EditOnGitHub version="5.x" path="docs/13-deployment.md" />

<Footer />
