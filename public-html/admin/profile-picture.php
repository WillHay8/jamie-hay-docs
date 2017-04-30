<?php
include('../../constants.php');
include('../../dao.php');
$upload_received = false;
$error_message = "";
if(isset($_FILES['profilepic']) && !empty($_FILES['profilepic']['name'])){
	$upload_received = true;
	$file_temp = $_FILES['profilepic']['tmp_name'];
	$filename = basename($_FILES['profilepic']["name"]);
	$file_type = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	$target_file = $root_dir."files/"."JamieHayprofilepic_".date('Y-m-d').".".$file_type;
	
	$uploadOk = 1;
    // check filesize
    error_log("filesize:".$_FILES['profilepic']["size"]);
    if($_FILES['profilepic']['error']){
    	$error_message = "there was an error sending the file, profilepic must not be over 5MB";
    	$uploadOk = 0;
    }
    else if($_FILES['profilepic']["size"] > 5000000){
    	$error_message = "file must be under 5MB, please compress any images within it";
    	$uploadOk = 0;
    }
	else if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif") {
		$error_message = "Sorry, only jpegs, pngs and gifs are allowed. <br />";
		$uploadOk = 0;
	}
    $upload_success = false;
    if($uploadOk){
	    if(move_uploaded_file($file_temp, $target_file)){
	    	if($image_id = save_profilepic_to_database(basename($target_file))){
	    		$error_message = "upload successful!";
	    		$upload_success = true;
	    	}
	    	else {
	    		$error_message = "failed to save image to database";
	    	}
	    }
	    else{
	    	$error_message = "writing to server failed - file was not uploaded successfully<br/>";
	    }
	}
}
error_log("upload_received=".$upload_received);
$latest_profilepic_full_path = get_latest_profilepic_full_path();
$latest_profilepic_date_uploaded = get_latest_profilepic_date_uploaded();
$profilepic_path_array = explode('/',$latest_profilepic_full_path);
$latest_profilepic_filename = $profilepic_path_array[count($profilepic_path_array)-1];
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
			.success-con {
				padding-top: 10px;
				color: #00EE00;
			}
			.error-con {
				padding-top: 10px;
				color: #EE0000;
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
					<h4>Select your latest profilepic by clicking the button below:</h3>
					<form id="profilepic-upload-form" method="post" enctype="multipart/form-data" action="<?=$root_url?>admin/profile-picture/">
						<input type="hidden" name="test" value="123">
						<input id="profilepic-input" type="file" name="profilepic">
						<input id="submit-profilepic" type="submit" hidden>
					</form>
					<?php if($upload_received){

						if($upload_success){ ?>
							<p class="success-con">
								Upload successful!
							</p>
						<?php }else{ ?>
							<p class="error-con">
								<?=$error_message?>
							</p>
						<?php }
					} ?>
					<p> latest profilepic: <a href="<?=$latest_profilepic_full_path?>"><?=$latest_profilepic_filename?></a> uploaded on <?=date('d/m/Y',strtotime($latest_profilepic_date_uploaded))?></p>
					<img src="<?=$latest_profilepic_full_path?>">
				</div>
			</div>
		</div>
		<script>
			var formSubmit = document.getElementById("submit-profilepic");
			var fileInput = document.getElementById("profilepic-input");
			fileInput.onchange = function(){ formSubmit.click(); };
		</script>
	</body>
</html>