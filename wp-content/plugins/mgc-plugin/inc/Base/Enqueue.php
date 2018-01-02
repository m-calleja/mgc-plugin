<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

    public function register()
    {

        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }


    function enqueue () {
        //enqueeu all scripts
        wp_enqueue_style('pluginstyle', $this->plugin_url . 'assets/css/style.css', __FILE__);
	    wp_enqueue_style('bootstrapstyle', $this->plugin_url .'assets/css/bootstrap.min.css', __FILE__);
        wp_enqueue_script('postresultscript', $this->plugin_url .'assets/js/postResults.js', __FILE__);
        wp_enqueue_script('generateresultscript', $this->plugin_url .'assets/js/generateResults.js', __FILE__);
        wp_enqueue_script('fetchresultscript', $this->plugin_url .'assets/js/fetchResults.js', __FILE__);
        wp_enqueue_script('bootstrapscript', $this->plugin_url .'assets/js/bootstrap.min.js', __FILE__);
        wp_enqueue_script('jqueryscript', $this->plugin_url .'assets/js/jquery-3.2.1.min.js', __FILE__);

	    //security acquiring logged in user
	    wp_localize_script('postresultscript' , 'data', array (
		    'nonce' => wp_create_nonce('wp_rest'),
		    'siteURL' => get_site_url()
	    ));
    }

}