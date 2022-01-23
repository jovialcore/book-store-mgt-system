<?php
    require_once 'header.php';
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Add Books</a>
        </li>
        <li class="breadcrumb-item active">Book Lists</li>
      </ol>
      <!-- Icon Cards-->
      <form id="bookregistration" method="POST">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Book Name:</label>
            <input type="text" class="form-control" name="name" require>
          </div>
          <div class="form-group col-md-6">
            <label for="product">Brief Description:</label>
            <input type="text" class="form-control" name="description" require>
          </div>
          <div class="form-group col-md-6">
            <label for="product">Author:</label>
            <input type="text" class="form-control" name="author" require>
          </div>
          <div class="form-group col-md-6">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" require>
          </div>
          <div class="form-group col-md-6">
            <label for="date">Cover Page:</label>
            <input type="file" class="form-control" name="fileToUpload" require>
          </div>
        </div>
		  
		  <button type="submit" name="submit" class="btn btn-primary btn-block">Add Book</button>
		</form>
       
     
        
       
      </div>
    </div>
    <?php
        require_once 'footer.php';
    ?>