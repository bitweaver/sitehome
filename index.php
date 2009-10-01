<?php
// $Header: /cvsroot/bitweaver/_bit_sitehome/index.php,v 1.8 2009/10/01 14:17:05 wjames5 Exp $
// Copyright (c) 2004 bitweaver SiteHome
// All Rights Reserved. See below for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.

// Initialization
require_once( '../bit_setup_inc.php' );

// Is package installed and enabled
$gBitSystem->verifyPackage( 'sitehome' );

// Now check permissions to access this page
$gBitSystem->verifyPermission( 'p_sitehome_read' );

//this is just to get a page title
if( !isset( $_REQUEST['sitehome_id'] ) ) {
	$_REQUEST['sitehome_id'] = $gBitSystem->getConfig( "home_sitehome", "1" );
}
require_once( SITEHOME_PKG_PATH.'lookup_sitehome_inc.php' );
$title = $gContent->getTitle()?$gContent->getTitle():'Home';

// Display the template
$gDefaultCenter = 'bitpackage:sitehome/center_sitehome_page.tpl';
$gBitSmarty->assign_by_ref( 'gDefaultCenter', $gDefaultCenter );

$gBitSystem->display( 'bitpackage:kernel/dynamic.tpl', $title , array( 'display_mode' => 'display' ));
?>
