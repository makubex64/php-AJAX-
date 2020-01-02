<?php 

include('database.php');

$id = $_POST['id'];
$query = "SELECT * FROM task WHERE id = $id ";
$result = mysqli_query($conn, $query);

if (!$result) {
	die('query failed');
}else{

	$json = array();
	while($row = mysqli_fetch_array($result)){
		$json[] = array(
			'name' => $row['name'],
			'description' => $row['description'],
			'id' => $row['id']
		);

	}
	$json_string = json_encode($json[0]);
	echo $json_string;
}