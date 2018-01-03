<?php


/**
 * @package MgcPlugin
 */

namespace Inc\Base;

class Activate
{

    public static function activate()
    {

        $role = get_role('client');
        $role->add_cap('manage_options'); // capability

        flush_rewrite_rules();

    }

}