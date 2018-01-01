<?php


/**
 * @package MgcPlugin
 */

namespace Inc\Base;
class CreateRole
{

    function register()
    {
        add_action('init', array($this, 'add_custom_role'));

    }

    function add_custom_role()
    {
        add_role('client', __(
                'Client'),
            array(
                'read' => true, // Allows a user to read
                'create_posts' => true, // Allows user to create new posts
                'edit_posts' => true, // Allows user to edit their own posts
                'edit_others_posts' => true, // Allows user to edit others posts too
                'publish_posts' => true, // Allows the user to publish posts
                'manage_categories' => true, // Allows user to manage post categories
                'edit_themes' => false, // false denies this capability. User can’t edit your theme
                'install_plugins' => false, // User cant add new plugins
                'update_plugin' => false, // User can’t update any plugins
                'update_core' => false // user cant perform core updates
            )
        );

    }
}