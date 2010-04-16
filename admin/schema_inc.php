<?php
$tables = array(
	'sitehomes' => "
		sitehome_id I4 PRIMARY,
		content_id I4 NOTNULL,
		description C(160)
	",
);

global $gBitInstaller;

foreach( array_keys( $tables ) AS $tableName ) {
	$gBitInstaller->registerSchemaTable( SITEHOME_PKG_NAME, $tableName, $tables[$tableName] );
}

$gBitInstaller->registerPackageInfo( SITEHOME_PKG_NAME, array(
	'description' => "SiteHome package for managing your site's front page.",
	'license' => '<a href="http://www.gnu.org/licenses/licenses.html#LGPL">LGPL</a>',
) );

// ### Indexes
$indices = array(
	'bit_sitehomes_sitehome_id_idx' => array('table' => 'sitehomes', 'cols' => 'sitehome_id', 'opts' => NULL ),
);
$gBitInstaller->registerSchemaIndexes( SITEHOME_PKG_NAME, $indices );

// ### Sequences
$sequences = array (
	'sitehomes_sitehome_id_seq' => array( 'start' => 1 )
);
$gBitInstaller->registerSchemaSequences( SITEHOME_PKG_NAME, $sequences );

$gBitInstaller->registerSchemaDefault( SITEHOME_PKG_NAME, array(
	//      "INSERT INTO `".BIT_DB_PREFIX."bit_sitehome_types` (`type`) VALUES ('SiteHome')",
) );

// ### Default UserPermissions
$gBitInstaller->registerUserPermissions( SITEHOME_PKG_NAME, array(
	array( 'p_sitehome_admin', 'Can admin sitehome', 'admin', SITEHOME_PKG_NAME ),
	array( 'p_sitehome_create', 'Can create a sitehome', 'registered', SITEHOME_PKG_NAME ),
	array( 'p_sitehome_update', 'Can edit any sitehome', 'editors', SITEHOME_PKG_NAME ),
	array( 'p_sitehome_read', 'Can read sitehome', 'basic',  SITEHOME_PKG_NAME ),
) );

// ### Default Preferences
$gBitInstaller->registerPreferences( SITEHOME_PKG_NAME, array(
	array( SITEHOME_PKG_NAME, 'sitehome_default_ordering', 'sitehome_id_desc' ),
	array( SITEHOME_PKG_NAME, 'sitehome_list_sitehome_id', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_list_title', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_list_description', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_list_sitehomes', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_display_title', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_display_description', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_display_date', 'y' ),
	array( SITEHOME_PKG_NAME, 'sitehome_home_sitehome', ''),
) );
?>
