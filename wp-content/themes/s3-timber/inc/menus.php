<?php
/**
* This is where you can register menus.
*/

add_action('after_setup_theme', function () {

    register_nav_menus([
        'primary-menu' => 'Primary Menu',
		'footer-menu' => 'Footer Menu'
    ]);

});