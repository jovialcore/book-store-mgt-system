<?php
require_once('dbconnection.php');
class insertData extends DbConnection {
	
    public function registerStudent($name,$phone,$email,$regid,$password) {
        $sql = "INSERT INTO students(name, phone, email, regid,password) VALUES(:name, :phone,:email,:regid, :password)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name, ':phone'=>$phone, ':email'=>$email, ':regid'=>$regid, ':password'=>$password));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        } 
    }

    // addition of book list
    public function registerBooks($name,$description,$author,$price,$image) {
        $sql = "INSERT INTO booklists(name,description,author,price,image) VALUES(:name,:description,:author,:price,:image)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name, ':description'=>$description, ':author'=>$author, ':price'=>$price,':image'=>$image));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }        
    }

    // a books to cart
    public function addNewItem($bookid, $username,$book, $price, $quantity){
        $sql = "INSERT INTO cart (bookid, username, book, price, quantity) VALUES (:bookid, :username,:book, :price, :quantity)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':bookid'=>$bookid, ':username'=>$username,':book'=>$book, ':price'=>$price, ':quantity'=>$quantity));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    // purchase order 
    public function addPurchaseOrder($name, $accountName, $bank,$card, $cv, $pin, $time, $date){
        $sql = "INSERT INTO purchase (name, accountName, bank, card, cv, pin, time, date) VALUES (:name,:accountName, :bank,:card, :cv, :pin, :time, :date)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name,':accountName'=>$accountName, ':bank'=>$bank,':card'=>$card, ':cv'=>$cv, ':pin'=>$pin,':time'=>$time, ':date'=>$date));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    // add admin
    public function addAdmin($name, $username, $password){
        $sql = "INSERT INTO admin (name, email, password) VALUES (:name,:email, :password)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name,':email'=>$username, ':password'=>$password));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    
}
?>