<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>
<!-- Transaction History -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="date"></span>
                <span class="pull-right">Transaction #: <span id="transid"></span></span> 
              </p>
              <table class="table  ">
                <thead>
                  <th>Photos</th>
                  <th>Artwork</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="4" align="right"><b>Total</b></td>
                    <td><span id="total"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Account</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact_info']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="address" name="address"><?php echo $user['address']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bio" class="col-sm-3 control-label">Bio</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="bio" name="bio"><?php echo $user['bio']; ?></textarea>
                    </div>
                </div>
                <hr>
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> Cancel</button>
              <button type="submit" class="btn  btn-danger btn-flat" name="edit"> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Subs and Unsubs modal -->
<div class="modal fade" id="ownerartwork">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <!-- <a href="#" class="pull-right btn btn-danger"><i class="fa fa-plus"></i> Follow</a> -->
              <h4 class="modal-title"><b>Seller Profile</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="substatus_send.php" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="date_added" value="<?php echo date('Y-m-d'); ?>" >
              <input type="hidden" class="form-control" name="user_id" value="<?php echo $user['id'] ?>" >
              <input type="hidden" class="form-control" name="fullname" value="<?php echo $user['firstname'] ?><?php echo $user['lastname'] ?>" >
                <div class="">
                  <div class="box-body">
                    <div class="col-sm-3">
                      <img src="images/profile.jpg" id="photos" width="100%" style="border: solid 1px #d3d3d336; margin: 10px; "  draggable="false">
                    </div>
                    <div class="col-sm-9">
                      <div class="row">
                      
                      <button type="submit" class="btn  btn-danger btn-flat" name="subsend"> Subscribe</button>

                      <!-- <div class="col-sm-9" style="margin-top: 15px;">
                        <div class="form-group ">
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="substat" name="userid" >
                          </div>
                        </div> -->

                        <div class="col-sm-9" style="margin-top: 15px;">
                          <div class="form-group hidden">
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="userid" name="userid" readonly style="border: none;background-color: #fff;">
                            </div>
                          </div>

                          <div class="form-group">         
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="users" name="users" readonly style="border: none;background-color: #fff;">
                            </div>

                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="emails" name="emails" readonly style="border: none;background-color: #fff;">
                            </div>

                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="contacts" name="contacts" readonly style="border: none;background-color: #fff;">
                            </div>
                          </div>
                         

                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>  
              </div>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Post Artwork-->
<div class="modal fade" id="post_item">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Post an Artwork</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="post_product.php" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="date_added" value="<?php echo date('Y-m-d'); ?>" >
                <input type="hidden" class="form-control" name="users_id" value="<?php echo $user['id'] ?>" >
                <input type="hidden" class="form-control" name="users" value="<?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?>" >
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-9">
                      <!-- <input type="text" class="form-control" id="category" name="category" > -->
                      <select class="form-control input-sm" id="category" name="category_id">
                      <option selected></option>
                      <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category ORDER BY name ASC");
                        $stmt->execute();

                        foreach($stmt as $crow){
                          //$selected = ($crow['id']) ? 'selected' : ''; 
                          echo "
                            <option name='category_id' value='".$crow['id']."'>".$crow['name']."</option>
                          ";
                        }

                        $pdo->close();
                      ?>
                    </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div> -->
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
                <hr>
                
                <!-- <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> Cancel</button>
              <button type="submit" class="btn btn-danger btn-flat" name="add"> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>



<script>
$('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}



</script>