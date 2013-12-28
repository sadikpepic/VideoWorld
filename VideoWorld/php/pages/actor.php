<?php
if (empty ( $id ) || is_null ( $id ) || ! actorIdExists ( $id )) {
	showMessage ( "Actor does not exist.", 0 );
} else {
	
	if (! $db_connection->Query ( "SELECT idactor, first_name, last_name FROM actor where idactor = $id" )) {
		echo "<p>Query Failed</p>";
	}
	$rowName = $db_connection->Row ();
	
	if (! $db_connection->Query ( "SELECT ahv.video_idvideo, v.title, v.release_year FROM actor_has_video ahv JOIN video v on v.idvideo = ahv.video_idvideo where ahv.actor_idactor = $id order by v.release_year ASC" )) {
		echo "<p>Query Failed</p>";
	}
	
	echo "<div class='contentBox'>
       		<div class='titleBig'>" . $rowName->first_name . " " . $rowName->last_name . "</div>
			<div><ul>";
	
	while ( $rowMovies = $db_connection->Row () ) {
		echo "<li><a href=\"index.php?page=videoplay&id=$rowMovies->video_idvideo\">" . $rowMovies->title . " (" . $rowMovies->release_year . ")</a></li>";
	}
	
	echo "</ul></div></div></div>";
}

?>