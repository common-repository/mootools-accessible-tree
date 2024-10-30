=== MooTools Accessible Tree ===
Contributors: Votis Konstantinos
Tags: accessible, WAI, ARIA, mootools, widgets, aegis
Requires at least: 3.0.1
Tested up to: 3.4.1
Stable tag: 1.0

MooTools Accessible Tree is a WAI-ARIA Enabled Tree Plugin for Wordpress.

== Description ==

MooTools Accessible Tree is a tree of your blog's recent posts, recent comments, categories and archives
and uses the MooTools WAI-ARIA enabled tree.

###How to Use the Tree##

Up Arrow / Down Arrow: Moves between visible nodes
Left Arrow on an expanded node: Closes the node
Left Arrow on a closed or end node: Moves focus to the node's parent
Right Arrow: Expands a closed node, moves to the first child of an open node, or does nothing on an end node
Enter: Performs the default action on end nodes
Typing a letter key moves focus to the next instance of a visible node whose title begins with that letter
Home: Moves to the top node in the tree view
End: Moves to the last visible node in the tree view
Ctrl+Arrow (Left, Right, Up, Down): Same as above but without selecting the item. Previous selections are maintained, provided that the Ctrl key is not released or that some other keyboard function is not performed
Ctrl+Space: Toggles the selection of the item
Shift+Up Arrow: Extends selection up one node
Shift+Down Arrow: Extends selection down one node
Shift+Home: Extends selection up to the top-most node
Shift+PageDown: Extends selection down to the last node
*(asterisk) on keypad: Expands all nodes

== Installation ==

###Upgrading From A Previous Version###

To upgrade from a previous version of this plugin, delete the entire folder and files from the previous version of the plugin and then follow the installation instructions below.

###Uploading The Plugin###

Extract all files from the ZIP file, **making sure to keep the file/folder structure intact**, and then upload it to `/wp-content/plugins/`.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

###Plugin Activation###

Go to the admin area of your WordPress installation and click on the "Plugins" menu. Click on "Activate" for the plugin.

###Plugin Setup###

Go to the admin area of your WordPress installation and select the "Widgets" submenu of the "Appearance" menu.

== Screenshots ==

1. Widget display.
2. Setup page.

== Acknowledgments ==

This work was supported by the [Informatics and Telematics Institute](http://www.iti.gr/iti/index.html) (ITI) of the [Centre of Research and Technology Hellas](http://www.certh.gr) (CERTH) in the premices of the [AEGIS](http://www.iti.gr/iti/projects/AEGIS.html) project.

== ChangeLog ==

= 1.0 =
* initial release

