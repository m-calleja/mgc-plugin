<?php


/**
 * @package MgcPlugin
 */

namespace Inc\Base;
// Define public vars for mgc-plugins
class BaseController
{
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public function __construct()
    {

        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/mgc-plugin.php';
        $this->plugin_site_url = get_site_url();

    }

}


