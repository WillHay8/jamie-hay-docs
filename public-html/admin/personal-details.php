<?php
include('../../constants.php');
include('../../dao.php');
$details_received = false;
$success = true;
$success_message = "";
$error_message = "";
if(isset($_POST['save'])){
	$details_received = true;
	if($_POST['first-name']){
		$first_name = $_POST['first-name'];
	}
	else{
		$success = false;
		$error_message = "please include a first-name";
	}
	if($_POST['last-name']){
		$last_name = $_POST['last-name'];
	}
	else{
		$success = false;
		$error_message = "please include a last-name";
	}
	if($_POST['email']){
		$email = $_POST['email'];
	}
	else{
		$success = false;
		$error_message = "please include a email";
	}
	if($_POST['phone']){
		$phone = $_POST['phone'];
	}
	else{
		$success = false;
		$error_message = "please include a phone number.";
	}
	if($success){
		if(update_jamie_details($first_name, $last_name, $email, $phone)){
			$success = true;
			$success_message = "details updated successfully";
		}
		else {
			$success = false;
			$error_message = "failed to update details in database, please go back and try again or contact your database administrator";
		}
	}
}
$jamie_details = get_jamie_details();
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

			.pad-top-20 {
				padding-top: 20px;
			}

			.button {
				padding: 5px;
				background-color: rgb(230,230,230);
    			box-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    			border-radius: 5px;
    			text-align: center;
    			margin: 3px;
			}
			.button:hover {
				cursor: pointer;
			}
			.work-input {
				width: 100%;
			}
			.success-con {
				padding-top: 10px;
				color: #00EE00;
			}
			.error-con {
				padding-top: 10px;
				color: #EE0000;
			}
			ul {
				padding-top: 10px;
				padding-bottom: 10px;
			}
			#add-job-form {
				display: none;
			}
			.delete-link{
				font-size: 16px;
				color: red;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 align="center">Jamie Hay Website Admin Center</h1>
				</div>
				<div class="col-12">
					<div class="row">
						<div class="col-8 offset-2 col-md-4 offset-md-0 col-lg-3">
							<a href="<?=$root_url?>admin/">
								<div id="back" class="button">← Back</div>
							</a>
						</div>
						<div class="col-8 offset-2 col-md-4 offset-md-4 col-lg-3 offset-lg-6">
							<a href="<?=$root_url?>contact/">
								<div id="view" class="button">View Page →</div>
							</a>
						</div>
					</div>
				</div>



				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 pad-top-20">
					<div class="row pad-top-20">
						<div class="col-12">
							<form id="update-details-form" method="post">
								<input class="work-input" type="text" name="first-name" placeholder="first name" value="<?=$jamie_details['first_name']?>">
								<input class="work-input" type="text" name="last-name" placeholder="last name" value="<?=$jamie_details['last_name']?>">
								<input class="work-input" type="text" name="email" placeholder="email" value="<?=$jamie_details['email']?>">
								<input class="work-input" type="text" name="phone" placeholder="phone" value="<?=$jamie_details['phone']?>">
								<input class="work-input" type="submit" name="save" value="save">
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<?php if($details_received){

								if($success){ ?>
									<p class="success-con">
										<?=$success_message?>
									</p>
								<?php }else{ ?>
									<p class="error-con">
										<?=$error_message?>
									</p>
								<?php }
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>