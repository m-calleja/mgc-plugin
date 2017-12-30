<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Api;

use Inc\Base\BaseController;



class RestRouteApi extends BaseController {

	public function register() {

		//The Following registers an api route with multiple parameters.
//		echo "working 1";
		add_action( 'rest_api_init', array($this ,'add_custom_posts_api' ));
	}


	function add_custom_posts_api() {
		echo "working 2";
		register_rest_route( 'mgc-plugin',  '/author/(?P\d+)', array( $this ,
			'methods' => 'GET',
			'callback' => array($this, 'get_post_title_by_author')
		) );
	}

	//Customize the callback to your liking
	function get_post_title_by_author( $data ) {

		echo "WTF IS HAPPENOGN ";
		$posts = get_posts( array(
			'author' => $data['id'],
		) );

		if ( empty( $posts ) ) {
			return null;
		}

		return $posts[0]->post_title;
	}
}