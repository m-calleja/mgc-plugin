<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Api;

use Inc\Base\BaseController;



class RestRouteApi extends BaseController {

    public $namespace;

    public function __construct (){

        $namespace = 'mgc-plugin/v1';
    }

	public function register() {

		//The Following registers an api route with multiple parameters.
		add_action( 'rest_api_init', array($this ,'add_custom_posts_api' ));
	}


	public function add_custom_posts_api(){

		//Created route //route: http://localhost/custom/wp-json/mgc-plugin/client-posts-api - with wp-integrated functions
		register_rest_route(  'mgc-plugin/v1' ,  '/client-posts-api/', array(
			'methods' => 'GET',
			'callback' => array($this, 'get_post_title_by_author'),
            'args'            => array(
                'per_page' => array(
                    'default' => 10,
                    'sanitize_callback' => 'absint',
                ),
                'slug' => array(
                    'default' => false,
                    'sanitize_callback' => 'sanitize_title',
                )
		) )
        );
	}

	//Customize the callback to your liking
	public function get_post_title_by_author( $data ) {
		$posts = get_posts( 'post_type=client_posts');

		if ( empty( $posts ) ) {
			return null;
		}
		return $posts;
	}



}



