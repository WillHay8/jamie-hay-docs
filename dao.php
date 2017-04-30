<?php
function connect(){
	include 'constants.php';
	include $sql_config_path;
	$conn = new mysqli($servername, $username, $password, $database);
	if($conn->connect_error){
		die("connection failed: " . $conn->connect_error);
	}
	return $conn;
} 

function get_paragraph($paragraph_id){
	$conn = connect();
	$get_stmt = $conn->prepare('select body from paragraph where id=?');
	$get_stmt->bind_param('i', $paragraph_id);
	if($get_stmt->execute()){
		$get_stmt->bind_result($paragraph);
		if($get_stmt->fetch()){
			$get_stmt->close();
			$conn->close();
			return $paragraph;
		}
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;
}

function get_about(){
	return get_paragraph_by_title('about');
}

function get_paragraph_by_title($paragraph_title){
	$para_title = strtolower($paragraph_title);
	$conn = connect();
	$get_stmt = $conn->prepare('select body from paragraph where lower(title)=?');
	$get_stmt->bind_param('s', $para_title);
	if($get_stmt->execute()){
		$get_stmt->bind_result($paragraph);
		if($get_stmt->fetch()){
			$get_stmt->close();
			$conn->close();
			return $paragraph;
		}
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;
}

function get_all_work(){
	$conn = connect();
	$get_stmt = $conn->prepare('select program_title, company, channel, date from work order by date desc');
	if($get_stmt->execute()){
		$get_stmt->bind_result($title, $company, $channel, $date);
		$all_work = [];
		while($get_stmt->fetch()){
			$all_work[] = array(
				'program_title' => $title,
				'company' => $company,
				'channel' => $channel,
				'date' => $date
				);
		}
		$get_stmt->close();
		$conn->close();
		return $all_work;
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;
}

function get_latest_cv_full_path(){
	include('constants.php');
	$conn = connect();
	$get_stmt = $conn->prepare('select cv1.filename from cv cv1 where cv1.date_uploaded=(select max(cv2.date_uploaded) from cv cv2)');
	if($get_stmt->execute()){
		$get_stmt->bind_result($cv_filename);
		if($get_stmt->fetch()){
			$get_stmt->close();
			$conn->close();
			return $root_url."files/".$cv_filename;
		}
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;
}

function get_latest_cv_date_uploaded(){
	$conn = connect();
	$get_stmt = $conn->prepare('select max(date_uploaded) from cv');
	if($get_stmt->execute()){
		$get_stmt->bind_result($cv_upload_date);
		if($get_stmt->fetch()){
			$get_stmt->close();
			$conn->close();
			return $cv_upload_date;
		}
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;	
}

function get_jamie_details(){
	$jamie_username = 'jamie';
	$conn = connect();
	$get_stmt = $conn->prepare('select first_name, last_name, email, phone from personal_details where username=?');
	$get_stmt->bind_param('s', $jamie_username);
	if($get_stmt->execute()){
		$get_stmt->bind_result($first_name, $last_name, $email, $phone);
		if($get_stmt->fetch()){
			$jamie_details = array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'email' => $email,
				'phone' => $phone
				);
			$get_stmt->close();
			$conn->close();
			return $jamie_details;
		}
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;
}

function save_cv_to_database($filename){
	$date_uploaded = date('Y-m-d H:i:s');
	$conn = connect();
	$insert_stmt = $conn->prepare("insert into cv (filename, date_uploaded) values (?, ?)");
	$insert_stmt->bind_param("ss", $filename, $date_uploaded);
	if($insert_stmt->execute()){
		$insert_stmt->close();
		$conn->close();
		return true;
	}
	$insert_stmt->close();
	$conn->close();
	return false;
}

function add_job($title, $company, $channel, $date){
	$conn = connect();
	$insert_stmt = $conn->prepare("insert into work (program_title, company, channel, date) values (?, ?, ?, ?)");
	$insert_stmt->bind_param("ssss", $title, $company, $channel, $date);
	if($insert_stmt->execute()){
		$insert_stmt->close();
		$conn->close();
		return true;
	}
	$insert_stmt->close();
	$conn->close();
	return false;	
}

function delete_job_by_title($job_title){
	$conn = connect();
	$delete_stmt = $conn->prepare("delete from work where program_title=?");
	$delete_stmt->bind_param("s", $job_title);
	if($delete_stmt->execute()){
		$delete_stmt->close();
		$conn->close();
		return true;
	}
	$delete_stmt->close();
	$conn->close();
	return false;
}

function update_jamie_details($first_name, $last_name, $email, $phone){
	$conn = connect();
	$update_stmt = $conn->prepare("update personal_details set first_name=?, last_name=?, email=?, phone=? where username='jamie'");
	$update_stmt->bind_param("ssss", $first_name, $last_name, $email, $phone);
	if($update_stmt->execute()){
		$update_stmt->close();
		$conn->close();
		return true;
	}
	$update_stmt->close();
	$conn->close();
	return false;
}

function update_about($about){
	$conn = connect();
	$update_stmt = $conn->prepare("update paragraph set body=? where title='About'");
	$update_stmt->bind_param("s", $about);
	if($update_stmt->execute()){
		$update_stmt->close();
		$conn->close();
		return true;
	}
	$update_stmt->close();
	$conn->close();
	return false;
}