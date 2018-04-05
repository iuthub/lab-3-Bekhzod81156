<?php 
if(!empty($_REQUEST['playlist'])){
	$mp3files = file('songs/'.$_REQUEST['playlist']);
}else{
	$mp3files = glob("songs/*.mp3");
}
	$playlistt = glob("songs/*.txt");



?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		
		
		<div id="listarea">
			<ul id="musiclist">
				<?php 
					foreach($mp3files as $file)
					{

				?>

				<li class="mp3item">
				<a href="<?= $file ?>"><?= basename($file) ?></a>
				<?php
				$sizee =filesize($file);
				if($sizee<=1023 )
					echo '('.$sizee .' b )';
				else if ($sizee<=1048575) {
					echo '('.round(($sizee/=1024), 2).' kb )';
									}
					else
					{
						echo '('.round(($sizee/=1048576), 2).' mb )';	
					}
				 ?>
					
				</li>
				<?php } ?>

				

				
					<?php
					foreach($playlistt as $play)
					{ 					 ?>
					<li class="playlistitem">
					<a href="<?= $play ?>"><?= basename($play)	?></a>
				</li>
				<?php } ?>


			</ul>
		</div>
	</body>
</html>