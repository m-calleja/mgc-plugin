<?php
namespace Inc\Pages;


use \Inc\Base\BaseController;

class CPT extends BaseController {



        public function register()
        {
        $this->create_custom_post_type();
        $this->client_posts_add_role_caps();

        }
        public function create_custom_post_type() {
            add_action( 'init', array( $this, 'set_custom_post_type' ) );

        }

        public function set_custom_post_type() {

            $labels = array(
                'name'               => _x( 'Clients', 'Client Posts', 'mgc-plugin' ),
                'singular_name'      => _x( 'Clients', 'Client Posts', 'mgc-plugin' ),
                'menu_name'          => _x( 'Clients', 'admin menu', 'mgc-plugin' ),
                'name_admin_bar'     => _x( 'Clients', 'Client Posts', 'mgc-plugin' ),
                'add_new'            => _x( 'Add New Client Posts', 'client post', 'mgc-plugin' ),
                'add_new_item'       => __( 'Add New Client Posts', 'mgc-plugin' ),
                'new_item'           => __( 'New Client Post', 'mgc-plugin' ),
                'edit_item'          => __( 'Edit Client Post', 'mgc-plugin' ),
                'view_item'          => __( 'View Client Post', 'mgc-plugin' ),
                'all_items'          => __( 'Client Posts', 'mgc-plugin' ),
                'search_items'       => __( 'Search Client Posts', 'mgc-plugin' ),
                'parent_item_colon'  => __( 'Parent Client Posts:', 'mgc-plugin' ),
                'not_found'          => __( 'No client posts found', 'mgc-plugin' ),
                'not_found_in_trash' => __( 'No client posts found in Trash.', 'mgc-plugin' )
            );


            $args = [
                'label'               => __( 'Client Posts', 'client_posts' ),
                'description'         => __( 'Client Posts', 'client_posts' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'comments', 'revisions', ),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => 'mgc_plugin',
                'show_in_rest'        => true,
                'rewrite'             => array('slug' => 'client_posts'),
                'rest_base'          => 'client-posts-api',
                'rest_controller_class' => 'WP_REST_Posts_Controller',
                'capability_type'     => array('client_post','client_posts'),
                'map_meta_cap'        => true,
            ];

            register_post_type( 'client_posts', $args );
        }

       //Map Client Role soley to Client user ommiting administrator or super administrator if desired

        public function custom_capabilities_mapping ()
        {
            add_action('admin_init', array($this, 'client_posts_add_role_cap'), 999);
        }


        public function client_posts_add_role_caps()
        {
            // Adding the roles to administer the custom post types Client
            $roles = array('client', 'administrator');

            // Loop through each role and assigning capabilities
            foreach ($roles as $the_role) {

                $role = get_role($the_role);

                $role->add_cap('read');
                $role->add_cap('read_client_post');
                $role->add_cap('read_private_client_posts');
                $role->add_cap('edit_client_post');
                $role->add_cap('edit_client_posts');
                $role->add_cap('edit_others_client_posts');
                $role->add_cap('edit_published_client_posts');
                $role->add_cap('publish_client_posts');
                $role->add_cap('delete_others_client_posts');
                $role->add_cap('delete_private_client_posts');
                $role->add_cap('delete_published_client_posts');

            }

    }

};