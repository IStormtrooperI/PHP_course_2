<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");

require_once "connect.php";

if (preg_match('/[0-2][0-9]\.[0-2][0-9]\.[0-9]{4}/', $_POST['date'])) {
    $row_id = $_POST['id'];
    $row_name = $_POST['name'];
    $row_lid = $_POST['lid'];
    $row_body = $_POST['body'];
    $row_rubric = $_POST['rubric'];
    $row_date = $_POST['date'];
    $query = "UPDATE articles SET Название='$row_name',Лид='$row_lid',Содержание='$row_body',Рубрика='$row_rubric',Дата='$row_date' WHERE id='$row_id'";
    mysqli_query($link, $query);
    echo json_encode(array("success" => $row_id));
} else {
    echo json_encode(array("error" => "Некорректный формат даты"));
    die;
}

?>