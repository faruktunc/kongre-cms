> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Contributing

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

<Info>
  Parts of this guide are adapted from [Laravel's contribution guide](https://laravel.com/docs/contributions), which served as valuable inspiration.
</Info>

## Reporting bugs

If you discover a bug in Filament, please report it by opening an issue on our [GitHub repository](https://github.com/filamentphp/filament/issues/new/choose). Before opening an issue, search through the [existing issues](https://github.com/filamentphp/filament/issues?q=is%3Aissue) to check if the bug has already been reported.

Please include as much information as possible, particularly the version numbers of packages in your application. You can use this Artisan command in your application to open a new issue with all the correct versions automatically pre-filled:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-issue
```

When creating an issue, we require a "reproduction repository". **Please do not link to your actual project**. Instead, what we need is a *minimal* reproduction in a fresh project without any unnecessary code. This means it doesn't matter if your real project is private/confidential since we want a link to a separate, isolated reproduction. This allows us to fix the problem much quicker. **Issues will be automatically closed and not reviewed if this is missing, to preserve maintainer time and ensure the process is fair for those who put effort into reporting.** If you believe a reproduction repository is not suitable for the issue, which is a very rare case, please `@danharrin` and explain why. Saying "it's just a simple issue" is not an excuse for not creating a repository! [Need a head start? We have a template Filament project for you.](https://unitedbycode.com/filament-issue)

Remember, bug reports are created in the hope that others with the same problem will be able to collaborate with you on solving it. Do not expect that the bug report will automatically receive attention or that others will jump to fix it. Creating a bug report serves to help yourself and others start on the path of fixing the problem.

## Development of new features

If you would like to propose a new feature or improvement to Filament, you may use our [discussion forum](https://github.com/filamentphp/filament/discussions) hosted on GitHub. If you intend to implement the feature yourself in a pull request, we advise you to `@danharrin` (a core maintainer of Filament) in your feature discussion beforehand and ask if it is suitable for the framework to prevent wasting your time.

## Development of plugins

If you would like to develop a plugin for Filament, please refer to the [plugin development section](../plugins) in the documentation. Our [Discord](https://filamentphp.com/discord) server is also a great place to ask questions and get help with plugin development. You can start a conversation in the [`#plugin-developers-chat`](https://discord.com/channels/883083792112300104/970354547723730955) channel.

You can also [submit your plugin to be advertised on the Filament website](https://github.com/filamentphp/filamentphp.com/blob/main/README.md#contributing).

## Developing with a local copy of Filament

If you want to contribute to the Filament packages, then you may want to test it in a real Laravel project:

* Fork [the GitHub repository](https://github.com/filamentphp/filament) to your GitHub account.
* Create a Laravel app locally.
* Clone your fork into your Laravel app's root directory.
* In the `/filament` directory, create a branch for your fix, e.g. `fix/error-message`.

Install the packages in your app's `composer.json`:

```jsonc theme={"theme":"gruvbox-dark-hard"}
{
    // ...
    "require": {
        "filament/filament": "*",
    },
    "minimum-stability": "dev",
    "repositories": [
        {
            "type": "path",
            "url": "filament/packages/*"
        }
    ],
    // ...
}
```

Now, run `composer update`.

Once you've finished making changes, you can commit them and submit a pull request to [the GitHub repository](https://github.com/filamentphp/filament).

## Checking for outdated translations

To check for outdated translations, you can use our Translation Tool. Clone the Filament repository, install the dependencies for the commands and then run the command.

```bash theme={"theme":"gruvbox-dark-hard"}
# Clone
git clone git@github.com:filamentphp/filament.git

# Install dependencies
composer install

# Run the tool  
./bin/translation-tool.php
```

First select "List outdated translations" as the command and then choose the locale you want to check. This command will show you which translations are missing for the specified locale. You can then submit a pull request with the missing translations to [the GitHub repository](https://github.com/filamentphp/filament).

## Security vulnerabilities

If you discover a security vulnerability within Filament, please [report it through GitHub](https://github.com/filamentphp/filament/security/advisories). All security vulnerabilities will be promptly addressed. Please see our [version support policy](./version-support-policy) to understand which versions are currently under maintenance.

## Code of Conduct

Please note that Filament is released with a [Contributor Code of Conduct](https://github.com/filamentphp/filament/blob/5.x/CODE_OF_CONDUCT.md). By participating in this project, you agree to abide by its terms.

<EditOnGitHub version="5.x" path="docs/01-introduction/07-contributing.md" />

<Footer />
