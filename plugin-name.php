<?php

/**
 * Plugin Name: 
 * Version: 
 * Description: 
 * Author: Gino Sotongbe
 * Author URI: 
 * Plugin URI: 
 */

 // If this file is called directly, abort.
 if ( ! defined( 'WPINC' ) ) {
 	die;
 }

/*
|--------------------------------------------------------------------------
| Plugin direct path constant
|--------------------------------------------------------------------------
*/
define( 'DIR_PATH', plugin_dir_path(__FILE__) ); //Use with caution car les constantes sont propagées

/*
|--------------------------------------------------------------------------
| Include or require  files wich is in includes
|--------------------------------------------------------------------------
*/
 require_once DIR_PATH . 'includes/helper-functions.php';
 include_once DIR_PATH . 'includes/post-type-declaration.php';


/*
|--------------------------------------------------------------------------
| Register scripts
|--------------------------------------------------------------------------
*/

function plugin-name_scripts() {
  wp_enqueue_script( 'handle', plugins_url( 'assets/file.js', __FILE__ ) ); //
  wp_enqueue_style( 'datepicker-css' , plugins_url( 'assets/file.css', __FILE__ ) );
}
add_action('admin_enqueue_scripts', 'offers_scripts'); //Enqueue in admin side


 /*
 |--------------------------------------------------------------------------
 | Activation hook of the plugin
 |--------------------------------------------------------------------------
 */

 function plugin-name_activate() { //Fire this functions when plugin activate
    //Fire cron on activation
      add_action( 'plugin-name_cron_hook',  'cron_exec' );
        if ( ! wp_next_scheduled ( 'plugin-name_cron_hook' )) {
           wp_schedule_event( time(), 'daily', 'plugin-name_cron_hook' ); 
        }
		  
     //Clear the permalinks after if a custom post type has been registered.
        flush_rewrite_rules();
    }
    register_activation_hook( DIR_PATH, 'plugin-name_activate' );


 /*
 |--------------------------------------------------------------------------
 | Deactivation hook of the plugin
 |--------------------------------------------------------------------------
 */
    function plugin-name_deactivate() { //Fire this functions when plugin deaactivate
        //Remove cron
            wp_clear_scheduled_hook('plugin-name_cron_hook');
        // Unregister a post type if a post type was registered
            unregister_post_type( 'post-type' );
        // Clear the permalinks to remove the post type's rules from the database.
          flush_rewrite_rules();
        //Unschedule cron
        $timestamp = wp_next_scheduled( 'plugin-name_cron_hook' );
        wp_unschedule_event( $timestamp, 'plugin-name_cron_hook' );
    }
    register_deactivation_hook( DIR_PATH, 'plugin-name_deactivate' );
