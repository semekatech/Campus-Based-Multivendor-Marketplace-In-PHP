<?php
class cls_func{
	
	public function con(){
		$connect = new dbconfig();
		return $connect->connection();
	}

	public function view_account_info(){
		$result = $this->con()->query("SELECT * FROM students");
		return $result;
	}
	//account delete quary

	}
	?>