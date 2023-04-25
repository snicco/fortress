# Activation

<!-- TOC -->
* [Activation](#activation)
  * [Initial must-use setup](#initial-must-use-setup)
  * [Updating the MU-plugin](#updating-the-mu-plugin)
<!-- TOC -->

---

While it is possible to simply install and activate Fortress as you would with any other plugin,
it is **highly recommend** to run Fortress as a [must-use plugin](https://wordpress.org/dcumentation/article/must-use-plugins/).

**Make sure that you followed the [preparation](02_preparation.md) guide before proceeding!**

## Initial must-use setup

```shell
# Put WordPress into maintenance mode for web requests.
wp maintenance-mode activate

# Copy the downloaded version into mu-plugins dir.
wp /path/to/unziped/version/snicco-fortress wp-content/mu-plugins/

# Copy mu-stub since WordPress only loads files in the must-use directory.
cp wp-content/mu-plugins/snicco-fortress/stubs/mu-plugin.txt wp-content/mu-plugins/snicco-fortress.php

# Make sure that Fortress's activation hooks are run.
wp snicco/fortress shared trigger-activation

# Disable maintenance mode for web requests.
wp maintenance-mode deactivate
```

WordPress only loads files in the `wp-content/mu-plugins` directory.

For that reason, Fortress includes a [baseline stub](../../stubs/mu-plugin.txt) that will correctly load Fortress as a must-use plugin.

```php
<?php

declare(strict_types=1);

/*
 * Plugin Name:       Snicco Fortress
 * Plugin URI:        https://github.com/snicco
 * Description:       Enterprise WordPress Authentication.
 * Version:           1.0.0
 * Requires at least: 6.0.0
 * Requires PHP:      7.4
 * Author:            Snicco
 * Author URI:        https://github.com/snicco
 * License:           Commercial
 * Text Domain:       snicco-fortress
 */
require_once __DIR__ . '/snicco-fortress/main.php';
```

If your license of Fortress allows [white-labeling](03_white_label.md) you can change the plugin header texts
that will show on the `wp-admin/plugins.php` page.

## Updating the MU-plugin

Updating anything but the simplest must-use plugins has been difficult historically in WordPress since activation/deactivation hooks are not called.

The recommended approach, for now, is the following:

1. [Download](01_download.md) the desired version of Fortress.
2. Clear the internal caches (configuration cache, routing cache, etc.) of Fortress.
3. Replace the files of the mu-plugin.
4. Trigger activation hooks with our custom CLI commands.

```shell
# Put WordPress into maintenance mode for web requests.
wp maintenance-mode activate

# Clear Fortress's internal cached.
wp snicco/fortress shared cache:clear

# Replace the current version with the new version.
mv -f /path/to/unziped/new-version/snicco-fortress wp-content/mu-plugins/

# Trigger activation hooks in case any changes to DB tables are required.
wp snicco/fortress shared trigger-activation

# Disable maintenance mode for web requests.
wp maintenance-mode deactivate
```

---

Next: [Appliance distribution](05_appliance_distribution.md)
