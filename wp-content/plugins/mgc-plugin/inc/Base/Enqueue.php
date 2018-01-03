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


    function enqueue()
    {
        //enqueeu all css
        wp_enqueue_style('pluginstyle', $this->plugin_url . 'assets/css/style.css', __FILE__);
        wp_enqueue_style('bootstrap', $this->plugin_url . 'assets/css/bootstrap.min.css', __FILE__);
        wp_enqueue_script('fetchresults', $this->plugin_url . 'assets/js/fetchResults.js', __FILE__);

        //enqueeu all scripts
        wp_enqueue_script('bootstrap', $this->plugin_url . 'assets/js/bootstrap.min.js', __FILE__);
        wp_enqueue_script('outputresults', $this->plugin_url . 'assets/js/outputResults.js', __FILE__);
        wp_enqueue_script('postResults', $this->plugin_url . 'assets/js/postResults.js', __FILE__);




        //security acquiring logged in user
        wp_localize_script('postResults', 'data', array(
            'nonce' => wp_create_nonce('wp_rest'),
            'siteURL' => get_site_url()
        ));
    }

}