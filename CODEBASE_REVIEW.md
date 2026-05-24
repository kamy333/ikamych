# Codebase Review and Cleanup Report

Date: 2026-05-23
Branch: `codex/review-codebase-cleanup`
Scope: legacy PHP application in `S:\ikamych`, with emphasis on code that can be deleted, moved out of the repository, consolidated, or prepared for gradual modularization.

Latest cleanup checkpoint: `39ff057 Retire legacy transport course feature`

Latest style modernization checkpoint: converted tracked first-party PHP `array(...)` literals to short array syntax `[]`.

## Executive summary

This codebase is a legacy PHP application with a single large bootstrap, many direct `require_once` dependencies, procedural public pages, active code mixed with old experiments, static assets, logs, uploads, SQL dumps, and checked-in vendor/library copies.

The biggest immediate improvement is not a framework migration. The safest first step is repository hygiene:

1. Remove or quarantine generated/deployment/editor artifacts.
2. Stop tracking private secrets, logs, database dumps, and runtime uploads.
3. Continue deleting retired surfaces that are no longer used.
4. Replace checked-in legacy library copies with Composer dependencies.
5. Add a small safety net: PHP lint, Composer validation, and a minimal route smoke test list.

After that, the second phase should target risky dynamic behavior: raw SQL strings, dynamic class names from `$_GET`, direct superglobal use, and mixed HTML/business/database logic.

## What was checked

Commands and scans run:

- `git status --short --branch`
- `git switch -c codex/review-codebase-cleanup`
- `rg --files` inventory excluding `.git` and `vendor`
- Composer validation: `composer validate --no-check-publish`
- PHP version check: `php -v` reported PHP 8.3.26
- First-party PHP lint excluding bundled legacy libraries: `includes`, `public`, excluding `includes/src`
- Pattern scan for direct globals, raw SQL construction, debug output, deprecated crypto, dynamic execution, and exit/die usage

## Current repository shape

High-level PHP inventory:

| Area | PHP files | PHP lines |
|---|---:|---:|
| `includes` | 676 | 225,568 |
| `public` | 283 | 28,738 |

The `includes` count has been reduced by removing checked-in library copies such as the old PHPExcel bundles.

Large tracked content includes:

- `Inspinia/img/Friends/movie/086.MOV`, about 870 MB
- Many `.mp3`, `.MOV`, `.JPG`, `.xlsx`, generated docs, and old sample files
- `composer.phar`, about 3.2 MB
- SQL dumps under `sql`
- Runtime-looking text files under `logs`
- PDFs and uploaded media under `uploads`

Composer state:

- `composer.json` is valid.
- Composer warnings from the initial review have been resolved:
  - Added a proprietary license marker.
  - Removed the empty PSR-4 namespace prefix that pointed to missing `api_class`.
  - Relaxed exact version constraints for `mistic100/randomcolor` and `twig/twig`.
- `setasign/fpdi` was updated from `v2.6.6` to `v2.6.7` to clear CVE-2026-45802 / GHSA-2mgw-7q6p-8grg reported by `composer audit`.

## Highest-value deletion candidates

These are candidates, not automatic deletions. Each should be checked against production routing and content needs before removal.

### 1. Editor/deployment metadata

Safe-looking candidates:

- `_notes/dwsync.xml`
- `includes/_notes/dwsync.xml`
- `includes/functions/_notes/dwsync.xml`
- `public/_notes/dwsync.xml`
- `public/admin/_notes/dwsync.xml`
- `public/css/_notes/dwsync.xml`
- `public/js/_notes/dwsync.xml`
- `public/layouts/_notes/dwsync.xml`
- `uploads/_notes/dwsync.xml`
- `logs/_notes/dwsync.xml`
- `sql/_notes/dwsync.xml`

Reason: These look like Dreamweaver synchronization metadata, not application runtime code. They should be deleted and ignored.

Recommended change:

- Add `_notes/` and `**/_notes/` or `dwsync.xml` to `.gitignore`.
- Delete the tracked `dwsync.xml` files in one isolated commit.

Risk: Very low.

### 2. Runtime logs

Candidates:

- `logs/debug.txt`
- `logs/views.txt`
- `logs/hacked.txt`

Reason: Runtime logs should not be versioned. They can contain private user activity, IP addresses, SQL errors, and security event data.

Recommended change:

- Stop tracking existing log files.
- Keep `logs/.htaccess` if it actively blocks web access.
- Add `logs/*.txt`, `logs/*.log`, and possibly `logs/*` with an exception for `.htaccess`.

Risk: Low for code behavior; possible operational risk only if production expects these exact files to exist. Use empty `.gitkeep` or deployment setup if needed.

Status: `logs/debug.txt`, `logs/hacked.txt`, and `logs/views.txt` have been removed from git tracking while keeping the local files on disk. `logs/.htaccess` remains tracked.

### 3. Secrets and credentials

Candidates:

- `client_secret..json`
- `includes/config.php`

Reason: Google OAuth client secrets were checked in, and database credentials exist in local-only config files. Even if old, committed secrets should be treated as compromised.

Recommended change:

- Rotate the credentials.
- Move secrets to environment variables or an untracked local config file.
- Keep a committed `config.example.php` with placeholders only.

Risk: Medium, because config loading must be changed carefully. Do this before major refactors.

Status: `includes/config.php` is already ignored and not tracked. `client_secret..json` has been removed from git tracking and deleted from the local working folder. The placeholder `client_secret.example.json` was also removed because the application has no active Google OAuth usage.

### 4. SQL dumps and historic data

Candidates:

- `sql/*.sql`
- `sql/*.Oldsql`
- `sql/historic/**`
- `sql/VIEWS/**`

Reason: Dumps and historic data are not source code. They may contain private data and make the repo heavy/noisy.

Recommended change:

- Move required schema-only scripts into `database/schema`.
- Move private dumps to external backup storage.
- If sample fixtures are needed, create sanitized minimal fixtures.

Risk: Medium. Some SQL files may be the only schema record. Preserve them outside git before deleting.

### 5. Checked-in uploads and personal media

Candidates:

- `uploads/**`
- `user_img/**`
- large media under `Inspinia/img/**`
- personal gallery pages and media under `public/img/**` and `Inspinia/**`

Reason: These are runtime/content assets, not application source. The repo includes very large audio/video/image files, including an about 870 MB `.MOV`.

Recommended change:

- Separate application source from content storage.
- For still-needed public assets, keep only optimized web assets.
- Move large originals to object storage, a CDN, or backup storage.

Risk: Medium to high, because the site appears to be personal/content-heavy. Do not mass-delete without route and content inventory.

### 6. Legacy bundled libraries now available through Composer

Candidates:

- `composer.phar`

Reason:

- Composer already manages modern packages in `vendor`.
- `mpdf/mpdf` and `phpmailer/phpmailer` are already in `composer.json`.
- `includes/mpdf60` and `includes/phpmailer_legacy_backup,` have been removed.
- PHPExcel is abandoned; if still needed, migrate to `phpoffice/phpspreadsheet`.
- The unused `my_helps/PHPExcel_1.8.0` helper/example copy has been removed.
- The unused `includes/src/PHPExcel` runtime copy has been removed.
- `composer.phar` should not normally be committed.

Recommended change:

- Identify active references to each legacy library.
- Replace references with Composer autoloaded packages.
- Delete legacy copies after all references are gone.

Risk: Medium. Legacy code may still include these paths directly.

### 7. Old/admin/test pages

Completed removals:

- `public/admin/test/**`
- `testDelete.php`
- old/generated variants including `Inspinia/index_old.php`, `public/_f/kamy/pay_brazil_old.php`, `public/admin/booking_myexpense_old.php`, and `public/admin/wkg_progress/*_old.php`

Reason: Many files are named `old`, `test`, `todelete`, or duplicate similar functionality. PHP lint found many PHP 8 parse failures inside old admin files, mainly curly-brace string/array offset syntax.

Status: `public/admin/old/**` was removed after route/link inventory found no active references. Old/test page links were removed from navigation before deleting the obsolete pages.

Recommended change:

- Add a route inventory first.
- Archive old/test pages outside the web root.
- Delete files with no production link or web server route.

Risk: Medium. Some old pages may still be linked manually.

### 8. Retired Transmed code

Findings:

- `includes/transport` and `transmed/lib/transport` were unused after Transmed was retired.
- The main bootstrap no longer loads these classes.
- The old transport admin pages and `_transmed` public forms were removed.
- The remaining `transmed` shell was removed after route/link inventory found no active references.

Reason: Keeping dead transport code made every bootstrap and class-registry cleanup riskier.

Status: Removed in the transport and Transmed cleanup phases.

### 9. Retired transport/course model

Findings:

- `Course` and `Chauffeur` were legacy transport objects.
- The public `course.php` page was fataling against the current schema, and the feature is no longer needed.
- Direct admin access through `class_name=Course` and `class_name=Chauffeur` should fail closed.

Completed cleanup:

- Removed `includes/Course.php`.
- Removed `includes/Chauffeur.php`.
- Removed both classes from `includes/initialize.php`.
- Removed both classes from the `MyClasses::$all_class` admin allow-list.
- Replaced `public/course.php` with a redirect to `/public/index.php`.
- Added SQL cleanup scripts:
  - `sql/drop_legacy_transport_views.sql`
  - `sql/drop_legacy_transport_tables.sql`

Database cleanup notes:

- Run `drop_legacy_transport_views.sql` before `drop_legacy_transport_tables.sql`.
- The scripts target `hhbz_ikamych2` explicitly so they do not depend on the selected phpMyAdmin database.
- Local verification after running the cleanup showed no remaining legacy `course`, `transport_*`, `programmed_courses*`, `modele*`, or `transport_model*` objects.

Verification:

- `public/course.php` redirects to the homepage.
- Direct admin URLs for `class_name=Course` and `class_name=Chauffeur` redirect to admin with "not an allowed admin class".
- Public pages and active admin CRUD pages smoke-tested without fatal/warning/deprecated output.

## Runtime and compatibility blockers

PHP lint over 474 first-party files found 68 errors under PHP 8.3.

Representative errors:

- `includes/database_mysqli.php`: method signature conflicts with `mysqli::query`.
- `public/admin/crud/edit/edit_category.php`: same issue.
- `public/admin/crud/edit/edit_MyExpense.php`: same issue.
- `public/admin/crud/new/new_category.php`: same issue.
Priority:

1. Fix active files only.
2. Keep PHP lint in CI or as a local pre-merge command.

## Architecture deficiencies

### Monolithic bootstrap

`includes/initialize.php` manually requires a long list of functions, database classes, UI helpers, models, and layout constants.

Evidence:

- `includes/initialize.php` has many direct `require_once` calls from about line 107 through line 220.

Impact:

- Every request loads far more code than needed.
- Dependencies are implicit globals.
- It is hard to test individual classes.
- Modular cleanup is blocked because everything depends on everything.

Recommended incremental fix:

- Do not rewrite the app first.
- Add Composer autoload for new namespaced code.
- Introduce a small `App\Bootstrap` or `bootstrap.php` wrapper for new code.
- Move one domain at a time behind explicit service/model files.

### Active code, HTML, SQL, authorization, and routing are mixed

Examples:

- `public/index.php` mixes auth redirect, layout includes, image folder scanning, HTML generation, quotes/content, and carousel behavior.
- `public/admin/index.php` mixes authorization, navigation, hard-coded links, diagnostics, and dynamic model introspection.
- CRUD pages build classes dynamically from request values.

Impact:

- Hard to test.
- Hard to reason about permissions.
- Changes to display code can affect data operations.

Recommended incremental fix:

- Start with new code only: route file -> controller/action function -> model/query helper -> view template.
- For old pages, extract only when editing for a real feature.

### Dynamic classes from request parameters

Examples:

- `public/admin/crud/ajax/manage_ajax.php` reads `$_GET['class_name']`, then calls `call_user_func_array([$class_name, ...])`.
- `public/admin/crud/ajax/new_ajax.php` reads `$_GET['class_name']`, instantiates `new $class_name()`, and calls static methods.

There is a call to `MyClasses::redirect_disable_class()`, so there may be a blacklist/guard. This still needs hard review because blacklist-style class guards are fragile.

Recommended fix:

- Replace dynamic class access with an explicit whitelist map:
  - URL key: `my-expense`
  - Class: `MyExpense`
  - Allowed roles: `admin`
  - Allowed actions: `list`, `new`, `edit`, `delete`

Risk: High if left unchanged, because dynamic class dispatch can expose unexpected classes or methods.

## Security deficiencies

This was not a full exploit validation pass, but several concrete security risks are visible.

### Raw SQL construction

Pattern scan excluding bundled libraries found about 253 raw SQL construction matches.

Examples:

- `public/admin/ajax/ajax_pseudo.php` builds `LIKE '%$q%'` directly.
- `public/admin/ajax/ajax_adresse.php` builds `LIKE '%$q%'` directly.
- `includes/user.php` has direct interpolated queries around user lookup and reset token lookup.
- `includes/database_object.php` centralizes many query strings using interpolated table, field, and where clauses.

There is escaping in some paths, but escaping is not a substitute for parameterized queries, especially when table/field names and dynamic class state are also involved.

Recommended fix:

- Add one PDO or mysqli prepared-query helper.
- Convert public AJAX endpoints first.
- Then convert login, password reset, and admin CRUD.

### Secrets committed

`client_secret..json` was tracked and has been removed from git tracking. Database config files are ignored locally; keep treating any existing real credentials as sensitive.

Recommended fix:

- Rotate credentials.
- Move to environment variables.
- Commit only examples.

### Debug output and fatal errors

Pattern scan excluding bundled libraries found:

- 203 `var_dump` / `print_r` style debug-output matches.
- 53 `die(...)` / `exit(...)` matches.

Impact:

- Risk of leaking internals or data.
- Inconsistent user experience.
- Makes error handling impossible to centralize.

Recommended fix:

- Remove dead debug output.
- Replace active debug output with a logger.
- Replace `die` on expected application errors with redirect/message or structured error responses.

### Deprecated/weak crypto

Pattern scan found:

- 14 `mcrypt_` matches.
- 11 `md5` / `sha1` matches outside bundled libraries.

Positive finding:

- Password storage appears to use `password_hash(..., PASSWORD_BCRYPT)` and `password_verify`.

Recommended fix:

- Delete unused `security_mcrypt_functions.php` if no active call path needs it.
- Replace reset token and CSRF token generation with `random_bytes()` / `bin2hex()`.
- Keep `md5` only for non-security identifiers after documenting that use.

## Dependency and autoload deficiencies

Composer issues:

- Empty PSR-4 namespace prefix is configured to `api_class`, but that directory does not exist.
- Exact constraints for packages that should usually float within a compatible range.
- Composer dependencies coexist with checked-in legacy libraries.

Recommended fix:

1. Remove or correct the empty PSR-4 autoload rule.
2. Add a real namespace for new code, for example:
   - `App\\`: `src/`
3. Keep legacy classes as-is until touched.
4. Replace checked-in libraries with Composer packages.

Status: The invalid empty PSR-4 rule was removed. No new application namespace was added yet because the current codebase still uses legacy global classes.

## Web root and deployment concerns

The repository root contains:

- `.htaccess`
- `index.php`
- `welcome.php`
- `Web.config`
- public application code under `public`
- private-ish code and config under `includes`
- SQL dumps, logs, uploads, and media

Risk:

- If the whole repo is deployed as web root, private files may be reachable depending on web server rules.
- `.htaccess` is complex and contains duplicated rewrite sections.

Recommended fix:

- Make `public/` the real web root where possible.
- Explicitly deny direct web access to `includes`, `sql`, `logs`, `uploads` if uploads are not meant to be public, and config files.
- Simplify `.htaccess` after web root decision.

## Recommended cleanup roadmap

### Phase 0: Guardrails before deletion

1. Add a simple `composer validate` check.
2. Add a PHP lint script excluding known third-party folders.
3. Capture a list of production URLs/pages that must still work.
4. Back up SQL dumps, uploads, and media outside git before removing tracked copies.

### Phase 1: Very low-risk deletion PR

Delete:

- `**/_notes/dwsync.xml`
- empty `_notes` folders if left behind
- tracked runtime logs after confirming production does not depend on exact files
- `composer.phar`

Status: Runtime log text files were untracked. `_notes` ignore rules were already present, no tracked `dwsync.xml` files remained, and `composer.phar` was not tracked.

Update `.gitignore`:

- `_notes/`
- `**/_notes/`
- `dwsync.xml`
- `logs/*` with exception for `logs/.htaccess` if needed
- `composer.phar`

### Phase 2: Sensitive-data cleanup PR

1. Rotate database and Google credentials.
2. Move credentials to environment variables or an untracked local config file.
3. Keep `config.example.php` as a placeholder-only template.
4. Remove tracked secret files.

Status: Tracked Google OAuth client secret was removed from git, the ignored local `client_secret..json` copy was deleted, and the temporary `client_secret.example.json` placeholder was removed after confirming the application does not use Google OAuth. `includes/config.example.php` and `CONFIGURATION.md` document the remaining local/prod setup. Deleting the matching Google Console OAuth client remains an external account action.

Recommended next step:

- Do not add a Composer dependency just for environment variables yet.
- Native PHP configuration has been started through `includes/config_loader.php`:
  - If any `IKAMY_*` config value exists, the loader uses environment mode and requires the full set of mandatory values.
  - If no `IKAMY_*` config value exists, the loader falls back to the existing ignored `includes/config.php`.
  - This preserves the one-file local/prod workflow while allowing production to move to server-level environment variables.
- A Composer package such as `vlucas/phpdotenv` is optional later if local `.env` files become useful. It should not be the first change because production on shared hosting may not need or support that workflow cleanly.

Production migration outline:

1. Confirm the production host can provide environment variables. If yes, create variables like:
   - `IKAMY_DB_SERVER`
   - `IKAMY_DB_USER`
   - `IKAMY_DB_PASS`
   - `IKAMY_DB_NAME`
   - `IKAMY_DB_NAME_API`
   - `IKAMY_EMAIL_USERNAME`
   - `IKAMY_EMAIL_PASSWORD`
   - `IKAMY_MAIL_HOST`
   - `IKAMY_SECRET_KEY`
   - `IKAMY_CODE_CALENDAR`
2. If the host cannot provide environment variables, keep `includes/config.php` on production only, with production values, and never upload it from Git.
3. Rotate database and mail passwords after moving the application to the new config source.
4. Deploy the code change.
5. Check the homepage, admin login, Article admin, MyExpenseMum admin, mail-sending flows, and calendar flows.
6. Remove any old copied credentials from deployment notes, FTP folders, backups that are easy to clean, and local screenshots/docs.

### Phase 3: Delete or quarantine old pages

Status: Initial old/test page cleanup is complete. Continue with route inventory before deleting any additional old generated variants. Stale search backup pages, the empty admin test stub, and retired public demo folders have been removed.

### Phase 4: Remove retired SQL dumps

1. Identify SQL dumps that are no longer needed by local recovery.
2. Confirm they exist in backup storage.
3. Remove old Transmed SQL dumps after backup confirmation.

Status: Transmed-specific SQL dumps were removed after Transmed code was retired. Generic historic/test SQL dumps remain for separate backup review.

### Phase 5: Replace legacy libraries

1. Keep CSV export on the small `includes/src/Foundationphp` helper until that flow is modernized.
2. Use Composer-managed packages for any future Excel export instead of restoring PHPExcel.

### Phase 6: Security hardening in active code

1. Replace dynamic class names from `$_GET` with a whitelist map.
2. Convert autocomplete AJAX endpoints to prepared statements.
3. Convert login/reset/admin CRUD queries to prepared statements.
4. Replace reset/CSRF token generation with `random_bytes`.
5. Centralize error handling/logging.

Status: `MyClasses` now exposes `allowed_class_from_request()` and active CRUD/AJAX entry points use the validated class name for dynamic class calls instead of re-reading raw `$_GET['class_name']`.

Status update: A prepared-query path was added to the existing database wrappers and exposed through `DatabaseObject::find_by_sql_prepared()`. Security-sensitive lookups now use prepared statements for `DatabaseObject::find_by_id()`, `User::find_by_username()`, `User::find_by_email()`, `User::find_by_reset_token()`, `FailedLogin::find_by_username()`, and `BlacklistIp::find_by_ip()`. Reset tokens, CSRF tokens, user password salts, and chauffeur initials now use `random_bytes()` instead of `md5(uniqid(...))`.

Status update: Browser smoke testing covered `MyExpenseMum` AJAX/data manage, new, edit, and missing-ID delete/edit paths. Generic CRUD POST assignment now skips blank `id` values for creates, shared URL escaping helpers tolerate null input, edit/delete pages redirect cleanly when IDs are missing or invalid, and sort parameters are whitelisted in generic table queries plus user, user-type, and category manage pages.

## Suggested first small PR

The best first PR should be boring and reversible:

1. Add `.gitignore` rules for editor metadata, logs, `composer.phar`, and runtime upload patterns.
2. Delete only `dwsync.xml` files and `composer.phar`.
3. Leave SQL, uploads, media, old pages, and duplicated transport code for separate PRs.
4. Run `composer validate --no-check-publish`.
5. Run PHP lint over first-party code and record existing failures without trying to fix them.

This reduces noise immediately and sets the pattern for slow, safe modernization.

## Repeatable Smoke Test Checklist

Run this checklist after every cleanup or security-hardening batch.

Commands:

```powershell
git status --short
composer validate --no-check-publish
composer audit
git diff --check

$files = @(Get-ChildItem -Path includes,public -Recurse -Filter *.php | Where-Object { $_.FullName -notmatch '\\includes\\src\\' })
$failed = $false
foreach ($file in $files) {
    php -l $file.FullName | Out-Null
    if ($LASTEXITCODE -ne 0) {
        Write-Output "PHP lint failed: $($file.FullName)"
        $failed = $true
    }
}
if ($failed) { exit 1 } else { Write-Output "PHP lint passed for includes and public" }
```

Browser URLs:

- `http://ikamy.local/public/index.php`
- `http://ikamy.local/public/about_us.php`
- `http://ikamy.local/public/about_us_2.php`
- `http://ikamy.local/public/myLinks.php?category=Others`
- `http://ikamy.local/public/admin/crud/ajax/manage_ajax.php?&page=1&order_name=id&order_type=ASC&class_name=Article`
- `http://ikamy.local/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpenseMum`
- `http://ikamy.local/public/admin/crud/ajax/new_ajax.php?class_name=MyExpenseMum`
- `http://ikamy.local/public/calendar.php`
- `http://ikamy.local/public/admin/crud/ajax/manage_ajax.php?class_name=Note`

Expected result:

- No `Fatal error`.
- No `Warning:` or `Deprecated:` text in the page body.
- Retired direct URLs such as `class_name=Course` and `class_name=Chauffeur` should be rejected cleanly.
- Old `public/course.php` should redirect to `/public/index.php`.

## Next Cleanup Candidates

Recommended order:

1. Finish the configuration/secrets migration plan without adding Composer dependencies unless needed.
2. Investigate `public/contact.php`: it currently redirects to an Inspinia page, so verify whether the public contact form is intentionally retired or should be restored.
3. Continue active CRUD hardening: invalid IDs, missing records, null handling, sort whitelisting, and prepared statements.
4. Review old SQL dumps and historic folders after confirming external backups exist.
5. Build a small script around the smoke-test checklist so the same checks can run after each cleanup pass.

## Style Modernization

Completed:

- Converted legacy `array(...)` literals to short array syntax `[]` across tracked first-party PHP files.
- Excluded vendor and old bundled/third-party folders from the mechanical rewrite.
- Used a PHP tokenizer-based rewrite so comments and strings were not changed.
- Left valid PHP `array` type declarations alone, such as `array $params` and `function get_json_data(): array`.

Verification:

- Tokenizer check found `0` remaining old `array(...)` literal tokens in the target scope.
- PHP lint passed for `includes`, `public`, and `Inspinia`.
- Composer validate/audit passed.
- Browser smoke test passed for homepage, `MyExpenseMum` admin, Article admin, and `Inspinia/index.php`.
- Fixed the `Inspinia/index.php` `$text1` undefined-variable warning found during the smoke test.
