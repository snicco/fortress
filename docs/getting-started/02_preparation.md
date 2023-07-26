# Preparation

<!-- TOC -->
* [Preparation](#preparation)
  * [Secrets](#secrets)
    * [Default: auto-generated secrets](#default--auto-generated-secrets)
    * [Generating secrets before activation](#generating-secrets-before-activation)
      * [Example: dynamic Nginx configuration](#example-dynamic-nginx-configuration)
      * [Example: dynamic PHP configuration](#example-dynamic-php-configuration)
    * [Disabling fallback secrets](#disabling-fallback-secrets)
    * [The most critical rule with secrets](#the-most-critical-rule-with-secrets)
  * [White-label](#white-label)
  * [Special directories](#special-directories)
    * [Log directory](#log-directory)
  * [Web server adjustments](#web-server-adjustments)
<!-- TOC -->

## Secrets

Before you activate Snicco Fortress for the first time, you have to decide how to supply the plugin's cryptographic secrets for its functionality.

The supported options are: (from most ideal to least ideal in the context of WordPress):

1. Supplying the secret directly to the `$_SERVER` env (i.e. `fastcgi_param`)
2. Storing a local path in the `$_SERVER` env and have the plugin read the file contents.
   <br>This works great with docker-based setups and docker secrets.
3. Using a PHP constant defined before Fortress loads (typically in the wp-config.php) file.

### Default: auto-generated secrets

Upon the first activation, Fortress checks if its secrets have been supplied using method 1) or 2) above.
Fortress will generate new secrets and write them to the site's
`wp-config.php` file if no secrets are defined.

Fortress will search the `wp-config.php` file for the following anchor text:

`/* That's all, stop editing!`

This text is [usually included in the default configuration of WordPress](https://github.com/WordPress/WordPress/blob/master/wp-config-sample.php#L88). If it can't be found, an exception will be thrown during activation.
Fortress will recursively try to find the wp-config file, starting at `ABSPATH . 'wp.config.php'`.

Storing the secrets in the wp-config.php file is superior to keeping them in the database.
However, there is still the risk of the secrets ending up in backups or being leaked through a local file inclusion vulnerability.

### Generating secrets before activation

Depending on your setup, you can generate a list of all required secrets
**before activating the plugin**.

You can do this by calling a PHP script that is included in the plugin.

```shell
php LOCAL_PATH_TO_PLUGIN/bin/prod/generate-secrets.php
```

The output will consist of multiple lines with the format: `<SECRET_NAME>:<SECRET_VALUE>`.

```shell
# More secrets might be added in the future.

SNICCO_FORTRESS_PASSWORD_ENCRYPTION_KEY_HEX:73ea21090256b26b79ee4234a5041cb3c961341059a844227ea1b3fe19be1455
SNICCO_FORTRESS_DEVICE_ID_AUTHENTICATION_KEY_HEX:3b6eeb67cf4ee9e821be12483e8bf6a675c065986ef4316f25905705aca80598
SNICCO_FORTRESS_TOTP_ENCRYPTION_SECRET_HEX:eae9427b67f14f732fdf1bb28eae8be08769afd2dc66c054184780e8074d3d78
SNICCO_FORTRESS_LIBSODIUM_GENERIC_HASH_KEY_HEX:44d3721c1f8939cceff46b8cdbafa80f3c59bf9100ed52d7ade9a4e83f013d1b
```

Depending on your server setup, you can use the output to supply the secrets to Fortress.

#### Example: dynamic Nginx configuration

You can use the following commands to generate a dynamic Nginx configuration that sets env variables for a PHP-FPM process.

```shell
php bin/prod/generate-secrets.php | xargs -n1 -d'\n' printf 'fast_cgi_param  %s;\n' > fastcgi.conf
 
sed -i "s/:/  /g" fastcgi.conf
```

```nginx
# fastcgi.conf
fast_cgi_param  SNICCO_FORTRESS_PASSWORD_ENCRYPTION_KEY_HEX  f430039c596b11af5209d2d88f97df4bb235db0d03ad441f2e2b4b6b19611068;
fast_cgi_param  SNICCO_FORTRESS_DEVICE_ID_AUTHENTICATION_KEY_HEX  4d9de2034c07adf6889f401da82084cf5dc7976db542354e3eec59c7891b8ac2;
fast_cgi_param  SNICCO_FORTRESS_TOTP_ENCRYPTION_SECRET_HEX  06ead42446867d79b6c99c039a5f9ea0217607ca7270c47dca2f44efc8def430;
fast_cgi_param  SNICCO_FORTRESS_LIBSODIUM_GENERIC_HASH_KEY_HEX  689b11f973f6afe8ebe336dc03a973c8094e982fd72acb76fdb6c74649d45147;
```

#### Example: dynamic PHP configuration

You can use the following commands to generate a dynamic PHP file that defines all required secrets as PHP constants.
You must include the generated file somewhere before Fortress loads (typically in the wp-config.php file).

```shell
printf "<?php\n\n" > user-config.php

php bin/prod/generate-secrets.php | xargs -n1 -d'\n' printf 'define("%s");\n' >> user-config.php

sed -i 's/:/","/g' user-config.php
```

```php
<?php
// user-config.php
define("SNICCO_FORTRESS_PASSWORD_ENCRYPTION_KEY_HEX","f4a2fed3d3a21f3c0e1b3ee01fcfd64392b91aba8ef256b9bf8f335135540279");
define("SNICCO_FORTRESS_DEVICE_ID_AUTHENTICATION_KEY_HEX","6ddc3d504871dbea36ab21be337059c15f4fe48debf7b2e0d016c4042e8c5e39");
define("SNICCO_FORTRESS_TOTP_ENCRYPTION_SECRET_HEX","e63845960aca90e39e93dc96d49151ec6941c1092ce61c0a5acb5309c758be59");
define("SNICCO_FORTRESS_LIBSODIUM_GENERIC_HASH_KEY_HEX","ae6dd3785280ed0e0530bd992cc21ea95c288441ade62bc0b79fe2e4b12dc691");
```

### Disabling fallback secrets

If you are generating secrets before activating the plugin, you can instruct Fortress
to NOT generate default secrets in the wp-config.php file. 

Instead, an exception will be thrown for any missing secrets as it likely means
that you environment is broken.

You can instruct Fortress to NOT generate default secrets by setting the following environment
variable BEFORE Fortress boots. 

```php
$_SERVER['SNICCO_FORTRESS_NO_FALLBACK_SECRETS'] = '1';
```

It does not matter whether you set `SNICCO_FORTRESS_NO_FALLBACK_SECRETS` in PHP or through a SAPI parameter by using `fast_cgi_param`, docker environments, or similar techniques.

**Important:**

Fortress completely ignores the value of `SNICCO_FORTRESS_NO_FALLBACK_SECRETS` and only checks for existence.
The only restriction is that `SNICCO_FORTRESS_NO_FALLBACK_SECRETS` **MUST be a non-empty-string**.

### The most critical rule with secrets

**Never change or delete them manually!**

There is no scenario where manually changing (or deleting) Fortress secrets is a good idea.

It will likely lead to you being locked out of your site as Fortress uses secrets to encrypt TOTP (2FA) secrets and password hashes.
If you lose or change your secrets, all cryptographic operations for existing data will fail.

This rule also applies to staging sites and or local development sites.
If an end-user modifies or creates data managed by Fortress (2FA secrets, user passwords) on a staging site, the staging site must use the same cryptographic secrets as the production site.

## White-label

If you purchased a license that allows you to white-label Fortress, you'd have to configure it before activating the plugin the first time.

Consult the [white-label documentation](03_white_label.md) for more information.

## Special directories

### Log directory

Fortress will default to write logs to `/path/to/snicco-fortress/var/log`.

You can, and **should change** this by setting the `$_SERVER` env value of `SNICCO_FORTRESS_LOG_DIR` to a **writeable directory that already exists**.

**The log directory MUST be outside the webroot in production!**

```php
// /var/www/html/wp-config.php

// /var/www/fortress/logs
$_SERVER['SNICCO_FORTRESS_LOG_DIR'] = dirname(__DIR__, 2).'/fortress/logs';
```

### Cache directory

Fortress will default to write its internal cache to `/path/to/snicco-fortress/var/cache`.

You can, and **should change** this by setting the `$_SERVER` env value of `SNICCO_FORTRESS_CACHE_DIR` to a **writeable directory that already exists**.

**The cache directory MUST be outside the webroot in production!**

```php
// /var/www/html/wp-config.php

// /var/www/fortress/logs
$_SERVER['SNICCO_FORTRESS_CACHE_DIR'] = dirname(__DIR__, 2).'/fortress/cache';
```

## Web server adjustments

You need to exclude the `domanin.com/snicco-fortress/*` path from caching as those pages contain standard HTML forms.
```nginx
if ($request_uri ~* "(/snicco-fortress.*)") {
 # YOUR CACHE EXCLUSION LOGIC GOES HERE.
 set $skip_cache 1;
 set $skip_reason "${skip_reason}-request_uri";
}
```

Of course, you need to substitute `/snicco-fortress` if you [white-labeled the url namespace](03_white_label.md#sniccofortresswhitelabelslug).

---

Next: [White-Label](03_white_label.md)
