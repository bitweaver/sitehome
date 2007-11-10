<?php
global $gBitSystem, $moduleParams, $gContent;
// Load up the correct sitehome page
/*
$lookupHash['sitehome_id']    = ( !empty( $moduleParams['module_params']['sitehome_id'] ) ? $moduleParams['module_params']['sitehome_id'] : NULL );
$lookupHash['content_id'] = ( !empty( $moduleParams['module_params']['content_id'] ) ? $moduleParams['module_params']['content_id'] : NULL );
*/
// make sure gContent doesn't hold any information in case this is included multiple times
$gContent = NULL;

$lookupHash = array();
if( !empty( $moduleParams )) {
    $lookupHash = array_merge( $_REQUEST, $moduleParams['module_params'] );
} else {
    $lookupHash = $_REQUEST;
}

if( !isset( $lookupHash['sitehome_id'] ) ) {
	$lookupHash['sitehome_id'] = $gBitSystem->getConfig( "home_sitehome", "Home" );
}

include( SITEHOME_PKG_PATH.'lookup_sitehome_inc.php' );

$gContent->addHit();

$gBitSmarty->assign( 'vTabs', TRUE );
?>
