<?php
    require_once 'header.php';
?>
    <div class="container-fluid" style="background: #fff;">
      <div class="row py-5 text-dark">
        <div class="col-md-4 offset-md-5 border pt-2 border-primary" style="box-shadow: 0px 0px 20px #000;">
          <h3 class="px-4 text-center py-3">ECBS</h3>
          <form class="px-4" id="add-admin" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleInputEmal" placeholder="Enter Name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="password" aria-describedby="emailHelp" require>
            </div>
            <div class="text-center py-3">
              <button type="submit" class="btn btn-primary w-50">Add Admin</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php
        require_once 'footer.php';
    ?>