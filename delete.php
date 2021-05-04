<?php

include 'db.php';

/**
 * Capture request delete id
 *
 */
	
$id = isset($_GET['id']) ? intval($_GET['id']) : '';

/**
 * Delete query
 *
 */
 
$result = $db->query(" DELETE FROM contact WHERE CONTACT_ID='$id' ");

if ( $result )
{
	echo '<p>Deleted | <a href="index.php">Back</a></p>';
}
else
{
	echo( "Error description: " . $db->error );
	die;
}