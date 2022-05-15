<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");

require_once "connect.php";

if(isset($_POST['id'])){

$id = $_POST['id'];

$query = "DELETE FROM articles WHERE id='$id'";
mysqli_query($link, $query);
echo json_encode(array("success" => "Новость удалена"));
}

?>