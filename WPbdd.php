<?php
/*
Plugin Name: WordPress Behavior Driven Development Tutorial
Plugin URI: http://customrayguns.com/
Description: This plugin scans Craigslist for certain keywords, and compiles the search results.
Version: 1.1
Author: Jim Maguire
Author URI: http://customrayguns.com/
*/

namespace WPbdd;

require_once (plugin_dir_path(__FILE__) . 'src/WPbdd/WPbddPlugin.class.php');
$WPbddPlugin = new WPbddPlugin;

$WPbddPlugin->doActivateShortCodeGreetings();