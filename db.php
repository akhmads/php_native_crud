<?php
$db_host	= "localhost";
$db_user	= "root";
$db_pass	= "";
$db_name	= "demo";

/* 
 * Create mysqli connection
 *
 */

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

/* 
 * Check mysql connection
 *
 */
 
if ( $db->connect_error )
{
	die("Database Connection failed: " . $db->connect_error);
}