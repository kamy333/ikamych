# PHP 8.4 Compatibility Review

## Executive Summary

Moving this project to PHP 8.4 looks feasible, but I would not switch production until the items below are handled and the smoke test passes under an actual PHP 8.4 web runtime.

The project is already syntactically valid under the local PHP 8.3 CLI, Composer does not report any installed package that blocks PHP 8.4, and the code scan did not find direct use of the most common PHP 8.4 removed or deprecated APIs. The main risks are legacy dynamic object properties, a Composer audit failure in Twig, runtime extension availability, and untested paths in the legacy public/admin PHP entrypoints.

## Environment Observed

- Repository: `S:\ikamych`
- Local app base URL from project instructions: `http://ikamy.local`
- Local CLI PHP: `PHP 8.3.26`
- PHP files reviewed outside `vendor`: 327
- Composer package check: no installed package depends on a PHP constraint that rejects `8.4`
- Syntax lint: no PHP syntax errors found outside `vendor`

## Official PHP 8.4 References Used

- PHP 8.4 migration guide: https://www.php.net/manual/en/migration84.php
- PHP 8.4 backward incompatible changes: https://www.php.net/manual/en/migration84.incompatible.php
- PHP 8.4 deprecated features: https://www.php.net/manual/en/migration84.deprecated.php
- PHP 8.4 removed extensions: https://www.php.net/manual/en/migration84.removed-extensions.php
- PHP 8.4 new functions: https://www.php.net/manual/en/migration84.new-functions.php

## Commands Run

```powershell
php -v
composer show --direct --no-interaction
composer check-platform-reqs --no-interaction
composer why-not php 8.4 --no-interaction
php -l <all non-vendor PHP files>
.\scripts\smoke.ps1 -BaseUrl "http://ikamy.local"
Invoke-WebRequest -UseBasicParsing -Uri "http://ikamy.local" -TimeoutSec 20
composer outdated --direct --no-interaction
```

## Dependency Findings

### Composer PHP 8.4 Constraint

Current `composer.json` does not declare a PHP version requirement. Composer can currently install packages without knowing that this application is intended to run on PHP 8.4.

Recommended:

```json
"php": ">=8.4 <8.5"
```

Use `>=8.4 <8.5` if the project should stay on PHP 8.4 only. Use `^8.4` only if PHP 8.5 is also acceptable later.

### Installed Packages

Composer reports no installed package blocking PHP 8.4:

```text
There is no installed package depending on "php" in versions not matching 8.4
```

Direct installed packages:

- `guzzlehttp/guzzle` 7.10.0
- `jenssegers/date` 4.0.0
- `jimmiw/php-time-ago` 2.0.5
- `mistic100/randomcolor` 1.1.0
- `mpdf/mpdf` 8.3.1
- `nesbot/carbon` 2.73.0
- `phpmailer/phpmailer` 6.12.0
- `twig/twig` 3.26.0

### Composer Audit Blocker

The existing smoke test currently fails at `composer audit` because `twig/twig` 3.26.0 has advisories fixed by `twig/twig` 3.27.0 or newer.

This is not a PHP 8.4 incompatibility by itself, but it blocks the repository's smoke test and should be fixed before a runtime migration.

Recommended:

```powershell
composer update twig/twig --with-dependencies
composer audit
```

### Outdated Direct Packages

`composer outdated --direct` reports:

- `twig/twig`: 3.26.0 -> 3.27.0 patch/minor update recommended
- `guzzlehttp/guzzle`: 7.10.0 -> 7.10.5 patch/minor update recommended
- `nesbot/carbon`: 2.73.0 -> 3.11.4 major update available
- `phpmailer/phpmailer`: 6.12.0 -> 7.1.1 major update available
- `jimmiw/php-time-ago`: 2.0.5 -> 3.3.0 major update available

For the PHP 8.4 migration, prioritize patch/minor updates first. Do not combine major package upgrades with the PHP runtime upgrade unless there is a specific reason.

## PHP 8.4 Specific Scan Results

### No Direct Hits Found

The code scan did not find direct project usage of these PHP 8.4 problem areas:

- `E_STRICT`
- `trigger_error(..., E_USER_ERROR)`
- `CURLOPT_BINARYTRANSFER`
- `mysqli_ping()`, `mysqli::ping()`
- `mysqli_kill()`, `mysqli::kill()`
- `mysqli_refresh()`, `mysqli::refresh()`
- removed MySQLi constants such as `MYSQLI_STMT_ATTR_PREFETCH_ROWS`, `MYSQLI_CURSOR_TYPE_FOR_UPDATE`, `MYSQLI_CURSOR_TYPE_SCROLLABLE`, `MYSQLI_TYPE_INTERVAL`, `MYSQLI_SET_CHARSET_DIR`
- removed bundled extensions: `imap_*`, `oci_*`, `PDO_OCI`, `pspell_*`
- implicit nullable typed parameters such as `function foo(Type $x = null)`
- class named exactly `_`
- custom functions colliding with PHP 8.4 new functions such as `array_find()`, `array_any()`, `array_all()`, `request_parse_body()`, `mb_trim()`, `fpow()`

### `die()` / `exit()` Usage

PHP 8.4 changes `exit()` and `die()` so invalid argument types consistently throw `TypeError`.

Project hits:

- `includes\BlacklistIp.php`
- `includes\database_mysqli.php`
- `includes\database_api.php`
- `includes\database.php`
- `includes\functions\security_csrf_token_functions.php`

The observed calls pass strings or string variables, so they are low risk for PHP 8.4. Still, error paths should be exercised once PHP 8.4 is installed.

### XML, DOM, and XSL

The project uses DOM/SimpleXML/XSL functionality in:

- `includes\src\Foundationphp\Exporter\OpenDoc.php`
- `includes\src\Foundationphp\Exporter\MsWord.php`
- `includes\SetUp.php`
- `includes\library.php`

PHP 8.4 adds stricter exceptions around some XML/XSL invalid inputs, especially null bytes and non-XML objects passed to XSL methods. The current code appears to use `DOMDocument` with `XSLTProcessor`, which is the expected shape, but export workflows should be tested on PHP 8.4 with real files/templates.

Risk: medium for document export features, low for normal page rendering.

### Dynamic Object Properties

Dynamic properties have been deprecated since PHP 8.2 and can create noisy deprecation logs under modern runtimes. They are not a new PHP 8.4 removal, but they are one of the most likely legacy-code issues to appear during an 8.4 move.

Clear candidates:

- `includes\Upload.php`
  - assigns `$this->user_image`
  - assigns `$this->type`
  - assigns `$this->size`
  - assigns `$this->photo`
  - reads `$this->username` without declaring it

Candidate to review:

- `includes\database_object.php`
  - assigns `$this->id` in `DatabaseObject::create()`
  - many child models probably declare `id`, but the base class itself does not

Recommended:

- Declare the missing properties on `Upload`.
- Decide whether `DatabaseObject` should declare `public $id;`, or whether every concrete subclass must declare it consistently.
- Run the app with `error_reporting=E_ALL` and deprecation logging enabled under PHP 8.4.

### Extension Availability

Composer currently checks these platform requirements successfully under PHP 8.3:

- `ext-curl`
- `ext-gd`
- `ext-iconv`
- `ext-json`
- `ext-zlib`

The application code also uses or expects:

- `mysqli`
- `PDO` in `public\pages\calendar\db_connection.php`
- `DOM`
- `SimpleXML`
- `XSL`
- `ZipArchive`

Before switching Apache/FPM to PHP 8.4, confirm the PHP 8.4 installation enables all of these extensions. This matters especially for mPDF, image handling, export/download features, and database access.

## Existing Runtime Check

`Invoke-WebRequest` to `http://ikamy.local` returned HTTP 200 with content.

The repository smoke test did not complete because `composer audit` failed first. No conclusion should be drawn about the full route list until the Twig advisory is fixed or audit is intentionally bypassed for a compatibility-only run.

## Recommended Migration Plan

1. Update vulnerable patch/minor dependencies first.
   - Minimum: update `twig/twig` to 3.27.0 or newer.
   - Consider updating `guzzlehttp/guzzle` to 7.10.5.

2. Add an explicit PHP runtime requirement to `composer.json`.
   - Use `"php": ">=8.4 <8.5"` if this project should target PHP 8.4 only.

3. Fix dynamic-property candidates.
   - Start with `includes\Upload.php`.
   - Review `DatabaseObject::$id` strategy.

4. Install or configure PHP 8.4 for CLI and web server.
   - Confirm `php -v` reports PHP 8.4.
   - Confirm `http://ikamy.local` is served by PHP 8.4, not only CLI.

5. Run Composer and syntax checks under PHP 8.4.

```powershell
composer validate --no-check-publish
composer check-platform-reqs
composer audit
```

6. Run the existing smoke test under PHP 8.4.

```powershell
.\scripts\smoke.ps1 -BaseUrl "http://ikamy.local"
```

7. Manually test high-risk workflows.
   - Login/logout
   - Admin CRUD pages
   - File upload/photo upload
   - PDF generation through mPDF
   - Email sending through PHPMailer
   - XML/Word/OpenDoc export flows
   - Calendar/appointment pages

## Conclusion

Yes, PHP 8.4 appears possible for this project. I did not find a direct PHP 8.4 hard blocker in the application code or installed Composer dependency constraints.

The migration should be treated as a controlled runtime upgrade, not a blind version switch. The practical blockers to clear first are the Twig audit failure, explicit PHP version constraint, PHP 8.4 extension parity, and dynamic-property cleanup in legacy classes.
