<?php include 'includes/session.php'; ?>


<?php
	$slug = $_GET['users'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM users WHERE user_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$user = $stmt->fetch();
		$userid = $user['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav fixed">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%" style="border: solid 1px #d3d3d336; margin: 10px; "  draggable="false">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3" style="margin-top: 15px;">
	        							<h5>Name:</h5>
	        							<h5>Email:</h5>
	        							<h5>Contact Info:</h5>
	        							<h5>Address:</h5>
	        							<h5>Member Since:</h5>
												<h5>Bio: </h5>
	        						</div>
	        						<div class="col-sm-9" style="margin-top: 15px;">
	        							<h5><?php echo $user['firstname'].' '.$user['lastname']; ?>
	        								<span class="pull-right">
	        									<a href="#edit" class="btn btn-danger btn-flat btn-sm" data-toggle="modal"><i class="fa fa-plus"></i> Follow</a>
	        								</span>
	        							</h5>
	        							<h5><?php echo $user['email']; ?></h5>
	        							<h5><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h5>
	        							<h5><?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h5>
	        							<h5><?php echo date('M d, Y', strtotime($user['created_on'])); ?></h5>
												<h5>" <?php echo (!empty($user['bio'])) ? $user['bio'] : ''; ?> "</h5>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
							</div>
						
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>