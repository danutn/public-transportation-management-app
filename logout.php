<?php
include( 'config.php' );
include( 'Authenticate.php' );
$config = new config();
if ( $config->logout() ) {
	header( 'Location: index.php' );
}
?>