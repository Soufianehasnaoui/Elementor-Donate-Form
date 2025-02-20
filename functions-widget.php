<?php
/**
 * Plugin Name: Donate Form PLugin
 * Description: Custom plugin for Donate
 * Version: 1.0
 * Author: Soufiane hasnaoui
 */

// Include Elementor's widget base class
if ( ! defined( 'ABSPATH' ) ) exit;

//Call functions
require_once( plugin_dir_path( __FILE__ ) . 'includ/functions/add-prodcut-amount.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includ/functions/arbres.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includ/functions/add-product-well.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includ/functions/display_cutom_data_cart.php' );

// Register widget using Elementor API
function register_unissons_widget( $widgets_manager ) {
    require_once( __DIR__ . '/includ/widgets/custom-amount.php' );
    $widgets_manager->register( new \Elementor\unissons_donation_Widget());
}
add_action( 'elementor/widgets/register', 'register_unissons_widget' );

// Enqueue necessary styles and scripts
function unissons_widget_assets() {
    //widget custom amount
    wp_register_style('widget-unissons-donation-style',plugin_dir_url( __FILE__ ) . 'assets/css/donation.css', array(),'1.0.0','all');
    wp_register_script('widget-unissons-donation-script',plugin_dir_url( __FILE__ ) . 'assets/js/donation.js', array(),'1.0.0','all');
    wp_localize_script( 'widget-unissons-donation-script', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'unissons_widget_assets' );

// Add category for widgets
function register_unissons_category( $categories ) {
    $categories[] = [
        'slug'  => 'unissons',
        'title' => __( 'DonationFrom', 'DonationFrom' ),
        'icon'  => 'fa fa-plug',
    ];
    return $categories;
}
add_filter( 'elementor/widget_categories', 'register_unissons_category' );