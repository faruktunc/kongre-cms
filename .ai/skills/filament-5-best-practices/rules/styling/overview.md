> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Overview

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

## Changing the colors

In the [configuration](../panel-configuration), you can easily change the colors that are used. Filament ships with 6 predefined colors that are used everywhere within the framework. They are customizable as follows:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;
use Filament\Support\Colors\Color;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->colors([
            'danger' => Color::Rose,
            'gray' => Color::Gray,
            'info' => Color::Blue,
            'primary' => Color::Indigo,
            'success' => Color::Emerald,
            'warning' => Color::Orange,
        ]);
}
```

The `Filament\Support\Colors\Color` class contains color options for all [Tailwind CSS color palettes](https://tailwindcss.com/docs/customizing-colors).

<AutoScreenshot name="panels/styling/colors" alt="Panel with custom colors" version="5.x" />

You can also pass in a function to `register()` which will only get called when the app is getting rendered. This is useful if you are calling `register()` from a service provider, and want to access objects like the currently authenticated user, which are initialized later in middleware.

Alternatively, you may pass your own palette in as an array of OKLCH colors:

```php theme={"theme":"gruvbox-dark-hard"}
$panel
    ->colors([
        'primary' => [
            50 => 'oklch(0.969 0.015 12.422)',
            100 => 'oklch(0.941 0.03 12.58)',
            200 => 'oklch(0.892 0.058 10.001)',
            300 => 'oklch(0.81 0.117 11.638)',
            400 => 'oklch(0.712 0.194 13.428)',
            500 => 'oklch(0.645 0.246 16.439)',
            600 => 'oklch(0.586 0.253 17.585)',
            700 => 'oklch(0.514 0.222 16.935)',
            800 => 'oklch(0.455 0.188 13.697)',
            900 => 'oklch(0.41 0.159 10.272)',
            950 => 'oklch(0.271 0.105 12.094)',
        ],
    ])
```

### Generating a color palette

If you want us to attempt to generate a palette for you based on a singular hex or RGB value, you can pass that in:

```php theme={"theme":"gruvbox-dark-hard"}
$panel
    ->colors([
        'primary' => '#6366f1',
    ])

$panel
    ->colors([
        'primary' => 'rgb(99, 102, 241)',
    ])
```

## Changing the font

By default, we use the [Inter](https://fonts.google.com/specimen/Inter) font. You can change this using the `font()` method in the [configuration](../panel-configuration) file:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->font('Poppins');
}
```

All [Google Fonts](https://fonts.google.com) are available to use.

<AutoScreenshot name="panels/styling/font" alt="Panel with custom font" version="5.x" />

### Changing the font provider

[Bunny Fonts CDN](https://fonts.bunny.net) is used to serve the fonts. It is GDPR-compliant. If you'd like to use [Google Fonts CDN](https://fonts.google.com) instead, you can do so using the `provider` argument of the `font()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\FontProviders\GoogleFontProvider;

$panel->font('Inter', provider: GoogleFontProvider::class)
```

Or if you'd like to serve the fonts from a local stylesheet, you can use the `LocalFontProvider`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\FontProviders\LocalFontProvider;

$panel->font(
    'Inter',
    url: asset('css/fonts.css'),
    provider: LocalFontProvider::class,
)
```

## Creating a custom theme

Filament allows you to change the CSS used to render the UI by compiling a custom stylesheet to replace the default one. This custom stylesheet is called a "theme". Themes use [Tailwind CSS](https://tailwindcss.com).

To create a custom theme for a panel, you can use the `php artisan make:filament-theme` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-theme
```

If you have multiple panels, you can specify the panel you want to create a theme for:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-theme admin
```

By default, this command will use NPM to install dependencies. If you want to use a different package manager, you can use the `--pm` option:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-theme --pm=bun
```

This command will:

1. Install the required Tailwind CSS dependencies
2. Generate a CSS file in `resources/css/filament/{panel}/theme.css`
3. Attempt to automatically add the theme to your `vite.config.js` input array
4. Attempt to automatically register `->viteTheme()` in your panel provider
5. Offer to compile the theme with Vite

If the command cannot automatically configure your files (due to non-standard formatting), it will display manual instructions instead. In that case, follow these steps:

### Manual configuration

Add the theme's CSS file to the Laravel plugin's `input` array in `vite.config.js`:

```js theme={"theme":"gruvbox-dark-hard"}
input: [
    // ...
    'resources/css/filament/admin/theme.css',
]
```

Register the Vite-compiled theme CSS file in the panel's provider:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->viteTheme('resources/css/filament/admin/theme.css');
}
```

Then compile the theme with Vite:

```bash theme={"theme":"gruvbox-dark-hard"}
npm run build
```

<Info>
  Check the command output for the exact file path (e.g., `admin/theme.css`), as it may vary depending on your panel's ID.
</Info>

You can now customize the theme by editing the CSS file in `resources/css/filament`.

## Using Tailwind CSS classes in your Blade views or PHP files

<Warning>
  **A custom theme is required to use Tailwind CSS classes in your own code.** Filament's default compiled stylesheet does not include arbitrary Tailwind classes - it only contains the styles needed for Filament's own UI components.
</Warning>

If you want to use Tailwind CSS utility classes (like `text-primary-600`, `bg-gray-100`, `p-4`, etc.) in your own Blade views, Livewire components, or PHP files, **you must create a custom theme first**.

Without a custom theme, any Tailwind classes you add to your code will simply not work - the styles won't be applied because they're not included in the compiled CSS.

### Setting up Tailwind CSS for your project

To use Tailwind CSS classes in your project, you need to set up a [custom theme](#creating-a-custom-theme). Run the following command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-theme
```

In the generated `theme.css` file, you will find `@source` directives that tell Tailwind CSS where to scan for classes:

```css theme={"theme":"gruvbox-dark-hard"}
@source '../../../../app/Filament/**/*';
@source '../../../../resources/views/filament/**/*';
```

**Add your own directories** where you use Tailwind classes. For example:

```css theme={"theme":"gruvbox-dark-hard"}
@source '../../../../app/Filament/**/*';
@source '../../../../resources/views/filament/**/*';
@source '../../../../resources/views/components/**/*';
@source '../../../../resources/views/livewire/**/*';
@source '../../../../app/Livewire/**/*';
```

After adding your directories, rebuild your theme:

```bash theme={"theme":"gruvbox-dark-hard"}
npm run build
```

You can [learn more about the `@source` directive](https://tailwindcss.com/docs/detecting-classes-in-source-files#explicitly-registering-sources) in the Tailwind CSS documentation.

## Disabling dark mode

To disable dark mode switching, you can use the [configuration](../panel-configuration) file:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->darkMode(false);
}
```

## Changing the default theme mode

By default, Filament uses the user's system theme as the default mode. For example, if the user's computer is in dark mode, Filament will use dark mode by default. The system mode in Filament is reactive if the user changes their computer's mode. If you want to change the default mode to force light or dark mode, you can use the `defaultThemeMode()` method, passing `ThemeMode::Light` or `ThemeMode::Dark`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Enums\ThemeMode;
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->defaultThemeMode(ThemeMode::Light);
}
```

## Adding a logo

By default, Filament uses your app's name to render a simple text-based logo. However, you can easily customize this.

If you want to simply change the text that is used in the logo, you can use the `brandName()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->brandName('Filament Demo');
}
```

<AutoScreenshot name="panels/styling/brand-name" alt="Panel with custom brand name" version="5.x" />

To render an image instead, you can pass a URL to the `brandLogo()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->brandLogo(asset('images/logo.svg'));
}
```

<AutoScreenshot name="panels/styling/brand-logo" alt="Panel with custom brand logo" version="5.x" />

Alternatively, you may directly pass HTML to the `brandLogo()` method to render an inline SVG element for example:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->brandLogo(fn () => view('filament.admin.logo'));
}
```

```blade theme={"theme":"gruvbox-dark-hard"}
<svg
    viewBox="0 0 128 26"
    xmlns="http://www.w3.org/2000/svg"
    class="h-full fill-gray-500 dark:fill-gray-400"
>
    <!-- ... -->
</svg>
```

If you need a different logo to be used when the application is in dark mode, you can pass it to `darkModeBrandLogo()` in the same way.

The logo height defaults to a sensible value, but it's impossible to account for all possible aspect ratios. Therefore, you may customize the height of the rendered logo using the `brandLogoHeight()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->brandLogo(fn () => view('filament.admin.logo'))
        ->brandLogoHeight('2rem');
}
```

## Adding a favicon

To add a favicon, you can use the [configuration](../panel-configuration) file, passing the public URL of the favicon:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->favicon(asset('images/favicon.png'));
}
```

<EditOnGitHub version="5.x" path="docs/08-styling/01-overview.md" />

<Footer />
