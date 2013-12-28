<?php
$id = $_POST ["id"];
require ("../util/db_connector.php");

if (! $db_connection->Query ( "select title from video where idvideo =\"$id\"" )) {
	echo "<p>Query Failed</p>";
}

$row = $db_connection->Row ();
echo $row->title;

?>