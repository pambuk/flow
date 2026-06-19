# Artifact 3 - Contributors And Support Map

Status: working report.
Generated: 2026-06-19.
Scope: five support areas derived from `context/map/artifact-1-territory.md` and checked against the structural pressure points in `context/map/artifact-2-structure.md`.

## Method

History window: `git log --all --no-merges --since=2025-06-19`, using all local refs. The newest commit available in the checkout is dated 2026-06-14, so the effective evidence window is 2025-06-19 through 2026-06-14.

Counts are unique non-merge commits touching an area's paths, not changed-file counts or lines of code. A commit can appear in more than one area when it crosses boundaries. Author aliases were merged where the local history provided a clear identity match:

- Norbert Orzechowicz: `contact@norbert.tech` and the `norberttech` GitHub noreply address.
- Joseph Bielawski: the `stloyd` GitHub noreply and Gmail addresses.
- `g` / `gCass`: `g.cassini@trustfull.com` and the matching GitHub noreply identity.

Excluded from the support signal:

- `aeon-automation` (444 repository-wide commits in the window).
- `dependabot[bot]` (58 repository-wide commits in the window).
- Merge commits, to avoid counting both a change and its merge wrapper.
- Agent-only authorship from Claude, Codex, or Copilot. No such author identities were found in this window. Commits with a named human author remain attributed to that human; commit messages alone were not used to infer hidden ownership.

Repository-wide human baseline after filtering:

| Contributor | Commits |
| --- | ---: |
| Norbert Orzechowicz | 514 |
| Joseph Bielawski | 53 |
| `g` / `gCass` | 3 |
| Jérémy DECOOL | 2 |
| zenas1210 | 1 |
| Jaap van Otterdijk | 1 |
| Ben Davies | 1 |
| Aleksander Kowalski | 1 |
| Leith Caldwell | 1 |
| Tim Goudriaan | 1 |

## Top Five Areas That May Need Contributor Contact

These are the five live zones identified by Artifact 1. Artifact 2 confirms that the first four also sit on important dependency or integration boundaries.

| Area | Why contact may be needed | Included history |
| --- | --- | --- |
| PostgreSQL platform | Highest activity; parser/AST, schema, migrations, adapter, and Symfony consumers move together. | Current PostgreSQL library, historical `pg-query`, PostgreSQL adapter, PostgreSQL Symfony/PHPUnit/Valinor bridges, pg-query extension, focused docs. |
| Core ETL | Main package hub and public API surface; tightly coupled to Types, Filesystem, adapters, and DSL documentation. | `src/core/etl`. |
| Parquet stack | Reader/writer and schema behavior crosses Parquet, ETL adapter, Filesystem, and Types; Artifact 2 also found a reverse library-to-adapter source edge. | Parquet library/viewer, ETL Parquet adapter, focused docs. |
| Telemetry platform | Base signals, OTLP, PSR/Monolog, PHPUnit, Symfony wiring, and exporter behavior form one integration-heavy support line. | Telemetry library and telemetry-related bridges plus focused docs. |
| Website and documentation | High recent activity and broad product-surface coupling across content, examples, navigation, package docs, and website integrations. | `web/landing` and `documentation`. |

## Support Line 1 - PostgreSQL Platform

Human commits in scope: 159.

| Contributor | Commits | Thematic activity | Support value |
| --- | ---: | --- | --- |
| Norbert Orzechowicz | 156 | PostgreSQL parser and protobuf AST; query builder; schema/default comparison; migrations and catalog; typed client values; ETL adapter conversion/loading; Symfony PostgreSQL bridges; pg-query-to-PostgreSQL evolution. | Primary contact for architecture, public APIs, parser/query behavior, schema migration semantics, adapter integration, and Symfony integration. |
| Joseph Bielawski | 2 | Symfony XML-to-PHP configuration migration and subtree-PR CI hardening. | Secondary contact for current Symfony configuration conventions and CI mechanics, not broad PostgreSQL ownership. |
| Jérémy DECOOL | 1 | PHPUnit bridge compatibility across PHPUnit 11/12/13. | Targeted contact for PHPUnit compatibility only. |

Representative evidence:

- `818f0ba8d` - Web Profiler integration for telemetry and PostgreSQL bundles.
- `c6f07aec7` - stale-cast drift detection in column/domain default comparison.
- `97c62816d` - UTC timestamp default for `DateTimeInterface`.
- `6d8fd87d2` - explicit PostgreSQL index column position in the ETL adapter.
- `a76049214` and `b0a8e93df` - AST traversal and parser nesting fixes.
- `65357c2b8` - Joseph Bielawski's Symfony PHP-configuration migration.

Ask Norbert before changing parser/AST contracts, query or schema DSL, migration semantics, type conversion, or adapter/bundle APIs. Ask Joseph when the question is specifically about the new Symfony PHP configuration shape.

## Support Line 2 - Core ETL

Human commits in scope: 122.

| Contributor | Commits | Thematic activity | Support value |
| --- | ---: | --- | --- |
| Norbert Orzechowicz | 98 | DataFrame and Entry contracts; DSL/functions; extractors/loaders and adapter-facing interfaces; schema/type tightening; static-analysis migration and broad test maintenance. | Primary contact for ETL architecture, DataFrame execution, public DSL, rows/schema contracts, and cross-adapter changes. |
| Joseph Bielawski | 22 | HTML/XML and DOM scalar functions; HTML entry/type work; `Parameter::asNumber()` behavior; EntryFactory and Rows/join contracts; partition schema preservation; dependency compatibility. | Strong secondary contact for functions, entries, parameters, HTML/XML behavior, and EntryFactory/Rows evolution. |
| Aleksander Kowalski | 1 | EntryFactory behavior change. | Targeted historical context for the EntryFactory change in `29efaa183`. |
| zenas1210 | 1 | `brick/math` compatibility range. | Targeted dependency-compatibility context only. |

Representative evidence:

- `aa83ce4cf` - DataFrame Entry contract refactor.
- `1efdd51ab` - core static-analysis coverage with Mago.
- `42538b873` - `Parameter::asNumber()` behavior adjustment.
- `6b50249d5` - Rows/EntryFactory and join contract changes.
- `6158974ca` - partitioning should not overwrite schema.

Norbert is the first contact for cross-cutting ETL changes. Joseph is a credible second line when work concerns scalar functions, HTML/XML entries, parameters, or EntryFactory/Rows contracts.

## Support Line 3 - Parquet Stack

Human commits in scope: 65.

| Contributor | Commits | Thematic activity | Support value |
| --- | ---: | --- | --- |
| Norbert Orzechowicz | 56 | Parquet reader/writer and Thrift model evolution; schema/type tightening; ETL adapter integration; viewer maintenance; static-analysis migration. | Primary contact for Parquet architecture, format behavior, schema conversion, adapter integration, and viewer/tooling changes. |
| Joseph Bielawski | 6 | Mostly cross-repository dependency, Symfony baseline, HTML entry, and HTTP adapter changes that also touched this scope. | Weak Parquet-specific ownership signal; useful for the cross-cutting compatibility changes represented by those commits. |
| `g` / `gCass` | 3 | Parquet metadata/null-count bug fix, static-analysis cleanup, and a write/read smoke test. | Targeted recent specialist for metadata null counts and the regression covered by `0f5f3393a`. |

Representative evidence:

- `4be14757b` - Parquet migration to Mago.
- `d3a74d087` - structure type-definition tightening.
- `32b4bd09d` - Parquet metadata fix by `g`.
- `0f5f3393a` - null-count write/read smoke test by `g`.

Use Norbert for general Parquet work. Include `g` when investigating metadata null counts or the related round-trip regression. Do not interpret Joseph's six path-touching commits as general Parquet ownership without checking the specific change.

## Support Line 4 - Telemetry Platform

Human commits in scope: 96.

| Contributor | Commits | Thematic activity | Support value |
| --- | ---: | --- | --- |
| Norbert Orzechowicz | 89 | Telemetry signal/pipeline design; logs, filters, samplers, and resource attributes; OTLP exporters and test isolation; PSR/Monolog/Symfony bridges; framework instrumentation and Web Profiler integration. | Primary contact for telemetry architecture and every end-to-end signal/export/instrumentation path. |
| Joseph Bielawski | 4 | Moving `SerializerType` from PHPUnit to OTLP; Symfony PHP configuration migration; CI and dependency compatibility. | Secondary contact for serializer placement and Symfony configuration conventions. |
| Jérémy DECOOL | 2 | PHPUnit telemetry memory-usage data and PHPUnit 11/12/13 bridge compatibility. | Targeted contact for PHPUnit telemetry payloads and version compatibility. |
| Ben Davies | 1 | Symfony compiler-pass regex delimiter/modifier support. | Targeted contact for compiler-pass pattern matching. |

Representative evidence:

- `72b80efa7` - attribute filtering, log pipeline, and attribute-matching sampler.
- `fc58b91b1` - isolated OTLP gRPC tests for the PHP 8.5 shutdown issue.
- `7409bcd60` - configurable PHPUnit telemetry resource attributes.
- `405b69cc3` - Joseph Bielawski's `SerializerType` move from PHPUnit to OTLP.
- `8799c2356` - Jérémy DECOOL's PHPUnit telemetry memory-usage addition.
- `8fea00025` - Ben Davies's compiler-pass regex fix.

Norbert is the default contact. Route narrow PHPUnit telemetry questions to Jérémy, serializer/configuration questions to Joseph, and regex compiler-pass behavior to Ben.

## Support Line 5 - Website And Documentation

Human commits in scope: 294; eight bot commits were excluded.

| Contributor | Commits | Thematic activity | Support value |
| --- | ---: | --- | --- |
| Norbert Orzechowicz | 278 | Product and package documentation; examples/playground; website content and templates; package installation pages; analytics/RUM integrations; navigation and feature documentation coordinated with source changes. | Primary contact for documentation architecture, website behavior, publishing conventions, and current product narratives. |
| Joseph Bielawski | 13 | HTML/DOM entry and scalar-function docs; Symfony String slug migration; EntryFactory documentation accompanying API changes. | Secondary contact for HTML/DOM documentation and the slug/API migrations he implemented. |
| Jaap van Otterdijk | 1 | Installation-documentation link updates. | Targeted contact for the link correction in `e724fe0f7`. |
| Leith Caldwell | 1 | Contributing/installation references and typo fixes. | Targeted historical context for `a0c62918f`. |
| Jérémy DECOOL | 1 | Documentation accompanying PHPUnit telemetry memory usage. | Targeted contact for that PHPUnit telemetry documentation. |

Representative evidence:

- `f501c8eb3` - standalone installation instructions for each package.
- `95c6cecce` - playground examples and documentation fixes.
- `41b8d4f16` and `1729a80b7` - website analytics and Datadog RUM integration.
- `8f235f95b` - Joseph Bielawski's HTML entry documentation.
- `e724fe0f7` - installation link corrections by Jaap van Otterdijk.
- `a0c62918f` - contributing/installation reference fixes by Leith Caldwell.

Norbert is the default contact for the website and docs system. For subject-matter docs, also use the contributor map for the underlying package; many documentation commits are part of product changes rather than independent website ownership.

## Cross-Area Handoff Guidance

| Planned change | First contact | Additional context to seek |
| --- | --- | --- |
| PostgreSQL parser, query builder, schema, migration, adapter, or bundle | Norbert Orzechowicz | Joseph Bielawski for Symfony PHP configuration; Jérémy DECOOL for PHPUnit compatibility. |
| DataFrame, ETL DSL, Entry/Rows, schema, or adapter contract | Norbert Orzechowicz | Joseph Bielawski for HTML/XML/functions and EntryFactory/Rows history. |
| Parquet schema conversion, reader/writer, metadata, or adapter | Norbert Orzechowicz | `g` / `gCass` for metadata null counts and the round-trip regression. |
| Telemetry signals, exporters, OTLP, or framework instrumentation | Norbert Orzechowicz | Joseph for serializer/config; Jérémy for PHPUnit telemetry; Ben for compiler-pass regex matching. |
| Website/docs structure or publishing | Norbert Orzechowicz | The relevant package contributor for technical accuracy; Joseph for HTML/DOM docs. |

## Caveats

- This is a support map inferred from commits, not a formal ownership declaration.
- Commit counts measure frequency, not depth, review activity, availability, or current responsibility.
- Broad refactors and dependency updates can touch an area without demonstrating domain expertise; the thematic summaries and representative commits should carry more weight than raw counts.
- Historical `src/lib/pg-query` activity is folded into PostgreSQL because that package was renamed and is not a live separate territory.
- Before contacting a contributor, inspect the listed commits and run `git blame` on the exact code being changed; file-level evidence can narrow the handoff further.
