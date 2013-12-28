<?php
$error = "";
$registrationSuccess = false;
if (empty ( $_POST ["lastname"] ) || ! isset ( $_POST ["lastname"] )) {
	$lastname = NULL;
	$lastnameNull = true;
} else {
	$lastname = $_POST ["lastname"];
	$lastnameNull = false;
}
if (empty ( $_POST ["firstname"] ) || ! isset ( $_POST ["firstname"] )) {
	$firstname = NULL;
	$firstnameNull = true;
} else {
	$firstname = $_POST ["firstname"];
	$firstnameNull = false;
}
if (empty ( $_POST ["birthdate"] ) || ! isset ( $_POST ["birthdate"] )) {
	$birthdate = NULL;
	$birthdateNull = true;
} else {
	$birthdate = $_POST ["birthdate"];
	$birthdateNull = false;
}
if (empty ( $_POST ["email"] ) || ! isset ( $_POST ["email"] )) {
	$email = NULL;
	$emailNull = true;
} else {
	$email = $_POST ["email"];
	$emailNull = false;
}
if (empty ( $_POST ["username"] ) || ! isset ( $_POST ["username"] )) {
	$username = NULL;
	$usernameNull = true;
} else {
	$username = $_POST ["username"];
	$usernameNull = false;
}
if (empty ( $_POST ["pw1"] ) || ! isset ( $_POST ["pw1"] )) {
	$pw1 = NULL;
	$pw1Null = true;
} else {
	$pw1 = $_POST ["pw1"];
	$pw1Null = false;
}
if (empty ( $_POST ["pw2"] ) || ! isset ( $_POST ["pw2"] )) {
	$pw2 = NULL;
	$pw2Null = true;
} else {
	$pw2 = $_POST ["pw2"];
	$pw2Null = false;
}

if (isset ( $_POST ["register"] ) && ! empty ( $_POST ["register"] )) {
	if ($lastnameNull) {
		$lastnameValid = false;
		$error = $error . "<br>Enter a valid name!";
	} else {
		$lastnameValid = true;
	}
	if ($firstnameNull) {
		$firstnameValid = false;
		$error = $error . "<br>Enter a valid first name!";
	} else {
		$firstnameValid = true;
	}
	if (! check_email ( $email ) || $emailNull) {
		$emailValid = false;
		$error = $error . "<br>Enter a valid email-address!";
	} else {
		$emailValid = true;
	}
	if ($usernameNull) {
		$usernameValid = false;
		$error = $error . "<br>Enter a valid username!";
	} else {
		if (user_Exists ( $username )) {
			$usernameExists = true;
			$error = $error . "<br>user '$username' already exists!";
		} else {
			$usernameExists = false;
		}
		$usernameValid = true;
	}
	if ($birthdateNull) {
		$birthdateValid = false;
		$error = $error . "<br>Enter a birthdate!";
	} else {
		$birthdateValid = true;
	}
	
	if ($pw1Null) {
		$pw1Valid = false;
		$error = $error . "<br>Enter a password!";
	} else if (! check_Password_minimum ( $pw1 )) {
		$pw1Valid = false;
		$error = $error . "<br>Password must have at least 8 characters, a number and upper- and lower case letters!";
	} else {
		$pw1Valid = true;
	}
	
	if ($pw2Null) {
		$pw2Valid = false;
		$error = $error . "<br>Repeat your password correctly!";
	} else {
		if ($pw1 != $pw2) {
			$pw1Valid = false;
			$pw2Valid = false;
		} else {
			$pw2Valid = true;
		}
	}
	if ($lastnameValid && $firstnameValid && $emailValid && $birthdateValid && $usernameValid && $pw1Valid && $pw2Valid && ! $usernameExists) {
		
		$values ["first_name"] = MySQL::SQLValue ( $firstname );
		$values ["last_name"] = MySQL::SQLValue ( $lastname );
		$values ["username"] = MySQL::SQLValue ( $username );
		$values ["password"] = MySQL::SQLValue ( MD5 ( $pw1 ) );
		$values ["email"] = MySQL::SQLValue ( $email );
		$values ["birthdate"] = MySQL::SQLValue ( $birthdate );
		$values ["active"] = MySQL::SQLValue ( 1 );
		
		// Execute the insert
		$result = $db_connection->InsertRow ( "customer", $values );
		
		// If we have an error
		if (! $result) {
			// Show the error and kill the script
			$db_connection->Kill ();
		}
		
		if (! $db_connection->Query ( "SELECT idcustomer FROM customer	WHERE username = '$username'" )) {
			echo "<p>Query Failed</p>";
		}
		$row = $db_connection->Row ();
		
		$_SESSION ['id'] = $row->idcustomer;
		$registrationSuccess = true;
	}
}

echo "<div class='contentBox'>
	<div class='floatLeft'>
	<div class='titleBig'>Registration</div>
	
	<form action='index.php?page=register' method='post'>
	<div class='registerInput'>
		<label for='lastname'>Last Name:</label><br />
		<input type='text' class='inputText' name='lastname' maxlength='45' value='$lastname'>
	</div>
	<div class='registerInput'>
		<label for='firstname'>First Name:</label><br />
		<input type='text' class='inputText' name='firstname' maxlength='45' value='$firstname'>
	</div>
	<div class='registerInput'>
		<label for='birthdate'>Birthdate:</label><br />
		<input type='text' class='inputText'  id='datepicker' name='birthdate' maxlength='45' readonly='true' value='$birthdate'>
	</div>
	<div class='registerInput'>
		<label for='email'>Email:</label><br />
		<input type='text' class='inputText' name='email' maxlength='45' value='$email'>
	</div>
	<div class='registerInput'>
		<label for='username'>Username:</label><br />
		<input type='text' class='inputText' name='username' maxlength='25' value='$username'>
	</div>	
	<div class='registerInput'>
		<label for='regpwd'>Password:</label> <br />
		<div class='pwdwidgetdiv' id='thepwddiv'></div>
		<script  type='text/javascript' >
		var pwdwidget = new PasswordWidget('thepwddiv','pw1');
		pwdwidget.MakePWDWidget();
		</script>
		<noscript>
		<div class='registerInput'><input class='inputText' type='password' name='pw1' maxlength='64' value=''></div>			
		</noscript>
	</div>
	<div class='registerInput'>
		<label for='username' class='noWhiteSpaceWrap'>Repeat Password:</label><br />
		<input class='inputText' type='password' name='pw2' maxlength='64' value=''>
	</div>
	<div class='registerInput'>
	<input class='inputText' type='submit' value='Register' name='register'>
	</div>
	</form></div>";

if (! empty ( $error )) {
	echo "<div class='validation'>" . $error . "</div>";
}

if ($registrationSuccess) {
	echo "<div class='registrationSuccess'>You are now registered as " . $username . "</div>";
}

echo "</div>";
?>

<script>
		jQuery(function() {
			jQuery("#datepicker").datepicker({
				changeMonth : true,
				changeYear : true
			});
			var birthdate = {
				       birthdate : '<?php echo $birthdate; ?>'
			} 
			jQuery("#datepicker").datepicker("option", "yearRange", "1930:2013");
			jQuery("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
			jQuery("#datepicker").datepicker( "setDate" , birthdate.birthdate );
		});
</script>