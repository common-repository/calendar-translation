=== Calendar Translation ===
Contributors: wiltave
Donate link: http://www.simplemix.com.br/extends/
Tags: calendar, date, time, get_the_time, the_time, get_the_date, the_date, localization
Requires at least: 3.1
Tested up to: 3.2
Stable tag: trunk

Replaces the_time, get_the_time, the_date and get_the_date functions to translate date and time.

== Description ==

With this plugin you can translate date and time, using the_time, get_the_time, the_date and get_the_date in your themes. For example: If your Wordpress installation is in English, you can translate just date and time to Brazilian Portuguese.

In the file configuration.php you can set the locale, charset, and date / time format. The format key must follow the strftime format parameter (http://php.net/manual/en/function.strftime.php).

You must call the_time, get_the_time, the_date or get_the_date in you theme, within The Loop. Parameters are going to be ignored.

This plugin uses set_locale function and it will fail if you don't have the desired locale/charset installed on your server. For more information, please read the manual (http://php.net/manual/en/function.setlocale.php).

== Installation ==

1. Upload `calendar-translation` directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.

== Changelog ==

= 0.2 =
* Added replacements for the_date and get_the_date.
* Code refactoring.

= 0.1 =
* First release.
