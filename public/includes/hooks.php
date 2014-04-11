<?php
add_filter( 'login_url', 'new_login_url', 10, 2 );
function new_login_url( $login_url, $redirect ) {
    return Dbm::getUrl('login');
}
?>