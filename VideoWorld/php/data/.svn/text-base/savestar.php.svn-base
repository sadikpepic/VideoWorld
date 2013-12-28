<?php
session_start ();
$video_rating = $_POST ['rated'];
$idvideo = $_POST ['identity'];

require ('../util/db_connector.php');

$values ["customer_idcustomer"] = MySQL::SQLValue ( $_SESSION ['id'] );
$values ["video_idvideo"] = MySQL::SQLValue ( $idvideo );
$values ["rating"] = MySQL::SQLValue ( $video_rating );

// Execute the insert
$result = $db_connection->InsertRow ( "customer_has_video", $values );

// If we have an error
if (! $result) {
	// Show the error and kill the script
	$db_connection->Kill ();
}

?>
