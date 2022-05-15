<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");

require_once "connect.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(!is_numeric($id)){
        echo json_encode(array("error" => "Был введен не идентификатор: \n$id"));
        die;
    }

$query = "SELECT * FROM articles WHERE id='$id'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) == "0") {
    echo json_encode(array("error" => "Новость не найдена"));
    die;
}

$row = mysqli_fetch_assoc($result);

echo json_encode(array("id" => $row['id'], "Название" => $row['Название'],
    "Лид" => $row['Лид'], "Содержание" => $row['Содержание'],
    "Рубрика" => $row['Рубрика'], "Дата" => $row['Дата']), JSON_UNESCAPED_UNICODE);
}

?>