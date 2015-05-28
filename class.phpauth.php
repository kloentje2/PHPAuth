<?php
Class PHPAuth {
	
	public $con;
	public $hostname;
	public $username;
	public $password;
	public $database;
	
	public function __construct($hostname,$username,$password,$database)
	{
		
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		
		$this->con = new mysqli($this->hostname,$this->username,$this->password,$this->database);
		
	}
	public function add_user($username,$hashed_password,$mail,$role = "user") 
	{
		
		if (trim($username) == NULL) 
		{
		
			return false;
			exit;
			
		}
		if (trim($hashed_password) == NULL) 
		{
		
			return false;
			exit;
			
		}
		if (trim($mail) == NULL) 
		{
		
			return false;
			exit;
			
		}
		
		$query_value['username'] = $this->con->real_escape_string(htmlentities($username);
		$query_value['password'] = $this->con->real_escape_string($hashed_password);
		$query_value['mail'] = $this->con->real_escape_string(htmlentities($mail));
		$query_value['role'] = $this->con->real_escape_string(htmlentities($role));
		
		$query = $this->con->query("INSERT INTO users (id,username,password,mail,role,ban) VALUES ('','".$query_value['username']."','".$query_value['password']."','".$query_value['mail']."','".$query_value['role']."','0')");
		
		if ($query == FALSE) {
			
			unset($query_value);
			return false;
			exit;
			
		} else {
			
			unset($query_value);
			return true;
			exit;
		
		}
	}
	public function ban_user($userid) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		} else {
			
			$query_value['id'] = $this->con->real_escape_string(htmlentities($userid));
			$query = $this->con->query("UPDATE users SET ban = '1' WHERE id='".$query_value['id']."'");
			
			if ($query != FALSE) {
				
				unset($query_value);
				return true;
				exit;
				
			}	else {
				
				unset($query_value);
				return false;
				exit;
				
			}
			
		}
		
	}
	public function delete_user($userid) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		} else {
			
			$query_value['id'] = $this->con->real_escape_string(htmlentities($userid));
			$query = $this->con->query("DELETE FROM users WHERE id = '".$query_value['id']."'");
			
			if ($query != FALSE) {
				
				unset($query_value);
				return true;
				exit;
				
			}	else {
				
				unset($query_value);
				return false;
				exit;
				
			}
			
		}
		
	}
	public function change_password($userid,$hashed_password) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		}
		if (trim($hashed_password) == NULL) {
			
			return false;
			exit;
			
		}
		
		$query_value['id'] = $this->con->real_escape_string(htmlentities($userid));
		$query_value['password'] = $this->con->real_escape_string($hashed_password);
		$query = $this->con->query("UPDATE users SET password = '".$query_value['password']."' WHERE id='".$query_value['id']."'");
		
		if ($query != FALSE) {

			unset($query_value);
			return true;
			exit;

		} else {
			
			unset($query_value);
			return false;
			exit;
			
		}
		
	}
	public function change_mail($userid,$mail) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		}
		if (trim($hashed_password) == NULL) {
			
			return false;
			exit;
			
		}
		
		$query_value['id'] = $this->con->real_escape_string(htmlentities($userid));
		$query_value['mail'] = $this->con->real_escape_string(htmlentities($mail));
		$query = $this->con->query("UPDATE users SET mail = '".$query_value['mail']."' WHERE id='".$query_value['id']."'");
		
		if ($query != FALSE) {

			unset($query_value);
			return true;
			exit;

		} else {
			
			unset($query_value);
			return false;
			exit;
			
		}
		
	}
	
	public function change_username($userid,$username) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		}
		if (trim($hashed_password) == NULL) {
			
			return false;
			exit;
			
		}
		
		$query_value['id'] = $this->con->real_escape_string(htmlentities($userid));
		$query_value['username'] = $this->con->real_escape_string(htmlentities($username));
		$query = $this->con->query("UPDATE users SET username = '".$query_value['username']."' WHERE id='".$query_value['id']."'");
		
		if ($query != FALSE) {

			unset($query_value);
			return true;
			exit;

		} else {
			
			unset($query_value);
			return false;
			exit;
			
		}
		
	}
	
	
	public function get_username($userid) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		}
		
		$query_value['id'] = $con->real_escape_string(htmlentities($userid));
		$query = $this->con->query("SELECT username FROM users WHERE id='".$query_value['id']."' LIMIT 1");
		$row = $query->fetch_assoc();
		return row['username'];
		
	}
	
	public function get_mail($userid) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		}
		
		$query_value['id'] = $con->real_escape_string(htmlentities($userid));
		$query = $this->con->query("SELECT mail FROM users WHERE id='".$query_value['id']."' LIMIT 1");
		$row = $query->fetch_assoc();
		return row['mail'];
		
	}
	
	public function get_password($userid) {
		
		if (trim($userid) == NULL) {
			
			return false;
			exit;
			
		}
		
		$query_value['id'] = $con->real_escape_string(htmlentities($userid));
		$query = $this->con->query("SELECT password FROM users WHERE id='".$query_value['id']."' LIMIT 1");
		$row = $query->fetch_assoc();
		return row['password'];
		
	}
	
	public function __destruct() {
		
		$this->con = NULL;
		$his->hostname = NULL;
		$this->username = NULL;
		$this->password = NULL;
		$this->database = NULL;
	
	}
}
?>
