> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Enum tricks

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

Enums are special PHP classes that represent a fixed set of constants. They are useful for modeling concepts that have a limited number of possible values, like days of the week, months in a year, or the suits in a deck of cards.

Since enum "cases" are instances of the enum class, adding interfaces to enums proves to be very useful. Filament provides a collection of interfaces that you can add to enums, which enhance your experience when working with them.

<Warning>
  When using an enum with an attribute on your Eloquent model, please [ensure that it is cast correctly](https://laravel.com/docs/eloquent-mutators#enum-casting).
</Warning>

## Enum labels

The `HasLabel` interface transforms an enum instance into a textual label. This is useful for displaying human-readable enum values in your UI.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Status: string implements HasLabel
{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';
    
    public function getLabel(): string | Htmlable | null
    {
        return $this->name;
        
        // or
    
        return match ($this) {
            self::Draft => 'Draft',
            self::Reviewing => 'Reviewing',
            self::Published => 'Published',
            self::Rejected => 'Rejected',
        };
    }
}
```

### Using the enum label with form field options

The `HasLabel` interface can be used to generate an array of options from an enum, where the enum's value is the key and the enum's label is the value. This applies to form fields like [`Select`](../forms/select) and [`CheckboxList`](../forms/checkbox-list), as well as the Table Builder's [`SelectColumn`](../tables/columns/select) and [`SelectFilter`](../tables/filters/select):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;

Select::make('status')
    ->options(Status::class)

CheckboxList::make('status')
    ->options(Status::class)

Radio::make('status')
    ->options(Status::class)

SelectColumn::make('status')
    ->options(Status::class)

SelectFilter::make('status')
    ->options(Status::class)
```

In these examples, `Status::class` is the enum class which implements `HasLabel`, and the options are generated from that:

```php theme={"theme":"gruvbox-dark-hard"}
[
    'draft' => 'Draft',
    'reviewing' => 'Reviewing',
    'published' => 'Published',
    'rejected' => 'Rejected',
]
```

### Using the enum label with a text column in your table

If you use a [`TextColumn`](../tables/columns/text) with the Table Builder, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasLabel` interface to display the enum's label instead of its raw value.

### Using the enum label as a group title in your table

If you use a [grouping](../tables/grouping) with the Table Builder, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasLabel` interface to display the enum's label instead of its raw value. The label will be displayed as the [title of each group](../tables/grouping#setting-a-group-title).

### Using the enum label with a text entry in your infolist

If you use a [`TextEntry`](../infolists/text-entry) in an infolist, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasLabel` interface to display the enum's label instead of its raw value.

## Enum colors

The `HasColor` interface transforms an enum instance into a [color](../styling/colors). This is useful for displaying colored enum values in your UI.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Contracts\HasColor;

enum Status: string implements HasColor
{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';
    
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Reviewing => 'warning',
            self::Published => 'success',
            self::Rejected => 'danger',
        };
    }
}
```

### Using the enum color with a text column in your table

If you use a [`TextColumn`](../tables/columns/text) with the Table Builder, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasColor` interface to display the enum label in its color. This works best if you use the [`badge()`](../tables/columns/text#displaying-as-a-badge) method on the column.

### Using the enum color with a text entry in your infolist

If you use a [`TextEntry`](../infolists/text-entry) in an infolist, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasColor` interface to display the enum label in its color. This works best if you use the [`badge()`](../infolists/text-entry#displaying-as-a-badge) method on the entry.

### Using the enum color with a toggle buttons field in your form

If you use a [`ToggleButtons`](../forms/toggle-buttons) form field, and it is set to use an enum for its options, Filament will automatically use the `HasColor` interface to display the enum label in its color.

## Enum icons

The `HasIcon` interface transforms an enum instance into an [icon](../styling/icons). This is useful for displaying icons alongside enum values in your UI.

```php theme={"theme":"gruvbox-dark-hard"}
use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum Status: string implements HasIcon
{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';

    public function getIcon(): string | BackedEnum | Htmlable | null
    {
        return match ($this) {
            self::Draft => Heroicon::Pencil,
            self::Reviewing => Heroicon::Eye,
            self::Published => Heroicon::Check,
            self::Rejected => Heroicon::XMark,
        };
    }
}
```

### Using the enum icon with a text column in your table

If you use a [`TextColumn`](../tables/columns/text) with the Table Builder, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasIcon` interface to display the enum's icon aside its label. This works best if you use the [`badge()`](../tables/columns/text#displaying-as-a-badge) method on the column.

### Using the enum icon with a text entry in your infolist

If you use a [`TextEntry`](../infolists/text-entry) in an infolist, and it is cast to an enum in your Eloquent model, Filament will automatically use the `HasIcon` interface to display the enum's icon aside its label. This works best if you use the [`badge()`](../infolists/text-entry#displaying-as-a-badge) method on the entry.

### Using the enum icon with a toggle buttons field in your form

If you use a [`ToggleButtons`](../forms/toggle-buttons) form field, and it is set to use an enum for its options, Filament will automatically use the `HasIcon` interface to display the enum's icon aside its label.

## Enum descriptions

The `HasDescription` interface transforms an enum instance into a textual description, often displayed under its [label](#enum-labels). This is useful for displaying human-friendly descriptions in your UI.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Status: string implements HasLabel, HasDescription
{
    case Draft = 'draft';
    case Reviewing = 'reviewing';
    case Published = 'published';
    case Rejected = 'rejected';
    
    public function getLabel(): string | Htmlable | null
    {
        return $this->name;
    }
    
    public function getDescription(): string | Htmlable | null
    {
        return match ($this) {
            self::Draft => 'This has not finished being written yet.',
            self::Reviewing => 'This is ready for a staff member to read.',
            self::Published => 'This has been approved by a staff member and is public on the website.',
            self::Rejected => 'A staff member has decided this is not appropriate for the website.',
        };
    }
}
```

### Using the enum description with form field descriptions

The `HasDescription` interface can be used to generate an array of descriptions from an enum, where the enum's value is the key and the enum's description is the value. This applies to form fields like [`Radio`](../forms/radio#setting-option-descriptions) and [`CheckboxList`](../forms/checkbox-list#setting-option-descriptions):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;

Radio::make('status')
    ->options(Status::class)

CheckboxList::make('status')
    ->options(Status::class)
```

<EditOnGitHub version="5.x" path="docs/09-advanced/03-enums.md" />

<Footer />
