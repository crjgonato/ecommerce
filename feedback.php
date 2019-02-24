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
                <h3 class="box-title"><b>Feedback</b></h3>
              </div>
              <div class="box-body">
                <form class="form-horizontal" method="POST" action="feedback_send.php" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="date_added" value="<?php echo date('Y-m-d'); ?>" >
                <input type="hidden" class="form-control" name="user_id" value="<?php echo $user['id'] ?>" >
                  <?php
                    if(!isset($_SESSION['user']))
                    {
                      echo '<div class="form-group">
                        <label for="name" class="col-sm-1 control-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="Guest" placeholder="Guest or Your Fullname">
                          </div>
                        </div>';
                    }
                    else // if user
                    {
                      echo '<input type="hidden" class="form-control" name="name" value="Users" >';
                    }
                  ?>
                  <div class="form-group">
                    <label for="price" class="col-sm-1 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="" name="email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price" class="col-sm-1 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="" name="title" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-1 control-label">Message</label>
                    <div class="col-sm-10">
                      <textarea id="" name="message" rows="10" cols="92" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn  btn-danger btn-flat" name="send_feedback"> Submit</button>
                  </div>
                </form>
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
</body>
</html>