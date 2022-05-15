<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");

require_once "connect.php";


if (preg_match('/[0-2][0-9]\.[0-2][0-9]\.[0-9]{4}/', $_POST['date'])) {
    $row_name = $_POST['name'];
    $row_lid = $_POST['lid'];
    $row_body = $_POST['body'];
    $row_rubric = $_POST['rubric'];
    $row_date = $_POST['date'];

    $query = "INSERT INTO articles (Название,Лид,Содержание,Рубрика,Дата) 
                VALUES('$row_name','$row_lid','$row_body','$row_rubric','$row_date')";
    mysqli_query($link,$query);
    echo json_encode(array("success" => "Новость добавлена"));
} else {
    echo json_encode(array("error" => "Дата задана не в правильном формате\nНовость не записана"));
    die;
}

?>