PHP, JS and CSS Minifier
====================

## Description
With this plugin, you can minify you js's and css's via PHP providing input and output path's.
This plugin uses an online service provided by Andy Chilton, http://chilts.org/

This fork of the plugin just uses one single one dimensional array for the files to minimize. If its a JS or CSS file is determined by the file extension. The input file gets overwritten with the minimized content.

## Download
* [Master branch](https://github.com/promatik/php-js-css-minifier/archive/master.zip)

## Setup
* How to setup the plugin:

```php
include_once("minifier.php");

$jscss = array("js/application.js","js/main.js","css/application.css","css/main.css");
    
minifyJSCSS($jscss);
```

## Features
* **Instantly compress all your JS's and CSS's**  
  This allows you to add js and css files to a list, that you can minify at any time.

## Requirements
* PHP Webserver
* Internet connection to reach the minify webservice

## License
Released under the [MIT license](http://www.opensource.org/licenses/MIT).
