-- 
-- Editor SQL for DB table rt_databaseSync
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE IF NOT EXISTS `rt_databaseSync` (
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
);