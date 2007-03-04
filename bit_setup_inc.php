<?php
global $gBitSystem;

$registerHash = array(
	'package_name' => 'sitehome',
	'package_path' => dirname( __FILE__ ).'/',
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'sitehome' ) ) {
	$gBitSystem->registerAppMenu( sitehome_PKG_NAME, ucfirst( SITEHOME_PKG_DIR ), SITEHOME_PKG_URL.'index.php', 'bitpackage:sitehome/menu_sitehome.tpl', SITEHOME_PKG_NAME );
}
?>
