<?php
global $gBitSystem;

if( !defined( 'ACTIVE_PACKAGE' ) ) {
	define( 'ACTIVE_PACKAGE', 'sitehome' );
}

$registerHash = array(
	'package_name' => 'sitehome',
	'package_path' => dirname( __FILE__ ).'/',
	'homeable' => TRUE,
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'sitehome' ) ) {
	$menuHash = array(
		'package_name'  => SITEHOME_PKG_NAME,
		'index_url'     => SITEHOME_PKG_URL.'index.php',
		'menu_template' => 'bitpackage:sitehome/menu_sitehome.tpl',
	);
	$gBitSystem->registerAppMenu( $menuHash );
}
?>
