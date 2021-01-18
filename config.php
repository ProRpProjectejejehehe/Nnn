<?php
$api = 'dac0d6d26ece8033'; // This is free API Key. To purchase GDrive-X Premium Tool, visit gdrivex-premium.blogspot.com
$admin_username = "admin"; // Enter your username here.
$admin_password = "admin123"; // Enter your password here.
$base_url = ''; //Enter your base url without slash (/) e.g. https://www.google.com or https://www.google.com/myfolder

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: /index.php' ) );
    }
?>
