<?php
// $Header$
// Copyright (c) 2005 bitweaver SiteHome
// All Rights Reserved. See below for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.

require_once( SITEHOME_PKG_PATH.'BitSiteHome.php' );

if (isset($_REQUEST["homeTabSubmit"]) && isset($_REQUEST["homeSiteHome"])) {
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


$formSiteHomeOpts = array(
	"sitehome_display_title" => array(
		'label' => 'Title',
		'note' => 'Display the title.',
	),
	"sitehome_display_description" => array(
		'label' => 'Description',
		'note' => 'Display the description.',
	),
	"sitehome_display_date" => array(
		'label' => 'Date',
		'note' => 'Display the creation and modification dates.',
	),
);
$gBitSmarty->assign( 'formSiteHomeOpts',$formSiteHomeOpts );

if (isset($_REQUEST["optsTabSubmit"])) {
	foreach( $formSiteHomeOpts as $item => $data ) {
		simple_set_toggle( $item, SITEHOME_PKG_NAME );
	}
}


$sitehome = new BitSiteHome();
$sitehomes = $sitehome->getList( $_REQUEST );
$gBitSmarty->assign_by_ref('sitehomes', $sitehomes);
?>
