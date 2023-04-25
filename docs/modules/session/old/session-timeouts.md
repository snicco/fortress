# Session timeouts 

## Idle timeout

A session is idle if no HTTP request has been received for a given session token within the configured idle timeout.

The session's last activity is tracked on the server, not on the client.

(Almost) every HTTP to is processed by WordPress will update the session last activity and will thus reset the idle timeout.
The following requests are an exception: 

- WP-Cron, there is never an auth cookie during WP cron requests.
- Heartbeat API in the WordPress admin area. By default, WordPress will poll an ajax endpoint once a minute if the logged-in user is in the WP admin area. Those requests are automatic and will not update a sessions last acitivy. 

### What it accomplishes:

1. A short idle timeout limits the time to guess a valid session token (Nearly impossible anyway since session tokens have 256 bits of entropy).
2. Protects users that forgot to log out of a shared workstation.

## Absolute timeout

Regardless of activity, a session will be expired after the absolute timeout is exceeded.
Finding an appropriate absolute timeout depends heavily on the average usage duration of a user.

Lower absolute timeouts increase security but decrease usability. 

### What it accomplishes: 

Absolute session timeouts limit the window that an attacker can use a stolen session token. 

Suppose an attacker is able to somehow steal a legitimate user's session token. If the absolute session timeout is 15 minutes for
administrators an attacker can at most exploit the stolen session token for 15 minutes. After that he is logged out.

## Rotation timeout

The rotation timeout complements the idle and absolute timeout. 

Once the rotation interval is exceeded the contents of the current session are copied to a newly generated 
session ID while the current session ID is invalidated. 

### What is accomplishes:

The rotation interval significantly shortens the window to start an exploit if a session token has been stolen.

Suppose an attacker is able to somehow steal a legitimate user's session token through malware installed on the user's machine. 

If the rotation interval is 5 minutes, the attacker must use the stolen session token to log in within 5 minutes.

After that it will no longer be valid assuming that the legitimate user keeps using the application.

The rotation timeout does not offer protection if the attacker immediately starts exploiting the stolen session token.
If that is the case there is a race condition between the attacker and the legitimate user. The client that makes the first request
after the rotation interval is exceeded will get the new session ID while the other client is logged out.

This is why it's important to have both an absolute and rotation timeout.

### Important

The rotation timeout will always limit the timeframe in which nonces created with `wp_create_nonce` are valid. 

This is because WordPress uses the user's session token to pepper the created nonce.

If the session is rotated the session token will be different, and thus a nonce created before rotating the token will not be valid.

This is only relevant for logged-in users. 

## Sudo timeout

The sudo timeout specifies the period that a user resides in "sudo mode" after logging in. 

If the auth confirmation timeout is exceeded, any sensitive action will require the user to enter his password again. 

Upon entering his password the user enters the sudo mode again for the configured interval and can perform sensitive actions without authenticating.

### What is accomplishes:

The sudo timeout protects user that forgot to log out on a shared workstation where the attacker resumed the active session
before it was idle. The attacker that took over the active session will not be able to perform sensitive actions if the sudo timeout has been exceeded. 

## Relationship between the timeouts

`sudo timeout < idle timeout < absolute timeout`.

and

`rotation timeout < absolute timeout`

