<?php
/**
 * $Header: /cvsroot/bitweaver/_bit_sitehome/edit.php,v 1.10 2009/10/01 14:17:05 wjames5 Exp $
 *
 * Copyright (c) 2004 bitweaver.org
 * Copyright (c) 2003 tikwiki.org
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * All Rights Reserved. See below for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details
 *
 * $Id: edit.php,v 1.10 2009/10/01 14:17:05 wjames5 Exp $
 * @package sitehome
 * @subpackage functions
 */

/**
 * required setup
 */
require_once( '../bit_setup_inc.php' );


// Is package installed and enabled
$gBitSystem->verifyPackage( 'sitehome' );

require_once(SITEHOME_PKG_PATH.'lookup_sitehome_inc.php' );

// Now check permissions to access this page
$gContent->verifyUpdatePermission();


// If we are in preview mode then preview it!
if( isset( $_REQUEST["preview"] ) ) {
	$gContent->preparePreview( $_REQUEST );
	$gBitSmarty->assign('preview', 'y');
	$gContent->invokeServices('content_preview_function');
}
else {
  	$gContent->invokeServices( 'content_edit_function' );
}

// Pro
// Check if the page has changed
if( !empty( $_REQUEST["save_sitehome"] ) ) {
	// Editing page needs general ticket verification
	$gBitUser->verifyTicket();

	// Check if all Request values are delivered, and if not, set them
	// to avoid error messages. This can happen if some features are
	// disabled

	// need to set format_guid due to subhash being passed to store
	// @TODO get rid of the subhash as that always creates complications for services
	if( !empty( $_REQUEST['format_guid'] ) ){
		$_REQUEST['sitehome']['format_guid'] = $_REQUEST['format_guid'];
	}
	if( $gContent->store( $_REQUEST['sitehome'] ) ) {
		header( "Location: ".$gContent->getDisplayUrl() );
		die;
	} else {
		$gBitSmarty->assign_by_ref( 'errors', $gContent->mErrors );
	}
}

if( isset( $_REQUEST['format_guid'] ) && !isset( $gContent->mInfo['format_guid'] ) ) {
	$formInfo['format_guid'] = $gContent->mInfo['format_guid'] = $_REQUEST['format_guid']; 
}

// Configure quicktags list
if( $gBitSystem->isPackageActive( 'quicktags' ) ) {
	include_once( QUICKTAGS_PKG_PATH.'quicktags_inc.php' );
}

// WYSIWYG and Quicktag variable
$gBitSmarty->assign( 'textarea_id', 'editsitehome' );

// Display the template
$gBitSystem->display( 'bitpackage:sitehome/edit_sitehome.tpl', tra('SiteHome') , array( 'display_mode' => 'edit' ));
