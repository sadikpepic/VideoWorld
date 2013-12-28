<?php
require ('../util/db_connector.php');

session_start ();

$name_login = $_POST ["name"];
$password_login = $_POST ["pw"];
$_SESSION ['id'] = null;

if (! $db_connection->Query ( "SELECT idcustomer, username, password FROM customer" )) {
	echo "<p>Query Failed</p>";
}

while ( $row = $db_connection->Row () ) {
	if (($row->username == $name_login) && ($row->password == md5 ( $password_login ))) {
		$_SESSION ['id'] = $row->idcustomer;
		break;
	}
}

if (is_null ( $_SESSION ['id'] ) || empty ( $_SESSION ['id'] )) {
	echo "Username/password incorrect!";
}
?>