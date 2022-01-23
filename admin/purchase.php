<?php
	require_once 'header.php';
	require_once '../server/classes/fetchData.php';
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">View Available Order</a>
        </li>
        <li class="breadcrumb-item active">All Purchase Order</li>
      </ol>
      <div class="table-responsive">
      	<!-- <h3>All Recorded Students</h3> -->
      	<table class="table hoverable">
			

		    <!--Table head-->
		    <thead class="mdb-color darken-3">
		        <tr class="">
              <th>s/n</th>
							<th>Name</th>
              <th>Account Name</th>
              <th>Bank Name</th>
              <th>Card Number</th>
              <th>CV</th>
							<th>Time</th>		  
							<th>Date</th>	          
		        </tr>
		    
		    </thead>
		    <!--Table head-->

		    <!--Table body-->
		    <tbody>
		    	<?php
							$fetchData = new fetchData;
							$fetchResponse = $fetchData->displayPurchaseOrder();
							if(is_array($fetchResponse)){
								if(isset($fetchResponse['status'])){
										'<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
								}else {
									$count = 1;
									foreach($fetchResponse as $row){

					?>
		        <tr class="">
		            <td><?php echo $count; ?></td>
								<td><?php echo $row['name']?></td>
		            <td><?php echo $row['accountname']?></td>
		            <td><?php echo $row['bank']?></td>
		            <td><?php echo $row['card']?></td>
								<td><?php echo $row['cv']?></td>
								<td><?php echo $row['time']?></td>
								<td><?php echo $row['date']?></td>
		        </tr>
		        <?php 
						$count+=1;
						}}}?>
		        
		        
		    </tbody>
		    <!--Table body-->
		</table>
<!--Table-->
                                    
      </div>
