<?php 
    $profile_header_template = wpuf_get_option( 'profile_header_template', 'user_directory', 'layout' );

    switch( $profile_header_template ) {
        case 'layout':
            require_once 'profile/layout.php';
            break;
        case 'layout1':
                require_once 'profile/layout-one.php';
            break;
        case 'layout2':
                require_once 'profile/layout-two.php';
            break;
    }
?>

