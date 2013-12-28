<?php
if (empty ( $_SESSION ['id'] ) || is_null ( $_SESSION ['id'] )) {
	showMessage ( "<a href='index.php?page=register'>Register</a> or Login to buy subscriptions.", 1 );
} else {
	
	if (isset ( $_POST ['subscribe'] )) {
		
		$selectedSubscription = $_POST ["subscType"];
		$subscription_type_name = getPaymentTypeDetails ( $selectedSubscription, "subscription_type_name" );
		$daysToAdd = getPaymentTypeDetails ( $selectedSubscription, "subscription_days" );
		$price = getPaymentTypeDetails ( $selectedSubscription, "subscription_price" );
		
		$selectedPayment = $_POST ["payType"];
		$paymentType = getPaymentTypeString ( $selectedPayment );
		
		echo "<div id='dialog-message' title='Payment Simulation'>
		<p>
		<span class='ui-icon ui-icon-circle-check' style='float: left; margin: 0 7px 50px 0;'></span>
		For a real commercial project you would now be redirected to pay <b>$$price for your $subscription_type_name subscription with $paymentType</b>		
		</p>		
		</div>";
		
		$dateToday = date ( "Y-m-d" );
		$dateUntil = date ( 'Y-m-d', strtotime ( $dateToday . ' + ' . $daysToAdd . ' days' ) );
		
		$values ["subscription_type_idsubscription_type"] = MySQL::SQLValue ( $selectedSubscription );
		$values ["valid_from"] = MySQL::SQLValue ( $dateToday );
		$values ["valid_until"] = MySQL::SQLValue ( $dateUntil );
		$values ["customer_idcustomer"] = MySQL::SQLValue ( $_SESSION ['id'] );
		$values ["payment_type_idpayment_type"] = MySQL::SQLValue ( $selectedPayment );
		
		// Execute the insert
		$result = $db_connection->InsertRow ( "subscription", $values );
		
		// If we have an error
		if (! $result) {
			// Show the error and kill the script
			$db_connection->Kill ();
		}
	}
	
	if (subscription_is_valid ( user_has_valid_subscription_until ( $_SESSION ['id'] ) ) != 1) {
		
		echo "<div class='contentBox'>
			<div class='titleBig'>Get a new Subscription to watch movies/TV Shows</div>
			<div><form action='index.php?page=subscription' method='post'>
			<table>
			<tr>
				<th align='left'>Choose Subscription-Type:</th><th></th>

			</tr>";
		if (! $db_connection->Query ( "Select idsubscription_type, subscription_type_name, subscription_price, subscription_discount from subscription_type" )) {
			echo "<p>Query Failed</p>";
		}
		$counter = 0;
		while ( $rowSubscriptionTypes = $db_connection->Row () ) {
			if ($counter == 0) {
				$checked = 'checked=\"checked\"';
			} else {
				$checked = '';
			}
			echo "<tr>
					<th align='left'><input class='radio' type='radio' name='subscType' value='$rowSubscriptionTypes->idsubscription_type' $checked>
					$rowSubscriptionTypes->subscription_type_name</th><td>$$rowSubscriptionTypes->subscription_price ($rowSubscriptionTypes->subscription_discount% Discount)</td>
			</tr>";
			$counter ++;
		}
		echo "<tr><td colspan=2 class='delimiter'></td></tr>
	  		<tr>
				<th align='left'>Choose Payment-Type:</th><th></th>
			</tr>";
		
		if (! $db_connection->Query ( "Select idpayment_type, payment_type_name, payment_type_pic_location, payment_type_link from payment_type" )) {
			echo "<p>Query Failed</p>";
		}
		$counter = 0;
		while ( $rowPaymentTypes = $db_connection->Row () ) {
			if ($counter == 0) {
				$checked = 'checked=\"checked\"';
			} else {
				$checked = '';
			}
			echo "<tr >
					<th align='left'><input class='radio' type='radio' name='payType' value='$rowPaymentTypes->idpayment_type' $checked><a href='http://$rowPaymentTypes->payment_type_link'><img height='40px' src='web/images/icons/$rowPaymentTypes->payment_type_pic_location'></img></a></th>
			</tr>";
			$counter ++;
		}
		echo "<tr>
				<th align='left'><input class='formButton' type='submit' value='Buy subscription' name='subscribe'></th>
			</tr>
		</table>			
	</form>";
	} else {
		showMessage ( "You have a valid Subscription to watch movies/TV Shows until " . user_has_valid_subscription_until ( $_SESSION ['id'] ), 2 );
	}
	
	echo "</div></div>";
}

?>

<script>
  jQuery(function() {
	  jQuery( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
        	jQuery( this ).dialog( "close" );
        }
      }
    });
  });
 </script>