> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Getting started

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

While Filament comes with virtually any tool you'll need to build great apps, sometimes you'll need to add your own functionality either for just your app or as redistributable packages that other developers can include in their own apps. This is why Filament offers a plugin system that allows you to extend its functionality.

Before we dive in, it's important to understand the different contexts in which plugins can be used. There are two main contexts:

1. **Panel Plugins**: These are plugins that are used with [Panel Builders](../introduction/installation). They are typically used only to add functionality when used inside a Panel or as a complete Panel in and of itself. Examples of this are:
   1. A plugin that adds specific functionality to the dashboard in the form of Widgets.
   2. A plugin that adds a set of Resources / functionality to an app like a Blog or User Management feature.
2. **Standalone Plugins**: These are plugins that are used in any context outside a Panel Builder. Examples of this are:
   1. A plugin that adds custom fields to be used with the [Form Builders](../forms/overview).
   2. A plugin that adds custom columns or filters to the [Table Builders](../tables/overview).

Although these are two different mental contexts to keep in mind when building plugins, they can be used together inside the same plugin. They do not have to be mutually exclusive.

## Important concepts

Before we dive into the specifics of building plugins, there are a few concepts that are important to understand. You should familiarize yourself with the following before building a plugin:

1. [Laravel Package Development](https://laravel.com/docs/packages)
2. [Spatie Package Tools](https://github.com/spatie/laravel-package-tools)
3. [Filament Asset Management](../advanced/assets)

### The Plugin object

Filament introduces the concept of a Plugin object that is used to configure the plugin. This object is a simple PHP class that implements the `Filament\Contracts\Plugin` interface. This class is used to configure the plugin and is the main entry point for the plugin. It is also used to register Resources and Icons that might be used by your plugin.

While the plugin object is extremely helpful, it is not required to build a plugin. You can still build plugins without using the plugin object as you can see in the [building a panel plugin](./building-a-panel-plugin) tutorial.

<Info>
  The Plugin object is only used for Panel Providers. Standalone Plugins do not use this object. All configuration for Standalone Plugins should be handled in the plugin's service provider.
</Info>

### Registering assets

All [asset registration](../advanced/assets), including CSS, JS and Alpine Components, should be done through the plugin's service provider in the `packageBooted()` method. This allows Filament to register the assets with the Asset Manager and load them when needed.

## Creating a plugin

While you can certainly build plugins from scratch, we recommend using the [Filament Plugin Skeleton](https://github.com/filamentphp/plugin-skeleton) to quickly get started. This skeleton includes all the necessary boilerplate to get you up and running quickly.

### Usage

To use the skeleton, simply go to the GitHub repo and click the "Use this template" button. This will create a new repo in your account with the skeleton code. After that, you can clone the repo to your machine. Once you have the code on your machine, navigate to the root of the project and run the following command:

```bash theme={"theme":"gruvbox-dark-hard"}
php ./configure.php
```

This will ask you a series of questions to configure the plugin. Once you've answered all the questions, the script will stub out a new plugin for you, and you can begin to build your amazing new extension for Filament.

## Upgrading existing plugins

Since every plugin varies greatly in its scope of use and functionality, there is no one size fits all approaches to upgrading existing plugins. However, one thing to note, that is consistent to all plugins is the deprecation of the `PluginServiceProvider`.

In your plugin service provider, you will need to change it to extend the PackageServiceProvider instead. You will also need to add a static `$name` property to the service provider. This property is used to register the plugin with Filament. Here is an example of what your service provider might look like:

```php theme={"theme":"gruvbox-dark-hard"}
class MyPluginServiceProvider extends PackageServiceProvider
{
    public static string $name = 'my-plugin';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
```

### Helpful links

Please read this guide in its entirety before upgrading your plugin. It will help you understand the concepts and how to build your plugin.

1. [Filament Asset Management](../advanced/assets)
2. [Panel Plugin Development](../plugins)
3. [Icon Management](../styling/icons)
4. [Colors Management](../styling/colors)
5. [CSS Hooks](../styling/css-hooks)

<EditOnGitHub version="5.x" path="docs/11-plugins/01-getting-started.md" />

<Footer />
