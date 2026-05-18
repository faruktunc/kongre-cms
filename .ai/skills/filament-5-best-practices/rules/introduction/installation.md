> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Installation

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

Filament requires the following to run:

* PHP 8.2+
* Laravel v11.28+
* Tailwind CSS v4.1+

Installation comes in two flavors, depending on whether you want to build an app using our panel builder or use the components within your app's Blade views:

<Tabs>
  <Tab title="Panel builder">
    Most people choose this option to build a panel (e.g., admin panel) for their app. The panel builder combines all the individual components into a cohesive framework. You can create as many panels as you like within a Laravel installation, but you only need to install it once.

    ## Installing the panel builder

    Install the Filament Panel Builder by running the following commands in your Laravel project directory:

    ```bash theme={"theme":"gruvbox-dark-hard"}
    composer require filament/filament:"^5.0"

    php artisan filament:install --panels
    ```

    <Warning>
      When using Windows PowerShell to install Filament, you may need to run the command below, since it ignores `^` characters in version constraints:

      ```bash theme={"theme":"gruvbox-dark-hard"}
      composer require filament/filament:"~5.0"

      php artisan filament:install --panels
      ```
    </Warning>

    This will create and register a new [Laravel service provider](https://laravel.com/docs/providers) called `app/Providers/Filament/AdminPanelProvider.php`.

    <Tip>
      If you get an error when accessing your panel, check that the service provider is registered in `bootstrap/providers.php`. If it's not registered, you'll need to [add it manually](https://laravel.com/docs/providers#registering-providers).
    </Tip>

    You can create a new user account using the following command:

    ```bash theme={"theme":"gruvbox-dark-hard"}
    php artisan make:filament-user
    ```

    Open `/admin` in your web browser, sign in, and [start building your app](../getting-started)!
  </Tab>

  <Tab title="Individual components">
    If you are using Blade to build your app from scratch, you can install individual components from Filament to enrich your UI.

    ## Installing the individual components

    Install the Filament components you want to use with Composer:

    ```bash theme={"theme":"gruvbox-dark-hard"}
    composer require
        filament/tables:"^5.0"
        filament/schemas:"^5.0"
        filament/forms:"^5.0"
        filament/infolists:"^5.0"
        filament/actions:"^5.0"
        filament/notifications:"^5.0"
        filament/widgets:"^5.0"
    ```

    You can install additional packages later in your project without having to repeat these installation steps.

    <Warning>
      When using Windows PowerShell to install Filament, you may need to run the command below, since it ignores `^` characters in version constraints:

      ```bash theme={"theme":"gruvbox-dark-hard"}
      composer require
          filament/tables:"~5.0"
          filament/schemas:"~5.0"
          filament/forms:"~5.0"
          filament/infolists:"~5.0"
          filament/actions:"~5.0"
          filament/notifications:"~5.0"
          filament/widgets:"~5.0"
      ```
    </Warning>

    If you only want to use the set of [Blade UI components](../components), you'll need to require `filament/support` at this stage.

    <Tabs>
      <Tab title="New Laravel projects">
        Get started with Filament components quickly by running a simple command. Note that this will overwrite any modified files in your app, so it's only suitable for new Laravel projects.

        To quickly set up Filament in a new Laravel project, run the following commands to install [Livewire](https://livewire.laravel.com), [Alpine.js](https://alpinejs.dev), and [Tailwind CSS](https://tailwindcss.com):

        <Warning>
          These commands will overwrite existing files in your application. Only run them in a new Laravel project!
        </Warning>

        Run the following command to install the Filament frontend assets:

        ```bash theme={"theme":"gruvbox-dark-hard"}
        php artisan filament:install --scaffold

        npm install

        npm run dev
        ```

        During scaffolding, if you have the [Notifications](../notifications) package installed, Filament will ask if you want to install the required Livewire component into your default layout file. This component is required if you want to send flash notifications to users through Filament.
      </Tab>

      <Tab title="Existing Laravel projects">
        If you have an existing Laravel project, you can still install Filament, but should do so manually to preserve your existing functionality.

        Run the following command to install the Filament frontend assets:

        ```bash theme={"theme":"gruvbox-dark-hard"}
        php artisan filament:install
        ```

        ### Installing Tailwind CSS

        Run the following command to install Tailwind CSS and its Vite plugin, if you don't have those installed already:

        ```bash theme={"theme":"gruvbox-dark-hard"}
        npm install tailwindcss @tailwindcss/vite --save-dev
        ```

        ### Configuring styles

        To configure Filament's styles, you need to import the CSS files for the Filament packages you installed, usually in `resources/css/app.css`.

        Depending on which combination of packages you installed, you can import only the necessary CSS files, to keep your app's CSS bundle size small:

        ```css theme={"theme":"gruvbox-dark-hard"}
        @import 'tailwindcss';

        /* Required by all components */
        @import '../../vendor/filament/support/resources/css/index.css';

        /* Required by actions and tables */
        @import '../../vendor/filament/actions/resources/css/index.css';

        /* Required by actions, forms and tables */
        @import '../../vendor/filament/forms/resources/css/index.css';

        /* Required by actions and infolists */
        @import '../../vendor/filament/infolists/resources/css/index.css';

        /* Required by notifications */
        @import '../../vendor/filament/notifications/resources/css/index.css';

        /* Required by actions, infolists, forms, schemas and tables */
        @import '../../vendor/filament/schemas/resources/css/index.css';

        /* Required by tables */
        @import '../../vendor/filament/tables/resources/css/index.css';

        /* Required by widgets */
        @import '../../vendor/filament/widgets/resources/css/index.css';

        @variant dark (&:where(.dark, .dark *));
        ```

        ### Configure the Vite plugin

        If it isn't already set up, add the `@tailwindcss/vite` plugin to your Vite configuration (`vite.config.js`):

        ```js theme={"theme":"gruvbox-dark-hard"}
        import { defineConfig } from 'vite'

        import laravel from 'laravel-vite-plugin'

        import tailwindcss from '@tailwindcss/vite'


        export default defineConfig({
            plugins: [
                laravel({
                    input: ['resources/css/app.css', 'resources/js/app.js'],
                    refresh: true,
                }),
                tailwindcss(),
            ],
        })
        ```

        ### Compiling assets

        Compile your new CSS and JavaScript assets using `npm run dev`.

        ### Configuring your layout

        If you don't have a Blade layout file yet, create it at `resources/views/layouts/app.blade.php` by running the following command:

        ```bash theme={"theme":"gruvbox-dark-hard"}
        php artisan livewire:layout
        ```

        Add the following code to your new layout file:

        ```blade theme={"theme":"gruvbox-dark-hard"}
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">

                <meta name="application-name" content="{{ config('app.name') }}">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>{{ config('app.name') }}</title>

                <style>
                    [x-cloak] {
                        display: none !important;
                    }
                </style>

                @filamentStyles
                @vite('resources/css/app.css')
            </head>

            <body class="antialiased">
                {{ $slot }}

                @livewire('notifications') {{-- Only required if you wish to send flash notifications --}}

                @filamentScripts
                @vite('resources/js/app.js')
            </body>
        </html>
        ```

        The important parts of this are the `@filamentStyles` in the `<head>` of the layout, and the `@filamentScripts` at the end of the `<body>`. Make sure to also include your app's compiled CSS and JavaScript files from Vite!

        <Info>
          The `@livewire('notifications')` line is required in the layout only if you have the [Notifications](../notifications) package installed and want to send flash notifications to users through Filament.
        </Info>
      </Tab>
    </Tabs>
  </Tab>
</Tabs>

## Publishing configuration

Filament ships with a configuration file that allows you to override defaults shared across all packages. Publish it after installing the panel builder so you can review and customize the settings:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan vendor:publish --tag=filament-config
```

This command creates `config/filament.php`, where you can configure options like the default filesystem disk, file generation flags, and UI defaults. Re-run the publish command any time you want to pull in newly added configuration keys before tweaking them to suit your project.

<EditOnGitHub version="5.x" path="docs/01-introduction/02-installation.md" />

<Footer />
