<?php
define('DB_PUBLIC_PATH', plugin_dir_path( __FILE__ ) . 'public');
require_once( DB_PUBLIC_PATH . '/class-dboard.php' );
require_once( DB_PUBLIC_PATH . '/includes/dbm.php' ); # common functions
require_once( DB_PUBLIC_PATH . '/includes/urls.php' );
require_once( DB_PUBLIC_PATH . '/includes/hooks.php' );
require_once( DB_PUBLIC_PATH . '/includes/UserHelper.php' ); # helper method for user class
require_once( DB_PUBLIC_PATH . '/controller/UserController.php' ); #user controller
