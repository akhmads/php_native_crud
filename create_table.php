<?php

include 'db.php';

/**
 * Drop table contact (if exists)
 *
 */

$result = $db->query(" DROP TABLE IF EXISTS contact ");

/**
 * Create contact table
 *
 */
 
$result = $db->query("

	CREATE TABLE IF NOT EXISTS contact (
		CONTACT_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		NAME VARCHAR(100) NOT NULL,
		ADDRESS VARCHAR(200) NULL,
		MOBILE VARCHAR(50) NULL,
		EMAIL VARCHAR(100) NULL,
		CREATED_AT DATETIME
	);
	
");

if ( $result )
{
	echo( "Contact table created !");
}
else
{
	echo( "Error description: " . $db->error );
	die;
}
