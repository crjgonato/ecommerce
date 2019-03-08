<?php
	include 'includes/session.php';
	//include 'includes/slugify.php';
	$output = array('error'=>false);
	if(isset($_POST['subsend'])){
		$users = $_POST['users'];
		$user_id = $_POST['user_id'];
		$fullname = $_POST['fullname'];
    $date_added = $_POST['date_added'];

		$conn = $pdo->open();
		if(isset($_SESSION['user'])){
			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM subscribers WHERE user_id=:user_id AND users=:users");
			$stmt->execute([ 'user_id'=>$user_id, 'users'=>$users]);
			$row = $stmt->fetch();
			if($row['numrows'] < 1){
				try{
					  $stmt = $conn->prepare("INSERT INTO subscribers ( users, user_id, fullname, date_added) VALUES (:users, :user_id, :fullname, :date_added)");
					  $stmt->execute(['users'=>$users, 'user_id'=>$user_id, 'fullname'=>$fullname, 'date_added'=>$date_added]);
					  $_SESSION['success'] = 'Subscribed succesfully';
					}
				catch(PDOException $e){
					$output['error'] = true;
					$output['message'] = $e->getMessage();
				}
				// $pdo->close();
			}
			else{
				$output['error'] = true;
				$output['message'] = 'You already subcribed this seller';
			}
		}
	}
	else{
		$_SESSION['error'] = 'netowork error';
	}
	header('location: profile.php');
	$pdo->close();
	echo json_encode($output);

?>