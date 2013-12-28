<?php
$loginerror = isset ( $_GET ['error'] ) ? $_GET ['error'] : null;

echo "<!-- Header -->
	<div id='header'>
	<h1 id='logo'><a href='index.php'>VideoWorld</a></h1>	
	<!-- Navigation -->";
if (! isset ( $_SESSION ['id'] )) {
	require ('web/html/templates/login.html');
} else {
	
	if (! $db_connection->Query ( "SELECT first_name, last_name FROM customer WHERE idcustomer='" . $_SESSION ['id'] . "'" )) {
		echo "<p>Query Failed</p>";
	}
	
	while ( $row = $db_connection->Row () ) {
		
		echo "<div id='login' class='loginHeight'>Welcome, $row->first_name $row->last_name<a href='index.php?page=logout' class='floatRight'>Logout</a><br>";
		
		if (subscription_is_valid ( user_has_valid_subscription_until ( $_SESSION ['id'] ) ) != 1) {
			$subscMessage = "No valid Subscription";
		} else {
			$subscMessage = "Subscription valid until: " . user_has_valid_subscription_until ( $_SESSION ['id'] );
		}
		echo $subscMessage . "</div>";
	}
}

require ('web/html/sub-navigation.html');

echo "</div><!-- end Header -->";
?>