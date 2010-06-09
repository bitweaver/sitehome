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
require_once( '../kernel/setup_inc.php' );
include_once( SITEHOME_PKG_PATH.'BitSiteHome.php');
include_once( SITEHOME_PKG_PATH.'lookup_sitehome_inc.php' );

$gBitSystem->verifyPackage( 'sitehome' );

if( !$gContent->isValid() ) {
	$gBitSystem->fatalError( "No sitehome indicated" );
}

$gContent->verifyUpdatePermission();

if( isset( $_REQUEST["confirm"] ) ) {
	if( $gContent->expunge()  ) {
		header ("location: ".BIT_ROOT_URL );
		die;
	} else {
		$gBitSystem->fatalError( "There was an error deleting site home: ".vc( $gContent->mErrors ));
	}
}

$gBitSystem->setBrowserTitle( tra( 'Confirm delete of: ' ).$gContent->getTitle() );
$formHash['remove'] = TRUE;
$formHash['sitehome_id'] = $_REQUEST['sitehome_id'];
$msgHash = array(
	'label' => tra( 'Delete SiteHome' ),
	'confirm_item' => $gContent->getTitle(),
	'warning' => tra( 'This sitehome will be completely deleted.<br />This cannot be undone!' ),
);
$gBitSystem->confirmDialog( $formHash,$msgHash );

?>
