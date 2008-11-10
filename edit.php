<?php
/**
 * $Header: /cvsroot/bitweaver/_bit_sitehome/edit.php,v 1.5 2008/11/10 16:44:16 nickpalmer Exp $
 *
 * Copyright (c) 2004 bitweaver.org
 * Copyright (c) 2003 tikwiki.org
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * All Rights Reserved. See copyright.txt for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details
 *
 * $Id: edit.php,v 1.5 2008/11/10 16:44:16 nickpalmer Exp $
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

if( isset( $_REQUEST['sitehome']["title"] ) ) {
	$gContent->mInfo["title"] = $_REQUEST['sitehome']["title"];
}

if( isset( $_REQUEST['sitehome']["description"] ) ) {
	$gContent->mInfo["description"] = $_REQUEST['sitehome']["description"];
}

if( isset( $_REQUEST["format_guid"] ) ) {
	$gContent->mInfo['format_guid'] = $_REQUEST["format_guid"];
}

if( isset( $_REQUEST['sitehome']["edit"] ) ) {
	$gContent->mInfo["data"] = $_REQUEST['sitehome']["edit"];
	$gContent->mInfo['parsed_data'] = $gContent->parseData();
}

// If we are in preview mode then preview it!
if( isset( $_REQUEST["preview"] ) ) {
	$gBitSmarty->assign('preview', 'y');
	$gContent->invokeServices('content_preview_function');
}
else {
  	$gContent->invokeServices( 'content_edit_function' );
}

// Pro
// Check if the page has changed
if( !empty( $_REQUEST["save_sitehome"] ) ) {

	// Check if all Request values are delivered, and if not, set them
	// to avoid error messages. This can happen if some features are
	// disabled
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
?>
