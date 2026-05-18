---
name: filament-5-best-practices
description: "Apply this skill whenever building, reviewing, or refactoring Filament 5 panels, resources, forms, tables, actions, widgets, notifications, navigation, schemas, and plugins. Use this skill to enforce Filament 5 conventions and implementation patterns based on the official Filament v5 documentation mirrored in the rules directory."
license: MIT
metadata:
  author: filament
---

# Filament 5 Best Practices

This skill is a local mirror of official Filament 5 markdown documentation.

## Consistency First

Before applying any recommendation, inspect existing patterns in the codebase and follow established conventions first. When multiple valid Filament approaches exist, prefer consistency with sibling resources, pages, forms, tables, and widgets.

## Rule Source

All rule markdown files live under `rules/` with the original Filament docs folder structure preserved.

Examples:
- `rules/actions/*.md`
- `rules/forms/*.md`
- `rules/tables/**/*.md`
- `rules/resources/*.md`
- `rules/plugins/*.md`

## How to Apply

1. Locate the relevant Filament topic folder under `rules/`.
2. Read the matching markdown(s) for the feature you are implementing.
3. Follow existing project conventions when they differ in non-critical ways.
4. Prefer official Filament patterns from these rule files for new implementations.
