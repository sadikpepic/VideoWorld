<?php
if (isset ( $_POST ["search_field"] )) {
	if (! is_null ( $_POST ["search_field"] )) {
		$id = $_POST ["search_field"];
	}
}
if (is_null ( $id ) || trim ( $id ) == 'Enter search here') {
	$query = "SELECT video.idvideo, video.title, video.location_videopreview, video.hd FROM video order by video.title";
	$id = '';
} else {
	$query = "SELECT video.idvideo, video.title, video.location_videopreview, video.hd FROM video WHERE video.title LIKE '%" . $id . "%'
		order by video.title";
}
echo "<!-- Box -->
		<div class='box'>
		<div class='head'>
		<h2>Search Results for '" . $id . "'</h2>
		<p class='text-right'><a href='#'>Go to TOP</a></p>
		</div>";
if (! $db_connection->Query ( $query )) {
	echo "<p>Query Failed</p>";
} else {
	$videos = array ();
	while ( $rowVideos = $db_connection->Row () ) {
		array_push ( $videos, $rowVideos );
	}
}

foreach ( $videos as $video ) {
	
	if (! $db_connection->Query ( "SELECT (round(avg(rating) * 2)) / 2 AS average FROM customer_has_video
	where video_idvideo = \"$video->idvideo\"" )) {
		echo "<p>Query Failed</p>";
	}
	
	$rowRating = $db_connection->Row ();
	
	echo "<!-- Movie -->
	<div data-id='$video->idvideo' class='movie'>

	<div class='movie-image'>
	<a href=\"index.php?page=videoplay&id=$video->idvideo\"><span class='play'><span class='name' data-id='$video->idvideo'>$video->title</span></span><img src='web/images/Movie_Covers/$video->location_videopreview' alt='movie' /></a>
	</div>
		
	<div class='rating'>
	<p>RATING</p>";
	
	echo getRatingString ( $rowRating->average );
	echo "<div class='resPic'>";
	echo getResolutionPic ( $video->hd );
	
	echo "</div></div></div>
	<!-- end Movie -->";
}

echo "<script type='text/javascript'>bindMovieFunctions();</script>";
echo "<div class='cl'>&nbsp;</div></div><!-- end Box -->";
?>