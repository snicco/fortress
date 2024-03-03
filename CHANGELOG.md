# [1.0.0-beta.33](https://github.com/snicco/enterprise/compare/1.0.0-beta.32...1.0.0-beta.33) (2024-03-03)


### Bug Fixes

* use relative links for wp error object in two-factor challenge redirect ([be5440e](https://github.com/snicco/enterprise/commit/be5440e9eb50cdcec24062192cb82f1c86c0fb7b)), closes [#133](https://github.com/snicco/enterprise/issues/133)


### Features

* code freeze initial release ([d391846](https://github.com/snicco/enterprise/commit/d39184689b15eea45de2ecabd09a5d68b3d9c4e8))

# [1.0.0-beta.32](https://github.com/snicco/enterprise/compare/1.0.0-beta.31...1.0.0-beta.32) (2023-11-05)


### Features

* add composer support for production installs ([d4d42c1](https://github.com/snicco/enterprise/commit/d4d42c1f739bb755cbdcdaafd2969faad3a7cd5a))

# [1.0.0-beta.31](https://github.com/snicco/enterprise/compare/1.0.0-beta.30...1.0.0-beta.31) (2023-10-06)


### Bug Fixes

* don't sudo protect unfiltered_html by default ([1d7e90f](https://github.com/snicco/enterprise/commit/1d7e90f46913780685496d64a0f34c01af2a154d))

# [1.0.0-beta.30](https://github.com/snicco/enterprise/compare/1.0.0-beta.29...1.0.0-beta.30) (2023-10-06)


### Features

* add literal 'administrator' capability as protected ([b81f66c](https://github.com/snicco/enterprise/commit/b81f66c7d5442eab3b9afd82f46d4a1c2472239c))
* vaults&pillars compat for wp6.4 ([c11996d](https://github.com/snicco/enterprise/commit/c11996df13be6b5d7c5f4b3bcdd69508c74cd705))

# [1.0.0-beta.29](https://github.com/snicco/enterprise/compare/1.0.0-beta.28...1.0.0-beta.29) (2023-09-27)


### Features

* add hidden page wp-admin/options.php as protected ([e8ebd20](https://github.com/snicco/enterprise/commit/e8ebd20315fc895104cabfcde0a23d1ab0cc70be))
* add multisite specific protected pages ([7b80892](https://github.com/snicco/enterprise/commit/7b808920d15d7eaaa1880120acec8273f48c76d2))
* add sudo mode compatability for wp application passwords and third-party auth ([c2fd7ac](https://github.com/snicco/enterprise/commit/c2fd7ac7bc24d2286b8c4945c60ff88c531e0530)), closes [#87](https://github.com/snicco/enterprise/issues/87)
* pipe admin request through fortress on wp_loaded instead of admin_init ([937af1b](https://github.com/snicco/enterprise/commit/937af1bacd68426f261b846adadd3d8a0f02a63d))
* restrict capabilities for non sudo mode sessions ([4fbe453](https://github.com/snicco/enterprise/commit/4fbe4539b41add0630bbd74338069cac0c657051)), closes [#100](https://github.com/snicco/enterprise/issues/100)

# [1.0.0-beta.28](https://github.com/snicco/enterprise/compare/1.0.0-beta.27...1.0.0-beta.28) (2023-09-16)


### Features

* use "edit_user" instead of "manage_options" as required 2fa edit cap ([2273a3e](https://github.com/snicco/enterprise/commit/2273a3e0d24fb38a2ca76bcc0fd72a14193c76d8))
* use dynamic admin path for baseline protected pages ([8552951](https://github.com/snicco/enterprise/commit/855295158531e411237cfb654a583dd9726028fb)), closes [#96](https://github.com/snicco/enterprise/issues/96)

# [1.0.0-beta.27](https://github.com/snicco/enterprise/compare/1.0.0-beta.26...1.0.0-beta.27) (2023-09-14)


### Bug Fixes

* use core's cookie_domain constant for all cookies ([43029b1](https://github.com/snicco/enterprise/commit/43029b1df80a00420c570eabfd13d377bc66c31c))


### Features

* use wpdb's base prefix instead of per-site prefix ([212bd80](https://github.com/snicco/enterprise/commit/212bd806bb97f9f59964af1a78228f690eb9a82e)), closes [/github.com/snicco/fortress/discussions/12#discussioncomment-6966981](https://github.com//github.com/snicco/fortress/discussions/12/issues/discussioncomment-6966981)

# [1.0.0-beta.26](https://github.com/snicco/enterprise/compare/1.0.0-beta.25...1.0.0-beta.26) (2023-09-14)


### Bug Fixes

* ensure that modules can be disabled in config sources ([b22de80](https://github.com/snicco/enterprise/commit/b22de80c08ac8d030b96a5478be616288c013785))

# [1.0.0-beta.25](https://github.com/snicco/enterprise/compare/1.0.0-beta.24...1.0.0-beta.25) (2023-09-12)


### Features

* add deep, semantic config validation ([1806428](https://github.com/snicco/enterprise/commit/18064283dd332230e23631d654d3c4d9ad25578f)), closes [#89](https://github.com/snicco/enterprise/issues/89)

# [1.0.0-beta.24](https://github.com/snicco/enterprise/compare/1.0.0-beta.23...1.0.0-beta.24) (2023-08-15)


### Bug Fixes

* invalidate opcache during fortress cache clear ([cd82263](https://github.com/snicco/enterprise/commit/cd82263c92878b390bc28d2d3b7460c4a7260308))
* remove config source snapshot mechanism ([9e96503](https://github.com/snicco/enterprise/commit/9e96503fabb06bd70ace3cca2d5fa48a5a7bbb48))


### Features

* prevent installation on sites without innodb storage on wp_users ([f286b0d](https://github.com/snicco/enterprise/commit/f286b0d69881c537a6b74571edfc196bb2be7dc5)), closes [#53](https://github.com/snicco/enterprise/issues/53)
* remove site-specific state from configuration cache invalidation ([dfe73c7](https://github.com/snicco/enterprise/commit/dfe73c7eaecdc54535e544ecc4e88ea34a0fc343))

# [1.0.0-beta.23](https://github.com/snicco/enterprise/compare/1.0.0-beta.22...1.0.0-beta.23) (2023-08-09)


### Bug Fixes

* prevent dbdelta from resetting wp_users.user_pass ([1121505](https://github.com/snicco/enterprise/commit/11215051f9ca981c007add1d89aa91452cd92b42))

# [1.0.0-beta.22](https://github.com/snicco/enterprise/compare/1.0.0-beta.21...1.0.0-beta.22) (2023-08-03)


### Features

* add vaults and pillars module ([6a3b990](https://github.com/snicco/enterprise/commit/6a3b990424fb21befc655be689328d153fb717bf))

# [1.0.0-beta.21](https://github.com/snicco/enterprise/compare/1.0.0-beta.20...1.0.0-beta.21) (2023-07-31)


### Bug Fixes

* trigger activation after wp core updates ([599e725](https://github.com/snicco/enterprise/commit/599e725c7123745fcd270b899d027b33036b8ac9))

# [1.0.0-beta.20](https://github.com/snicco/enterprise/compare/1.0.0-beta.19...1.0.0-beta.20) (2023-07-26)


### Security

* fix incomplete audit log sanitization ([053aa88](https://github.com/snicco/enterprise/commit/053aa88ca591c5c0abb4ba1e846d0cba7f2136fd)). Check out the [advisory](https://github.com/snicco/fortress/security/advisories/GHSA-q2qj-gpv9-929g) here.


### Features

* handle invalid device ids gracefully ([d0ba399](https://github.com/snicco/enterprise/commit/d0ba3997f772ecc37fb6666abbe3e477c0f2b3b7))

# [1.0.0-beta.19](https://github.com/snicco/enterprise/compare/1.0.0-beta.18...1.0.0-beta.19) (2023-06-26)


### Features

* allow cli magic links to skip squeeze page ([2797764](https://github.com/snicco/enterprise/commit/27977641099d1fe3519d9a5276a62473d9ed36fa))
* redirect logged-in users with a valid magic link ([7836ad8](https://github.com/snicco/enterprise/commit/7836ad86fc04efa62c2d9fca7f84679f03bb1625))

# [1.0.0-beta.18](https://github.com/snicco/enterprise/compare/1.0.0-beta.17...1.0.0-beta.18) (2023-06-01)


### Bug Fixes

* set device id cookie for root path "/" instead of current path ([5d03050](https://github.com/snicco/enterprise/commit/5d03050540f176729c40f9994f01875dc8c5a41a))


### Features

* add magic login links ([8a99ae7](https://github.com/snicco/enterprise/commit/8a99ae71ba1d1a27442d3244307091642fdd3576))

# [1.0.0-beta.17](https://github.com/snicco/enterprise/compare/1.0.0-beta.16...1.0.0-beta.17) (2023-05-29)


### Features

* add cli command to reset failed totp attempts ([cbf00ca](https://github.com/snicco/enterprise/commit/cbf00ca55a12105eb45c9d3a7cd4b2d6811a76e3))
* don't reset totp attempts for privileged users ([5fe7e9a](https://github.com/snicco/enterprise/commit/5fe7e9ace1356753e290be84cf30586205cc3449)), closes [#60](https://github.com/snicco/enterprise/issues/60)

# [1.0.0-beta.16](https://github.com/snicco/enterprise/compare/1.0.0-beta.15...1.0.0-beta.16) (2023-05-23)


### Bug Fixes

* upgrade snicco/* to 1.6.2, fixes issue with uppercase db prefix ([1559bef](https://github.com/snicco/enterprise/commit/1559befceaf930c52aeea412fc2e833566bb0ef5)), closes [snicco/fortress#1](https://github.com/snicco/fortress/issues/1)


### Features

* support reserved mysql keywords and backticks in all db queries ([cefc93c](https://github.com/snicco/enterprise/commit/cefc93cabb9e1f6c319437ea5536f83b2827f846))

# [1.0.0-beta.15](https://github.com/snicco/enterprise/compare/1.0.0-beta.14...1.0.0-beta.15) (2023-05-19)


### Bug Fixes

* ensure that fortress logs sort alphabetically ([6496bd0](https://github.com/snicco/enterprise/commit/6496bd06432261617ff6053bfe23a69d20560f5b)), closes [#58](https://github.com/snicco/enterprise/issues/58)
* fix incorrect html label attribute on device id page ([c82e160](https://github.com/snicco/enterprise/commit/c82e160318987ac03a8a5c86ab35ccbb2190440d))


### Features

* allow to skip session token rotation for ajax like requests ([acf1c25](https://github.com/snicco/enterprise/commit/acf1c25e2dfa9fe3d588d0b4477f5df7662d26dd)), closes [#59](https://github.com/snicco/enterprise/issues/59)
* delay fortress routes until after 'plugins_loaded' ([4a4c12a](https://github.com/snicco/enterprise/commit/4a4c12a7c1fb87f24824100a0c9dc4ce276397a7))
* trigger warnings if pluggable functions are already defined pre fortress boot ([dab6839](https://github.com/snicco/enterprise/commit/dab68391a6a73643f8a337291c5fb21ff3bf11c1))
* use sanitized request_target instead of path in log context ([6f3bfdf](https://github.com/snicco/enterprise/commit/6f3bfdf5bc82155f8b103c93bbaad43c1f2feb9a))

# [1.0.0-beta.14](https://github.com/snicco/enterprise/compare/1.0.0-beta.13...1.0.0-beta.14) (2023-05-13)


### Features

* add self invalidating configuration cache ([7ed2bf6](https://github.com/snicco/enterprise/commit/7ed2bf617326da8610c53a537239c0b69175fc6c)), closes [#47](https://github.com/snicco/enterprise/issues/47)
* cache invalidation with nested dir ([6cbcef0](https://github.com/snicco/enterprise/commit/6cbcef0578b38f49561bf8f4378f1cf7f94da30e))

# [1.0.0-beta.13](https://github.com/snicco/enterprise/compare/1.0.0-beta.12...1.0.0-beta.13) (2023-05-08)


### Features

* allow disabling the generation of wp-config fallback secrets ([e17c4ce](https://github.com/snicco/enterprise/commit/e17c4ce5249ec15664f3dcd00d221320065d5e8a)), closes [#49](https://github.com/snicco/enterprise/issues/49)
* improve robustness of table creation/management ([5590a43](https://github.com/snicco/enterprise/commit/5590a43709a3e7784b71a1c38425fc57c951fbb9)), closes [#51](https://github.com/snicco/enterprise/issues/51) [#52](https://github.com/snicco/enterprise/issues/52) [#54](https://github.com/snicco/enterprise/issues/54)

# [1.0.0-beta.11](https://github.com/snicco/enterprise/compare/1.0.0-beta.10...1.0.0-beta.11) (2023-04-26)


### Features

* standardize log directories ([c6d5528](https://github.com/snicco/enterprise/commit/c6d5528d6b0f202f5537bc59520e962e965d95cb))

# [1.0.0-beta.10](https://github.com/snicco/enterprise/compare/1.0.0-beta.9...1.0.0-beta.10) (2023-04-25)


### Features

* allow to skip sudo checks for empty session tokens ([1ffd570](https://github.com/snicco/enterprise/commit/1ffd570fdeef879ddd5cc4db31e0175b7fd9ce47))

# [1.0.0-beta.9](https://github.com/snicco/enterprise/compare/1.0.0-beta.8...1.0.0-beta.9) (2023-04-25)


### Bug Fixes

* totp login routes are loaded to early ([cb09825](https://github.com/snicco/enterprise/commit/cb09825fa4cfb2a756f1e74308f8fdf4969a63d9))

# [1.0.0-beta.8](https://github.com/snicco/enterprise/compare/1.0.0-beta.7...1.0.0-beta.8) (2023-04-23)


### Bug Fixes

* add missing cli command descriptions ([582d29b](https://github.com/snicco/enterprise/commit/582d29b66e1ee75e925cebca0d5bb0c9e677aa8a))

# [1.0.0-beta.7](https://github.com/snicco/enterprise/compare/1.0.0-beta.6...1.0.0-beta.7) (2023-04-23)


### Bug Fixes

* ensure /shared is an early route prefix ([1f1e29d](https://github.com/snicco/enterprise/commit/1f1e29de272bf691868455b43739aae57acf13c0))


### Features

* add a config:test command ([2f956fd](https://github.com/snicco/enterprise/commit/2f956fda655edd83035a622d8e043c4fc0eb63c0))
* create an info cli command ([eb202ce](https://github.com/snicco/enterprise/commit/eb202ce6b141876d28a8e2ce040891e18ad4c4d8))
* create cli command to view config sources ([58b125c](https://github.com/snicco/enterprise/commit/58b125cb8d64fc7faf777f49ad71077df2dd0b9e))


### Performance Improvements

* only bind cli commands in container during cli request ([84b6cd5](https://github.com/snicco/enterprise/commit/84b6cd510f75cdbda1884a037c47aea2d08f7016))

# [1.0.0-beta.6](https://github.com/snicco/enterprise/compare/1.0.0-beta.5...1.0.0-beta.6) (2023-04-21)


### Features

* add wp-cli command to view cached config as json ([2e65901](https://github.com/snicco/enterprise/commit/2e65901987f6c3ab361876f0db80c8998aac04e2)), closes [#39](https://github.com/snicco/enterprise/issues/39)
* create a bin/prod command that lists all secret names ([b04260d](https://github.com/snicco/enterprise/commit/b04260d97bc3e0b910bb4023681c2f30f6617c59)), closes [#40](https://github.com/snicco/enterprise/issues/40)

# [1.0.0-beta.5](https://github.com/snicco/enterprise/compare/1.0.0-beta.4...1.0.0-beta.5) (2023-04-21)


### Bug Fixes

* front end assets have wrong url scheme in CLI ([3553178](https://github.com/snicco/enterprise/commit/35531786329f10a8bbf31cbe2f0a112a9e54c3d0)), closes [#41](https://github.com/snicco/enterprise/issues/41)
* only increase sudo route rate-limit on failure ([3ad9c2a](https://github.com/snicco/enterprise/commit/3ad9c2a8856794f5288f89dba159acd67a59fd79)), closes [#33](https://github.com/snicco/enterprise/issues/33)


### Features

* allow to explicitly configure the rate limit storage ([9bf676a](https://github.com/snicco/enterprise/commit/9bf676a0c2779e354b908c339825982461492902)), closes [#32](https://github.com/snicco/enterprise/issues/32)

# [1.0.0-beta.4](https://github.com/snicco/enterprise/compare/1.0.0-beta.3...1.0.0-beta.4) (2023-04-19)


### Bug Fixes

* dont alter password table on every request ([db57471](https://github.com/snicco/enterprise/commit/db574714e9f28b04617ca7027f314df19c7ff074)), closes [#34](https://github.com/snicco/enterprise/issues/34)
* use clear config constant names ([7947885](https://github.com/snicco/enterprise/commit/79478858e7f915d1bd489c3042aaad827b801572)), closes [#36](https://github.com/snicco/enterprise/issues/36)


### Features

* allow all conf sources to customize cli namespace ([c0ab2df](https://github.com/snicco/enterprise/commit/c0ab2df8913828029433ebb415afc3e649856ce8))

# [1.0.0-beta.2](https://github.com/snicco/enterprise/compare/1.0.0-beta.1...1.0.0-beta.2) (2023-02-12)


### Bug Fixes

* fix error to exceptions on php8+ ([c2fe807](https://github.com/snicco/enterprise/commit/c2fe8078114405cec32b500bc4c014e0ca31cfd1))


### Features

* add bin/prod script to generate default secrets ([1dc0257](https://github.com/snicco/enterprise/commit/1dc0257ae94d70903be436665d02f150894ee4ba))
* add trigger-activation command ([9765935](https://github.com/snicco/enterprise/commit/97659357239829be8c9460d5837c431c82b5d7f9))
* allow short-circuiting fortress ([5a54a76](https://github.com/snicco/enterprise/commit/5a54a769d0a7c8f066f4af8f5ea040c8307280a7))
* clear all cache files in cache:clear command ([908c861](https://github.com/snicco/enterprise/commit/908c861a6ba60fc57f7079febae652c2e1cf18fb))
* custom error to exception logic ([4d5140d](https://github.com/snicco/enterprise/commit/4d5140d451a035a4bb573b152b04ea41c2b163b7))
* dont error if defined user config file does not exist ([8276a66](https://github.com/snicco/enterprise/commit/8276a661a2a4a029b3603bd2efe97765b71dc498))
* output totp secrets when --force-complete is used ([b0126a3](https://github.com/snicco/enterprise/commit/b0126a37071de66b2fae8ead8a5d3b0350c3591d))

# 1.0.0-beta.1 (2023-01-18)


### Features

* initial beta release ([e0a3d30](https://github.com/snicco/enterprise/commit/e0a3d304cfdd00888803cdbe18fb62188f1ee3c1))
