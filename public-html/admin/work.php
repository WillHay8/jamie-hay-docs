<?php
include('../../constants.php');
include('../../dao.php');
$work_item_received = false;
$delete_job_request_received = false;
$success = true;
$error_message = "";
$success_message = "";
if(isset($_POST['submit'])){
	$work_item_received = true;
	if($_POST['title']){
		$title = $_POST['title'];
	}
	else{
		$success = false;
		$error_message = "please include a title";
	}
	if($_POST['company']){
		$company = $_POST['company'];
	}
	else{
		$success = false;
		$error_message = "please include a company";
	}
	if($_POST['channel']){
		$channel = $_POST['channel'];
	}
	else{
		$success = false;
		$error_message = "please include a channel";
	}
	if($_POST['date']){
		$date = $_POST['date']; 
	}
	else{
		$success = false;
		$error_message = "please include a date. It can be rough, preferably to the nearest month";
	}
	if($success){
		if(add_job($title, $company, $channel, $date)){
			$success_message = "job added successfully";
		}
		else {
			$success = false;
			$error_message = "failed to add job to database, please go back and try again or contact your database administrator";
		}
	}
}
else if(isset($_GET['title-to-delete'])){
	$delete_job_request_received = true;
	if(delete_job_by_title($_GET['title-to-delete'])){
		$success = true;
		$success_message = "job deleted successfully";
	}else {
		$success = false;
		$error_message = "failed to delete job from database, please go back and try again or contact your database administrator";
	}
}
$work_array = get_all_work();
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
							<a href="<?=$root_url?>work/">
								<div id="view" class="button">View Page →</div>
							</a>
						</div>
					</div>
				</div>



				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 pad-top-20">
					<div class="row">
						<div class="col-8 offset-2 col-md-6 offset-md-3">
							<div id="add-job" class="button">+ Add a new job</div>
						</div>
					</div>
					<div class="row pad-top-20">
						<div class="col-12">
							<form id="add-job-form" method="post">
								<input class="work-input" type="text" name="title" placeholder="program title">
								<input class="work-input" type="text" name="company" placeholder="company">
								<input class="work-input" type="text" name="channel" placeholder="channel">
								<input class="work-input" type="date" name="date">
								<input class="work-input" type="submit" name="submit" value="submit">
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<?php if($work_item_received || $delete_job_request_received){

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
					<div class="row pad-top-20">
						<div class="col-12">
							<ul class="mainList">
							<?php foreach($work_array as $work_item){ ?>
								<li><a class="delete-link" href="<?=$root_url?>admin/work/?title-to-delete=<?=$work_item['program_title']?>">delete this entry</a>
									<ul class="subList">
										<li class="programTitle"><?=$work_item['program_title']?></li>
										<li><?=$work_item['company']?></li>
										<li><?=$work_item['channel']?></li>
										<li><?=substr($work_item['date'],0,4)?></li>
									</ul>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
		var addButton = document.getElementById("add-job");
		addButton.onclick = function(){
			var addJobForm = document.getElementById("add-job-form");
			addJobForm.style.display = "block";
		}
		</script>
	</body>
</html>