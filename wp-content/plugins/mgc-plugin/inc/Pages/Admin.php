<?php

/**
 * @package MgcPlugin
 */

namespace Inc\Pages;

use\Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use\Inc\Api\Callbacks\AdminCallbacks;


class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();


    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    function setPages()
    {

        $this->pages = [
            [
                'page_title' => 'Mgc Plugin',
                'menu_title' => 'Mgc',
                'capability' => 'manage_options',
                'menu_slug' => 'mgc_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]
        ];
    }

    public function setSubPages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'mgc_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'Generat/Add - JS',
                'capability' => 'manage_options',
                'menu_slug' => 'mgc_cpt',
                'callback' => array($this->callbacks, 'adminCpt')
            ],
        ];
    }

    public function setSettings()
    {

        $args = array(

            array(
                'option_group' => 'mgc_plugin_group',
                'option_name' => 'custom_input_page',
                'callback' => array($this->callbacks, 'mgcOptionsGroup')
            )
        );

        $this->settings->setSettings($args);
    }


    public function setSections()
    {

        $args = array(

            array(

                'id' => 'mgc_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'mgcAdminSection'),
                'page' => 'mgc_plugin'
            )
        );

        $this->settings->setSections($args);
    }


    public function setFields()
    {

        $args = array(

            array(

                'id' => 'custom_input_field',
                'title' => 'Add Settings',
                'callback' => array($this->callbacks, 'mgcCustomField'),
                'page' => 'mgc_plugin',
                'section' => 'mgc_plugin',
                'section' => 'mgc_admin_index',
                'args' => array(
                    'label_for' => 'custom_input_field',
                    'class' => 'add-settings'
                )

            )
        );

        $this->settings->setFields($args);
    }


};