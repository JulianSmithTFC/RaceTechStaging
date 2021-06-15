<?php

/*
 * Editor server script for DB table rt_databaseSync
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.
$db->sql( "CREATE TABLE IF NOT EXISTS `rt_databaseSync` (
	`id` int(10) NOT NULL auto_increment,
	`prodid` varchar(255),
	`p_sku` varchar(255),
	`p_name` varchar(255),
	`p_category` varchar(255),
	`p_stock` varchar(255),
	`p_weight` varchar(255),
	`p_length` varchar(255),
	`p_width` varchar(255),
	`p_height` varchar(255),
	PRIMARY KEY( `id` )
);" );

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'rt_databaseSync', 'id' )
	->fields(
		Field::inst( 'prodid' ),
		Field::inst( 'p_sku' ),
		Field::inst( 'p_name' ),
		Field::inst( 'p_category' ),
		Field::inst( 'p_stock' ),
		Field::inst( 'p_weight' ),
		Field::inst( 'p_length' ),
		Field::inst( 'p_width' ),
		Field::inst( 'p_height' )
	)
	->process( $_POST )
	->json();
