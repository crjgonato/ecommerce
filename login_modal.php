<div class="modal fade" id="not_loggedin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Welcome to La Château! Please login to continue.</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="#">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                <button type="button" class="btn  btn-danger btn-flat" name="deactivate" onclick=" location.href='login.php'"> Login to continue</button>
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-flat pull-left" data-dismiss="modal"> Cancel</button>
              <button type="submit" class="btn  btn-danger btn-flat" name="deactivate" > Login</button>
              </form>
            </div> -->
        </div>
    </div>
</div> 