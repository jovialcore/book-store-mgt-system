<?php
	require_once('dbconnection.php');

    class update extends DbConnection{
		public function updateItem($id, $quantity){
			$sql = "UPDATE cart SET quantity = :quantity WHERE id =:id";
			$query = $this->connection->prepare($sql);
			$exec = $query->execute(array(':id'=>$id, ':quantity'=>$quantity));
			if ($query->errorCode()==0) {
				return array('status'=>1);
			}else{
				return array('status'=>0, 'message'=>$query->errorInfo());
			}
		}
	}
?>