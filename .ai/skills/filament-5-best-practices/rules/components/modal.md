> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Modal Blade component

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

The modal component is able to open a dialog window or slide-over with any content:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal>
    <x-slot name="trigger">
        <x-filament::button>
            Open modal
        </x-filament::button>
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/simple" alt="A modal with heading, description and footer actions" version="5.x" />

## Controlling a modal from JavaScript

You can use the `trigger` slot to render a button that opens the modal. However, this is not required. You have complete control over when the modal opens and closes through JavaScript. First, give the modal an ID so that you can reference it:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal id="edit-user">
    {{-- Modal content --}}
</x-filament::modal>
```

Now, you can dispatch an `open-modal` or `close-modal` browser event, passing the modal's ID, which will open or close the modal. For example, from a Livewire component:

```php theme={"theme":"gruvbox-dark-hard"}
$this->dispatch('open-modal', id: 'edit-user');
```

Or from Alpine.js:

```php theme={"theme":"gruvbox-dark-hard"}
$dispatch('open-modal', { id: 'edit-user' })
```

## Adding a heading to a modal

You can add a heading to a modal by using the `heading` slot:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal>
    <x-slot name="heading">
        Modal heading
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

## Adding a description to a modal

You can add a description, below the heading, to a modal by using the `description` slot:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal>
    <x-slot name="heading">
        Modal heading
    </x-slot>

    <x-slot name="description">
        Modal description
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/heading" alt="A modal with heading and description" version="5.x" />

## Adding an icon to a modal

You can add an [icon](../styling/icons) to a modal by using the `icon` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal icon="heroicon-o-information-circle">
    <x-slot name="heading">
        Modal heading
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

By default, the color of an icon is "primary". You can change it to be `danger`, `gray`, `info`, `success` or `warning` by using the `icon-color` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal
    icon="heroicon-o-exclamation-triangle"
    icon-color="danger"
>
    <x-slot name="heading">
        Modal heading
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/icon" alt="A modal with a danger icon" version="5.x" />

## Adding a footer to a modal

You can add a footer to a modal by using the `footer` slot:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal>
    {{-- Modal content --}}
    
    <x-slot name="footer">
        {{-- Modal footer content --}}
    </x-slot>
</x-filament::modal>
```

Alternatively, you can add actions into the footer by using the `footerActions` slot:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal>
    {{-- Modal content --}}

    <x-slot name="footerActions">
        {{-- Modal footer actions --}}
    </x-slot>
</x-filament::modal>
```

<AutoScreenshot name="components/modal/footer" alt="A modal with a custom footer" version="5.x" />

## Changing the modal's alignment

By default, modal content will be aligned to the start, or centered if the modal is `xs` or `sm` in [width](#changing-the-modal-width). If you wish to change the alignment of content in a modal, you can use the `alignment` attribute and pass it `start` or `center`:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal alignment="center">
    {{-- Modal content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/alignment" alt="A modal with center-aligned content" version="5.x" />

## Using a slide-over instead of a modal

You can open a "slide-over" dialog instead of a modal by using the `slide-over` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal slide-over>
    {{-- Slide-over content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/slide-over" alt="A slide-over modal" version="5.x" />

## Making the modal header sticky

The header of a modal scrolls out of view with the modal content when it overflows the modal size. However, slide-overs have a sticky modal that's always visible. You may control this behavior using the `sticky-header` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal sticky-header>
    <x-slot name="heading">
        Modal heading
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/sticky-header" alt="A modal with a sticky header" version="5.x" />

## Making the modal footer sticky

The footer of a modal is rendered inline after the content by default. Slide-overs, however, have a sticky footer that always shows when scrolling the content. You may enable this for a modal too using the `sticky-footer` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal sticky-footer>
    {{-- Modal content --}}

    <x-slot name="footer">
        {{-- Modal footer content --}}
    </x-slot>
</x-filament::modal>
```

<AutoScreenshot name="components/modal/sticky-footer" alt="A modal with a sticky footer" version="5.x" />

## Changing the modal width

You can change the width of the modal by using the `width` attribute. Options correspond to [Tailwind's max-width scale](https://tailwindcss.com/docs/max-width). The options are `xs`, `sm`, `md`, `lg`, `xl`, `2xl`, `3xl`, `4xl`, `5xl`, `6xl`, `7xl`, and `screen`:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal width="5xl">
    {{-- Modal content --}}
</x-filament::modal>
```

<AutoScreenshot name="components/modal/width" alt="A modal with a custom width" version="5.x" />

## Closing the modal by clicking away

By default, when you click away from a modal, it will close itself. If you wish to disable this behavior for a specific action, you can use the `close-by-clicking-away` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal :close-by-clicking-away="false">
    {{-- Modal content --}}
</x-filament::modal>
```

## Closing the modal by escaping

By default, when you press escape on a modal, it will close itself. If you wish to disable this behavior for a specific action, you can use the `close-by-escaping` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal :close-by-escaping="false">
    {{-- Modal content --}}
</x-filament::modal>
```

## Hiding the modal close button

By default, modals with a header have a close button in the top right corner. You can remove the close button from the modal by using the `close-button` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal :close-button="false">
    <x-slot name="heading">
        Modal heading
    </x-slot>

    {{-- Modal content --}}
</x-filament::modal>
```

## Preventing the modal from autofocusing

By default, modals will autofocus on the first focusable element when opened. If you wish to disable this behavior, you can use the `autofocus` attribute:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal :autofocus="false">
    {{-- Modal content --}}
</x-filament::modal>
```

## Disabling the modal trigger button

By default, the trigger button will open the modal even if it is disabled, since the click event listener is registered on a wrapping element of the button itself. If you want to prevent the modal from opening, you should also use the `disabled` attribute on the trigger slot:

```blade theme={"theme":"gruvbox-dark-hard"}
<x-filament::modal>
    <x-slot name="trigger" disabled>
        <x-filament::button :disabled="true">
            Open modal
        </x-filament::button>
    </x-slot>
    {{-- Modal content --}}
</x-filament::modal>
```

<EditOnGitHub version="5.x" path="docs/12-components/03-modal.md" />

<Footer />
