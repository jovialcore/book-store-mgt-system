<?php 
  require_once 'server/classes/fetchData.php';
  $fetchData = new fetchData;
  $fetchResponse = $fetchData->displayThreeBooks();
  if(is_array($fetchResponse)){
    if(isset($fetchResponse['status'])){
        '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
    }else {
      foreach($fetchResponse as $row){
        $image = $row['image'];
        $bookId = $row['id'];
        $bookName = $row['name'];
        $description = $row['description'];
        $author = $row['author'];
        $price = $row['price'];
?>
  <div class="col-3 col-sm-12 col-lg-3 py-3">
    <div class="card card--list">
      <div class="row">
        <div class="col-lg-12 col-sm-4">
          <div class="card__cover">
            <img src="upload/<?php echo $image?>" class="img-fluid" alt="Book cover Page"  height="20" style="object-fit: cover;width:100%;">
          </div>
        </div>
        <div class="px-3 py-1">
          <div class="px-4">
            <strong>Book Name:&nbsp;</strong><?php echo $bookName ?>
          </div>
          <div class="px-4 pt-2" style="text-align: justify;">
            <strong>Description:</strong>
            <?php echo $description ?>
          </div>
          <div class="container">
            <div class="row py-2">
              <p class="col-lg-5 col-sm-4"><strong>Author: </strong> 
              <?php echo $author ?>
              </p>
              <p class="col-lg-5 col-sm-4">Price: 
                <strong>&#8358;<?php echo $price ?></strong>
              </p>
              <p class="col-lg-2 col-sm-4">
                <span class="card__rate"><i class="fas fa-star "></i>7.9</span>
              </p>
            </div>
          </div>
          <div class="text-center pb-3">
            <?php
               if(!isset($_SESSION['status'])){
                echo "";
               }else {
                 echo "
                 <span class='float-right' style='cursor: pointer;'  onclick='addToCart(<?= $bookId ?>,<?php echo '$bookName' ?>, <?= $price ?>)'  >
                  <a class='text-dark' data-bs-toggle='tooltip' data-bs-placement='top' title='Add to Cart'>
                    Add to Cart<i class='fas fa-shopping-cart ml-3'></i>
                  </a>
                </span>
                 ";
               }
               
            ?>
            <span class="float-right" style="cursor: pointer;"  onclick='addToCart(<?= $bookId ?>,"<?php echo $bookName ?>", <?= $price ?>)'  >
              <a class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">
                Add to Cart<i class="fas fa-shopping-cart ml-3"></i>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
      
<?php 
}}}?>   