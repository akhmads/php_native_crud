<?php

include 'db.php';

/**
 * Get contact with query
 *
 */
 
$result = $db->query(" SELECT * FROM contact ");

/**
 * Table header
 *
 */

echo '<h2>Native PHP CRUD</h2>';
echo '<p><a href="add.php">Add New</a></p>';
echo '<table border="1" cellpadding="4" cellspacing="0">';
echo '<tr><th>Name</th><th>Address</th><th>Mobile</th><th>Email</th><th>Action</th></tr>';

/**
 * Fetch data with object results
 *
 */
 
while ( $row = $result->fetch_object() )
{
	$edit_link = sprintf('<a href="edit.php?id=%s">Edit</a>', $row->CONTACT_ID);
	$delete_link = sprintf('<a href="delete.php?id=%s">Delete</a>', $row->CONTACT_ID);
	
	echo '<tr>';
	echo '<td>'.$row->NAME.'</td>';
	echo '<td>'.$row->ADDRESS.'</td>';
	echo '<td>'.$row->MOBILE.'</td>';
	echo '<td>'.$row->EMAIL.'</td>';
	echo '<td>'.$edit_link.'_'.$delete_link.'</td>';
	echo '</tr>';
}

echo '</table>';