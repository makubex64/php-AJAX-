<?php 
include('database.php');

$id = $_POST['id'];
$name =  $_POST['name'];
$description =  $_POST['description'];

$query = "UPDATE task SET name = '$name', description = '$description' WHERE id = '$id' ";
$result = mysqli_query($conn, $query);
if (!$result) {
	die('Query Failed');
}else{
	echo "update succesfully";
}