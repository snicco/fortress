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