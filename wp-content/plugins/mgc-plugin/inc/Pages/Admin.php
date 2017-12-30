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
	        $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
        }

	function setPages() {

		$this->pages = [
			[
				'page_title' => 'Mgc Plugin',
				'menu_title' => 'Mgc',
				'capability' => 'edit_pages',
				'menu_slug' => 'mgc_plugin',
				'callback' => array($this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-store',
				'position' => 110
			]
		];
	}

	function setSubPages() {
		$this->subpages = [
			[
				'parent_slug' => 'mgc_plugin',
				'page_title' => 'Custom Post Type',
				'menu_title' => 'CPT',
				'capability' => 'edit_pages',
				'menu_slug' => " mgc_cpt",
				'callback' => function() { echo '<h1>CPT Manager</h1>'; },

			],
			[
				'parent_slug' => 'mgc_plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'edit_pages',
				'menu_slug' => " mgc_widgets",
				'callback' => function() { echo '<h1>Widgets Manager</h1>'; },

			]
		];
	}


};