<?php 

	$db = new DB('test');
	$dbconn = $db->getConn();
	
	class DB{
		private $db_conn;
		function __construct($db_name)
		{
			$this->db_conn = new mysqli('localhost', 'asd', 'asd', $db_name);
			if(!$this->connect())
			{
				echo "Failed to connect to MySQL";
			}
		}

		function db_query($sql)
		{
			$res = mysqli_query($this->db_conn, $sql);
			if($res)
			{
				return $res;
			}
			else
			{
				return "error";
			}
		}

		function getConn()
		{
			return $this->db_conn;
		}

		function connect()
		{
			if($this->db_conn -> connect_errno)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		function select_all($table)
		{
			$sql = "SELECT * FROM ".$table;

			$res = mysqli_query($this->db_conn, $sql);

			return $res->fetch_all(MYSQLI_ASSOC);
		}

	}

 ?>