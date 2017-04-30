<?php
include('../../constants.php');
include('../../dao.php');
$details_received = false;
$success = true;
$success_message = "";
$error_message = "";
if(isset($_POST['save'])){
	$details_received = true;
	if($_POST['about']){
		$about = $_POST['about'];
	}
	else{
		$success = false;
		$error_message = "please write something or no text will show on your home page";
	}
	if($success){
		if(update_about($about)){
			$success = true;
			$success_message = "About paragraph updated successfully";
		}
		else {
			$success = false;
			$error_message = "failed to update the about section in the database, please go back and try again or contact your database administrator";
		}
	}
}
$about = get_about();
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
			#update-about-form textarea{
				height: 600px;
			}
			.delete-link{
				font-size: 16px;
				color: red;
			}
			.small-text{
				font-size: 16px;
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
							<a href="<?=$root_url?>">
								<div id="view" class="button">View Page →</div>
							</a>
						</div>
					</div>
				</div>



				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 pad-top-20">
					<div class="row pad-top-20">
						<div class="col-12">
							<h3>About <span class="small-text">(instructions below)</span></h3>
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
					<div class="row">
						<div class="col-12">
							<form id="update-about-form" method="post">
								<textarea class="work-input" type="text" name="about" placeholder="about"><?=$about?></textarea>
								<input class="work-input" type="submit" name="save" value="save">
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<p>To add paragraphs, put a <?=htmlspecialchars('<p>')?> tag at the start of your paragraph and a <?=htmlspecialchars('</p>')?> tag at the end.</p>
							<p>To link to your latest cv, put a <?=htmlspecialchars('<cv>')?> tag at the start of the text you want to act as a link and a <?=htmlspecialchars('</cv>')?> tag at the end. For example 'for more information, please <?=htmlspecialchars('<cv>')?>download my cv<?=htmlspecialchars('</cv>')?>'.</p>
							<p>To link to a page put '<?=htmlspecialchars('<pagename-page>see my pagename page</pagename-page>')?>' tags around your text.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>