<?php
$venuecontent = get_post_meta( 8, 'venuecontent', true );
$homecontent = get_post_meta( 21, 'homecontent', true );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Zayn Chowdhury</title>
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/resource/css/style.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/com/fahimchowdhury/toolkitMax-v1003-compressed.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/src/main.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/com/greensock/easing/EasePack.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/com/greensock/plugins/CSSPlugin.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/com/greensock/TweenLite.js"></script>
	<style type="text/css">
		#wrapper
		{
			background: url(<?php echo wp_get_attachment_url($homecontent[0]['background-image']); ?>) no-repeat ;
		}
	</style>
	</head>
	<body>
		<ul id="wrapper">
			<li class="nav">
				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/resource/image/logo.png">
				<ul class="buttonHolder">
					<li class="button" onclick="setPage('about')">
						ABOUT
					</li>
					<li class="hr">

					</li>
					<li class="button" onclick="setPage('venue')">
						VENUE
					</li>
					<li class="hr">

					</li>
					<li class="button" onclick="setPage('gallery')">
						GALLERY
					</li>
					<li class="hr">

					</li>
					<li class="button" onclick="setPage('contact')">
						CONTACT
					</li>
					<li class="bottom"></li>
				</ul>
			</li>
			<li id="content">
				<div id="about" class="page">
					<h1>ABOUT</h1>
					<p>
						<?php 
							$about_data = get_page( 2 );	
							echo apply_filters('the_content', $about_data->post_content);
						?>
					</p>
				</div>
				<div id="venue" class="page">
					<h1>VENUE</h1>
					<p class="title"><?php echo $venuecontent[0]['venue-title'];?></p>
					<img src="<?php echo wp_get_attachment_url($venuecontent[0]['venue-image']); ?>" class="venueImage"/>
					<p>
						<span class="address">ADDRESS</span><br>
						<?php echo nl2br($venuecontent[0]['venue-address']);?>
					</p>
					<iframe class="map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $venuecontent[0]['map-code'];?>"></iframe>
				</div>
				<div id="gallery" class="page">
					<h1>GALLERY</h1>
					
						<?php 
							$gallery_data = get_page( 16);	
							echo apply_filters('the_content', $gallery_data->post_content);
						?>
					
					<ul id="form">
						<li >
							Email Address
						</li>
						<li class="formLi">
							<input id="formEmail" type="text" />
						</li>
						<li class="formLi">
							<button id="submit">
								submit
							</button>
						</li>
						<li class="clearBoth"></li>
					</ul>
					<div id="formError">
						&nbsp;
					</div>
				</div>
				<div id="contact" class="page">
					<h1>Contact</h1>
					<p>
						<?php 
							$contact_data = get_page( 13);	
							echo apply_filters('the_content', $contact_data->post_content);
						?>
					</p>
				</div>
			</li>
			<li class="clearBoth">

			</li>
			<li id="footer">
				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/resource/image/minlogo.png" />
			</li>
		</ul>

	</body>
</html>
