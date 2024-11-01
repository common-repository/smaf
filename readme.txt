=== SMAF ===
Contributors: 0joker01
Tags: form, email, send file
Requires at least: 3.5
Tested up to: 3.5.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Send user attached files from attachment page via email.

== Description ==

SMAF use Contact Form 7 plugin for sending attached files from attachment page to users via email.

= Recommended Plugins =

The following are other recommended plugins by the author of SMAF.

* [Contact Form 7](http://wordpress.org/plugins/contact-form-7/) - Required plugin for SMAF(required).
* [Really Simple CAPTCHA](http://wordpress.org/extend/plugins/really-simple-captcha/) - Really Simple CAPTCHA is a simple CAPTCHA module which works well with(optional).

= Translators =

== Installation ==

1. Upload the entire `smaf` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress admin panel.
3. Create new cf7 form or edit exists and add "acceptance" field who name begin with "acceptance-smaf" (for example: "acceptance-smaf-133").
4. Insert embed form code in to attachment description.
5. Done.
 
The plugin check, if cf7 exists in attachment description and hide direct link to file.

== Frequently Asked Questions ==

== Screenshots ==

1. screenshot-1.jpg
2. screenshot-2.jpg

== Changelog ==
= 1.0 =
* First release of plugin.
