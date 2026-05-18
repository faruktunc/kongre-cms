> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Nested resources

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

## Overview

[Relation managers](./managing-relationships#creating-a-relation-manager) and [relation pages](./managing-relationships#relation-pages) provide you with an easy way to render a table of related records inside a resource.

For example, in a `CourseResource`, you may have a relation manager or page for `lessons` that belong to that course. You can create and edit lessons from the table, which opens modal dialogs.

However, lessons may be too complex to be created and edited in a modal. You may wish that lessons had their own resource, so that creating and editing them would be a full page experience. This is a nested resource.

<AutoScreenshot name="panels/resources/nested" alt="A nested resource listing comments under a post" version="5.x" />

## Creating a nested resource

To create a nested resource, you can use the `make:filament-resource` command with the `--nested` option:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-resource Lesson --nested
```

To access the nested resource, you will also need a [relation manager](./managing-relationships#creating-a-relation-manager) or [relation page](./managing-relationships#relation-pages). This is where the user can see the list of related records, and click links to the "create" and "edit" pages.

To create a relation manager or page, you can use the `make:filament-relation-manager` or `make:filament-page` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CourseResource lessons title

php artisan make:filament-page ManageCourseLessons --resource=CourseResource --type=ManageRelatedRecords
```

When creating a relation manager or page, Filament will ask if you want each table row to link to a resource instead of opening a modal, to which you should answer "yes" and select the nested resource that you just created.

After generating the relation manager or page, it will have a property pointing to the nested resource:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Courses\Resources\Lessons\LessonResource;

protected static ?string $relatedResource = LessonResource::class;
```

The nested resource class will have a property pointing to the parent resource:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Courses\CourseResource;

protected static ?string $parentResource = CourseResource::class;
```

## Customizing the relationship names

In the same way that relation managers and pages predict the name of relationships based on the models in those relationships, nested resources do the same. Sometimes, you may have a relationship that does not fit the traditional relationship naming convention, and you will need to inform Filament of the correct relationship names for the nested resource.

To customize the relationship names, first remove the `$parentResource` property from the nested resource class. Then define a `getParentResourceRegistration()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Courses\CourseResource;
use Filament\Resources\ParentResourceRegistration;

public static function getParentResourceRegistration(): ?ParentResourceRegistration
{
    return CourseResource::asParent()
        ->relationship('lessons')
        ->inverseRelationship('course');
}
```

You can omit the calls to `relationship()` and `inverseRelationship()` if you want to use the default names.

## Registering a relation manager with the correct URL

When dealing with a nested resource that is listed by a relation manager, and the relation manager is amongst others on that page, you may notice that the URL to it is not correct when you redirect from the nested resource back to it. This is because each relation manager registered on a resource is assigned an integer, which is used to identify it in the URL when switching between multiple relation managers. For example, `?relation=0` might represent one relation manager in the URL, and `?relation=1` might represent another.

When redirecting from a nested resource back to a relation manager, Filament will assume that the relationship name is used to identify that relation manager in the URL. For example, if you have a nested `LessonResource` and a `LessonsRelationManager`, the relationship name is `lessons`, and should be used as the [URL parameter key](./managing-relationships#customizing-the-relation-managers-url-parameter) for that relation manager when it is registered:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getRelations(): array
{
    return [
        'lessons' => LessonsRelationManager::class,
    ];
}
```

<EditOnGitHub version="5.x" path="docs/03-resources/08-nesting.md" />

<Footer />
