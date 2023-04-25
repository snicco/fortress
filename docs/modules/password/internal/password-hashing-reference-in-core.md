**`PasswordHash`**:

- To [create tokens](https://github.com/WordPress/WordPress/blob/c03305852e7e40e61cad5798eba9ebc3b961e27a/wp-includes/class-wp-recovery-mode-key-service.php#L57) for the WordPress recovery mode.
- To [create](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/user.php#L2911) and [validate](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/user.php#L2989) password reset tokens.
- To [create](https://github.com/WordPress/WordPress/blob/d34882e9e6a979882cdb962b2b7979ee42648d97/wp-login.php#L740) and [validate](https://github.com/WordPress/WordPress/blob/f7dc68f99abcb07e825293c7204144c5c888bfb6/wp-includes/post-template.php#L886) post passwords. This is mostly security theater as post passwords are stored in plaintext in the database anyway.
- To [hash](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/pluggable.php#L2506) and [validate](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/pluggable.php#L2566) user passwords in the default implementation of `wp_hash_password` and `wp_check_password`.

**`wp_hash_password`**:

- To [hash](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/user.php#L2085) users' login passwords.
- To [hash](https://github.com/WordPress/WordPress/blob/c03305852e7e40e61cad5798eba9ebc3b961e27a/wp-includes/class-wp-application-passwords.php#L88) WordPress [application passwords](https://make.wordpress.org/core/2020/11/05/application-passwords-integration-guide/).

**`wp_check_password`**:

- To [authenticate a user with his password](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/user.php#L174).
- To [authenticate a request with application passwords](https://github.com/WordPress/WordPress/blob/b879d0435401b8833bae66483895ffe189e5d35a/wp-includes/user.php#L398).
- To [validate recovery mode tokens](https://github.com/WordPress/WordPress/blob/c03305852e7e40e61cad5798eba9ebc3b961e27a/wp-includes/class-wp-recovery-mode-key-service.php#L109).

