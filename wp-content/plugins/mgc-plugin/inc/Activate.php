<?php


/**
 * @package MgcPlugin
 */

namespace Inc;

class Activate
{

    public static function activate() {

//        $this->create_post_type();
//        $this->create_custom_role();
//        $this->create_setting_page();
        flush_rewrite_rules();

    }

}