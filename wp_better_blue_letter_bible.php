<?php
/**
 * Plugin Name: WP Better Blue Letter Bible
 * Plugin URI:  http://wordpress.org/plugins
 * Description: A more robust version  of the Awesome Blue Letter Bible
 * Version:     0.1.0
 * Author:      Jude Rosario
 * Author URI:  
 * License:     GPLv2+
 * Text Domain: wp_bblb
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2015 Jude Rosario (email : judesrosario89@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 */

// Useful global constants
define( 'WP_BBLB_VERSION', '0.1.0' );
define( 'WP_BBLB_URL',     plugin_dir_url( __FILE__ ) );
define( 'WP_BBLB_PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function wp_bblb_init() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'wp_bblb' );
	load_textdomain( 'wp_bblb', WP_LANG_DIR . '/wp_bblb/wp_bblb-' . $locale . '.mo' );
	load_plugin_textdomain( 'wp_bblb', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Activate the plugin
 */
function wp_bblb_activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	wp_bblb_init();

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wp_bblb_activate' );

/**
 * Deactivate the plugin
 * Uninstall routines should be in uninstall.php
 */
function wp_bblb_deactivate() {

}
register_deactivation_hook( __FILE__, 'wp_bblb_deactivate' );

// Wireup actions
add_action( 'init', 'wp_bblb_init' );

// Wireup filters

// Wireup shortcodes
