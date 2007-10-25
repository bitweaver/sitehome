<?php
/**
 * $Header: /cvsroot/bitweaver/_bit_sitehome/remove_sitehome.php,v 1.3 2007/10/25 20:43:02 squareing Exp $
 *
 * Copyright (c) 2004 bitweaver.org
 * Copyright (c) 2003 tikwiki.org
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * All Rights Reserved. See copyright.txt for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details
 *
 * $Id: remove_sitehome.php,v 1.3 2007/10/25 20:43:02 squareing Exp $
 * @package sitehome
 * @subpackage functions
 */

/**
 * required setup
 */
require_once( '../bit_setup_inc.php' );
include_once( SITEHOME_PKG_PATH.'BitSiteHome.php');
include_once( SITEHOME_PKG_PATH.'lookup_sitehome_inc.php' );

$gBitSystem->verifyPackage( 'sitehome' );

if( !$gContent->isValid() ) {
	$gBitSystem->fatalError( "No sitehome indicated" );
}

$gBitSystem->verifyPermission( 'p_sitehome_remove' );

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
