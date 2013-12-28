<?php
function check_Password_minimum($password) {
	if (preg_match ( '/[A-Z]+[a-z]+[0-9]+/', $password )) {
		return true;
	} else {
		return false;
	}
}
function check_email($email) {
	return ( bool ) preg_match ( "#^([a-zA-Z0-9_\-])+(\.([a-zA-Z0-9_\-])+)*@((\[(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5]))\]))|((([a-zA-Z0-9])+(([\-])+([a-zA-Z0-9])+)*\.)+([a-zA-Z])+(([\-])+([a-zA-Z0-9])+)*))$#", $email );
}
function user_Exists($username) {
	require ('db_connector.php');
	
	if (! $db_connection->Query ( "SELECT idcustomer FROM customer WHERE username = '$username'" )) {
		echo "<p>Query Failed</p>";
	}
	
	if ($db_connection->RowCount () > 0) {
		return true;
	} else {
		return false;
	}
}
function getVideoPermitAge($videoid) {
	require ('db_connector.php');
	if (! $db_connection->Query ( "SELECT permit_age FROM video WHERE idvideo =" . $videoid )) {
		echo "<p>Query Failed</p>";
	}
	$row = $db_connection->Row ();
	return $row->permit_age;
}
function user_Is_Old_Enough($userid, $ageForMovie) {
	require ('db_connector.php');
	
	if (! $db_connection->Query ( "SELECT YEAR(CURDATE())-YEAR(customer.birthdate) AS age FROM customer WHERE customer.idcustomer = " . $userid )) {
		echo "<p>Query Failed</p>";
	}
	
	$ageCustomer = $db_connection->Row ();
	
	if ($ageCustomer->age >= $ageForMovie) {
		return true;
	} else {
		return false;
	}
}
function getPaymentTypeString($idPaymentType) {
	require ('db_connector.php');
	if (! $db_connection->Query ( "SELECT payment_type_name FROM payment_type WHERE idpayment_type = $idPaymentType" )) {
		echo "<p>Query Failed</p>";
	}
	$row = $db_connection->Row ();
	return $row->payment_type_name;
}
function getPaymentTypeDetails($idSubscriptionType, $detailColumn) {
	require ('db_connector.php');
	if (! $db_connection->Query ( "SELECT $detailColumn FROM subscription_type WHERE idsubscription_type = $idSubscriptionType" )) {
		echo "<p>Query Failed</p>";
	}
	$row = $db_connection->Row ();
	return $row->$detailColumn;
}
function user_has_valid_subscription_until($userid) {
	require ('db_connector.php');
	
	if (is_null ( $userid ) || empty ( $userid )) {
		return NULL;
	}
	
	if (! $db_connection->Query ( "SELECT max(s.valid_until) as valid_until from subscription s
				WHERE s.customer_idcustomer = $userid" )) {
		echo "<p>Query Failed</p>";
	}
	
	$row = $db_connection->Row ();
	$dateUntil = $row->valid_until;
	
	if (! empty ( $dateUntil ) && ! is_null ( $dateUntil )) {
		return $dateUntil;
	} else {
		return NULL;
	}
}
function videoIdExists($id) {
	require ('db_connector.php');
	
	if (! $db_connection->Query ( "SELECT title FROM video WHERE idvideo = '$id'" )) {
		echo "<p>Query Failed</p>";
	}
	
	if ($db_connection->RowCount () > 0) {
		return true;
	} else {
		return false;
	}
}
function actorIdExists($id) {
	require ('db_connector.php');
	
	if (! $db_connection->Query ( "SELECT first_name FROM actor WHERE idactor = '$id'" )) {
		echo "<p>Query Failed</p>";
	}
	
	if ($db_connection->RowCount () > 0) {
		return true;
	} else {
		return false;
	}
}
function showMessage($message, $messagetype) {
	if ($messagetype == 1) {
		echo "<div class='warning'>$message</div>";
	} else if ($messagetype == 0) {
		echo "<div class='error'>$message</div>";
	} else if ($messagetype == 2) {
		echo "<div class='success'>$message</div>";
	}
	echo "</div>
	</div>";
}
function getMaxValueVideoAttribute($attribute, $tableJoin) {
	require ('db_connector.php');
	if (! $db_connection->Query ( "SELECT max(v.$attribute) AS max FROM video v " . $tableJoin )) {
		echo "<p>Query Failed</p>";
	}
	$row = $db_connection->Row ();
	return $row->max;
}
function getMinValueVideoAttribute($attribute, $tableJoin) {
	require ('db_connector.php');
	if (! $db_connection->Query ( "SELECT min(v.$attribute) AS min FROM video v " . $tableJoin )) {
		echo "<p>Query Failed</p>";
	}
	$row = $db_connection->Row ();
	return $row->min;
}
function subscription_is_valid($dateUntil) {
	if (empty ( $dateUntil ) || is_null ( $dateUntil )) {
		return false;
	}
	
	$dateToday = date ( "Y-m-d" );
	
	if ($dateToday <= $dateUntil) {
		return true;
	} else {
		return false;
	}
}
function getRatingString($ratingInt) {
	if (is_null ( $ratingInt )) {
		return "<div class='stars0'></div>";
	} else if ($ratingInt == 0.5) {
		return "<div class='stars05'></div>";
	} else if ($ratingInt == 1.0) {
		return "<div class='stars1'></div>";
	} else if ($ratingInt == 1.5) {
		return "<div class='stars15'></div>";
	} else if ($ratingInt == 2.0) {
		return "<div class='stars2'></div>";
	} else if ($ratingInt == 2.5) {
		return "<div class='stars25'></div>";
	} else if ($ratingInt == 3.0) {
		return "<div class='stars3'></div>";
	} else if ($ratingInt == 3.5) {
		return "<div class='stars35'></div>";
	} else if ($ratingInt == 4.0) {
		return "<div class='stars4'></div>";
	} else if ($ratingInt == 4.5) {
		return "<div class='stars45'></div>";
	} else if ($ratingInt == 5.0) {
		return "<div class='stars5'></div>";
	}
}
function getResolutionPic($resCode) {
	if ($resCode == 1) {
		return "<img src='web/images/HD.png'></img>";
	} else {
		return "<img src='web/images/SD.png'></img>";
	}
}

?>