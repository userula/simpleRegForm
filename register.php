<?php 
	header('Content-Type: application/json');
	
	include('DB.php');

	//$res = $db->select_all('students');

	$result = [];
	
	$e = $_POST['email'];
	$p = $_POST['pass'];
	$f = $_POST['fname'];
	$l = $_POST['lname'];
	$b = $_POST['bday'];
	$u = $_POST['photo'];

	//$stmt = $dbconn->prepare("INSERT INTO students(Email, First_name, Last_name, Password, Photo, Birthday) VALUES (?, ?, ?, ?, ?, ?);");
    //$stmt->bind_param("ssssss", $e, $f, $l, $p, $u, $b);
    //$stmt->execute();
    //$res = $stmt->get_result();

	$sql = "INSERT INTO students(Email, First_name, Last_name, Password, Photo, Birthday) 
			VALUES ('".$e."', '".$f."', '".$l."', '".$p."', '".$u."', '".$b."')";
	$res = $db->db_query($sql);
    if($res)
    {
    	$result['message'] = 'success';
		echo (json_encode($result));
		exit();
    }
    else
    {
    	$result['message'] = 'error';
    }
	 
	echo json_encode($result);

 ?>