<?php 
	session_start();
	require_once 'processrequest.php';
	require_once 'insertData.php';
	require_once 'fetchData.php';
	require_once 'updateData.php';
	$updateData = new update;

	$requestPage = stripslashes($_GET['_mode']);
	$proccessData = new processRequest;
	$time = date('h:i:s  a');
	$date = date('d-m-Y');

	switch ($requestPage) {
		// to validate and register user into the table
		case 'registration':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $proccessData->processInput($_POST['fullname']);
				$phone = $proccessData->processInput($_POST['phone']);
				$email = $proccessData->processInput($_POST['email']);
				$regid = $proccessData->processInput($_POST['regid']);
				$password = $proccessData->processInput($_POST['password']);
				$confirmPassword = $proccessData->processInput($_POST['confirmpassword']);
				
				if (empty($name) || (!preg_match("/^[a-z A-Z]*$/", $name))) {
					$response = array('status'=>0,'input'=>"name",'message'=>"*Name is required and must contain only alphabets");
					}
				elseif (empty($phone)) {
					$response = array('status'=>0,'input'=>"phone",'message'=>"*Mobile Number is required");
					}
					elseif (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
						$response = array('status'=>0,'input'=>"email",'message'=>"*Please enter a valid email address");
						}
				elseif (empty($regid)) {
					$response = array('status'=>0,'input'=>"regid",'message'=>"*Registration Number is required");
					}
				elseif (empty($password)) {
					$response = array('status'=>0,'input'=>"password",'message'=>"*Password  is requiredkg");
					}
				elseif (empty($confirmPassword)) {
					$response = array('status'=>0,'input'=>"confirmpassword",'message'=>"Please Confirm Password");
				}
				elseif (strlen($password) < 5) {
					$response = array('status'=>0,'input'=>"password",'message'=>"*Password  is too short");
				}
				elseif ($password != $confirmPassword) {
					$response = array('status'=>0,'input'=>"name",'message'=>"Password Mismatch, password does not match with confirm password");
				}
				 else {

					$password = password_hash($password, PASSWORD_DEFAULT);

					// check and validate  a user existence in table
					$fetchData1 = new fetchData;
					$fetchResponse1 = $fetchData1->userEmailCheck($email);

					if (is_array($fetchResponse1)) {
						if(isset($fetchResponse1['status']) && $fetchResponse1['status'] === 1){
							$response = array('status'=>0,'input'=>"name",'message'=>"A User already exist with this email. ");
						} else { 
							$insertData = new insertData;
							$insertResponse = $insertData->registerStudent($name,$phone,$email,$regid,$password);

							if ($insertResponse['status']) {
								$response = array('status'=>1,'message'=>"Your registration was successful...");
										
							} else {
								$response = array('status'=>0,'message'=>$insertResponse['message']);
							}
				    }
					}
				}
			}
		break;

		// admin Login
		case "adminLogin":
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($email)) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*username is required ");
				}
				elseif (empty($password)) {
					$response =array('status'=>0, 'input'=>"password",'message'=>"*password is required");
				}

				else {
					$processRequest = new processRequest;
					$fetchData = new fetchData;
					$fetchResponse = $fetchData->adminLogin($email);
					
					if(is_array($fetchResponse)){
						if(isset($fetchResponse['status'])){
							if ($fetchResponse['status']===0) {
								$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
							}
							else if($fetchResponse['status']===1){
								$checkPass = $fetchResponse['password'];
								if (password_verify($password, $checkPass)) {
									$_SESSION['email'] = $email;
									$response =array('status'=>1, 'input'=>"details",'message'=>" Login Successful :: Details Valid");		
								}
								else{
									$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
								}
							}
						}
					}
					else{
						$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
					}
				}
			}
			else{
				$response =array('status'=>0, 'input'=>"details",'message'=>"Error loging in please refresh page and try again");
			}
		break;


		// students login
		case 'login':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);
				
				if (empty($email)) {
					$response = array('status'=>0,'input'=>"email",'message'=>"*username is required ");
				}
				elseif (empty($password)) {
					$response =array('status'=>0, 'input'=>"password",'message'=>"*password is required");
				}

				else {
					$processRequest = new processRequest;
					$fetchData = new fetchData;
					$fetchResponse = $fetchData->studentEmailCheck($email);
					
					if(is_array($fetchResponse)){
						if(isset($fetchResponse['status'])){
							if ($fetchResponse['status']===0) {
								$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
							}
							else if($fetchResponse['status']===1){
								$checkPass = $fetchResponse['password'];
								if (password_verify($password, $checkPass)) {
									$_SESSION['email'] = $email;
									$_SESSION['status']=true;
									$response =array('status'=>1, 'input'=>"details",'message'=>" Login Successful :: Details Valid");
								}
								else{
									$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
								}
							}
						}
					}
					else{
						$response =array('status'=>0, 'input'=>"details",'message'=>"username or password is incorrect");
					}
				}
			}
			else{
				$response =array('status'=>0, 'input'=>"details",'message'=>"Error loging in please refresh page and try again");
			}
		break;



		// register books into the table
		case 'registerbook':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $proccessData->processInput($_POST['name']);
				$description = $proccessData->processInput($_POST['description']);
				$author = $proccessData->processInput($_POST['author']);
				$price = $proccessData->processInput($_POST['price']);

				// upload folder
				$target_dir = "../../upload/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		    
				//Check if image file is a actual image or fake image
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {	
						$response = array('status'=>0,'input'=>"name",'message'=>"Only Images Are Allowed");
		    	}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
						$response = array('status'=>0,'input'=>"name",'message'=>"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
				}
				// Check file size
				elseif ($_FILES["fileToUpload"]["size"] > 3000000) {
				    $response = array('status'=>0,'input'=>"name",'message'=>"Sorry, THe Image Is Too Large, Image Must Not Be More Than 3MB");
				   
				}
				else {

					// insert datas into the table
					$image = basename($_FILES["fileToUpload"]["name"]);
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
					$insertData = new insertData;
					$insertResponse = $insertData->registerBooks($name,$description,$author,$price,$image);
					if ($insertResponse['status']) {
						$response = array('status'=>1,'message'=>"Book registration was successful...");				
					} else {
						$response = array('status'=>0,'message'=>$insertResponse['message']);
					}
				}
			}
		break;

		// add to cart
		case "addToCart":
			$bookid = $_POST['book_Id'];
			$book = $_POST['book_name'];
			$price = $_POST['book_price'];
			$username = $_SESSION['email']; 

			$fetchData = new fetchData;
			$checkId = $fetchData->checkProductId($bookid, $username);
			if (is_array($checkId)) {
				if (isset($checkId['status']) && $checkId['status']==1) {
					$currentDataInCart = $checkId['data'];
					foreach ($currentDataInCart as $product ) {
						$quantity = $product['quantity'];
						$id = $product['id'];
					}
					$quantity = $quantity + 1;
					$updateItemQuantity = $updateData->updateItem($id, $quantity);
					if ($updateItemQuantity['status'] && $updateItemQuantity['status']==1) {
						$response=array('status'=>1,'message'=>'Item Quantity Has Been Updated');
					}else{
						$response=array('status'=>0,'message'=>$updateItemQuantity['message']);
					}
				}else{
					$quantity = 1;
					$insertData = new insertData;
					$addNewCartItem = $insertData->addNewItem($bookid, $username,$book, $price, $quantity);
					if ($addNewCartItem['status'] && $addNewCartItem['status']==1) {
						$response=array('status'=>1,'message'=>'New Item Added to Cart');
					}else{
						$response=array('status'=>0,'message'=>$addNewCartItem['message']);
					}
				}
			}
		

		break;
		
		// add purchase to table
		case 'purchaseForm':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = $_SESSION['email']; 
				$accountName = $proccessData->processInput($_POST['accountName']);
				$bankName = $proccessData->processInput($_POST['bankName']);
				$card = $proccessData->processInput($_POST['card']);
				$cvNumbeer = $proccessData->processInput($_POST['cvNumbeer']);
				$pin = $proccessData->processInput($_POST['pin']);

				$pin = password_hash($pin, PASSWORD_DEFAULT);
				$insertData = new insertData;
				$insertResponse = $insertData->addPurchaseOrder($username, $accountName, $bankName,$card, $cvNumbeer, $pin, $time,$date);
				if ($insertResponse['status']) {
					$response = array('status'=>1,'message'=>"You have successfully purchase there books");			
				} else {
					$response = array('status'=>0,'message'=>$insertResponse['message']);
				}
			}
		break;

		// add admin to table
		case 'addAdmin':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = $proccessData->processInput($_POST['name']);
				$username = $proccessData->processInput($_POST['email']);
				$password = $proccessData->processInput($_POST['password']);

				$password = password_hash($password, PASSWORD_DEFAULT);
				$insertData = new insertData;
				$insertResponse = $insertData->addAdmin($name, $username, $password);
				if ($insertResponse['status']) {
					$response = array('status'=>1,'message'=>"You have successfully added admin");			
				} else {
					$response = array('status'=>0,'message'=>$insertResponse['message']);
				}
			}
		break;

		default:
			$response = array("status"=>0,"message"=>"Invalid Request, please check what you're doing");
		break;
	}
	 
	echo json_encode($response);
 ?>