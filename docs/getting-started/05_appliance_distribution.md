# Appliance Distribution

<!-- TOC -->
* [Appliance Distribution](#appliance-distribution)
    * [Use uniform versions](#use-uniform-versions)
    * [Use a custom must-use plugin](#use-a-custom-must-use-plugin)
        * [Starter mu-plugin wrapper](#starter-mu-plugin-wrapper)
<!-- TOC -->

---

This document outlines what we believe to be the best approach for distributing Fortress to your clients as
part of an appliance license. However, you are free to choose whatever works best for your setup.

## Use uniform versions

Since you will be handling tier one and tier two support, all your customers should use the same Snicco Fortress version. This way, you remove all ambiguity about whether potential issues arise because a customer is using an outdated version.

You should be in charge of updating Fortress, not your customers.

## Use a custom must-use plugin

We recommend creating a git repository on your CI platform of choice.
This repository should include a simple wrapper around Fortress to handle the [necessary preparations](02_preparation.md).
Furthermore, it should include the production build of Fortress in version control.

Your CI platform very likely has the functionality to run CRON scripts on a predefined schedule:

- [GitHub Actions](https://docs.github.com/en/actions/using-workflows/events-that-trigger-workflows#schedule)
- [GitLab CI](https://docs.gitlab.com/ee/ci/pipelines/schedules.html)

You can perform the following steps on a daily CRON schedule:

- [Fetch the latest tag of Fortress](01_download.md#get-the-latest-version-name-including-beta-releases-).
- Compare it to your git repo's current tag.
- Tag a new release of your mu-wrapper if a newer Fortress version exists.
- Distribute and [update](04_activation.md#updating-the-mu-plugin) your custom Fortress Wrapper in the same manner that you distribute your other custom mu-plugins.

### Starter mu-plugin wrapper

We created a [starter mu-plugin](./../_assets/mu-starter) wrapper that contains everything you need.

It's just a [plain PHP file](./../_assets/mu-starter/acme-host-fortress.php) that configures and loads Fortress.

---

Next: [How to configure Fortress](../configuration/01_how_to_configure_fortress.md)