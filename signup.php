<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page" style="height: auto;min-height: 100%;background-image: url(images/bg.jpg);background-color: #fdfdfdfa;background-repeat: no-repeat;">
<div class="register-box">
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
  	<div class="register-box-body">
    	<p class="login-box-msg">Register a new account</p>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="" autofocus required>
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value=""  required>
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="" required>
        		<!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <!-- <span class="glyphicon glyphicon-log-in form-control-feedback"></span> -->
          </div>
          <!-- <//?php
            if(!isset($_SESSION['captcha'])){
              echo '
                <di class="form-group" style="width:100%;">
                  <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
                </di>
              ';
            }
          ?> -->
          <hr>
      		<div class="row">
          <div class="col-sm-7 pull-left">
            <a href="login.php">Already have an <b>account</b></a>
          </div>
    			<div class="col-xs-5 pull-right">
          			<button type="submit" class="btn  btn-danger btn-block btn-flat " name="signup">Create</button>
        		</div>
      		</div>
    	</form>
      <br>
      <!-- <a href="login.php">I already have an account</a><br> -->
      <a href="index.php">Go to <b>La Château <b></a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>