<?php

require_once('dbconnection.php');


class fetchData extends DbConnection {
	// display all books from the database
    public function displayListOfBooks(){
        $sql = "SELECT * FROM booklists ORDER BY id";
        $qry = $this->connection->prepare($sql);
        $exec = $qry->execute(array());

        if($qry->errorCode() == 0){
            if ($qry->rowCount() > 0) {
                return $qry->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$qry->errorInfo()); 
        }

    }

    // display limited of four books from the database
    public function displayThreeBooks(){
        $sql = "SELECT * FROM booklists LIMIT 0,4";
        $qry = $this->connection->prepare($sql);
        $exec = $qry->execute(array());

        if($qry->errorCode() == 0){
            if ($qry->rowCount() > 0) {
                return $qry->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$qry->errorInfo()); 
        }

    }

    // display all students from the database
    public function displayAllStudents(){
        $sql = "SELECT * FROM students ORDER BY id ";
        $qry = $this->connection->prepare($sql);
        $exec = $qry->execute(array());

        if($qry->errorCode() == 0){
            if ($qry->rowCount() > 0) {
                return $qry->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$qry->errorInfo()); 
        }

    }

    // display all students from the database
    public function displayAllStaff(){
        $sql = "SELECT * FROM admin ORDER BY id ";
        $qry = $this->connection->prepare($sql);
        $exec = $qry->execute(array());

        if($qry->errorCode() == 0){
            if ($qry->rowCount() > 0) {
                return $qry->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$qry->errorInfo()); 
        }

    }
    // to check wether a user exist in the database
    public function userEmailCheck($email){
        $sql = "SELECT email FROM students WHERE email = :email";
        $qry = $this->connection->prepare($sql);
        $exec = $qry->execute(array(':email' => $email));

        if ($qry->errorCode() == 0) {
            if ($qry->rowCount() > 0) {
                $data = $qry->fetchAll(PDO::FETCH_ASSOC);
                return array('status'=>1,'data'=>$data);
            }else{
                return  array('status' => 0);
            }
        }else{
            return array('status'=>0, 'message'=>$qry->errorInfo()); 
        }
    }


    // validation of students login
    public function studentEmailCheck($email){

        $sql = "SELECT  password FROM students WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data as $row) {
                    $pass = $row['password'];
                    // echo ($pass);
                    return array('status'=>1, 'password'=>$pass);
                } 
            }else{
                return array('status'=>0, 'message'=>'User Does not exist');
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
    }

   // Admin login validation
    public function adminLogin($email){
        $sql = "SELECT  password FROM admin WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data as $row) {
                    $pass = $row['password'];
                    return array('status'=>1, 'password'=>$pass);
                } 
            }else{
                return array('status'=>0, 'message'=>'User Does not exist');
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
    }

    // update quantity of the books in cart 
    public function checkProductId($bookid, $username){
        $sql = "SELECT * FROM cart WHERE bookid = :bookid AND username = :username";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':bookid'=>$bookid, ':username'=>$username));
        if ($query->errorCode() == 0) {
            if ($query->rowCount()>0) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return array('status'=>1, 'data'=>$data);
            }else{
                return array('status'=>0);
            }
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }


    public function fetchUserCart($username){
        $sql = "SELECT * FROM cart WHERE username = :username ORDER BY id";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':username'=>$username));
        if ($query->errorCode()==0) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return 0;
            }
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    // display all purchase order from the database
    public function displayPurchaseOrder(){
        $sql = "SELECT * FROM purchase ORDER BY id";
        $qry = $this->connection->prepare($sql);
        $exec = $qry->execute(array());

        if($qry->errorCode() == 0){
            if ($qry->rowCount() > 0) {
                return $qry->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$qry->errorInfo()); 
        }

    }
}
?>