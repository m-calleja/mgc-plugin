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
        wp_enqueue_style('pluginstyle', $this->plugin_url . 'assets/style.css', __FILE__);
	    wp_enqueue_style('bootstrap', $this->plugin_url .'assets/bootstrap.min.css', __FILE__);
        wp_enqueue_script('pluginscript', $this->plugin_url .'assets/script.js', __FILE__);


	    //security acquiring logged in user
	    wp_localize_script('pluginscript' , 'data', array (
		    'nonce' => wp_create_nonce('wp_rest'),
		    'siteURL' => get_site_url()
	    ));
    }

}