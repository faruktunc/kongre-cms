> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# CSS hooks

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

Filament uses CSS "hook" classes to allow various HTML elements to be customized using CSS.

## Discovering hook classes

We could document all the hook classes across the entire Filament UI, but that would be a lot of work, and probably not very useful to you. Instead, we recommend using your browser's developer tools to inspect the elements you want to customize, and then use the hook classes to target those elements.

All hook classes are prefixed with `fi-`, which is a great way to identify them. They are usually right at the start of the class list, so they are easy to find, but sometimes they may fall further down the list if we have to apply them conditionally with JavaScript or Blade.

If you don't find a hook class you're looking for, try not to hack around it, as it might expose your styling customizations to breaking changes in future releases. Instead, please open a pull request to add the hook class you need. We can help you maintain naming consistency. You probably don't even need to pull down the Filament repository locally for these pull requests, as you can just edit the Blade files directly on GitHub.

## Applying styles to hook classes

For example, if you want to customize the color of the sidebar, you can inspect the sidebar element in your browser's developer tools, see that it uses the `fi-sidebar`, and then add CSS to your app like this:

```css theme={"theme":"gruvbox-dark-hard"}
.fi-sidebar {
    background-color: #fafafa;
}
```

Alternatively, since Filament is built upon Tailwind CSS, you can use their `@apply` directive to apply Tailwind classes to Filament elements:

```css theme={"theme":"gruvbox-dark-hard"}
.fi-sidebar {
    @apply bg-gray-50 dark:bg-gray-950;
}
```

Occasionally, you may need to use the `!important` modifier to override existing styles, but please use this sparingly, as it can make your styles difficult to maintain:

```css theme={"theme":"gruvbox-dark-hard"}
.fi-sidebar {
    @apply bg-gray-50 dark:bg-gray-950 !important;
}
```

You can even apply `!important` to only specific Tailwind classes, which is a little less intrusive, by prefixing the class name with `!`:

```css theme={"theme":"gruvbox-dark-hard"}
.fi-sidebar {
    @apply !bg-gray-50 dark:!bg-gray-950;
}
```

## Common hook class abbreviations

We use a few common abbreviations in our hook classes to keep them short and readable:

* `fi` is short for "Filament"
* `fi-ac` is used to represent classes used in the Actions package
* `fi-fo` is used to represent classes used in the Forms package
* `fi-in` is used to represent classes used in the Infolists package
* `fi-no` is used to represent classes used in the Notifications package
* `fi-sc` is used to represent classes used in the Schema package
* `fi-ta` is used to represent classes used in the Tables package
* `fi-wi` is used to represent classes used in the Widgets package
* `btn` is short for "button"
* `col` is short for "column"
* `ctn` is short for "container"
* `wrp` is short for "wrapper"

## Publishing Blade views

You may be tempted to publish the internal Blade views to your application so that you can customize them. We don't recommend this, as it will introduce breaking changes into your application in future updates. Please use the [CSS hook classes](#applying-styles-to-hook-classes) wherever possible.

If you do decide to publish the Blade views, please lock all Filament packages to a specific version in your `composer.json` file, and then update Filament manually by bumping this number, testing your entire application after each update. This will help you identify breaking changes safely.

<EditOnGitHub version="5.x" path="docs/08-styling/02-css-hooks.md" />

<Footer />
