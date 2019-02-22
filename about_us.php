<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-red layout-top-nav">
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
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div class="box box-solid">
                        <div class="box-header with-border">
		                  <h1 class="box-title"><b>About Us</b></h2>
                        	<div class="acc-panel">
                            	<div class="acc-title">
                            		<span class="acc-icon"></span>
                            		<table>
                            		<h4><strong>What is La Château?</strong></h4>
                            	</div>
                            	<div class="acc-body">
									<p>La Château is an online art gallery to sell paintings, buy original artworks and fine art.</p>
                            	</div>
                        	</div>
                        	<div class="acc-panel">
                            	<div class="acc-title">
                            		<span class="acc-icon"></span>
                            		<h4><strong>How do artist gain money?</strong></h4>
                        		</div>
                        		<div class="acc-body">
									<p>In La Château it is simpler for an artist to earn money. Artist's can earn money if clients buy their artwork's, people who hire them, subscribe and donate to them</p>
                            	</div>
                        	</div>
                        	<div class="acc-panel">
                            	<div class="acc-title">
                            		<span class="acc-icon"></span>
                            		<h4><strong>What are the options of an artist to receive payout?</strong></h4>
                            	</div>
                           		<div class="acc-body">
									<p>Artist may receive payouts through debit and credit.</p>
                            	</div>
                        	</div>
                        	<div class="acc-panel">
                            	<div class="acc-title">
                            		<span class="acc-icon"></span>
                            		<h4><strong>Do you have to pay for La Château?</strong></h4>
                        		</div>
                            	<div class="acc-body">
									<p>No, you will only pay La Château if you want to buy an artworks or subscribe to an artist's to access their patrion only content.</p>
                            	</div>
                        	</div>
                        	<div class="acc-panel">
                            	<div class="acc-title"><span class="acc-icon"></span>
                            		<h4><strong>How does La Château help artist?</strong></h4>
                            	</div>
                            	<div class="acc-body">
									<p>La Château help artist's by providing them a place to post their artworks to the public and to be known more to the public.</p>
                            	</div>
                        	</div>
                        	<div class="acc-panel">
                            	<div class="acc-title"><span class="acc-icon"></span>
                            		<h4><strong>What if I forgot my email and password? 
                            		How can retrieve my account?</strong></h4>
                            	</div>
                            	<div class="acc-body">
									<p>If people forgotten their username or passwords, they can simply request to the admin's and moderator's of La Château to send them an action how to retrieve their accounts.</p>
                            	</div>
                        	</div>
                        	<div class="acc-panel">
                            	<div class="acc-title"><span class="acc-icon"></span>
                            		<h4><strong>Is La Château is free to join?</strong></h4>
                            	</div>
                            	<div class="acc-body">
									<p>Yes, is not necessary for you to pay La Château, because the only thing you pay in the website are is when you buy an artwork, commission on artist, or subscribing an artist for their premium content.</p>
                            	</div>
                            </div>
                            </table>
                    	</div>				
					</div>
				</div>
			</div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>