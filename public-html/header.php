<?php
include('../constants.php');
$title = isset($title)? $title : 'Jamie Hay Documentaries';
$description = isset($description)? $description : 'I’m a BAFTA award-winning television documentary editor for The Nazis a Warning from History. Feel free to contact me for London based work.';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="images/bafta4.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway|Alike Angular|Open Sans">
		<link rel="stylesheet" type="text/css" href="<?=$root_url?>css/style.css">

		<title><?=$title?></title>
		<meta name="description" content="<?=$description?>">

		<meta name="keywords" content="jamie hay,documentaries,documentary editor, bafta,television,offline editor,london">
		<meta name="author" content="Jamie Hay">

	</head>
	<body>
		<div id="wrapper">
			<div id="headerContainer">
				<div id="headerBar">
					<div id="header">
						<div id="row1">
							<div id="name">
								<a href="<?=$root_url?>">
									<span id="jamieHay" class="nowrap">Jamie Hay</span>
								</a>
							</div>
							<div id="menuButtonContainer">
							<div id="menuButton">Menu ☰</div>
							</div>
							<div class="menu" class="hiddenMenu">
								<div class="menuList">
								
								<nav>
									<ul>
										<li class="first">
											<a href="<?=$root_url?>">About</a>
										</li>
										<li>
											<a href="<?=$root_url?>work/">Work</a>
										</li>
										<li>
											<a href="<?=$root_url?>contact/">Contact</a>
										</li>
									</ul>
								</nav>
								</div>
							</div>
						</div>
						<div id="row2">
							<div id="row2Cell">
							<span id="tagline">
							<span id="baftaWinning" class="nowrap">bafta winning</span>
							<span id="editor" class="nowrap">documentary editor</span>
							</span>
							</div>
						</div>
					</div>
				</div>
				<div id="headerImgBack"></div>
			</div>