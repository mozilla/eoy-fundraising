=== Varnish HTTP Purge ===
Contributors: Leon Weidauer
Tags: varnish, purge, cache
Requires at least: 1.0.0
Tested up to: 3.2.1
Stable tag: 1.2.0

== Description ==
Plugin for invalidating Wordpress items on a Varnish 3 Cache.

Varnish HTTP Purge sends a PURGE request to the URL of a page or post every time it it modified. This occurs when editing, publishing, commenting or deleting an item.

== Requirements ==
In order to work, the varnish cache meeds to accept PURGE request from the host of the wordpress web server.

Tested with Varnish 3.x

== Installation ==
Download or git-clone into your plugin directory. Or simply install via Wordpress admin interface.
Activate.
Done. No Configuration needed.

== Changelog ==

= 1.2.0 =
* Moved actual request execution to "shutdown" event
* Removed GET request due to bad performance impact

