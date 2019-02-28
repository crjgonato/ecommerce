<style>
.zoom {
	display: block;padding: 27px;background-color: white;
}
</style>
<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav fixed">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom" data-magnify-src="images/large-<?php echo $product['photo']; ?>" draggable="false">
		            		<br><br>
		            		<form class="form-inline" id="productForm">
		            			<div class="form-group pull-right">
			            			<div class="input-group col-sm-5 hidden">
			            				
			            				<span class="input-group-btn">
			            					<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
			            				</span>
							          	<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
							            <span class="input-group-btn">
							                <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
							                </button>
							            </span>
							            <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
											</div>								
													<?php
														if(!isset($_SESSION['user']))
														{
																echo '<a href="#not_loggedin" class="btn  btn-danger btn-md btn-flat" data-toggle="modal" >Add to Cart</a>';
														}
														else
														{
																echo '<button type="submit" class="btn  btn-danger btn-md btn-flat"> Add to Cart</button>';
														}
													?>
			            		</div>
		            		</form>
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?php echo $product['prodname']; ?></h1>
		            		<h3><b>&#8369; <?php echo number_format($product['price'], 2); ?></b></h3>
										<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>
										<p><b>Sold by: </b> <a href="#ownerartwork" class="viewseller" data-backdrop="static" data-keyboard="false" data-id="<?php echo $product['users_id']; ?>" data-toggle="modal"><?php echo (!empty($product['users'])) ? $product['users'] : 'Anonymous';?></p>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
		<?php $pdo->close(); ?>
		<?php include 'login_modal.php'; ?>
  	<?php include 'includes/footer.php'; ?>
		<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
	$(document).on('click', '.viewseller', function(e){
    e.preventDefault();
    $('#ownerartwork').modal('show');
    var id = $(this).data('id');
    getRow(id);
	// alert(id);
  });

	function getRow(id){
		$.ajax({
			type: 'POST',
			url: 'users_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				//$('#photos').prepend('<img id="photos" src="images/profile.jpg" />')
				$('#userid').val(response.users_id);
				//$('#users').val(response.email);
				$('#users').val(response.firstname+' '+response.lastname);
				$('#emails').val(response.email);
				$('#contacts').val(response.contact_info);

			}
			//console.log(response.users_id);
		});
	}

$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>