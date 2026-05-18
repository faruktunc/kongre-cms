> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Link Blade component

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

The link component is used to render a clickable link that can perform an action:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link :href="route('users.create')">
    New user
</x-filament::link>
```

<AutoScreenshot name="components/link/simple" alt="A simple link" version="5.x" />

## Using a link as a button

By default, a link's underlying HTML tag is `<a>`. You can change it to be a `<button>` tag by using the `tag` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link
    wire:click="openNewUserModal"
    tag="button"
>
    New user
</x-filament::link>
```

## Setting the size of a link

By default, the size of a link is "medium". You can make it "small", "large", "extra large" or "extra extra large" by using the `size` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link size="sm">
    New user
</x-filament::link>

<x-filament::link size="lg">
    New user
</x-filament::link>

<x-filament::link size="xl">
    New user
</x-filament::link>

<x-filament::link size="2xl">
    New user
</x-filament::link>
```

<AutoScreenshot name="components/link/sizes" alt="Links in different sizes" version="5.x" />

## Setting the font weight of a link

By default, the font weight of links is `semibold`. You can make it `thin`, `extralight`, `light`, `normal`, `medium`, `bold`, `extrabold` or `black` by using the `weight` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link weight="thin">
    New user
</x-filament::link>

<x-filament::link weight="extralight">
    New user
</x-filament::link>

<x-filament::link weight="light">
    New user
</x-filament::link>

<x-filament::link weight="normal">
    New user
</x-filament::link>

<x-filament::link weight="medium">
    New user
</x-filament::link>

<x-filament::link weight="semibold">
    New user
</x-filament::link>
   
<x-filament::link weight="bold">
    New user
</x-filament::link>

<x-filament::link weight="black">
    New user
</x-filament::link> 
```

Alternatively, you can pass in a custom CSS class to define the weight:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link weight="md:font-[650]">
    New user
</x-filament::link>
```

<AutoScreenshot name="components/link/weights" alt="Links in different font weights" version="5.x" />

## Changing the color of a link

By default, the color of a link is "primary". You can change it to be `danger`, `gray`, `info`, `success` or `warning` by using the `color` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link color="danger">
    New user
</x-filament::link>

<x-filament::link color="gray">
    New user
</x-filament::link>

<x-filament::link color="info">
    New user
</x-filament::link>

<x-filament::link color="success">
    New user
</x-filament::link>

<x-filament::link color="warning">
    New user
</x-filament::link>
```

<AutoScreenshot name="components/link/colors" alt="Links in different colors" version="5.x" />

## Adding an icon to a link

You can add an [icon](../styling/icons) to a link by using the `icon` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link icon="heroicon-m-sparkles">
    New user
</x-filament::link>
```

You can also change the icon's position to be after the text instead of before it, using the `icon-position` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link
    icon="heroicon-m-sparkles"
    icon-position="after"
>
    New user
</x-filament::link>
```

<AutoScreenshot name="components/link/icon" alt="Links with icons" version="5.x" />

## Adding a tooltip to a link

You can add a tooltip to a link by using the `tooltip` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link tooltip="Register a user">
    New user
</x-filament::link>
```

## Adding a badge to a link

You can render a [badge](./badge) on top of a link by using the `badge` slot:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link>
    Mark notifications as read

    <x-slot name="badge">
        3
    </x-slot>
</x-filament::link>
```

You can [change the color](./badge#changing-the-color-of-the-badge) of the badge using the `badge-color` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::link badge-color="danger">
    Mark notifications as read

    <x-slot name="badge">
        3
    </x-slot>
</x-filament::link>
```

<AutoScreenshot name="components/link/badge" alt="Links with badges" version="5.x" />

<EditOnGitHub version="5.x" path="docs/12-components/03-link.md" />

<Footer />
