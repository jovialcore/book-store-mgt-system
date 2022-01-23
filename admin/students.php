<?php
	require_once 'header.php';
	require_once '../server/classes/fetchData.php';
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">View Available Students</a>
        </li>
        <li class="breadcrumb-item active">All Books</li>
      </ol>
      <div class="table-responsive">
      	<h3>All Recorded Students</h3>
      	<table class="table hoverable">
			

		    <!--Table head-->
		    <thead class="mdb-color darken-3">
		        <tr class="">
              <th>s/n</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Reg Number</th>		            
		        </tr>
		    
		    </thead>
		    <!--Table head-->

		    <!--Table body-->
		    <tbody>
		    	<?php
							$fetchData = new fetchData;
							$fetchResponse = $fetchData->displayAllStudents();
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
		            <td><?php echo $row['phone']?></td>
		            <td><?php echo $row['email']?></td>
								<td><?php echo $row['regid']?></td>
		        </tr>
		        <?php 
						$count+=1;
						}}}?>
		        
		        
		    </tbody>
		    <!--Table body-->
		</table>
<!--Table-->
                                    
      </div>
