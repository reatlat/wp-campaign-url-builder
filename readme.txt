=== Campaign URL Builder ===
Contributors: reatlat, sunnypixels
Donate link: https://paypal.me/reatlat/10usd
Tags: utm, tracking link, google analytics, analytics, link generator, googl, google url shortener, minify link
Requires at least: 3.0.1
Tested up to: 6.1
Requires PHP: 5.6 or later
Stable tag: 1.8.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Generate link for Analytics tools like Google Analytics and a short link.

== Description ==

Generates links for Analytics tools and short link.
Enter your Campaign Name, Source, Medium (UTM link) etc.
to generate a full link and a short link (through the Google
URL Shortener API) all in once.
<https://ga-dev-tools.appspot.com/campaign-url-builder/>

Available languages :
* English
* Russian

== Installation ==

1. Upload `campaign-url-builder` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. (optional) Get and add your own Google API key to settings

== Frequently Asked Questions ==

= Support =
You can ask question in the support section of this plugin or
on GitHub <https://github.com/reatlat/wp-campaign-url-builder/issues>

== Screenshots ==

1. The manage tab to add and list your UTM links.
2. The settings tab to set up Google API key and add campaign parameters.

== Upgrade Notice ==

Nothing for now

== Changelog ==

= 1.8.2 =
* Fix vulnerability issues

= 1.8.1 =
* Fix export to CSV action
* Fix rebrandly custom domains

= 1.8.0 =
* Finally destroy Goo.gl API endpoint
* Add new shortener API endpoint, ReBrendly
* Added support custom domains
* Reduced the weight of the plugin
* Compatible with WordPress version 5.2
* Refactor shortener API function
* Migrate Bit.ly API v3 to v4
* Added new options to enforce UTM field naming consistency

= 1.7.0 =
* Added new feature - keep links query parameters and anchor fragment
* Init JavaScript and CSS Debuging Variable (include uncompressed scripts/css)
* Refactor full_link_builder function
* Refactor backend JavaScript

= 1.6.0 =
* Fix Security Vulnerability - Missing Validation
* Added Security Nonces for all POST requests
* Initial Frontend shortcodes
* Minor changes

= 1.5.0 =
* Added autocomplete function for link suggestion
* Added pagination for links table
* Added Export UTM lins list to CSV file
* Fixed backend error for empty Bit.ly respond

= 1.4.3 =
* Compatibility with WordPress 5.0 and Gutenberg Editor
* Fixed not working notification
* Update AJAX-function for link creation

= 1.4.2 =
* Added notification about created link on page/post editor
* Update AJAX-function for link creation

= 1.4.1 =
* Fixed bug with plugin removal function
* Fixed not working button preview post
* Minor bug fixes

= 1.4.0 =
* Improve language translation
* Include new API endpoint Bitly
* Switch to Bitly endpoint by default
* Migrate to ES6
* Implement fingerprints for assets
* Improve code

= 1.3.1 =
* Fixed error with wrong variable on plugins page
* Update missing translation strings

= 1.3.0 =
* Update layout
* Move "create a new tracking link" to own tab
* Added new advanced settings
* Make plugin translatable
* Added translation to Russian
* Added meta box: with links list
* Added meta box: Link generator (beta option)

= 1.2.1 =
* Fix problem with global date_format override

= 1.2.0 =
* Add remove link function
* Add example link
* Update pattern for url source
* Bug fixing

= 1.1.0 =
* refactor code
* add advanced settings

= 1.0.1 =
* Input/Output - sanitize, validate, and escape
* update plugin name

= 1.0.0 =
* First live release
