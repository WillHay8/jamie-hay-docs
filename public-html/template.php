<?php
function printTemplate($filePath){
	echo<<<PART1
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="shortcut icon" href="images/bafta4.png" type="image/x-icon" />
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway|Alike Angular|Open Sans">
			<link rel="stylesheet" type="text/css" href="css/main.css"/>			
			<link rel="stylesheet" type="text/css" href="css/footer.css"/>
			<link rel="stylesheet" type="text/css" href="css/header.css"/>
			<link rel="stylesheet" type="text/css" href="css/slideshow.css"/>
			<link rel="stylesheet" type="text/css" href="css/channelGrid.css"/>
			<link rel="stylesheet" media="screen and (min-width:701px)" href="css/medium.css"/>
			<link rel="stylesheet" media="screen and (min-width:1024px)" href="css/wide.css"/>

			<title>Jamie Hay</title>
		</head>
		<body>
			<div id="wrapper">
PART1;
				include('php/div_header.php');
echo<<<PART2
				<div id="mainContainer">
					<div id="main">
PART2;
						include($filePath);
echo<<<PART3
					</div>
				</div>
PART3;
				include('php/div_footer.php');
echo<<<PART4

			<script src="scripts/jquery-3.1.0.js"></script>
			<script src="scripts/resizeHeaderImg.js"></script>
			<script src="scripts/main.js"></script>
		</body>

	</html>
PART4;
}
?>