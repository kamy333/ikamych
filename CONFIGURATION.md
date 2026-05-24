# Configuration

This project keeps environment-specific credentials out of Git.

The application loads configuration through `includes/config_loader.php`.
That loader supports two modes:

1. Environment variables, preferred for production when the host supports them.
2. The ignored `includes/config.php` fallback, useful for local XAMPP and simple shared-hosting deployments.

## Local setup

Create this file by copying the matching example:

- `includes/config.example.php` -> `includes/config.php`

Then fill in the local database and mail values.

## Production setup

Preferred production setup is environment variables:

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
- `IKAMY_BOOKING_MYEXPENSE_TOKEN`
- `IKAMY_MEDICAL_CERTIFICATE_REMINDER_TOKEN`
- `IKAMY_CONTRIBUTION_ASSISTANCE_REMINDER_TOKEN`
- `IKAMY_PAPA_EVENT_REMINDER_TOKEN`
- `IKAMY_DAILY_PSALM_TOKEN`

Optional values:

- `IKAMY_LOCALHOST_FOLDER`
- `IKAMY_DISPLAY_ERRORS` (`On` or `Off`)

`IKAMY_BOOKING_MYEXPENSE_TOKEN` protects the JSON booking endpoint at
`public/admin/booking_myexpense.php`. Use a long random value and rotate the old
literal token that used to be embedded in source code.

The reminder tokens protect public cron/email endpoints. Update any external
cron URLs after setting these values because the old literal passwords have been
removed from source code.

Cron/email scripts are now gathered under `public/email_script/`:

- `appointment.php` from `public/_f/kamy/recurring_appointment_email.php`
- `medical_certificate.php` from `public/_f/kamy/recurring_medical_certificate.php`
- `contribution_assistance.php` from `public/_f/kamy/recurring_contribution_assistance.php`
- `papa_event_reminder.php` from `Inspinia/papa/email/papa_yartzeit_hag.php`
- `daily_psalm.php` from `Inspinia/papa/email/daily_psalm.php`

The old paths are compatibility wrappers during the cron migration.

If the production host cannot provide environment variables cleanly, keep an
untracked `includes/config.php` on production with production values. Do not
commit or upload that file from Git because it contains database, mail, and
secret-key credentials.

If any `IKAMY_*` config variable is present, the loader assumes environment mode
and requires all mandatory `IKAMY_*` values listed above. This avoids mixing
partial environment config with stale file config.

## Environment detection

The application treats these server names as local by default:

- `localhost`
- `127.0.0.1`
- `::1`
- `ikamy.local`

Production is any other host name, such as `ikamy.ch`.
