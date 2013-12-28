<?php
require ('../util/util.php');
require ('../util/db_connector.php');

session_start ();

if (! $db_connection->Query ( "SELECT idgenre, type FROM genre order by type ASC" )) {
	echo "<p>Query Failed</p>";
} else {
	$genres = array ();
	while ( $rowGenres = $db_connection->Row () ) {
		array_push ( $genres, $rowGenres ); // Inside while loop
	}
}

$join = "";
if ($_POST ["type"] == 'tvshow') {
	$join = "JOIN tvshow t on t.video_idvideo = video.idvideo";
} else if ($_POST ["type"] == 'movie') {
	$join = "JOIN movie m on m.video_idvideo = video.idvideo";
}

foreach ( $genres as $genre ) {
	$videos = array ();
	echo "<!-- Box -->
			<div class='box'>
			<div class='head'>
			<h2>$genre->type</h2>
			<p class='text-right'><a href='#'>Go to TOP</a></p>
			</div>";
	
	if (! $db_connection->Query ( "SELECT video.idvideo, video.title, video.location_videopreview, video.hd FROM video
			" . $join . "
			JOIN genre_has_video ghs on ghs.video_idvideo = video.idvideo
			" . $_POST ["whereClause"] . "
			AND ghs.genre_idgenre = $genre->idgenre
			" . $_POST ["orderByClause"] )) {
		echo "<p>Query Failed</p>";
	} else {
		while ( $rowVideos = $db_connection->Row () ) {
			array_push ( $videos, $rowVideos );
		}
	}
	
	foreach ( $videos as $video ) {
		
		if (! $db_connection->Query ( "SELECT (round(avg(rating) * 2)) / 2 AS average FROM customer_has_video
				where video_idvideo = \"$video->idvideo\"" )) {
			echo "<p>Query Failed</p>";
		}
		
		echo "<!-- Movie -->
			<div data-id='$video->idvideo' class='movie'>
				
			<div class='movie-image'>
			<a href=\"index.php?page=videoplay&id=$video->idvideo\"><span class='play'><span class='name' data-id='$video->idvideo'>$video->title</span></span><img src='web/images/Movie_Covers/$video->location_videopreview' alt='movie' /></a>
			</div>
		
			<div class='rating'>
			<p>RATING</p>";
		
		$rowRating = $db_connection->Row ();
		
		echo getRatingString ( $rowRating->average );
		echo "<div class='resPic'>";
		echo getResolutionPic ( $video->hd );
		echo "</div></div></div>
			<!-- end Movie -->";
	}
	
	echo "<script type='text/javascript'>bindMovieFunctions();</script>";
	echo "<div class='cl'>&nbsp;</div></div><!-- end Box -->";
}
?>
