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
		return $paragraph;
	}
	error_log($conn->error);
	$get_stmt->close();
	$conn->close();
	return false;
}

function get_latest_cv_full_path(){
	include('constants.php');
	$conn = connect();
	$get_stmt = $conn->prepare('select cv1.filename from cv cv1 where cv1.date_uploaded=(select max(cv2.date_uploaded) from cv cv2');
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