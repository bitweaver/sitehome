<?php
/**
 * $Header$
 *
 * Copyright (c) 2004 bitweaver.org
 * Copyright (c) 2003 tikwiki.org
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * All Rights Reserved. See below for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details
 *
 * $Id$
 * @package sitehome
 * @subpackage functions
 */

/**
 * required setup
 */
global $gContent;
require_once( SITEHOME_PKG_PATH.'BitSiteHome.php');
require_once( LIBERTY_PKG_PATH.'lookup_content_inc.php' );

if( empty( $lookupHash )) {
	$lookupHash = &$_REQUEST;
}

// if we already have a gContent, we assume someone else created it for us, and has properly loaded everything up.
if( empty( $gContent ) || !is_object( $gContent ) || strtolower( get_class( $gContent ) ) != 'bitsitehome'  || !$gContent->isValid() ) {
	// if sitehome_id supplied, use that
	if( @BitBase::verifyId( $lookupHash['sitehome_id'] ) ) {
		$gContent = new BitSiteHome( $lookupHash['sitehome_id'] );

	// if content_id supplied, use that
	} elseif( @BitBase::verifyId( $lookupHash['content_id'] ) ) {
		$gContent = new BitSiteHome( NULL, $lookupHash['content_id'] );

	} elseif (@BitBase::verifyId( $lookupHash['sitehome']['sitehome_id'] ) ) {
		$gContent = new BitSiteHome( $lookupHash['sitehome']['sitehome_id'] );

	// otherwise create new object
	} else {
		$gContent = new BitSiteHome();
	}

	$gContent->load();
	$gBitSmarty->assign_by_ref( "gContent", $gContent );
}
