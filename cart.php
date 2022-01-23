<?php require_once 'includes/header.php';
require_once 'server/classes/fetchData.php';
$fetchData = new fetchData;
$username = $_SESSION['email']; 
$cartItems = $fetchData->fetchUserCart($username)


?>
<!-- page title -->
<section class="section py-5 cart" data-bg="cart" style="margin-top: -24px !important;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h3 class="section__title py-5"><?php echo 'Welcome '. $username ?> </h3>
						<!-- end section title -->

						<!-- breadcrumb -->
						
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- about -->
	<section class="section py-5" style="background: #2B2B31; font-size: 14px;">
  <div class="container">
    <div class="row py-5 text-light">
      <div class="col-md-6 offset-md-3 border pt-2 border-primary" style="background: #28282D; box-shadow: 0px 0px 20px #000;">
        <h3 class="px-4 text-center py-3">Cart Summary</h3>
        <div class="container-fluid">
          <table class="table text-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Book Title</th>
                <th scope="col">Rate</th>
                <th scope="col">Quantity</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <?php

                if (is_array($cartItems)) {
                  $countAmount = 0;
                  $count = 1;
                  foreach ($cartItems as $item) {
                    // $product_id = $item['id'];
                    $product_name = $item['book'];
                    $product_price = $item['price'];
                    $quantity = $item['quantity'];
              
              
              ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $product_name ?></td>
                <td><?php echo $product_price ?></td>
                <td class="text-center"><?php echo $quantity ?></td>
                <td><strong>&#8358; </strong>
                  <?php 
                    $total = number_format(($quantity * $product_price), 2);
                    echo $total;
                    $countAmount += $quantity * $product_price
                  ?>
                </td>
              </tr>
            </tbody>
            <?php
                  $count+=1;
                  }
                }else{
                  echo '<div>No Item Added To Cart Yet</div>';
                }

              ?>
          </table>
          <div class="container">
            <div class="row pb-4">
              <div class="col-md-4"><strong>Total Amount</strong></div>
              <div class="col-md-4 offset-md-4">
                <?php
                // $countAmount
                  echo "<h2 style='display:inline;'>&#8358; ".$countAmount."</h2>";
                ?>
              </div>
            </div>
              
          </div>
        </div>
      <form class="px-4" id="purchaseForm">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Account Number</label>
          <input type="text" class="form-control" name="accountName" id="exampleInputEmal1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Bank Name</label>
          <input type="text" class="form-control" name="bankName" id="exampleInputEmail1" aria-describedby="emailHelp" require>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Card Number</label>
          <input type="text" class="form-control" name="card" id="exampleInputPassord1" require>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">CV</label>
          <input type="text" class="form-control" name="cvNumbeer" id="exampleInputPassword1" require>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Pin</label>
          <input type="text" class="form-control" name="pin" id="exampleInptPassword1" require>
        </div>
        <div class="text-center py-3">
          <button type="submit" class="btn btn-primary">Place Order Now</button>
        </div>
      </form>
      </div>
    </div>
  </div>
	</section>
	<!-- end about -->

	<!-- end how it works -->
  <?php require_once 'includes/authentic.php'; ?>


<?php require_once 'includes/footer.php'; ?>