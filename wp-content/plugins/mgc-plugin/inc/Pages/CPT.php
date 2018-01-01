<?php
namespace Inc\Pages;


use \Inc\Base\BaseController;

class CPT extends BaseController {
        public function register() {
        $this->createCustomPostType();
        }
        public function createCustomPostType() {
            add_action( 'init', array( $this, 'setCustomPostType' ) );
        }

        public function setCustomPostType() {
            register_post_type( 'client', ['public' => true, 'label' => 'Client'] );
        }
}