<?php
if (is_null ( $type ) || empty ( $type )) {
	$join = "";
} else {
	$join = "JOIN $type t on t.video_idvideo = v.idvideo";
}

if (! $db_connection->Query ( "SELECT v.title, v.idvideo  FROM video v $join order by v.times_viewed DESC, v.title ASC LIMIT 10" )) {
	echo "<p>Query Failed</p>";
}

echo "<div class='mostViewed'>";

echo "<div class='sidebarTitle'>Most Viewed</div>";
$counter = 1;
while ( $row = $db_connection->Row () ) {
	echo "<a href=\"index.php?page=videoplay&id=$row->idvideo\"><div class='elements'>" . $counter . ". - " . $row->title . "</div></a>";
	$counter ++;
}

echo "</div>";
?>