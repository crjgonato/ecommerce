<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav fixed">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
					<div class="row">
						<div class="col-sm-13">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
									<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<img src="images/banner1.jpg" alt="First slide" draggable="false">
									</div>
									<div class="item">
										<img src="images/banner2.jpg" alt="Second slide" draggable="false">
									</div>
									<div class="item">
										<img src="images/banner3.png" alt="Third slide" draggable="false">
									</div>
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									<span class="fa fa-angle-left"></span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									<span class="fa fa-angle-right"></span>
								</a>
							</div>
						</div>
						<!-- <div class="col-sm-3">
						</div> -->
					</div>
					<br>
	        <div class="row">
						<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
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
	        			
		          <h2 style="margin-top: 0px;">Top Artworks</h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			$inc = 4;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 8");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 4) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-3'>
												 <div class='box box-solid'>
													<a href='product.php?product=".$row['slug']."'>
														<div class='box-body prod-bodies'>
															<img src='".$image."' width='100%' height='150px' class='thumbnail' draggable='false'>
															<div class='bottom-right' style='position: absolute; bottom: 150px; right: 40px; opacity: 0.30; color: white; font-weight: 600; z-index:99; font-size: large;' readonly>La Château</div>
															<h5 style='white-space: nowrap;width: 170px;overflow: hidden;text-overflow: ellipsis;'>".$row['name']."</h5>
														</div>
														<div class='box-footer'>
															<b>&#8369; ".number_format($row['price'], 2)."</b>
														</div>
													</a>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 4) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
								if($inc == 2) echo "<div class='col-sm-4'></div></div>";
								}
								catch(PDOException $e){
									echo "There is some problem in connection: " . $e->getMessage();
								}

								$pdo->close();

		       		?> 
							 <h2 style="margin-top: 0px;">Latest Artworks</h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 4;	
						    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 8");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 4) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-3'>
												 <div class='box box-solid'>
													<a href='product.php?product=".$row['slug']."'>
														<div class='box-body prod-bodies'>
															<img src='".$image."' width='100%' height='150px' class='thumbnail' draggable='false'>
															<div class='bottom-right' style='position: absolute; bottom: 150px; right: 40px; opacity: 0.30; color: white; font-weight: 600; z-index:99; font-size: large;' readonly>La Château</div>
															<h5 style='white-space: nowrap;width: 170px;overflow: hidden;text-overflow: ellipsis;'>".$row['name']."</h5>
														</div>
														<div class='box-footer'>
															<b>&#8369; ".number_format($row['price'], 2)."</b>
														</div>
													</a>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 4) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
								if($inc == 2) echo "<div class='col-sm-4'></div></div>";
								}
								catch(PDOException $e){
									echo "There is some problem in connection: " . $e->getMessage();
								}

								$pdo->close();

		       		?> 
	        	</div>

						
	        	
	        </div>
					
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
		<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>