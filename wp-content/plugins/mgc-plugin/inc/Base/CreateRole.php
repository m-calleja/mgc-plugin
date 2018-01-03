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
                'upload_files' => true, // Allows a user to upload files
                'create_posts' => true, // Allows user to create new posts
                'edit_posts' => true, // Allows user to edit their own posts
                'delete_posts' => true, // Allows user to delete their own posts too
                'delete_others_posts' => true, // Allows user to delete others posts too
                'edit_others_posts' => true, // Allows user to edit others posts too
                'publish_posts' => true, // Allows the user to publish posts
                'manage_categories' => true, // Allows user to manage post categories
                'create_private_pages' => true, // Allows user to create private pages
                'edit_pages' => true, // Allows user to edit their own posts
                'edit_private_pages' => true, // Allows user to edit private pages
                'delete_pages' => true, // Allows user to delete pages too
                'delete_private_pages' => true, // Allows user to delete private pages too
                'delete_others_pages' => true, // Allows user to delete others pages too
                'delete_published_pages' => true, // Allows user to delete published pages
                'read_private_pages' => true, // Allows user to read private posts too
                'edit_others_pages' => true, // Allows user to edit others posts too
                'publish_pages' => true, // Allows the user to publish posts
                'edit_themes' => false, // false denies this capability. User can’t edit your theme
                'install_plugins' => false, // User cant add new plugins
                'update_plugin' => false, // User can’t update any plugins
                'update_core' => false, // user cant perform core updates
            )
        );

    }
}