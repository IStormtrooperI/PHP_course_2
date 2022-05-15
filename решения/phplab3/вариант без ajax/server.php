<?php

class DataBase
{
    protected $link;

    function __construct()
    {
        $this->link = mysqli_connect("localhost", "mysql", "mysql", "phplab2");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Credentials: true");
    }

    function first_method_id($id)
    {
        $query = "SELECT * FROM articles WHERE id='$id'";
        $result = mysqli_query($this->link, $query);

        if (mysqli_num_rows($result) == "0") {
            return "Error";
        }

        $row = mysqli_fetch_assoc($result);

        return json_encode(array("id" => $row['id'], "Название" => $row['Название'],
            "Лид" => $row['Лид'], "Содержание" => $row['Содержание'],
            "Рубрика" => $row['Рубрика'], "Дата" => $row['Дата']), JSON_UNESCAPED_UNICODE);
    }

    function second_method_date($date)
    {
        $query = "SELECT * FROM articles WHERE Дата='$date'";
        $result = mysqli_query($this->link, $query);

        if (mysqli_num_rows($result) == "0") {
            return "Error";
        }

        $news_all = array();
        $news_all['news'] = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $news = array("id" => $row['id'], "Название" => $row['Название'],
                "Лид" => $row['Лид'], "Содержание" => $row['Содержание'],
                "Рубрика" => $row['Рубрика'], "Дата" => $row['Дата']);
            array_push($news_all['news'], $news);
        }

        return json_encode($news_all, JSON_UNESCAPED_UNICODE);
    }

    function third_method_row($row){
        $row = json_decode($row,true);
        $row_name = $row['Название'];
        $row_lid = $row['Лид'];
        $row_body = $row['Содержание'];
        $row_rubric = $row['Рубрика'];
        $row_date = $row['Дата'];

        $query = "INSERT INTO articles (Название,Лид,Содержание,Рубрика,Дата) 
                VALUES('$row_name','$row_lid','$row_body','$row_rubric','$row_date')";
        mysqli_query($this->link,$query);
    }

    function fourth_method_id($id)
    {
        $query = "DELETE FROM articles WHERE id='$id'";
        mysqli_query($this->link, $query);
    }

    function fifth_method_row($row){
        $row = json_decode($row,true);
        $row_id = $row['id'];
        $row_name = $row['Название'];
        $row_lid = $row['Лид'];
        $row_body = $row['Содержание'];
        $row_rubric = $row['Рубрика'];
        $row_date = $row['Дата'];
        $query = "UPDATE articles SET Название='$row_name',Лид='$row_lid',Содержание='$row_body',Рубрика='$row_rubric',Дата='$row_date' WHERE id='$row_id'";
        mysqli_query($this->link,$query);


    }
}

?>