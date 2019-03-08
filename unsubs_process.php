<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM subscribers WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Seller unsubscribed successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Seller to unsubscribe first';
	}

	header('location: profile.php');
	
?>