<?php
/**
 * Give Donor Frontend List Shortcodes
 *
 * @package     Give Donor Frontend List
 * @subpackage  Shortcodes
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     https://opensource.org/licenses/gpl-license GNU Public License
 * @since       1.0
 */

	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Give Donor list Shortcode.
	 *
	 * Shows a donor list.
	 *
	 * @since  1.0
	 *
	 * @param  array $atts Shortcode attributes.
	 *
	 * @return string
	 */
	function give_donors_front_list($atts) {
			// This will include existing file of main Give plugin to fetch data
			include GIVE_PLUGIN_DIR . 'includes/admin/donors/class-give-donors-query.php';
			//$dir = plugin_dir_path( __DIR__ );
			//include $dir.'give_donor_frontend_list/class-give-donors-query.php';
			
			$atts = shortcode_atts(array(
					'id'             => '',
					'number'         => 20,
					'give_forms'     => array()
			), $atts,'give_donors_front_list' );

			ob_start();
			$donorlist = new Give_Donors_Query($atts);
			$donotdata = $donorlist->get_donors();
			
			$tabledata ='';
			$tabledata .='<div class="donhead" style="background-color:#e09f25 !important;">';
			$tabledata .='<h4><strong><span style="color: #ffffff;">DONORS</span></strong></h4></div>';
				
			$i=1;
			foreach($donotdata as $key => $value)
			{
				$donationdate = date("d-m-Y",strtotime($value->date_created));
				$tabledata .='<div><span class=""><img class="donimg" src="https://secure.gravatar.com/avatar/2f72a3054b1d54f2e0016c13b2ca419e?s=96&d=mm&r=g" style="border-radius: 50%;"></span>'.$value->name.'<br>'.$donationdate.'$'.round($value->purchase_value).'</div>';

				$i++;
			}
			echo $tabledata;

			$final_output = ob_get_clean();
			return apply_filters( 'shortcode-donor-list', $final_output, $atts );
		}


	add_shortcode( 'donors_flist', 'give_donors_front_list' );
?>