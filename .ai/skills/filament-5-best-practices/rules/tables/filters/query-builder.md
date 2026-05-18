> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Query builder

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

The query builder allows you to define a complex set of conditions to filter the data in your table. It is able to handle unlimited nesting of conditions, which you can group together with "and" and "or" operations.

<AutoScreenshot name="tables/filters/query-builder" alt="Query builder filter" version="5.x" />

To use it, you need to define a set of "constraints" that will be used to filter the data. Filament includes some built-in constraints, that follow common data types, but you can also define your own custom constraints.

You can add a query builder to any table using the `QueryBuilder` filter:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Filters\QueryBuilder;
use Filament\QueryBuilder\Constraints\BooleanConstraint;
use Filament\QueryBuilder\Constraints\DateConstraint;
use Filament\QueryBuilder\Constraints\NumberConstraint;
use Filament\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\QueryBuilder\Constraints\SelectConstraint;
use Filament\QueryBuilder\Constraints\TextConstraint;

QueryBuilder::make()
    ->constraints([
        TextConstraint::make('name'),
        BooleanConstraint::make('is_visible'),
        NumberConstraint::make('stock'),
        SelectConstraint::make('status')
            ->options([
                'draft' => 'Draft',
                'reviewing' => 'Reviewing',
                'published' => 'Published',
            ])
            ->multiple(),
        DateConstraint::make('created_at'),
        RelationshipConstraint::make('categories')
            ->multiple()
            ->selectable(
                IsRelatedToOperator::make()
                    ->titleAttribute('name')
                    ->searchable()
                    ->multiple(),
            ),
        NumberConstraint::make('reviews.rating')
            ->integer(),
    ])
```

When deeply nesting the query builder, you might need to increase the amount of space that the filters can consume. One way of doing this is to [position the filters above the table content](./layout#displaying-filters-above-the-table-content):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->filters([
            QueryBuilder::make()
                ->constraints([
                    // ...
                ]),
        ], layout: FiltersLayout::AboveContent);
}
```

## Available constraints

Filament ships with many different constraints that you can use out of the box. You can also [create your own custom constraints](#creating-custom-constraints):

* [Text constraint](#text-constraints)
* [Boolean constraint](#boolean-constraints)
* [Number constraint](#number-constraints)
* [Date constraint](#date-constraints)
* [Select constraint](#select-constraints)
* [Relationship constraint](#relationship-constraints)

### Text constraints

Text constraints allow you to filter text fields. They can be used to filter any text field, including via relationships.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\TextConstraint;

TextConstraint::make('name') // Filter the `name` column

TextConstraint::make('creator.name') // Filter the `name` column on the `creator` relationship using dot syntax
```

By default, the following operators are available:

* Contains - filters a column to contain the search term
* Does not contain - filters a column to not contain the search term
* Starts with - filters a column to start with the search term
* Does not start with - filters a column to not start with the search term
* Ends with - filters a column to end with the search term
* Does not end with - filters a column to not end with the search term
* Equals - filters a column to equal the search term
* Does not equal - filters a column to not equal the search term
* Is filled - filters a column to not be empty
* Is blank - filters a column to be empty

### Boolean constraints

Boolean constraints allow you to filter boolean fields. They can be used to filter any boolean field, including via relationships.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\BooleanConstraint;

BooleanConstraint::make('is_visible') // Filter the `is_visible` column

BooleanConstraint::make('creator.is_admin') // Filter the `is_admin` column on the `creator` relationship using dot syntax
```

By default, the following operators are available:

* Is true - filters a column to be `true`
* Is false - filters a column to be `false`

### Number constraints

Number constraints allow you to filter numeric fields. They can be used to filter any numeric field, including via relationships.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\NumberConstraint;

NumberConstraint::make('stock') // Filter the `stock` column

NumberConstraint::make('orders.item_count') // Filter the `item_count` column on the `orders` relationship using dot syntax
```

By default, the following operators are available:

* Is minimum - filters a column to be greater than or equal to the search number
* Is less than - filters a column to be less than the search number
* Is maximum - filters a column to be less than or equal to the search number
* Is greater than - filters a column to be greater than the search number
* Equals - filters a column to equal the search number
* Does not equal - filters a column to not equal the search number
* Is filled - filters a column to not be empty
* Is blank - filters a column to be empty

When using relationship column with a number constraint, users also have the ability to "aggregate" related records. This means that they can filter the column to be the sum, average, minimum or maximum of all the related records at once.

#### Integer constraints

By default, number constraints will allow decimal values. If you'd like to only allow integer values, you can use the `integer()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\NumberConstraint;

NumberConstraint::make('stock')
    ->integer()
```

### Date constraints

Date constraints allow you to filter date fields. They can be used to filter any date field, including via relationships.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\DateConstraint;

DateConstraint::make('created_at') // Filter the `created_at` column

DateConstraint::make('creator.created_at') // Filter the `created_at` column on the `creator` relationship using dot syntax
```

By default, the following operators are available:

* Is after - filters a column to be after the search date
* Is not after - filters a column to not be after the search date, or to be the same date
* Is before - filters a column to be before the search date
* Is not before - filters a column to not be before the search date, or to be the same date
* Is date - filters a column to be the same date as the search date
* Is not date - filters a column to not be the same date as the search date
* Is month - filters a column to be in the same month as the selected month
* Is not month - filters a column to not be in the same month as the selected month
* Is year - filters a column to be in the same year as the searched year
* Is not year - filters a column to not be in the same year as the searched year

#### Datetime constraints

By default, date constraints only filter by date. If you have a datetime column and want to enable time-based filtering, you can use the `time()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\DateConstraint;

DateConstraint::make('published_at')
    ->time()
```

### Select constraints

Select constraints allow you to filter fields using a select field. They can be used to filter any field, including via relationships.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\SelectConstraint;

SelectConstraint::make('status') // Filter the `status` column
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])

SelectConstraint::make('creator.department') // Filter the `department` column on the `creator` relationship using dot syntax
    ->options([
        'sales' => 'Sales',
        'marketing' => 'Marketing',
        'engineering' => 'Engineering',
        'purchasing' => 'Purchasing',
    ])
```

#### Searchable select constraints

By default, select constraints will not allow the user to search the options. If you'd like to allow the user to search the options, you can use the `searchable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\SelectConstraint;

SelectConstraint::make('status')
    ->searchable()
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
```

#### Multi-select constraints

By default, select constraints will only allow the user to select a single option. If you'd like to allow the user to select multiple options, you can use the `multiple()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\SelectConstraint;

SelectConstraint::make('status')
    ->multiple()
    ->options([
        'draft' => 'Draft',
        'reviewing' => 'Reviewing',
        'published' => 'Published',
    ])
```

When the user selects multiple options, the table will be filtered to show records that match any of the selected options.

### Relationship constraints

Relationship constraints allow you to filter fields using data about a relationship:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;

RelationshipConstraint::make('creator') // Filter the `creator` relationship
    ->selectable(
        IsRelatedToOperator::make()
            ->titleAttribute('name')
            ->searchable()
            ->multiple(),
    )
```

The `IsRelatedToOperator` is used to configure the "Is / Contains" and "Is not / Does not contain" operators. It provides a select field which allows the user to filter the relationship by which records are attached to it. The `titleAttribute()` method is used to specify which attribute should be used to identify each related record in the list. The `searchable()` method makes the list searchable. The `multiple()` method allows the user to select multiple related records, and if they do, the table will be filtered to show records that match any of the selected related records.

#### Multiple relationships

By default, relationship constraints only include operators that are appropriate for filtering a singular relationship, like a `BelongsTo`. If you have a relationship such as a `HasMany` or `BelongsToMany`, you may wish to mark the constraint as `multiple()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\RelationshipConstraint;

RelationshipConstraint::make('categories')
    ->multiple()
```

This will add the following operators to the constraint:

* Has minimum - filters a column to have at least the specified number of related records
* Has less than - filters a column to have less than the specified number of related records
* Has maximum - filters a column to have at most the specified number of related records
* Has more than - filters a column to have more than the specified number of related records
* Has - filters a column to have the specified number of related records
* Does not have - filters a column to not have the specified number of related records

#### Empty relationship constraints

The `RelationshipConstraint` does not support [`nullable()`](#nullable-constraints) in the same way as other constraints.

If the relationship is `multiple()`, then the constraint will show an option to filter out "empty" relationships. This means that the relationship has no related records. If your relationship is singular, then you can use the `emptyable()` method to show an option to filter out "empty" relationships:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\RelationshipConstraint;

RelationshipConstraint::make('creator')
    ->emptyable()
```

If you have a `multiple()` relationship that must always have at least 1 related record, then you can use the `emptyable(false)` method to hide the option to filter out "empty" relationships:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\RelationshipConstraint;

RelationshipConstraint::make('categories')
    ->emptyable(false)
```

#### Nullable constraints

By default, constraints will not show an option to filter `null` values. If you'd like to show an option to filter `null` values, you can use the `nullable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\TextConstraint;

TextConstraint::make('name')
    ->nullable()
```

Now, the following operators are also available:

* Is filled - filters a column to not be empty
* Is blank - filters a column to be empty

## Scoping relationships

When you use a relationship constraint, you can scope the relationship to filter the related records using the `modifyRelationshipQueryUsing()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\TextConstraint;
use Illuminate\Database\Eloquent\Builder;

TextConstraint::make('creator.name')
    ->label('Admin creator name')
    ->modifyRelationshipQueryUsing(fn (Builder $query) => $query->where('is_admin', true))
```

## Customizing the constraint icon

Each constraint type has a default [icon](../../styling/icons), which is displayed next to the label in the picker. You can customize the icon for a constraint by passing its name to the `icon()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\TextConstraint;

TextConstraint::make('author.name')
    ->icon('heroicon-m-user')
```

## Overriding the default operators

Each constraint type has a set of default operators, which you can customize by using the `operators()`method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Operators\IsFilledOperator;
use Filament\QueryBuilder\Constraints\TextConstraint;

TextConstraint::make('author.name')
    ->operators([
        IsFilledOperator::make(),
    ])
```

This will remove all operators, and register the `EqualsOperator`.

If you'd like to add an operator to the end of the list, use `pushOperators()` instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Operators\IsFilledOperator;
use Filament\QueryBuilder\Constraints\TextConstraint;

TextConstraint::make('author.name')
    ->pushOperators([
        IsFilledOperator::class,
    ])
```

If you'd like to add an operator to the start of the list, use `unshiftOperators()` instead:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Operators\IsFilledOperator;
use Filament\QueryBuilder\Constraints\TextConstraint;

TextConstraint::make('author.name')
    ->unshiftOperators([
        IsFilledOperator::class,
    ])
```

## Creating custom constraints

Custom constraints can be created "inline" with other constraints using the `Constraint::make()` method. You should also pass an [icon](#customizing-the-constraint-icon) to the `icon()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Constraint;

Constraint::make('subscribed')
    ->icon('heroicon-m-bell')
    ->operators([
        // ...
    ]),
```

If you want to customize the label of the constraint, you can use the `label()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Constraint;

Constraint::make('subscribed')
    ->label('Subscribed to updates')
    ->icon('heroicon-m-bell')
    ->operators([
        // ...
    ]),
```

Now, you must [define operators](#creating-custom-operators) for the constraint. These are options that you can pick from to filter the column. If the column is [nullable](#nullable-constraints), you can also register that built-in operator for your custom constraint:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Constraint;
use Filament\QueryBuilder\Constraints\Operators\IsFilledOperator;

Constraint::make('subscribed')
    ->label('Subscribed to updates')
    ->icon('heroicon-m-bell')
    ->operators([
        // ...
        IsFilledOperator::class,
    ]),
```

### Creating custom operators

Custom operators can be created using the `Operator::make()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\QueryBuilder\Constraints\Operators\Operator;

Operator::make('subscribed')
    ->label(fn (bool $isInverse): string => $isInverse ? 'Not subscribed' : 'Subscribed')
    ->summary(fn (bool $isInverse): string => $isInverse ? 'You are not subscribed' : 'You are subscribed')
    ->baseQuery(fn (Builder $query, bool $isInverse) => $query->{$isInverse ? 'whereDoesntHave' : 'whereHas'}(
        'subscriptions.user',
        fn (Builder $query) => $query->whereKey(auth()->user()),
    )),
```

In this example, the operator is able to filter records based on whether or not the authenticated user is subscribed to the record. A subscription is recorded in the `subscriptions` relationship of the table.

The `baseQuery()` method is used to define the query that will be used to filter the records. The `$isInverse` argument is `false` when the "Subscribed" option is selected, and `true` when the "Not subscribed" option is selected. The function is applied to the base query of the table, where `whereHas()` can be used. If your function does not need to be applied to the base query of the table, like when you are using a simple `where()` or `whereIn()`, you can use the `query()` method instead, which has the bonus of being able to be used inside nested "OR" groups.

The `label()` method is used to render the options in the operator select. Two options are registered for each operator, one for when the operator is not inverted, and one for when it is inverted.

The `summary()` method is used in the header of the constraint when it is applied to the query, to provide an overview of the active constraint.

## Customizing the constraint picker

### Changing the number of columns in the constraint picker

The constraint picker has only 1 column. You may customize it by passing a number of columns to `constraintPickerColumns()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Filters\QueryBuilder;

QueryBuilder::make()
    ->constraintPickerColumns(2)
    ->constraints([
        // ...
    ])
```

This method can be used in a couple of different ways:

* You can pass an integer like `constraintPickerColumns(2)`. This integer is the number of columns used on the `lg` breakpoint and higher. All smaller devices will have just 1 column.
* You can pass an array, where the key is the breakpoint and the value is the number of columns. For example, `constraintPickerColumns(['md' => 2, 'xl' => 4])` will create a 2 column layout on medium devices, and a 4 column layout on extra large devices. The default breakpoint for smaller devices uses 1 column, unless you use a `default` array key.

Breakpoints (`sm`, `md`, `lg`, `xl`, `2xl`) are defined by Tailwind, and can be found in the [Tailwind documentation](https://tailwindcss.com/docs/responsive-design#overview).

### Increasing the width of the constraint picker

When you [increase the number of columns](#changing-the-number-of-columns-in-the-constraint-picker), the width of the dropdown should increase incrementally to handle the additional columns. If you'd like more control, you can manually set a maximum width for the dropdown using the `constraintPickerWidth()` method. Options correspond to [Tailwind's max-width scale](https://tailwindcss.com/docs/max-width). The options are `xs`, `sm`, `md`, `lg`, `xl`, `2xl`, `3xl`, `4xl`, `5xl`, `6xl`, `7xl`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Filters\QueryBuilder;

QueryBuilder::make()
    ->constraintPickerColumns(3)
    ->constraintPickerWidth('2xl')
    ->constraints([
        // ...
    ])
```

<EditOnGitHub version="5.x" path="packages/tables/docs/03-filters/04-query-builder.md" />

<Footer />
