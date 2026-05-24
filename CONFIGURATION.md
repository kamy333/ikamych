# Configuration

This project keeps environment-specific credentials out of Git.

## Local setup

Create these files by copying the matching examples:

- `includes/config.example.php` -> `includes/config.php`

Then fill in the local database and mail values.

## Production setup

The same real config files must exist on production with production values.
Do not commit the real config files because they contain database, mail, and secret-key credentials.

## Environment detection

The application treats these server names as local by default:

- `localhost`
- `127.0.0.1`
- `::1`
- `ikamy.local`

Production is any other host name, such as `ikamy.ch`.
