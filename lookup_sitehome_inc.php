<?php
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
?>
