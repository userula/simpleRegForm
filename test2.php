	<?php 
	header('Content-Type: application/json');
	
	include('DB.php');

	//$res = $db->select_all('students');

	$result = [];

	$e = $_POST['email'];

	if($e == "none")
	{
		$result['message'] = 'Fill email input';
		echo json_encode($result);
		http_response_code(403);
		exit();
	}

	$stmt = $dbconn->prepare("SELECT Email FROM students WHERE Email = ?");

    $stmt->bind_param("s", $e);

    $stmt->execute();

    $res = $stmt->get_result();

    $row = $res->fetch_assoc();	
    
    if($row != null && $row['Email'] != null)
    {
    	$result['message'] = 'Email is in use. Enter another!';
		echo (json_encode($result));
		exit();
    }
    else
    {
    	$result['message'] = 'success';
    }
	
	/*if($_POST['email'])
	{
		$e = $_POST['email'];

		foreach ($res as $key => $value) 
		{
			foreach ($value as $k => $v) 
			{
				if($e == $v)
				{
					$result['message'] = 'Email is in use. Enter another!';
					echo (json_encode($result));
					exit();
				}
			}
		}
			$result['message'] = 'success';
	}
	else
	{
		$result['message'] = 'Fill email input';
		http_response_code(403);
	}*/
	 
	echo json_encode($result);

 ?>