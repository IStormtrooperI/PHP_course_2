<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");

require_once "connect.php";


if (isset($_GET['date'])) {
    $date = $_GET['date'];

    $query = "SELECT * FROM articles WHERE Дата='$date'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == "0") {
        echo json_encode(array("error" => "Новости не найдена"));
        die;
    }
    $news_all = array();
    $news_all['news'] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $news = array("id" => $row['id'], "Название" => $row['Название'],
            "Лид" => $row['Лид'], "Содержание" => $row['Содержание'],
            "Рубрика" => $row['Рубрика'], "Дата" => $row['Дата']);
        array_push($news_all['news'], $news);
    }
    echo json_encode($news_all, JSON_UNESCAPED_UNICODE);
}

?>