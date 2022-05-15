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
        "Рубрика" => $row['Рубрика'], "Дата" => $row['Дата'], "form" => "<form method='POST'>
    Редактирование новости с указанным идентификатором.<br>
    <input type='hidden' name='fifth_id' readonly id='id'>
    <label><input type='text' name='fifth_name' id='name'>:Название</label><br>
    <label><input type='text' name='fifth_lid' id='lid'>:Лид</label><br>
    <label><input type='text' name='fifth_body' id='body'>:Содержание</label><br>
    <label><input type='text' name='fifth_rubric' id='rubric'>:Рубрика</label><br>
    <label><input type='text' name='fifth_date' id='date'>:Дата(формат 00.00.0000)</label><br>
    <input type='button' name='fifth_sub_second' onclick='fifth_2()' value='Ввод'>
</form>"), JSON_UNESCAPED_UNICODE);

}

?>