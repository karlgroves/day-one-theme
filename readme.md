#Day One WordPress Theme 

DEMO:[blog.karlgroves-sandbox.com](http://blog.karlgroves-sandbox.com)

##Description

Day One Wordpress theme builds on an already "bare essentials" theme and makes improvements to the theme's accessibility.

By having a good starting point will get you on your way without much trouble, but this theme in no way guarantees your site's accessibility. Your final customization of this theme must still be accessible, as does your content.

### Resources for Accessibility knowledge

* [WebAIM](http://www.webaim.org)
* [W3C Web Accessibility Initiative](http://www.w3.org/WAI/)
* [A11yBuzz](http://www.a11ybuzz.com)
* [Make Wordpress Accessible](http://make.wordpress.org/accessibility/) 
* [WebAccessibility.com](https://www.webaccessibility.com/) 
* Some shameless self promotion: [KarlGroves.com](http://www.karlgroves.com/)

## Some Remaining Accessibility Gotchas
### Avoid using multiple Search widgets
This theme includes a search form in the header.php file. If you retain that search form in your final implementation and then one of your users decides to add multiple search form widgets from WP admin, or your implementation includes multiple calls to get_search_form() in the theme, this results in duplicate IDs for the search form's text input.

Per HTML spec, an ID must be unique. From a scripting point of view this creates a challenge when attempting to select that text input by ID because your javascript can only accurately target the first ID. The same tends to go for assistive technologies. If a user of an assistive technology attempts to pull up a list of form fields, this duplication may cause confusion. From a pragmatic standpoint this is a somewhat minor issue but it still bears mentioning.   I guess it also bears mentioning that multiple search forms is kind of stupid anyway so just don't do it.

Note: This theme includes an additional call to get_search_form() if a search does not return any results. I think, in this case, the duplication is fine. If you disagree, remove it.

### Avoid using the Categories widget as a dropdown
In Wordpress admin, users can add numerous widgets, one of which is a Categories widget. One of the options for the Categories widget is to present it as a dropdown. This dropdown automatically submits onChange.  For a keyboard-only user, this means that whenever they change the value in this dropdown the form will submit causing an unexpected shift in focus. In short, this is a huge annoyance so don't use it.  That, or hack it in your final implementation so it doesn't do that anymore.

## Installation
1. Pull down the repo
2. FTP it to your site's 'themes' folder under 'wp-content', or:
3. Zip it and upload it from WP Admin.
4. Drink Beer

## License
GNU General Public License | [https://www.gnu.org/licenses/gpl.html](https://www.gnu.org/licenses/gpl.html)

Use it modify it, pull request it.

## Support
You get none. Its a free theme, silly! Helpful suggestions, tips, etc. can be submitted at [https://bitbucket.org/karlgroves/day-one-theme](https://bitbucket.org/karlgroves/day-one-theme)

## Props to the original theme developer.

Below is the original information from the Blankslate theme which I used as a basis for Day One.  

ORIGINAL DESCRIPTION - BLANKSLATE THEME

This theme is aimed at web professionals, but is of course available and supported for anyone.

The bare essentials of a WordPress theme, no visual CSS styles added except for the CSS reset and the mandatory WP classes. 
Perfect for those who would like to build their own theme completely from scratch.

One custom menu and one widgetized sidebar to get you started.

If you'd like a jumpstart with CSS and more custom menus, page templates and widgetized areas, checkout SuperSimple:
tidythemes.com/supersimple

LICENSE

GNU General Public License | https://www.gnu.org/licenses/gpl.html

Use it modify it, blah blah blah.

ORIGINAL LICENSE - BLANKSLATE
Technical Stuff: GNU General Public License | https://www.gnu.org/licenses/gpl.html

Friendly Stuff:
BlankSlate is 100% free and open source: 
perfect to build your own themes or use as a base for client projects.

SUPPORT

Support for original Blankslate theme:
tidythemes.com/forum

Enjoy. Thanks, TidyThemes | tidythemes.com