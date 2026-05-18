> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# AI-assisted development

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

<Info>
  This page is inspired by Laravel's [AI Assisted Development documentation](https://laravel.com/docs/ai). Laravel Boost is developed by the Laravel team, and you can find out more about it in their official docs, alongside other information about building Laravel projects with AI assistance.
</Info>

AI coding agents like [Claude Code](https://www.claude.com/product/claude-code), [Cursor](https://cursor.com), and [GitHub Copilot](https://github.com/features/copilot) can significantly accelerate your Filament development. Filament includes guidelines for [Laravel Boost](https://laravel.com/ai/boost) that teach AI agents how to write idiomatic Filament code and follow framework conventions. Laravel Boost even allows your agent to search the Filament documentation for answers when it encounters unfamiliar requirements.

## Installing Laravel Boost

Install Boost as a development dependency:

```bash theme={"theme":"gruvbox-dark-hard"}
composer require laravel/boost --dev
```

Then run the interactive installer and select **Filament** when prompted:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan boost:install
```

The installer will detect your IDE and AI agents, generating the necessary configuration files. To verify installation, check your `AGENTS.md`, `CLAUDE.md`, or similar file for a new **Filament** section.

For more information about Laravel Boost, including available tools, documentation search, and IDE integration, see the [Laravel AI documentation](https://laravel.com/docs/ai).

## Filament Blueprint

The guidelines included with Boost are designed primarily for **implementing agents**: they help agents write correct Filament code once they know what to build. However, the quality of AI-generated code depends heavily on the quality of the plan. When an implementing agent has a clear, detailed specification, it can focus entirely on writing correct code rather than guessing at requirements or making assumptions about your intent.

For complex features, you may find that agents struggle with the planning phase: choosing the right components, structuring relationships, and anticipating edge cases. A vague plan leads to vague code, and you end up spending more time correcting the agent than you saved by using it.

**Filament Blueprint is a premium extension that helps AI agents produce accurate, detailed implementation plans for Filament.** It's compatible with Filament v4 and above.

Blueprint bridges the gap between what you want and what AI agents build. Instead of hoping an agent understands Filament's conventions, Blueprint provides structured planning guidelines that produce unambiguous specification documents.

A blueprint specifies everything an implementing agent needs:

* **Models**: Attributes, casts, relationships, and enums with exact syntax
* **Resources**: Full namespaces, scaffold commands, and configuration
* **Forms**: Field components, validation rules, and layout structure
* **Tables**: Columns, filters, actions, and sorting behavior
* **Authorization**: Plain-English policy rules that translate directly to code
* **Testing**: What to test and how to verify it works
* **More**: Reactive fields, wizards, imports/exports, bulk actions, widgets, multi-tenancy, and more

The guidelines cover details that agents commonly get wrong, like namespaces, method names, component selection, and nested layout calculations, so the implementing agent can write correct code on the first try.

The planning guidelines are designed for planning agents only, they shouldn't consume the implementing agent's context window. The planning agent copies all necessary details (namespaces, documentation URLs to fetch, exact method syntax) into the blueprint itself, so the implementing agent has everything it needs without loading the guidelines.

If you're interested in an example of a plan that Claude Opus 4.5 can write with and without Blueprint, visit the [Blueprint Plan Example](#blueprint-plan-example) section.

### Installing Blueprint

Blueprint is compatible with Filament v4 and above.

Once you have [purchased a license for Blueprint](https://packages.filamentphp.com/portal/blueprint/checkout), install it via Composer:

```bash theme={"theme":"gruvbox-dark-hard"}
composer config repositories.filament composer https://packages.filamentphp.com/composer
composer config --auth http-basic.packages.filamentphp.com "YOUR_EMAIL_ADDRESS" "YOUR_LICENSE_KEY"
composer require filament/blueprint --dev
```

Then run the Boost installer and select **Filament Blueprint** when prompted:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan boost:install
```

To verify installation, check your `AGENTS.md`, `CLAUDE.md`, or similar file for a new **Filament Blueprint** section.

<Info>
  To access your purchased license, sign in to [Filament Packages](https://packages.filamentphp.com) with the email address used to purchase your Blueprint license.
</Info>

### Using Blueprint

To create a blueprint, enable **planning mode** in your AI agent and ask it to create a Filament Blueprint for your feature:

```
Create a Filament Blueprint for an order management system.

Orders belong to customers and have many order items. Each order has a status
(pending, confirmed, shipped, delivered, cancelled), shipping address, and
optional notes. Order items reference products with quantity and unit price.

I need to search orders by customer name and filter by status and date range.
The order form should calculate line totals automatically as items are added.
Only admins can delete orders, and orders can only be cancelled if not yet shipped.
```

The agent will produce a detailed specification document ready for direct implementation.

### Blueprint Plan Example

The following prompt was used with Claude Opus 4.5 in planning mode using Claude Code CLI:

```markdown theme={"theme":"gruvbox-dark-hard"}
Produce an implementation plan for a Filament v4 application. The application is
a SaaS invoicing system with the following capabilities:

- Manage customers
- Manage products
- Create and edit invoices
- Add line items to invoices
- Send invoices to customers
- Record and track payments
  
The plan should:
- Describe the primary user flows end to end (for example: creating an invoice,
  sending it, recording a payment).
- Map each domain concept and flow to concrete Filament primitives (Resources,
  Relation Managers, Pages, Actions).
- Identify state transitions (such as draft → sent → paid) and the Actions that
  trigger them.
```

You can read a plan written for this prompt [**without Blueprint**](https://filamentphp.com/blueprint/examples/invoicing/before.md) vs. [**with Blueprint**](https://filamentphp.com/blueprint/examples/invoicing/after.md), and compare the level of detail and thoughtfulness. You could have a go at passing these plans to your AI agent of choice in implementation mode to see how they perform!

<Info>
  When using Blueprint, `Using Filament Blueprint` was added at the start of the prompt.
</Info>

### Reporting issues with Blueprint

If you encounter any issues or have suggestions for improving Filament Blueprint, please open an issue or discussion on the [Filament Blueprint Issues GitHub repository](https://github.com/filamentphp/blueprint-issues). If you have account or purchase-related questions, please email [support@filamentphp.com](mailto:support@filamentphp.com).

<EditOnGitHub version="5.x" path="docs/01-introduction/03-ai.md" />

<Footer />
