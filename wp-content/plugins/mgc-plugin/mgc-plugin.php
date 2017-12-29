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

/*Security*/
defined('ABSPATH') or die('You don\t have permission to access this file, turn back kiddo!');

class MgcPlugin
{

    function __construct()

    {


    }

    function register() {
        add_action('admin_enqueue_scripts' , array($this, 'enqueue'));
    }

    function create_post_type() {
        add_action('init', array($this, 'custom_post_type'));

    }

   function create_custom_role() {
        add_action('init', array($this, 'add_custom_role'));

    }

   function create_setting_page() {
        add_action('admin_menu', array($this, 'add_setting_page'));

    }

   function activate() {
       $this->create_post_type();
       $this->create_custom_role();
       $this->create_setting_page();
       //flush rewrite rules
       flush_rewrite_rules();
   }

    function deactivate() {
    //flush the rewrite rules
        flush_rewrite_rules();

    }

    function uninstall () {
     //delete CPT
     //delete all the plugin data from DB
    }

    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label' => 'Books']);
    }

    function add_custom_role() {
        add_role('custom_moderator', __(
                'Custom Moderator'),
            array(
                'read'              => true, // Allows a user to read
                'create_posts'      => true, // Allows user to create new posts
                'edit_posts'        => true, // Allows user to edit their own posts
                'edit_others_posts' => true, // Allows user to edit others posts too
                'publish_posts'     => true, // Allows the user to publish posts
                'manage_categories' => true, // Allows user to manage post categories
            )
        );
    }

    function mgpluginMenu () {
        echo <<<'EOD'
    <h2> Coming Soon</h2>
EOD;

    }

    function option1() {
        echo <<<'EOD'
    <h2> Please input a value in the text box</h2>
EOD;

    }


    function add_setting_page() {
        add_menu_page("Mgc Plugin Options", "Mgc Plugin Options" , 'edit_pages', "mgc-plugin-options", array($this,'mgpluginMenu'));
        add_submenu_page("mgc-plugin-options" , "Options 1", "Option 1" , "edit_pages", "mgc-plugin-option-1", array($this, 'option1'));
    }

    function enqueue() {
        //enqueeu all scripts
        wp_enqueue_style('pluginstyle' , plugins_url('/assets/style.css', __FILE__));
        wp_enqueue_script('pluginscript' , plugins_url('/assets/script.js', __FILE__));

    }



}

if( class_exists('MgcPlugin')) {
    $mgcPlugin = new MgcPlugin();
    $mgcPlugin->register();
    $mgcPlugin->create_post_type();
    $mgcPlugin->create_custom_role();
    $mgcPlugin->create_setting_page();
}

//activation
register_activation_hook(__FILE__, array($mgcPlugin, 'activate'));


//deactivation
register_deactivation_hook(__FILE__, array($mgcPlugin, 'deactivate'));


//uninstall
//register_uninstall_hook(__FILE__, array($mgcPlugin, 'uninstall'));




//
//OLD QUERY
//function mgcplugin_admin_actions() {
//
//add_role('custom_moderator', __(
//        'Custom Moderator'),
//    array(
//        'read'              => true, // Allows a user to read
//        'create_posts'      => true, // Allows user to create new posts
//        'edit_posts'        => true, // Allows user to edit their own posts
//        'edit_others_posts' => true, // Allows user to edit others posts too
//        'publish_posts'     => true, // Allows the user to publish posts
//        'manage_categories' => true, // Allows user to manage post categories
//    )
//);

//    add_menu_page("Mgc Plugin Options", "Mgc Plugin Options" , 'edit_pages', "mgc-plugin-options", "mgcpluginMenu");
//    add_submenu_page("mgc-plugin-options-options" , "Options 1", "Option 1" , "edit_pages", "mgc-plugin-option-1", "option1");

//}

//
//function mgcpluginMenu() {
//    echo <<<'EOD'
//    <h2> Coming Soon</h2>
//EOD;
//}
//
//function option1() {
//    echo "here is option 1";
//}
//add_action('admin_menu', 'mgcplugin_admin_actions');