# Blokk - WordPress Theme
A block-based starter theme for WordPress.

Basically a bare-bones theme to build off and create awesome themes with!

Created for WordPress 5.9+

## Directory List
- **<u>_blokk</u>**: Blokk core theme files.
- **<u>_src</u>**: Source files such as SCSS, JS and JSON files.
    - **<u>js</u>**: Javascript files
    - **<u>scss</u>**: SCSS files
- **<u>assets</u>**: Images, compiled JS, etc
    - **<u>css</u>**: Stylesheets
    - **<u>js</u>**: Compiled JS files, block config and 'WP Sides' sidebars
- **<u>inc</u>**: Theme patterns and other included .php files
    - **<u>patterns</u>**: Custom patterns
- **<u>parts</u>**: Parts to use within your pages
- **<u>templates</u>**: Page templates

## Enqueue stylesheets & scripts
Blokk uses a custom filter to enqueue files via a multidimensional array.<br />
The filter can be found in the 'functions.php' file in the theme's root directory.

There are several parameters which you can use with each array item. They require either the 'file' or 'url' and 'type' to use.

Name | Description
--|--
file | Location of a local file to enqueue.
url | The URL of a file to enqueue.
type | Whether it's a stylesheet or a script file. It only accepts 'stylesheet' or 'script' as values.
footer ** | To load the file at the bottom of the page.
version ** | The version number of the file.
media ** | Add a value to the 'media' attribute that can be used for the stylesheets.
deps ** | Assign dependencies to the file. It has to be an array.

** = optional

```php
add_filter('blokk-enqueued', function($enqueued){
    
    // The theme's main JS file
    $enqueued['theme'] = [
        'file' => 'assets/js/theme.min.js',
        'type' => 'script',
        'footer' => true
    ];

    return $enqueued;

})

```
Note: If you use 'google-fonts' or 'adobe-fonts' as an $enqueued key, it'll load the appropriate preload tags into the page as well.

## Blokk specific actions and filters

#### <u>Enable the rendering of the SVG filters supplied by theme.json</u>
```php
add_filter( 'blokk-enable-global-svg-filters', '__return_true' );
```

#### <u>Custom page template post state messages</u>

You can display messages for pages using specific page templates. It'll be next to the page's title link on the 'Edit' page.

```php
add_filter('blokk-custom-template-post-states', function() {
    return [
        'page-no-title' => 'This page does not display the page title'
    ];
});
```