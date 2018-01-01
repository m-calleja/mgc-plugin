<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Api;

use Inc\Base\BaseController;



class RestRouteApi extends BaseController {

	public function register() {

		//The Following registers an api route with multiple parameters.
		add_action( 'rest_api_init', array($this ,'add_custom_posts_api' ));
	}


	public function add_custom_posts_api() {

		//Created route //route: http://localhost/custom/wp-json/mgc-plugin/categories/1 - with wp-integrated functions
		register_rest_route( 'mgc-plugin',  '/categories/(?P<id>\d+)', array(
			'methods' => 'GET',
			'callback' => array($this, 'get_post_title_by_author')
		) );
	}

	//Customize the callback to your liking
	public function get_post_title_by_author( $data ) {
		$posts = get_posts( array(
			'categories' => $data['id'],
		) );

		if ( empty( $posts ) ) {
			return null;
		}
		return $posts;
	}


}



