<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Api;

use Inc\Base\BaseController;


class RestRouteApi extends BaseController
{

    public $namespace;

    public function __construct()
    {

        $namespace = 'mgc-plugin/v1';
    }

    public function register()
    {

        //The Following registers an api route with multiple parameters.
        add_action('rest_api_init', array($this, 'add_custom_posts_api'));
    }


    public function add_custom_posts_api()
    {

        //Created route http://localhost/custom/wp-json/mgc-plugin/client-posts-api - with wp-integrated functions
        register_rest_route('mgc-plugin/v1', '/client-posts-api/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_custom_posts'),
                'args' => array(

                    'slug' => array(
                        'default' => false,
                        'sanitize_callback' => 'sanitize_title',
                    )
                ))
        );
    }

    //Returning 9 records in ASC order
    public function get_custom_posts()
    {
        $posts = get_posts(array(
                'post_type' => 'client_posts',
                'order' => 'ASC',
                'numberposts' => 8
            )
        );

        if (empty($posts)) {
            echo "I am sorry client post is empty";
        }
        return $posts;
    }


}



