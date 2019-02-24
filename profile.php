<?php include 'includes/session.php'; ?>
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
	        									<a href="#edit" class="btn btn-default btn-flat btn-sm" data-toggle="modal"> Edit</a>
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
							<div class="box box-solid">
								<div class="col-md-13">
									<!-- Custom Tabs -->
									<div class="nav-tabs-custom">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Artworks</a></li>
											<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Orders</a></li>
											<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Feedbacks</a></li>
											<li class="dropdown pull-right">
												<a class="dropdown-toggle" data-toggle="dropdown" href="#">
													Options <span class="caret"></span>
												</a>
												<ul class="dropdown-menu">
													<li role="presentation"><a href="#post_item" class="" id="addproduct" data-toggle="modal"> Post Artwork</a></li>
													<li role="presentation"><a href="feedback.php" class="" id="addproduct" > Submit Feedback</a></li>
												</ul>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1">
												<!-- <span class="pull-right">
	        								
	        							</span> -->

											<div class="box-body">
													<table class="table  " id="example1">
														<thead>
															<th class="hidden"></th>
															<th>Photos</th>
															<th>Dates</th>
															<th>Name</th>
															<th>Price</th>
															<!-- <th>Options</th> -->
														</thead>
														<tbody>
														<?php
															$conn = $pdo->open();
															try{
																$stmt = $conn->prepare("SELECT * FROM products WHERE users_id=:users_id ORDER BY id DESC");
																$stmt->execute(['users_id'=>$user['id']]);
																foreach($stmt as $row){
																	$image = (!empty($row['photo'])) ? './images/'.$row['photo'] : './images/noimage.jpg';
																	echo "
																		<tr>
																			<td class='hidden'></td>
																			<td>	
																				<a href='product.php?product=".$row['slug']."'>
																					<img src='".$image."' height='30px' width='30px'  draggable='false'>
																				</a>
																			</td>
																			<td>".$row['date_added']."</td>
																			
																			<td>".$row['name']."</td>
																			<td>₱".$row['price']."</td>
																			<!-- <td><button class='btn btn-sm btn-flat btn-default transact' data-id='".$row['id']."'> View More</button></td> -->
																		</tr>
																	";
																}
															}
															catch(PDOException $e){
																echo "There is some problem in connection: " . $e->getMessage();
															}
															$pdo->close();
														?>
														</tbody>
													</table>
												</div>
											</div>
											<!-- /.tab-pane -->


											<div class="tab-pane " id="tab_2">
												<div class="box-body">
													<table class="table  " id="example1">
														<thead>
															<th class="hidden"></th>
															<th>Dates</th>
															<th>Transaction #</th>
															<th>Amounts</th>
															<th>Options</th>
														</thead>
														<tbody>
														<?php
															$conn = $pdo->open();
															try{
																$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
																$stmt->execute(['user_id'=>$user['id']]);
																foreach($stmt as $row){
																	$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
																	$stmt2->execute(['id'=>$row['id']]);
																	$total = 0;
																	foreach($stmt2 as $row2){
																		$subtotal = $row2['price']*$row2['quantity'];
																		$total += $subtotal;
																	}
																	echo "
																		<tr>
																			<td class='hidden'></td>
																			<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
																			<td>".$row['pay_id']."</td>
																			<td>₱".number_format($total, 2)."</td>
																			<td><button class='btn btn-sm btn-flat btn-default transact' data-id='".$row['id']."'> View More</button></td>
																		</tr>
																	";
																}
															}
															catch(PDOException $e){
																echo "There is some problem in connection: " . $e->getMessage();
															}
															$pdo->close();
														?>
														</tbody>
													</table>
												</div>
											</div>
											<!-- /.tab-pane -->


											<div class="tab-pane" id="tab_3">
											<span class="pull-right">
	        							
	        							</span>
											<div class="box-body">
													<table class="table  " id="example1">
														<thead>
															<th class="hidden"></th>
															<th>Title</th>
															<th>Date</th>
														
														</thead>
														<tbody>
														<?php
															$conn = $pdo->open();
															try{
																$stmt = $conn->prepare("SELECT * FROM feedback WHERE user_id=:user_id ORDER BY date_added DESC");
																$stmt->execute(['user_id'=>$user['id']]);
																foreach($stmt as $row){
																	// $stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
																	$stmt2->execute(['id'=>$row['id']]);
																	// $total = 0;
																	// foreach($stmt2 as $row2){
																	// 	$subtotal = $row2['price']*$row2['quantity'];
																	// 	$total += $subtotal;
																	// }
																	echo "
																		<tr>
																			<td class='hidden'></td>
																			<td>".$row['title']."</td>
																			<td>".$row['date_added']."</td>
																			
																		
																		</tr>
																	";
																}
															}
															catch(PDOException $e){
																echo "There is some problem in connection: " . $e->getMessage();
															}
															$pdo->close();
														?>
														</tbody>
													</table>
												</div>
											</div>
											<!-- /.tab-pane -->
										</div>
										<!-- /.tab-content -->
									</div>
									<!-- nav-tabs-custom -->
								</div>
							</div>


	        		<!-- <div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"> <b>Transaction History</b></h4>
	        			</div>
	        			
							</div> -->
							

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