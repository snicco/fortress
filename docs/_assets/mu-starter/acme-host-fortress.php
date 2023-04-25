<?php

declare(strict_types=1);

use Snicco\Enterprise\Fortress\Shared\Infrastructure\PublicConfigAPI;

/*
 * Plugin Name:       Acme Host Security
 * Plugin URI:        https://acme-host.com/security
 * Description:       Enterprise WordPress Security.
 * Requires at least: 6.0.0
 * Requires PHP:      7.4
 * Author:            Acme Host + Snicco
 * Author URI:        https://acme-host.com/security
 * License:           Commercial
 * Text Domain:       snicco-fortress
 */

// Change this value depending on your server setup.
$directory_outside_web_root = \dirname(ABSPATH);

/*
|--------------------------------------------------------------------------
| Configure Log Directory
|--------------------------------------------------------------------------
|
| See: docs/getting-started/02_preparation.md#log-directory
|
*/
\define('SNICCO_FORTRESS_LOG_DIR', $directory_outside_web_root . '/acme-security/log');
\define('SNICCO_FORTRESS_CACHE_DIR', $directory_outside_web_root . '/acme-security/cache');

/*
|--------------------------------------------------------------------------
| Configure White-Label (if allowed by your license)
|--------------------------------------------------------------------------
|
| See: docs/getting-started/03_white_label.md
|
*/
\define('SNICCO_FORTRESS_WHITELABEL_SLUG', 'acme-host-security');
\define('SNICCO_FORTRESS_WHITELABEL_SNAKE_CASE', 'acme_host_security');
\define('SNICCO_FORTRESS_WHITELABEL_CLI_NAMESPACE', 'acme_host/security');
\define('SNICCO_FORTRESS_WHITELABEL_TEXT_CASE', 'Acme Host Security');

/*
|--------------------------------------------------------------------------
| Configure location of configuration files
|--------------------------------------------------------------------------
|
| See: docs/configuration/01_how_to_configure_fortress.md
|
*/
\define('SNICCO_FORTRESS_SERVER_CONFIG_FILE', '/etc/fortress/server-config.json');
\define('SNICCO_FORTRESS_SITE_CONFIG_FILE', $directory_outside_web_root . '/fortress.json');

/*
|--------------------------------------------------------------------------
| Use the PHP Configuration API to register templates
|--------------------------------------------------------------------------
|
*/
\add_action(PublicConfigAPI::class, function (PublicConfigAPI $config_api): void {
    $config_api->addCustomTemplateDirectory(__DIR__ . '/templates');
});

/*
|--------------------------------------------------------------------------
| Bootstrap Fortress
|--------------------------------------------------------------------------
|
|
*/
require_once __DIR__ . 'snicco-fortress/snicco-fortress.php';
