<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Admin;

class AdminPages {

    function __construct()
    {

    }

    function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';


    }

};