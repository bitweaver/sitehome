<?php
// $Header: /cvsroot/bitweaver/_bit_sitehome/admin/admin_sitehome_inc.php,v 1.1 2007/03/26 16:57:53 lugie Exp $
// Copyright (c) 2005 bitweaver SiteHome
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.

require_once( SITEHOME_PKG_PATH.'BitSiteHome.php' );

if (isset($_REQUEST["sitehomeset"]) && isset($_REQUEST["homeSiteHome"])) {
	$gBitSystem->storeConfig("home_sitehome", $_REQUEST["homeSiteHome"], SITEHOME_PKG_NAME);
	$gBitSmarty->assign('home_sitehome', $_REQUEST["homeSiteHome"]);
}


$formSiteHomeLists = array(
	"sitehome_list_sitehome_id" => array(
		'label' => 'Id',
		'note' => 'Display the sitehome id.',
	),
	"sitehome_list_title" => array(
		'label' => 'Title',
		'note' => 'Display the title.',
	),
	"sitehome_list_description" => array(
		'label' => 'Description',
		'note' => 'Display the description.',
	),
	"sitehome_list_data" => array(
		'label' => 'Text',
		'note' => 'Display the text.',
	),
);
$gBitSmarty->assign( 'formSiteHomeLists',$formSiteHomeLists );

$processForm = set_tab();

if( $processForm ) {
	$sitehomeToggles = array_merge( $formSiteHomeLists );
	foreach( $sitehomeToggles as $item => $data ) {
		simple_set_toggle( $item, 'sitehomes' );
	}

}

$sitehome = new BitSiteHome();
$sitehomes = $sitehome->getList( $_REQUEST );
$gBitSmarty->assign_by_ref('sitehomes', $sitehomes['data']);
?>
