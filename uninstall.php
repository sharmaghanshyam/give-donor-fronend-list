<?php
/**
 * Uninstall Give Donor List
 *
 * @package     Give Donor List
 * @subpackage  Uninstall
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     https://opensource.org/licenses/gpl-license GNU Public License
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Load Give file.
include_once( 'give_donor_list.php' );

global $wpdb, $wp_roles;


