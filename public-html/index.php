<?php 
include ('header.php');
?>
<div class="page" id="aboutPage">
	<h1>About</h1>
	<div class="pageContent">
		<div id="blurb" class="column">
			<p>I am a freelance offline documentary editor based in London. 
				I spent 20 years at the BBC where I learned my craft and have had 
				the privilege of working with many talented directors.   
				Some of the key documentaries I have edited include 'The Nazis, 
				A Warning From History' with Laurence Rees (BAFTA for best editing factual in 1997), 
				'Commando, On The Front Line' with Chris Terrill at Uppercut Films in 2005 and 
				'The Twins of the Twin Towers' with Olivia Lichtenstein at StoryVault Films in 2012. 
				For more see my <a href="<?=$root_url?>work/">work page</a> or 
				<a href="<?=$root_url?>files/JamieHayCV.pdf" download>download my CV</a>.
			</p>
			<p>
				The highlight of editing for me is identifying the narrative and giving
				insight into character's lives. Please feel free to call or email me for a chat.
				My details are below.
			</p>
			<div id="aboutContact">
			<div id="aboutEmail"><a id="aboutEmailLink" href="mailto:jamiehaydocs@gmail.com?Subject=Hello">jamiehaydocs@gmail.com</a></div>
			<div id="aboutPhone">07980 169167</div>	
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