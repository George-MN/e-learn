<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HTML5 video player</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo base_url(); ?>tempcss/js/jquery.hvideo.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo base_url(); ?>tempcss/js/hvideo-debug.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>tempcss/css/hvideo.css" type="text/css" media="screen" title="HTML5 video base style" charset="utf-8">
		<script type="text/javascript" charset="utf-8">
			$(function(){
				$('#test1').hvideo({
					//autoresize: true
				});
				// Using hvideo-debug.js we can enable logging alot of stuff to console:
				//hvideo.debug('#test1');
			});
		</script>
		<style type="text/css" media="screen">
			
			#test1 { margin-top:20px; margin-left:20px; }
		</style>
	</head>
	<body>
		
		<!-- <div id="test1" class="hvideo">
			<controls>
				<button class="play-pause paused" title="Toggle playback"></button>
				<extended>
					<bar class="position" title="Current position">
						<p class="meta">0:00</p>
					</bar>
					<bar class="total">
						<p class="meta" title="Total length">0:00</p>
					</bar>
					<bar class="buffered"></bar>
					<bar class="unbuffered"></bar>
					<button class="mute-audio" title="Mute/unmute audio"></button>
					<button class="zoom" title="Zoom in/out"></button>
				</extended>
			</controls> -->
			<video width="640" height="360" controls
			       poster="http://hunch.se/tmp/Spotify_-_the_story.jpg"
			       autobuffer >
			  <source src="<?php echo base_url(); ?>resource/videos/SINACH - WAY MAKER.mp4"
			          type="video/mp4">
			 <!--  <source src="http://hunch.se/tmp/Spotify_-_the_story_720p.ogv"
			          type="video/ogg"> -->
				<div class="fallback">
					You must have an HTML5 capable browser.
				</div>
			</video>
		</div>
		
	</body>
</html>
