<?php
include('../../constants.php');
include('../../dao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway|Alike Angular|Open Sans">
		<link rel="stylesheet" type="text/css" href="<?=$root_url?>css/bootstrap.min.css">
		<style>
			body {
				font-family: Raleway;
			}
			.actions {
				padding: 20px;
				background-color: rgb(230,230,230);
    			box-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    			border-radius: 5px;
    			text-align: center;
    			margin: 10px;
			}
			a {
    			color: black;
    			text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12" align="center">
					<h1>Jamie Hay Website Admin Center</h1>
				</div>
				<div class="col-12">
					<h3>Do you want to:</h3>
				</div>
				<div class="col-12 col-sm-6 col-lg-3" >
					<a href="<?=$root_url?>admin/about/">
						<div class="actions">
							<h4>Edit your about section</h4>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-lg-3" >
						<a href="<?=$root_url?>admin/cv/">
					<div class="actions">
							<h4>Upload a new CV</h4>
					</div>
						</a>
				</div>
				<div class="col-12 col-sm-6 col-lg-3" >
						<a href="<?=$root_url?>admin/work/">
					<div class="actions">
							<h4>Update your work list</h4>
					</div>
						</a>
				</div>
				<div class="col-12 col-sm-6 col-lg-3" >
					<a href="<?=$root_url?>admin/personal-details/">
						<div class="actions">
							<h4>Update your personal details</h4>	
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-lg-3" >
					<a href="<?=$root_url?>admin/profile-picture/">
						<div class="actions">
							<h4>Update your profile picture</h4>	
						</div>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>