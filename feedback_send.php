<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['send_feedback'])){

		$name = $_POST['name'];
		// $slug = slugify($name);
		$email = $_POST['email'];
		$title = $_POST['title'];
    $message = $_POST['message'];
    $user_id = $_POST['user_id'];
    $date_added = $_POST['date_added'];

		$conn = $pdo->open();

    try{
      $stmt = $conn->prepare("INSERT INTO feedback (id, name, email, title, message ,user_id ,date_added) VALUES (:id, :name, :email, :title, :message, :user_id, :date_added)");
      $stmt->execute(['id'=>$id, 'name'=>$name, 'email'=>$email, 'title'=>$title, 'message'=>$message, 'user_id'=>$user_id, 'date_added'=>$date_added]);
      $_SESSION['success'] = 'Thank you for your feedback';

    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up feedback form error';
	}

	header('location: feedback.php');

?>