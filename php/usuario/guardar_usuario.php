<?php session_start(); 
    
 include '../conexion.php';      
          
 		$nombre               = $_POST['name'];
 		$email                = $_POST['email'];
		$phone                = $_POST['phone'];
		$password             = $_POST['password'];
        $idusuario            = $_SESSION['email'];

 $conn = pg_connect("user=".DB_USER." password=".DB_PASS." port=".DB_PORT." dbname=".DB_NAME." host=".DB_HOST);

	try{
		if($conn){
		$result = pg_query($conn, "SELECT save_user('".$nombre."', '".$email."', '".$phone."','".$password."');");
		$fch = pg_fetch_row($result);
		
		$response["success"] = true;
		$response["message"] = $fch[0];
		echo json_encode($response);
		}
		else{
			$response["success"] = false;
			$response["message"] = "Ocurrio un error en la conexion";
			echo json_encode($response);
		}
	}catch(Exception $e){
		$response["success"] = false;
		$response["message"] = $e->getMessage();
		echo json_encode($response);
	}
	pg_close($conn);

?>
