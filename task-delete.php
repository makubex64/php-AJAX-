<?php 

include('database.php');

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$query = "DELETE FROM task WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die('query failed');
	}else{
		echo "delete successfully";
	}
}

