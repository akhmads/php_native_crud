<?php

include 'db.php';

/**
 * Post method checking
 */

$MSG = '';

if( isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	/**
	 * Request
	 */
	
	$NAME = isset($_POST['NAME']) ? $_POST['NAME'] : '';
	$ADDRESS = isset($_POST['ADDRESS']) ? $_POST['ADDRESS'] : '';
	$MOBILE = isset($_POST['MOBILE']) ? $_POST['MOBILE'] : '';
	$EMAIL = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : '';
	$CREATED_AT = date('Y-m-d H:i:s');

	if( empty($NAME) )
	{
		$MSG = 'Name is required';
	}
	else
	{
		$result = $db->query(" INSERT INTO contact (`NAME`,`ADDRESS`,`MOBILE`,`EMAIL`,`CREATED_AT`) VALUES ('$NAME','$ADDRESS','$MOBILE','$EMAIL','$CREATED_AT') ");
		if ( ! $result )
		{
			echo( "Error description: " . $db->error );
			die;
		}
		header('location: index.php');
		die;
	}
}

?>
<h2>Add Contact</h2>
<?php echo empty($MSG) ? '' : '<p>'.$MSG.'</p>' ?>
<form action="add.php" method="post">
<table>
<tr>
	<td>Name</td>
	<td><input type="text" name="NAME" value="<?php echo isset($_REQUEST['NAME']) ? $_REQUEST['NAME'] : '' ?>"></td>
</tr>
<tr>
	<td>Address</td>
	<td><input type="text" name="ADDRESS" value="<?php echo isset($_REQUEST['ADDRESS']) ? $_REQUEST['ADDRESS'] : '' ?>"></td>
</tr>
<tr>
	<td>Mobile</td>
	<td><input type="text" name="MOBILE" value="<?php echo isset($_REQUEST['MOBILE']) ? $_REQUEST['MOBILE'] : '' ?>"></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="email" name="EMAIL" value="<?php echo isset($_REQUEST['EMAIL']) ? $_REQUEST['EMAIL'] : '' ?>"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><button type="submit">Save</button> <button type="button" onclick="window.location.href='index.php'">Cancel</button></td>
</tr>
</table>
</form>