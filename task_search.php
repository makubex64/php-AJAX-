<?php

include ('database.php');

$search = $_POST['search'];

if (!empty($search)) {
	$query = "SELECT * FROM task WHERE name LIKE '$search%'";
	$result = mysqli_query($conn, $query);
	if (!$result) {

		die('query error ' . mysqli_err($conn));	
	}
	$json = array();
	while( $row = mysqli_fetch_array($result)){
		$json[] = array(
			'name' => $row['name'],
			'description' => $row['description'],
			'id' => $row['id']

		);

	}
	$json_string = json_encode($json);
	echo $json_string;
}