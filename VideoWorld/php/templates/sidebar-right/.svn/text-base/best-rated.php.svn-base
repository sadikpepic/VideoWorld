<?php
if (is_null ( $type ) || empty ( $type )) {
	$join = "";
} else {
	$join = "JOIN $type t on t.video_idvideo = v.idvideo";
}

if (! $db_connection->Query ( "SELECT v.title, v.idvideo, avg(chv.rating) as rating FROM video v JOIN customer_has_video chv on chv.video_idvideo = v.idvideo $join group by title having rating IS NOT NULL order by rating DESC, v.title ASC LIMIT 10" )) {
	echo "<p>Query Failed</p>";
}

echo "<div class='bestRated'>";

echo "<div class='sidebarTitle'>Best Rated</div>";
$counter = 1;
while ( $row = $db_connection->Row () ) {
	echo "<a href=\"index.php?page=videoplay&id=$row->idvideo\"><div class='elements'>" . $counter . ". - " . $row->title . "</div></a>";
	$counter ++;
}

echo "</div></div>";
?>