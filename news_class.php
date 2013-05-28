<?php 
require( '../../../wp-load.php' );
  	global $wpdb;
		$table='email_signups';
    	if($wpdb->query("INSERT INTO $table(email, name) VALUES('".$_POST['email']."', '".$_POST['name']."')"))
		{
		echo "Thanks for signup up for our newsletter!";	
			}
		else{
		echo "Sorry, you did not enter all the required fields.Please try again.";				
			}	
?>
