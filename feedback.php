<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>

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
                <h3 class="box-title"><b>Feedback</b></h3>
              </div>
              <div class="box-body">
                <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="price" class="col-sm-1 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="" name="title" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-1 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="" name="name" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-1 control-label">Message</label>
                    <div class="col-sm-10">
                      <textarea id="" name="msg" rows="10" cols="90" required></textarea>
                    </div>
                  </div>
                  
                  <!-- <p><b>Feedback Message</b></p>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <textarea id="" name="description" rows="10" cols="80" required></textarea>
                    </div>
                    
                  </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-flat" name="#"> Submit</button>
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
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>