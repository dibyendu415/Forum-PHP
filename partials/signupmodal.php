<!-- edit modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signupmodal">
    Edit modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupmodalLabel">SIGN UP</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/forum/partials/handlesignup.php" method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" aria-describedby="emailHelp" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label for="cpass">Confirm Password</label>
              <input type="password" class="form-control" id="cpass" name="cpass" aria-describedby="emailHelp" placeholder="Retype password">
            </div>
            
            <button type="submit" class="btn btn-primary edt"> Signup </button>
          </form>
        </div>
      </div>
    </div>
  </div>