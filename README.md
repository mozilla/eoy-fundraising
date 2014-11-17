# Mozilla EOY Fundraising Site #
===============
Tracks changes made to /wp-content, excluding /wp-content/uploads

## Themes ##
===

### EOY Customized Child Theme ###
- Our customized theme [OneMozilla-child](https://github.com/mozilla/eoy-fundraising/tree/master/themes/OneMozilla-child) is built as the child theme of the [One Mozilla WordPress theme](https://github.com/mozilla/One-Mozilla-blog/)
- Please make sure all the theme changes are made in the **OneMozilla-child** folder, **NOT** OneMozilla.
- For more information, please read the documentaion on Wordpress - [Child Theme](http://codex.wordpress.org/Child_Themes)

### Generating Style.css ###
We use grunt and less to autogenerate a css file `style.css`.

#### Watch and autogenerate style.css ####

In your terminal
- Go to `themes/OneMozilla-child`
- run `npm install`
- run `grunt`

#### Make your styling changes in .less files ####
Please add/remove/modify styling rules in the .less file `themes/OneMozilla-child/less/style.less`, **NOT** `style.css` directly.




