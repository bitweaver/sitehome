<?php
global $gContent;
require_once( SITEHOME_PKG_PATH.'BitSiteHome.php');
require_once( LIBERTY_PKG_PATH.'lookup_content_inc.php' );

// if we already have a gContent, we assume someone else created it for us, and has properly loaded everything up.
if( empty( $gContent ) || !is_object( $gContent ) || !$gContent->isValid() ) {
	// if sitehome_id supplied, use that
	if( @BitBase::verifyId( $_REQUEST['sitehome_id'] ) ) {
		$gContent = new BitSiteHome( $_REQUEST['sitehome_id'] );

	// if content_id supplied, use that
	} elseif( @BitBase::verifyId( $_REQUEST['content_id'] ) ) {
		$gContent = new BitSiteHome( NULL, $_REQUEST['content_id'] );

	} elseif (@BitBase::verifyId( $_REQUEST['sitehome']['sitehome_id'] ) ) {
		$gContent = new BitSiteHome( $_REQUEST['sitehome']['sitehome_id'] );

	// otherwise create new object
	} else {
		$gContent = new BitSiteHome();
	}

	$gContent->load();
	$gBitSmarty->assign_by_ref( "gContent", $gContent );
}
?>
