<?php
$page = "about"; 
include('../constants.php');
include('../dao.php');
$about = get_about();
$jamie_details = get_jamie_details();
$latest_cv_full_path = get_latest_cv_full_path();
$about = str_replace('<cv>', '<a href="'.$latest_cv_full_path.'" download>', $about);
$about = str_replace('</cv>', '</a>', $about);
$about = str_replace('<work-page>', '<a href="'.$root_url.'work/">', $about);
$about = str_replace('</work-page>', '</a>', $about);
$about = str_replace('<contact-page>', '<a href="'.$root_url.'contact/">', $about);
$about = str_replace('</contact-page>', '</a>', $about);
$about = str_replace('<about-page>', '<a href="'.$root_url.'">', $about);
$about = str_replace('</about-page>', '</a>', $about);


include ('header.php');
?>
<div class="page" id="aboutPage">
	<h1>About</h1>
	<div class="pageContent">
		<div id="blurb" class="column">
			<?=$about?>
			<div id="aboutContact">
			<div id="aboutEmail"><a id="aboutEmailLink" href="mailto:jamiehaydocs@gmail.com?Subject=Hello"><?=$jamie_details['email']?></a></div>
			<div id="aboutPhone"><?=$jamie_details['phone']?></div>	
			</div>

		</div>
		<div class="rightColumn">
		<div id="slideshow">
			<div class="imageContainer" class="column">
				<?php include('components/div_slideshow.php');?>
			</div>
		</div>
		<div id="channelGrid">
			<?php include('components/div_channelGrid.php');?>
		</div>
	</div>
	</div>
</div>
<?php 
include('footer.php');

?>