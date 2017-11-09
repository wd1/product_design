=== Plugin Name ===
Contributors: kosvrouvas, codesignsgr
Tags: ssl, force, https, security, ssl certificate, certificate, redirect
Requires at least: 3.9
Tested up to: 4.7.2
Stable Tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
This plugin helps you redirect HTTP traffic to HTTPS without the need of touching any code.

Want to contribute? Visit our <a href="http://bit.ly/2lygHSc" target="_blank">GitLab repo</a>.

= Notes: =
- You need an SSL Certificate in order for this plugin to work.
- You need to <strong>add https to the WordPress Address (URL) and Site Address (URL) parameters under General > Settings</strong>. (Required by WordPress itself)

== Installation ==
You need to <strong>add https to the WordPress Address (URL) and Site Address (URL) parameters under General > Settings</strong>. (Required by WordPress itself)

1. Add https to the WordPress Address (URL) and Site Address (URL) parameters under General > Settings. (Required by WordPress itself)
2. Install as a regular WordPress plugin.
3. Activate the plugin.
4. Done.

== Changelog ==
= 1.3 =
- Dropping support for PHP 5.3: Only 15.9% of the people that use WordPress use PHP 5.3, it reached end of life and you should ask your host to upgrade.

= 1.2.1 =
- Fixed an issue where some users were getting a error message for no valid header when activating the plugin.

= 1.2 =
- Dropping support for PHP 5.2: Only 5.7% of the people that use WordPress use PHP 5.2, it's old, buggy, and insecure.

== Upgrade Notice ==

= 1.3 =
In this version, we are dropping support for PHP 5.3. Do not upgrade if your website is running on it just yet, and ask you host to upgrade.