<?php
require ("../util/db_connector.php");

if ($_POST ["suchbegriff"]) {
	
	if (! $db_connection->Query ( "SELECT video.idvideo, video.title, video.location_videopreview FROM video 
				WHERE video.title LIKE '%" . $_POST ["suchbegriff"] . "%' ORDER BY
				video.title ASC" )) {
		echo "<p>Query Failed</p>";
	}
	
	// Result is displayed with a line break
	while ( $row = $db_connection->Row () ) {
		echo "<a href=\"index.php?page=videoplay&id=$row->idvideo\" >";
		echo "<div>";
		echo "<table class='searchTable'>";
		echo "<tr>";
		echo "<td class='searchVideo'><img alt='' src='web/images/Movie_Covers/$row->location_videopreview' class='searchVideoPreview'></img></td>";
		echo "<td class='searchVideoTitle'>" . utf8_encode ( $row->title ) . "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		echo "</a>";
	}
}
?>
