<?php
/*
 * Plugin Name: Script Library: Raphaël
 * Plugin URI: http://wordpress.lowtone.nl/scripts-raphael
 * Plugin Type: lib
 * Description: Include Raphaël.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\scripts\raphael {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_raphael"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts"),
			Package::INIT_SUCCESS => function() {
				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", array(), "2.1.2")
					);
			}
		));

	function registered() {
		global $lowtone_scripts_raphael;
		
		return isset($lowtone_scripts_raphael["registered"]) ? $lowtone_scripts_raphael["registered"] : false;
	}
	
}