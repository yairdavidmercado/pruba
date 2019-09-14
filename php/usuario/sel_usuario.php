<?php

include '../conexion.php';

$conn = new PDO("pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASS);

$cod = $_POST["codigo"];
$periodo = $_POST["idusuario"];


// begin transaction, this is all one process
$conn->beginTransaction();

	// call the function

	$stmt = $conn->prepare("select sel_user(:cod, :id)");

	$stmt->bindParam('cod', $cod, PDO::PARAM_INT);
	$stmt->bindParam('id', $id, PDO::PARAM_STR);
	$stmt->execute();
	$cursors = $stmt->fetchAll();
	$stmt->closeCursor();

	// get each result set
	$results = array();
	foreach($cursors as $k=>$v){
		$stmt = $conn->query('FETCH ALL IN "'. $v[0] .'";');
		$results[$k] = $stmt->fetchAll();
		$stmt->closeCursor();
	}
$conn->commit();
unset($stmt);

echo json_encode($results);
//print_r($results);// all record sets

$stmt = null; // obligado para cerrar la conexión

?>