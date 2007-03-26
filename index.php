<?php
// $Header: /cvsroot/bitweaver/_bit_sitehome/index.php,v 1.2 2007/03/26 20:33:31 wjames5 Exp $
// Copyright (c) 2004 bitweaver SiteHome
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.

// Initialization
require_once( '../bit_setup_inc.php' );

// Is package installed and enabled
$gBitSystem->verifyPackage( 'sitehome' );

// Now check permissions to access this page
$gBitSystem->verifyPermission( 'p_sitehome_read' );

if( !isset( $_REQUEST['sitehome_id'] ) ) {
	$_REQUEST['sitehome_id'] = $gBitSystem->getConfig( "home_sitehome", "Home" );
}

require_once( SITEHOME_PKG_PATH.'lookup_sitehome_inc.php' );

$gContent->addHit();

$gBitSmarty->assign( 'vTabs', TRUE );

// Display the template
$gBitSystem->display( 'bitpackage:sitehome/sitehome_display.tpl', $gContent->getTitle() );
?>
