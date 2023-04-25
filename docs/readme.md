# Fortress Documentation

<!-- TOC -->
  * [Getting started](#getting-started)
    * [Requirements](#requirements)
    * [Quickstart](#quickstart)
    * [Platform/Appliance integration](#platformappliance-integration)
  * [Configuration](#configuration)
  * [Modules](#modules)
  * [WP-CLI](#wp-cli)
  * [Debugging and more](#debugging-and-more)
<!-- TOC -->

## Getting started

### Requirements

Snicco Fortress has the following system requirements:

- PHP: `7.4 | 8.0 | 8.1`.
- Non-default PHP extensions: `mbstring`.
- WordPress: `6.0 or higher`.

### Quickstart

If you are only looking to test Fortress without going into all the details
of the optimal setup, take the following steps:

1. [Download the desired version of Fortress using the GitHub UI](getting-started/01_download.md#web-ui).
2. Install the plugin through the WordPress admin UI like any other plugin.
3. Fortress should redirect you to the 2FA setup page after activation.

### Platform/Appliance integration

If you want to integrate Fortress into your hosting platform or similar, go through the in-depth setup documentation.

1. [Download](getting-started/01_download.md)
2. [Preparation](getting-started/02_preparation.md)
3. [White-Label](getting-started/03_white_label.md)
4. [Activation](getting-started/04_activation.md)
5. [Appliance Distribution](getting-started/05_appliance_distribution.md)


## Configuration

1. [How to configure Fortress](configuration/01_how_to_configure_fortress.md)
2. [Complete configuration reference](configuration/02_configuration_reference.md)

## Modules

Snicco Fortress consists of four independent modules that you can use independently of each other.
All four modules are activated by default.

1. [Password Security](modules/password/readme.md)
2. [Rate limiting](modules/ratelimit/readme.md)
3. [Authentication](modules/auth/readme.md)
4. [Session Management](modules/session/readme.md)

## WP-CLI

Fortress is built with a CLI-first approach, allowing maximum automation in [appliance distribution](getting-started/05_appliance_distribution.md). It has full feature parity between the Web UI and the WP-CLI.

To improve the lackluster developer experience and reliability of the (default) WP-CLI significantly, we created our open-source [BetterWPClI](https://github.com/snicco/better-wp-cli) library and used it everywhere in Fortress.

Refer to the [complete WP-CLI reference](wp-cli/readme.md) for more information.

## Debugging and more

- [Short-circuiting Fortress](debugging-and-more/short-circuiting-fortress.md)
- [Error handling in Fortress](debugging-and-more/error-handling.md)
- [Logging in Fortress](debugging-and-more/logging.md)