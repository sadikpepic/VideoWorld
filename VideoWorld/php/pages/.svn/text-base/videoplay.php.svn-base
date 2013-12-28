<?php
if (empty ( $id ) || is_null ( $id ) || ! videoIdExists ( $id )) {
	showMessage ( "Video does not exist.", 0 );
} else if (empty ( $_SESSION ['id'] ) || is_null ( $_SESSION ['id'] )) {
	showMessage ( "<a href='index.php?page=register'>Register</a> or Login with existing account to watch videos.", 1 );
} else if (subscription_is_valid ( user_has_valid_subscription_until ( $_SESSION ['id'] ) ) != 1) {
	showMessage ( "<a href='index.php?page=subscription'>Buy a subscription</a> to watch videos.", 1 );
} else if (user_Is_Old_Enough ( $_SESSION ['id'], getVideoPermitAge ( $id ) ) != 1) {
	showMessage ( "You must be " . getVideoPermitAge ( $id ) . " or older to watch this.", 0 );
} else {
	
	if (! $db_connection->Query ( "SELECT video.idvideo, video.location_video, video.title, video.description, video.permit_age, video.release_year, video.language, video.location_videocover, video.hd, t.season, t.episode, m.boxoffice_revenue, video.duration FROM video
			LEFT JOIN movie m on video.idvideo = m.video_idvideo
			LEFT JOIN tvshow t on video.idvideo = t.video_idvideo
	where video.idvideo = $id" )) {
		echo "<p>Query Failed</p>";
	}
	
	$rowVideo = $db_connection->Row ();
	
	if (! $db_connection->Query ( "SELECT (round(avg(rating) * 2)) / 2 AS average, ( SELECT (round(avg(rating) * 2)) / 2
	 FROM customer_has_video where customer_idcustomer = '" . $_SESSION ['id'] . "' AND video_idvideo = '" . $id . "') AS rated FROM customer_has_video
		 where video_idvideo = $id" )) {
		echo "<p>Query Failed</p>";
	}
	
	$rowRating = $db_connection->Row ();
	
	if (! $db_connection->Query ( "UPDATE video SET times_viewed=times_viewed+1 WHERE idvideo=$id" )) {
		echo "<p>Query Failed</p>";
	}
	
	echo "<div id='all' class='videoAll'><div class='videoFrame'><video id='$rowVideo->idvideo' class='video-js vjs-default-skin' controls preload='auto' width='640' height='264'
	poster='web/images/poster/$rowVideo->location_videocover'
	data-setup={}>
	<source src='Videos/$rowVideo->location_video' type='video/mp4'></source>
	</video>
	</div>
	<div class='videoDescAll'>
	<div class='videoDescTitle'>Title:</div>
	<div class='videoDescContent'>$rowVideo->title
	</div>";
	
	if (! is_null ( $rowVideo->season ) && ! is_null ( $rowVideo->episode )) {
		echo "<div class='videoDescTitle'>Season / Episode:</div>
		<div class='videoDescContent'>Season $rowVideo->season / Episode $rowVideo->episode</div>";
	} else if (! is_null ( $rowVideo->boxoffice_revenue )) {
		echo "<div class='videoDescTitle'>Box Office Revenue:</div>
		<div class='videoDescContent'>$ " . number_format ( $rowVideo->boxoffice_revenue, 2, '.', '\'' ) . "</div>";
	}
	
	echo "<div class='videoDescTitle'>Description:</div>
	<div class='videoDescContent'>$rowVideo->description
	</div>
		
	<div class='videoDescTitle'>Permit Age:</div>
	<div class='videoDescContent'>$rowVideo->permit_age
	</div>
		
	<div class='videoDescTitle'>Release year:</div>
	<div class='videoDescContent'>$rowVideo->release_year
	</div>
		
	<div class='videoDescTitle'>Language:</div>
	<div class='videoDescContent'>$rowVideo->language
	</div>
	
	<div class='videoDescTitle'>Duration:</div>
	<div class='videoDescContent'>$rowVideo->duration minutes
	</div>
	
	<div class='videoDescTitle'>Resolution:</div>	
	
	<div class='videoDescContent'>";
	echo getResolutionPic ( $rowVideo->hd );
	echo "</div>";
	
	if (! $db_connection->Query ( "SELECT ahv.actor_idactor, a.first_name, a.last_name, ahv.video_idvideo FROM actor_has_video ahv
	JOIN actor a on a.idactor = ahv.actor_idactor
	where ahv.video_idvideo = $id order by a.first_name" )) {
		echo "<p>Query Failed</p>";
	}
	
	echo "<div class='videoDescTitle'>Actors:</div><div class='videoDescContent'><ul>";
	
	while ( $rowActor = $db_connection->Row () ) {
		
		echo "<li><a href=\"index.php?page=actor&id=$rowActor->actor_idactor\">" . $rowActor->first_name . " " . $rowActor->last_name . "</a></li>";
	}
	
	echo "</ul></div><div class='videoDescTitle'>My Rating:</div>
			<div class='videoDescContent'>
	
			<div id='rating'><!-- starbox will be inserted here --></div>
	<script type='text/javascript'>";
	
	if (is_null ( $rowRating->average )) {
		echo "new Starbox('rating', 0 , {buttons: 10, identity: $id, onRate: myOnRate });";
	} else {
		if (! (is_null ( $rowRating->rated ))) {
			echo "new Starbox('rating', $rowRating->average, {buttons: 10, identity: $id, locked: true });";
		} else {
			echo "new Starbox('rating', $rowRating->average, {buttons: 10, identity: $id, onRate: myOnRate });";
		}
	}
	
	echo "</script>";
	echo "</div></div>";
}

?>

<!-- end Content -->
<div class='cl'>&nbsp;</div>
</div>
