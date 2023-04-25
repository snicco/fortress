# The Fortress sudo mode

<!-- TOC -->
* [Introduction](#introduction)
* [How does it work in practice?](#how-does-it-work-in-practice)
    * [For a session in sudo mode](#for-a-session-in-sudo-mode)
    * [For a non-sudo mode session](#for-a-non-sudo-mode-session)
* [Protected pages](#protected-pages)
* [Testing the sudo mode](#testing-the-sudo-mode)
<!-- TOC -->

## Introduction

> Before you continue reading, make sure to familiarize yourself with the [session managment](session-managment-and-security.md) documentation to see how the sudo mode works in the big picture.

The Fortress sudo mode, in analogy to the Linux [sudo](https://www.sudo.ws/) command, defines a period in which Fortress will assign elevated privileges to a user's session.

As a rule of thumb, a sudo mode session is equal to a "normal" user session when Fortress is not installed.

A particular session is only in sudo mode for a [configurable duration](session-managment-and-security.md#configuration-3) after logging in (through any means) for the first time.

After the [sudo timeout](session-managment-and-security.md#the-sudo-mode-timeout) has passed, Fortress will downgrade the user's session to a low-privileged one.

## How does it work in practice?

### For a session in sudo mode

Simple. There is no difference. A user can use the site in the same manner as if Fortress wasn't installed.

### For a non-sudo mode session

A user will only notice that Fortress downgraded his session privileges once they try to access one of the configured [protected pages](#protected-pages).

At that point, Fortress will intercept that request and redirect the user to a page that asks them to confirm their password.

If the user can provide his password, Fortress will reset the sudo timeout and redirect the user to their intended location.

| The user tries to access the sensitive plugins.php page.<br><br>![Confirm access](../../_assets/images/session/confirm-access.png) | On success, Fortress redirects the user back.<br><br>![Plugins page success](../../_assets/images/session/plugins.png) |
|------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------|

Fortress will only intercept requests to protected pages for non-sudo mode sessions, while all other pages on the site can still be accessed.

## Protected pages

A protected page can only be accessed by a user whose session is in sudo mode.

By default, Fortress considers the following pages to be protected:

```php
$protected_pages = [
    // Updates
    '/wp-admin/update-core.php',
    
    // Appearance
    '/wp-admin/themes.php',
    '/wp-admin/theme-install.php',
    
    // Plugins,
    '/wp-admin/plugins.php',
    '/wp-admin/plugin-install.php',
    
    // Users
    '/wp-admin/users.php',
    '/wp-admin/user-new.php',
    '/wp-admin/profile.php',
    
    // Update
    '/wp-admin/update.php',
    
    // Options > *
    '/wp-admin/options-*',
    
    // Authorize application password.
    'wp-admin/authorize-application.php',
    
    // Tools > *
    '/wp-admin/tools.php',
    '/wp-admin/import.php',
    '/wp-admin/export.php',
    '/wp-admin/site-health.php',
    '/wp-admin/export-personal-data.php',
    '/wp-admin/erase-personal-data.php',
    '/wp-admin/theme-editor.php',
    '/wp-admin/plugin-editor.php',
];
```

You can use the [`protected_pages` option](../../configuration/02_configuration_reference.md#protected_pages) to define your list of protected pages.

**Important:** This will completely overwrite the default protected pages of Fortress!

If you want to use all of Fortress's default protected pages AND some custom ones, you need to either:

- copy the default and add your own, or
- use the runtime PHP hooks to customize protected pages.

```php
use Snicco\Enterprise\Fortress\Session\Infrastructure\Event\ConfirmingSudoMode;

add_action(ConfirmingSudoMode::class, function (ConfirmingSudoMode $event) :void {
    $event->addProtectedPath('/my-account');
    
    // "*" Can be used as a wildcard.
    $event->addProtectedPath('/parent-page/*');
})
```

The `*` character can be used as a wildcard.

Examples:

`/wp-admin/*` will protect the entire WordPress admin area.
- `/post-*` will match `/post-1`, `/post-2` and `/post-1/child/sub-child`.

## Testing the sudo mode

It is cumbersome to test that the correct pages on your site are protected because you will have to wait for the sudo timeout to pass.

For this reason, Fortress includes a WP-CLI command that will toggle the sudo mode status of a user's most recently created session.

```shell
wp snicco/fortress session toggle-sudo {username}
```

Refer to the [complete command reference here](../../wp-cli/readme.md#toggle-sudo).

---

Next: [WP-CLI](../../wp-cli/readme.md).