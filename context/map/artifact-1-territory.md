# Artifact 1 - Territory From Git History

Status: working report.
Generated: 2026-06-14.
Scope: repository-wide git history for the last 12 months.

## Method

History window: `git log --since=2025-06-14`, newest commit dated 2026-06-14, oldest included commit dated 2025-06-17.

Total commits in window: 1,147.

Counts below are changed-file mentions, not unique commits. A file changed in three commits counts three times. The main activity rankings filter out lockfiles, generated `phpdoc/`, changelogs, dotenvs, CI metadata, manifests, root build/config files, binary packaged artifacts, and other broad automation noise. The "common denominator" section intentionally re-checks some excluded files because the prompt asks whether config, generated files, or repo-wide shared files are coupling otherwise separate areas.

Current-path checks were done against the checkout on 2026-06-14.

## Current Repository Shape

Flow is a PHP ETL and data processing monorepo. Source code is concentrated under `src/`, with 4,207 PHP files in the current checkout.

Top-level territory:

- `src/core/etl/` - central ETL API, `Flow`, `DataFrame`, rows, schema, functions, extractors, loaders, transformations, windows, joins, cache, retry, and telemetry configuration.
- `src/adapter/` - ETL adapters for Avro, ChartJS, CSV, Doctrine, Elasticsearch, Excel, Google Sheet, HTTP, JSON, Logger, Parquet, PostgreSQL, Text, and XML.
- `src/lib/` - reusable libraries: `array-dot`, `azure-sdk`, `doctrine-dbal-bulk`, `dremel`, `filesystem`, `parquet`, `parquet-viewer`, `postgresql`, `snappy`, `telemetry`, and `types`.
- `src/bridge/` - framework and protocol bridges: filesystem providers, Monolog, OpenAPI, PHPStan, PHPUnit, PostgreSQL Valinor, PSR telemetry, Symfony bundles/cache/session/messenger/http-foundation, and OTLP telemetry.
- `src/cli/` - command-line package and `flow` executable.
- `src/extension/` - Arrow and pg-query extension areas.
- `src/tools/documentation/` - documentation tooling package.
- `documentation/`, `web/landing/` - docs and website.
- `tools/`, `.github/`, `docker/`, `terraform/`, `wasm/` - build, CI, deployment, packaging, and auxiliary runtime areas.

Important current-state correction: history contains `examples/topics/...`, but there is no `examples/` directory in the current checkout.

## Activity - Top Modules

Top package-level paths after noise filtering:

| Rank | Path | Changed-file mentions | Current? |
| ---: | --- | ---: | :---: |
| 1 | `src/lib/postgresql` | 4,806 | yes |
| 2 | `src/core/etl` | 3,271 | yes |
| 3 | `src/lib/pg-query` | 1,378 | no |
| 4 | `src/lib/parquet` | 1,136 | yes |
| 5 | `src/lib/telemetry` | 1,080 | yes |
| 6 | `web/landing/content` | 764 | yes |
| 7 | `src/lib/types` | 449 | yes |
| 8 | `src/bridge/telemetry/otlp` | 397 | yes |
| 9 | `src/bridge/symfony/telemetry-bundle` | 389 | yes |
| 10 | `src/lib/filesystem` | 379 | yes |
| 11 | `examples/topics/data_frame` | 312 | no |
| 12 | `src/bridge/symfony/postgresql-bundle` | 297 | yes |
| 13 | `documentation/components/libs` | 273 | yes |
| 14 | `src/bridge/symfony/filesystem-bundle` | 256 | yes |
| 15 | `src/adapter/etl-adapter-postgresql` | 219 | yes |

Interpretation:

- PostgreSQL is the strongest hands-on territory. It includes the current `src/lib/postgresql` package and a historical `src/lib/pg-query` package that was renamed into PostgreSQL on 2025-12-11.
- Core ETL remains the second-largest activity center and couples frequently to types, filesystem, parquet, adapters, and website code.
- Telemetry and Symfony bridges form the second major 2026 cluster after PostgreSQL/core.
- Website/docs/content activity is meaningful, but some historical example paths are no longer present.

## Activity - Lower-Level Folders

Top lower-level folders after noise filtering:

| Rank | Folder | Changed-file mentions |
| ---: | --- | ---: |
| 1 | `src/lib/postgresql/src/Flow/PostgreSql/Protobuf/AST` | 1,037 |
| 2 | `src/core/etl/src/Flow/ETL/Function` | 624 |
| 3 | `src/core/etl/tests/Flow/ETL/Tests/Unit/Function` | 347 |
| 4 | `src/lib/pg-query/src/Flow/PgQuery/Protobuf/AST` | 343 |
| 5 | `src/core/etl/src/Flow/ETL/Row/Entry` | 169 |
| 6 | `documentation/installation/packages` | 160 |
| 7 | `src/core/etl/tests/Flow/ETL/Tests/Integration/Function` | 129 |
| 8 | `src/lib/postgresql/tests/Flow/PostgreSql/Tests/Unit/Client/Types/Converter` | 129 |
| 9 | `src/core/etl/tests/Flow/ETL/Tests/Unit/Row/Entry` | 122 |
| 10 | `src/lib/parquet/src/Flow/Parquet/ThriftModel` | 120 |

This goes below broad `src/lib` / `src/core` buckets and shows the real hands-on pressure points: PostgreSQL parser/protobuf AST, ETL function implementation and tests, row entries, package installation docs, PostgreSQL type conversion, and Parquet thrift models.

## Activity - Top Files

Top files after filtering broad automation/config noise:

| Rank | File | Changed-file mentions | Current? |
| ---: | --- | ---: | :---: |
| 1 | `src/lib/pg-query/src/Flow/PgQuery/DSL/functions.php` | 39 | no |
| 2 | `src/core/etl/src/Flow/ETL/DSL/functions.php` | 35 | yes |
| 3 | `web/landing/assets/codemirror/completions/dsl.js` | 26 | yes |
| 4 | `web/landing/templates/documentation/navigation_right.html.twig` | 22 | yes |
| 5 | `documentation/components/libs/pg-query.md` | 19 | no |
| 6 | `documentation/components/libs/postgresql.md` | 18 | yes |
| 7 | `src/core/etl/src/Flow/ETL/DataFrame.php` | 18 | yes |
| 8 | `src/lib/postgresql/src/Flow/PostgreSql/Client/Infrastructure/PgSql/PgSqlClient.php` | 18 | yes |
| 9 | `src/lib/postgresql/src/Flow/PostgreSql/DSL/functions.php` | 18 | no |
| 10 | `web/landing/templates/base.html.twig` | 17 | yes |
| 11 | `documentation/components/bridges/symfony-telemetry-bundle.md` | 16 | yes |
| 12 | `src/core/etl/tests/Flow/ETL/Tests/Unit/Row/EntryFactoryTest.php` | 16 | yes |
| 13 | `documentation/upgrading.md` | 15 | yes |
| 14 | `src/bridge/symfony/telemetry-bundle/tests/Flow/Bridge/Symfony/TelemetryBundle/Tests/Integration/FlowTelemetryExtensionTest.php` | 15 | yes |
| 15 | `src/lib/types/src/Flow/Types/DSL/functions.php` | 15 | yes |

Current-path notes:

- `src/lib/pg-query/...` and `documentation/components/libs/pg-query.md` are historical. Git history shows `refactor: renamed library from flow-php/pg-query to flow-php/postgresql` on 2025-12-11.
- `src/lib/postgresql/src/Flow/PostgreSql/DSL/functions.php` is also historical. The current checkout has split PostgreSQL DSL files such as `client.php`, `condition.php`, `parser.php`, `query.php`, `schema.php`, plus `src/lib/postgresql/src/Flow/PostgreSql/Migrations/DSL/functions.php`.

## Quarterly Shift

The first and last quarters are partial because the window starts in mid-June 2025 and ends on 2026-06-14.

### 2025-Q2

Top modules:

- `src/core/etl` - 198
- `src/lib/types` - 44
- `src/lib/parquet` - 30
- `src/lib/azure-sdk` - 20
- `src/adapter/etl-adapter-csv` - 19

Read: late Q2 was core ETL and types work, with smaller adapter and parquet touches.

### 2025-Q3

Top modules:

- `src/lib/parquet` - 311
- `src/core/etl` - 139
- `src/cli` - 21
- `src/lib/doctrine-dbal-bulk` - 20
- `src/lib/filesystem` - 20

Read: Q3 shifted toward Parquet internals, with core ETL still active but secondary.

### 2025-Q4

Top modules:

- `src/lib/postgresql` - 1,434
- `src/lib/pg-query` - 1,378
- `src/core/etl` - 710
- `examples/topics/data_frame` - 182
- `documentation/components/libs` - 163

Read: Q4 is the PostgreSQL/pg-query transition quarter. `pg-query` is historical and was folded into `postgresql`; the current checkout should treat this as PostgreSQL-platform history, not a live separate module.

### 2026-Q1

Top modules:

- `web/landing/content` - 724
- `src/core/etl` - 392
- `src/lib/telemetry` - 371
- `src/lib/parquet` - 188
- `examples/topics/data_frame` - 130

Read: Q1 moved attention to website content, core ETL, telemetry, parquet, and example/data-frame history. The `examples/` path is not current.

### 2026-Q2

Top modules:

- `src/lib/postgresql` - 3,287
- `src/core/etl` - 1,832
- `src/lib/telemetry` - 709
- `src/lib/parquet` - 552
- `src/bridge/telemetry/otlp` - 326
- `src/bridge/symfony/postgresql-bundle` - 297
- `src/lib/types` - 282
- `src/bridge/symfony/telemetry-bundle` - 275

Read: Q2 is the densest current quarter. The active center is PostgreSQL plus core ETL, with telemetry, OTLP, Symfony PostgreSQL, types, and parquet close behind.

## Co-Changes - Top Pairs

Pairs of module paths appearing in the same commit after noise filtering:

| Rank | Pair | Shared commits | Current? |
| ---: | --- | ---: | :---: |
| 1 | `web/landing/assets` + `web/landing/templates` | 35 | yes / yes |
| 2 | `src/core/etl` + `src/lib/types` | 28 | yes / yes |
| 3 | `documentation/components/libs` + `src/lib/pg-query` | 27 | yes / no |
| 4 | `src/core/etl` + `src/lib/filesystem` | 24 | yes / yes |
| 5 | `src/core/etl` + `src/lib/parquet` | 23 | yes / yes |
| 6 | `src/adapter/etl-adapter-parquet` + `src/core/etl` | 22 | yes / yes |
| 7 | `src/adapter/etl-adapter-doctrine` + `src/core/etl` | 21 | yes / yes |
| 8 | `documentation/components/bridges` + `documentation/components/libs` | 20 | yes / yes |
| 9 | `src/adapter/etl-adapter-csv` + `src/core/etl` | 20 | yes / yes |
| 10 | `src/core/etl` + `web/landing/src` | 20 | yes / yes |

Top 3 interpretation:

1. `web/landing/assets` + `web/landing/templates`: website UI and documentation presentation move together. This is mostly a web/landing coupling, not a source-package coupling.
2. `src/core/etl` + `src/lib/types`: core ETL behavior and type-system contracts are tightly coupled. This is the strongest current source-code pair.
3. `documentation/components/libs` + `src/lib/pg-query`: this is historically strong but not current as a live package pair. Treat it as part of the PostgreSQL rename/migration story, not as a present-day `pg-query` module.

Other useful source-code couplings:

- `src/core/etl` + `src/lib/filesystem`
- `src/core/etl` + `src/lib/parquet`
- `src/adapter/etl-adapter-parquet` + `src/core/etl`
- `src/bridge/symfony/telemetry-bundle` + `src/lib/telemetry`
- `documentation/components/libs` + `src/lib/postgresql`

## Co-Changes - Top Triples

Top triples are dominated by adapters plus core ETL:

| Rank | Triple | Shared commits | Current? |
| ---: | --- | ---: | :---: |
| 1 | `src/adapter/etl-adapter-csv` + `src/adapter/etl-adapter-excel` + `src/core/etl` | 16 | yes / yes / yes |
| 2 | `src/adapter/etl-adapter-json` + `src/adapter/etl-adapter-parquet` + `src/core/etl` | 16 | yes / yes / yes |
| 3 | `src/adapter/etl-adapter-csv` + `src/adapter/etl-adapter-json` + `src/adapter/etl-adapter-parquet` | 15 | yes / yes / yes |
| 4 | `src/adapter/etl-adapter-csv` + `src/adapter/etl-adapter-json` + `src/core/etl` | 15 | yes / yes / yes |
| 5 | `src/adapter/etl-adapter-csv` + `src/adapter/etl-adapter-parquet` + `src/core/etl` | 15 | yes / yes / yes |

Read: when commits span three modules, they frequently involve shared adapter behavior or API contract changes radiating through multiple adapters and core ETL.

## Shared Files And Common Denominators

Yes, there are files that behave as repo-wide common denominators:

- `composer.json` - current, broadest shared file; appeared in 46 multi-area commits and co-occurred with 109 distinct filtered module paths. This is a true monorepo/package-boundary denominator.
- `composer.lock` - current, broad dependency-lock denominator; appeared in 36 multi-area commits and co-occurred with 78 distinct filtered module paths. This was excluded from main rankings as lockfile noise.
- `.github/workflows/monorepo-split.yml` - current, broad release/split workflow denominator; appeared in 21 multi-area commits and co-occurred with 81 distinct filtered module paths. This was excluded from main rankings as CI/config noise.
- `manifest.json` and `web/landing/resources/dsl.json` also show broad coupling in less-filtered passes. Both exist now, but they look more like generated or publishing metadata than direct hands-on product territory.

There are also source/docs files that co-occur with many modules because of broad commits, especially website documentation controllers/templates and Parquet files. These should not be treated as universal shared abstractions without local code review; the git signal says they were committed alongside many areas, not necessarily that they are architectural hubs.

## Current-Existence Check For Strong Historical Signals

Do not base later analysis on these as current live paths:

- `src/lib/pg-query/` - not present. Historical package renamed into `src/lib/postgresql/`.
- `documentation/components/libs/pg-query.md` - not present. Current equivalent area is `documentation/components/libs/postgresql.md`.
- `examples/topics/...` - not present. History has activity here, but the current checkout has no `examples/` directory.
- `src/lib/postgresql/src/Flow/PostgreSql/DSL/functions.php` - not present. Current PostgreSQL DSL is split across specific files under `src/lib/postgresql/src/Flow/PostgreSql/DSL/`.

Strong signals that are current and safe to inspect next:

- `src/lib/postgresql/`
- `src/core/etl/`
- `src/lib/parquet/`
- `src/lib/telemetry/`
- `src/lib/types/`
- `src/bridge/telemetry/otlp/`
- `src/bridge/symfony/telemetry-bundle/`
- `src/bridge/symfony/postgresql-bundle/`
- `src/adapter/etl-adapter-postgresql/`
- `documentation/components/libs/postgresql.md`

## Synthesis

The live project territory is not evenly distributed. For the last 12 months, real hands-on work concentrated in five zones:

1. PostgreSQL platform: parser/protobuf AST, query builder, type conversion, schema diffing, migrations, adapter integration, and Symfony PostgreSQL bridges.
2. Core ETL: function DSL, row entries, DataFrame contracts, schema definitions, and adapter-facing behavior.
3. Parquet: thrift model, reader/writer internals, schema conversion, and adapter integration.
4. Telemetry: base telemetry library, OTLP bridge, Symfony telemetry bundle, and documentation.
5. Website/docs: landing content, documentation components, templates, navigation, and DSL/completion presentation.

The largest historical trap is `pg-query`: it looks like a top-3 module in the raw year view, but it is not current. For any next-stage structural or risk analysis, fold `pg-query` history into the PostgreSQL territory and inspect the current `src/lib/postgresql/` implementation instead.
