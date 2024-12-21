<?php
	header("Assess-Control-Allow-Method:GET");
	header("Content-Type: application/json");
	
	include("config.php");
	
	$c1 = new Config();
	
	if($_SERVER["REQUEST_METHOD"]=="GET")
	{
		if(isset($_GET['email']))
		{
			$email = $_GET["email"];
			
			$res = $c1->readToIdEmail($email);
			$arr = [];
			
			if($res)
			{
				while ($data = mysqli_fetch_assoc($res))
				{
					array_push($arr,$data);
				}
			}else{
				$arr['err'] = "Data not found";
			}
		}else{
			$arr['err'] = "Data not found server";
		}
		
	}else{
		$arr['err'] = "Data not found";
	}
	
	echo json_encode($arr);
?>