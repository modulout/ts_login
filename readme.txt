=== TS login ===
Contributors: Modulout
Plugin Name: TS login
Plugin URI: https://github.com/modulout/ts_login
Donate link: https://www.modulout.com/
Tags: login, register, popup, different styles, google reCAPTCHA
Requires at least: 5.0
Tested up to: 5.8
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With the TS login plugin, your users can log in or/and register from the front page (not needed to go to wp-admin anymore).

== Description ==

With the TS Login plugin, your users can log in and register directly from the front page, eliminating the need to go to the WordPress wp-admin page. The plugin provides a simple widget, and you can also add login and registration functionality by applying specific CSS classes to any website element. It works seamlessly with the latest WordPress versions and is fully customizable, allowing you to adjust colors and styles in wp-admin for a consistent website look and feel.

= New in Version 1.0.3 =

* Added "Forgot Password" and "Reset Password" functionality, fully integrated into the pop-up, making account recovery easier for your users.
* You can now customize icons or completely disable them as needed.
* Added an option to show a register button directly on the login pop-up page for improved user flow.

Additionally, this plugin integrates perfectly with Tipster Script, a comprehensive WordPress solution for managing tipster platforms. Tipster Script includes features such as subscription-based user roles, picks management, and user payouts, making TS Login an ideal choice for tipster platforms looking to provide seamless login, registration, and password management.

= Key Features: =

* Fully responsive login/register pop-ups with multiple styles (Basic, Image on Top, Image on Left Side).
* Google reCAPTCHA v3 support for enhanced security.
* Includes Bootstrap 5.0.1 and FontAwesome libraries for styling and icons.
* Multi-language support for international users.
* Easy installation and detailed documentation.
* Works seamlessly with the Tipster Script plugin, making it ideal for platforms focused on user subscriptions, tipster management, and secure authentication.

== Screenshots ==

1. Login form image on top
2. Register form image on left side
3. Configuration 1
4. Configuration 2

By default, the reCAPTCHA option is disabled, but you can enable it easily with your site and secret keys. TS Login offers seamless integration into your WordPress site, supporting custom CSS classes for advanced use cases.

== Installation ==

1. Upload the ts_login directory to the /wp-content/plugins/ directory or install through WordPress admin installer (wp-admin -> plugins -> add new)
2. Activate the plugin through the 'plugins' menu in WordPress.
3. Edit colors setting in wp-admin -> TS Login -> config

= Usage =

You can use the already prepared widget TS - login form which will add login and register options (if users are not already logged in). In case the user is logged in it will be written his username (instead of login / register text).

= Use login class =

You can use a custom class on any element on your website. In this case, you need to add: js--tsl-login-popup

= Use register class =

You can use a custom class on any element on your website. In this case, you need to add: js--tsl-register-popup

== Frequently Asked Questions ==

= Is this plugin free?
Yes. You can use it for any of your project/s.

== Upgrade Notice ==

= No upgrade needed (first release) =

== Changelog ==

= 1.0.3 =

* Forgot password and Reset password functionality in pop-up
* Option to add any icon/s or disable icon/s
* Option to show register button on Login pop-up page

= 1.0.2 =

* Compatible with WordPress 6.7.x version

= 1.0.1 =

* Fixed Font Awesome issue

= 1.0.0 =

* Initial release
