<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="height: auto;min-height: 100%;background-image: url(images/bg.jpg);background-color: #fdfdfdfa;background-repeat: no-repeat;">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to your account</p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
        		<!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
          </div>
      		<div class="row">
          <div class="col-sm-7 pull-left">
            <a href="signup.php">Register a <b>new account</b></a>
          </div>
    			<div class="col-xs-4 pull-right">
          			<button type="submit" class="btn  btn-danger btn-block btn-flat" name="login">Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <!-- <a href="password_forgot.php">I forgot my password</a><br> -->
      <!-- <a href="signup.php" class="text-center">Register a new account</a><br> -->
      <a href="index.php">Go to <b>La Château <b></a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>