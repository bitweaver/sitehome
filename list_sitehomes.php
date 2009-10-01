<?php
/**
 * $Header: /cvsroot/bitweaver/_bit_sitehome/list_sitehomes.php,v 1.5 2009/10/01 13:45:48 wjames5 Exp $
 *
 * Copyright (c) 2004 bitweaver.org
 * Copyright (c) 2003 tikwiki.org
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * All Rights Reserved. See copyright.txt for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details
 *
 * $Id: list_sitehomes.php,v 1.5 2009/10/01 13:45:48 wjames5 Exp $
 * @package sitehome
 * @subpackage functions
 */

/**
 * required setup
 */
require_once( '../bit_setup_inc.php' );
require_once( SITEHOME_PKG_PATH.'BitSiteHome.php' );

// Is package installed and enabled
$gBitSystem->verifyPackage( 'sitehome' );

// Now check permissions to access this page
$gBitSystem->verifyPermission( 'p_sitehome_read' );

/* mass-remove:
	the checkboxes are sent as the array $_REQUEST["checked[]"], values are the wiki-PageNames,
	e.g. $_REQUEST["checked"][3]="HomePage"
	$_REQUEST["submit_mult"] holds the value of the "with selected do..."-option list
	we look if any page's checkbox is on and if remove_sitehomes is selected.
	then we check permission to delete sitehomes.
	if so, we call histlib's method remove_all_versions for all the checked sitehomes.
*/

if( isset( $_REQUEST["submit_mult"] ) && isset( $_REQUEST["checked"] ) && $_REQUEST["submit_mult"] == "remove_sitehomes" ) {

	// Now check permissions to remove the selected sitehomes
	$gBitSystem->verifyPermission( 'p_sitehome_update' );

	if( !empty( $_REQUEST['cancel'] ) ) {
		// user cancelled - just continue on, doing nothing
	} elseif( empty( $_REQUEST['confirm'] ) ) {
		$formHash['delete'] = TRUE;
		$formHash['submit_mult'] = 'remove_sitehomes';
		foreach( $_REQUEST["checked"] as $del ) {
			$tmpPage = new BitSiteHome( $del);
			if ( $tmpPage->load() && !empty( $tmpPage->mInfo['title'] )) {
				$info = $tmpPage->mInfo['title'];
			} else {
				$info = $del;
			}
			$formHash['input'][] = '<input type="hidden" name="checked[]" value="'.$del.'"/>'.$info;
		}
		$gBitSystem->confirmDialog( $formHash, array( 'warning' => 'Are you sure you want to delete '.count( $_REQUEST["checked"] ).' sitehomes?', 'error' => 'This cannot be undone!' ) );
	} else {
		foreach( $_REQUEST["checked"] as $deleteId ) {
			$tmpPage = new BitSiteHome( $deleteId );
			if( !$tmpPage->load() || !$tmpPage->expunge() ) {
				array_merge( $errors, array_values( $tmpPage->mErrors ) );
			}
		}
		if( !empty( $errors ) ) {
			$gBitSmarty->assign_by_ref( 'errors', $errors );
		}
	}
}

// create new sitehome object
$sitehome = new BitSiteHome();
$sitehomesList = $sitehome->getList( $_REQUEST );
$gBitSmarty->assign_by_ref( 'sitehomesList', $sitehomesList );

// getList() has now placed all the pagination information in $_REQUEST['listInfo']
$gBitSmarty->assign_by_ref( 'listInfo', $_REQUEST['listInfo'] );

// Display the template
$gBitSystem->display( 'bitpackage:sitehome/list_sitehomes.tpl', tra( 'SiteHome' ) , array( 'display_mode' => 'list' ));

?>
