<?php 
	header('Content-Type: application/json');

	include('DB.php');

	//$res = $db->select_all('students');

	$result = [];

	$e = $_POST['email'];
	$p = $_POST['pass']; 

	if(!$p)
	{
		$result['message'] = 'Fill all inputs';
		http_response_code(403);
		echo json_encode($result);
		exit();
	}


	$stmt = $dbconn->prepare("SELECT * FROM students WHERE Email = ?");

    $stmt->bind_param("s", $e);

    $stmt->execute();

    $res = $stmt->get_result();

    $row = $res->fetch_assoc();
    if($row != null && $row['Email'] != null)
    {
    	if($row['Password'] == $p)
    	{
	    	$result['message'] = 'success';

	    	session_start();
	    	$id = $row['ID'];
			$e = $row['Email'];
			$p = $row['Password'];
			$f = $row['First_name']; 
		    $l = $row['Last_name'];
			$u = $row['Photo'];
			$b = $row['Birthday'];

	    	$_SESSION['signedUser'] =  ['id' => $id,
	    								'email' => $e,
	    								'pass' => $p,
	    								'fname' => $f, 
	    							    'lname' => $l,
	    								'url' => $u,
	    								'bday' => $b];

			echo (json_encode($result));
			exit();
    	}
    	else
    	{
    		$result['message'] = 'Wrong Password!!!';
			echo (json_encode($result));
			exit();
    	}
    }
    else
    {
    	$result['message'] = 'Wrong Email!!!';
    }
	
	/*if($_POST['email'] && $_POST['pass'])
	{
		$e = $_POST['email'];
		$p = $_POST['pass'];

		foreach ($res as $key => $value) 
		{
			foreach ($value as $k => $v) 
			{
				if($e == $v)
				{
					if($p == $value['Password'])
					{
						$result['message'] = 'success';
						die(json_encode($result));
					}
					else
					{
						$result['message'] = 'Wrong password!!!';
						die(json_encode($result));
					}
				}
			}
		}
		if(!$result['message'])
		{
			$result['message'] = 'There is no account';
		}
	}
	else
	{
		$result['message'] = 'Fill all inputs';
		http_response_code(403);
	}*/
	 
	echo json_encode($result);

 ?>