<?php
/**
 * @package MgcPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
	{
        public function adminDashboard()
        {
            return require_once( "$this->plugin_path/templates/admin.php" );
        }
        public function adminCpt()
        {
            return require_once( "$this->plugin_path/templates/cpt.php" );
        }
        public function adminTaxonomy()
        {
            return require_once( "$this->plugin_path/templates/taxonomy.php" );
        }
        public function adminWidget()
        {
            return require_once( "$this->plugin_path/templates/widget.php" );
        }

        public function mgcOptionsGroup($input)
        {
            return $input;
        }


        public function mgcAdminSection($input)
        {
            echo "Please enter the settings required";
        }


        public function mgcCustomField($input)
        {
            $value = esc_attr(get_option('custom_input_field"'));
            echo '<input type="text" class="regular-text" name="custom_input_field" value="' . $value . '" placeholder="Enter Info">';
        }






    }