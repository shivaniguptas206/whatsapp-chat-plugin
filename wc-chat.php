<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://example.com
 * @since             1.0.0
 * @package           Wc_Chat
 *
 * @wordpress-plugin
 * Plugin Name:       WhatsApp Chat
 * Plugin URI:        https://example.com
 * Description:       Enables direct WhatsApp chat from your website using mobile number. Admins can select website type (eCommerce, informational, etc.) and customize chat behavior.
 * Version:           1.0.0
 * Author:            Shivani Gupta
 * Author URI:        https://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-chat
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WC_CHAT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wc-chat-activator.php
 */
function activate_wc_chat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-chat-activator.php';
	Wc_Chat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wc-chat-deactivator.php
 */
function deactivate_wc_chat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-chat-deactivator.php';
	Wc_Chat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wc_chat' );
register_deactivation_hook( __FILE__, 'deactivate_wc_chat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wc-chat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wc_chat() {

	$plugin = new Wc_Chat();
	$plugin->run();

}
run_wc_chat();
