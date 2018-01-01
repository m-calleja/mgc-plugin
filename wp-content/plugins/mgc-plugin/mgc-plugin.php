<?php


/**
 * @package MgcPlugin
 */
/*
Plugin Name: Mgc Plugin
Plugin URI: http://www.mgc-plugin.com
Description: Plugin for storing and displaying data inputted by user
Author: Mei Calleja
Version: 1.0
License: GPLv2 or later
Text Domain: mgc-plugin
*/
/*
 * This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
 */

//Security - if called directly abort
defined('ABSPATH') or die('You don\t have permission to access this file, turn back kiddo!');

//Require once autoloader composer
if(file_exists( dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_mgc_plugin() {
    Inc\Base\Activate::activate();
}

//activation
register_activation_hook(__FILE__, 'activate_mgc_plugin');

/**
 * The code that runs during plugin deactivation
 */
function deactivate_mgc_plugin() {

    Inc\Base\Deactivate::deactivate();
}

//deactivation
register_deactivation_hook(__FILE__, 'deactivate_mgc_plugin');

/**
 * Initialise classes within the plugin through init.php
 */
if(class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}

