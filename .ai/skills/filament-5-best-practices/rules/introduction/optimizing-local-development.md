> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Optimizing local development

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

This section includes optional tips to optimize performance when running your Filament app locally.

If you're looking for production-specific optimizations, check out [Deploying to production](../deployment).

## Enabling OPcache

[OPcache](https://www.php.net/manual/en/book.opcache.php) improves PHP performance by storing precompiled script bytecode in shared memory, thereby removing the need for PHP to load and parse scripts on each request. This can significantly speed up your local development environment, especially for larger applications.

### Checking OPcache status

To check if [OPcache](https://www.php.net/manual/en/book.opcache.php) is enabled, run:

```bash theme={"theme":"gruvbox-dark-hard"}
php -r "echo 'opcache.enable => ' . ini_get('opcache.enable') . PHP_EOL;"
```

You should see `opcache.enable => 1`. If not, enable it by adding the following line to your `php.ini`:

```ini theme={"theme":"gruvbox-dark-hard"}
opcache.enable=1 # Enable OPcache
```

<Tip>
  To locate your `php.ini` file, run: `php --ini`
</Tip>

### Configuring OPcache settings

If you're experiencing slow response times or suspect that OPcache is running out of space, you can adjust these parameters in your `php.ini` file:

```ini theme={"theme":"gruvbox-dark-hard"}
opcache.memory_consumption=128
opcache.max_accelerated_files=10000
```

<Tip>
  To locate your `php.ini` file, run: `php --ini`
</Tip>

* `opcache.memory_consumption`: defines how much memory (in megabytes) OPcache can use to store precompiled PHP code. You can try setting this to `128` and adjust based on your project's needs.
* `opcache.max_accelerated_files`: sets the maximum number of PHP files that OPcache can cache. You can try `10000` as a starting point and increase if your application includes a large number of files.

These settings are optional but useful if you're troubleshooting performance or working on a large Laravel app.

## Exclude your project folder from antivirus scanning

Issues with the performance of Filament, particularly on Windows, often involve [Microsoft Defender](https://www.microsoft.com/en-us/microsoft-365/microsoft-defender-for-individuals).

Security software, such as realtime file scanners or antivirus tools, can slow down your development environment by scanning files every time they're accessed. This can affect PHP execution, view rendering, and performance in general.

If you're noticing slowness, consider excluding your local project folder from realtime scanning.

Tools like [Microsoft Defender](https://www.microsoft.com/en-us/microsoft-365/microsoft-defender-for-individuals), or similar antivirus solutions, can be configured to skip specific directories. Check your antivirus or security software documentation for instructions on how to exclude specific folders from realtime scanning.

<Warning>
  Only exclude folders from scanning if you fully trust the project and understand the risks.
</Warning>

## Disabling debugging tools

Debugging tools can be very useful for local development, but they can significantly slow down your application when you aren't actively using them. Temporarily disabling these tools when you need maximum performance can make a noticeable difference in your development experience.

### Disabling view debugging in Laravel Herd

[Laravel Herd](https://herd.laravel.com/) includes a view debugging tool for [macOS](https://herd.laravel.com/docs/macos/debugging/dumps#views) and [Windows](https://herd.laravel.com/docs/windows/debugging/dumps#views). It shows which views were rendered and what data was passed to them during a request.

While helpful for debugging, this feature can significantly slow down your app. If you're not actively using it, it's best to turn it off.

To disable view debugging in Herd:

* Open Herd > Dumps.
* Click Settings.
* Uncheck the "Views" option.

### Disabling Debugbar

While useful for debugging, [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) can slow down your application, especially on complex pages, because it collects and renders a large amount of data on each request.

If you're noticing slowness, try disabling it by adding the following line to your `.env` file:

```dotenv theme={"theme":"gruvbox-dark-hard"}
DEBUGBAR_ENABLED=false
```

If you still need Debugbar for development, consider disabling specific collectors you're not using.
Refer to the [Debugbar documentation](https://github.com/barryvdh/laravel-debugbar?tab=readme-ov-file#debugbar-for-laravel) for details.

### Disabling Xdebug

[Xdebug](https://xdebug.org) is a powerful tool for debugging, but it can significantly slow down performance. If you notice performance issues, check if `Xdebug` is installed and consider disabling it.

If `Xdebug` is installed but not disabled, it will still be enabled by default. If you have it installed, make sure it is explicitly disabled in your `php.ini` file:

```ini theme={"theme":"gruvbox-dark-hard"}
xdebug.mode=off # Disable Xdebug
```

<Tip>
  To locate your `php.ini` file, run: `php --ini`
</Tip>

## Caching Blade icons

Caching [Blade icons](https://blade-ui-kit.com/blade-icons) can help improve performance during local development, especially in views that render many icons.

To enable caching, run:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan icons:cache
```

Make sure that when you install new Blade icon packages, you run the command again to discover the new icons.

<EditOnGitHub version="5.x" path="docs/01-introduction/04-optimizing-local-development.md" />

<Footer />
