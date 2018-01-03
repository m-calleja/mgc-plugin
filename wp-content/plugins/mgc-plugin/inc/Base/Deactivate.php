<?php


/**
 * @package MgcPlugin
 */


namespace Inc\Base;

class Deactivate
{
    public static function deactivate()
    {
        $role = get_role('client');
        $role->remove_cap('manage_options'); // capability
        flush_rewrite_rules();
    }
}