<?php 
$title = 'Contact | Jamie Hay';
$description = 'Contact details for television documentary editor Jamie Hay';
@include('header.php');
?>

<div class="page" id="contactPage">
	<h1>Contact</h1>
	<div class="pageContent">
		<div id="contactDetails" class="column">
			<div id="email"><a id="emailLink" href="mailto:jamiehaydocs@gmail.com?Subject=Hello">jamiehaydocs@gmail.com</a></div>
			<div id="phone">07980 169167</div>	
		</div>
		<div id="contactProfile" class="column">
			<div class="imageContainer">
			<img src="images/profile_1.jpg"></img>
			</div>
		</div>
	</div>
</div>

<?php
@include('footer.php');
?>