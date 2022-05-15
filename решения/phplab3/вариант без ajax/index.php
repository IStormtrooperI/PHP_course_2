<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
//header('Content-Type: application/json');

if (isset($_POST['menu'])) {
    $_POST = array();
}

require_once("server.php");

$DataBase = new DataBase();


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>lab2</title>
    <meta charset="utf-8">
</head>
<body style="border: black 3px solid; border-radius: 20px; width: 500px; min-height: 100px; padding: 5px 10px; margin: 10px auto">

<?php
if ($_POST != array()) {

    //region Первая функция (Выборка новости по ее идентификатору)
    if (isset($_POST['first']) || isset($_POST['first_sub'])) {
        echo 'Выборка новости по ее идентификатору.<br>Введите идентификатор новости:<br>';
        echo '
                <form method="POST"> 
                <input type="text" name="first_id">
                <input type="submit" name="first_sub" value="Ввод">
                <input type="submit" name="menu" value="Назад">
                </form>';
        if (isset($_POST['first_sub']) && is_numeric($_POST['first_id'])) {
            $news = $DataBase->first_method_id($_POST['first_id']);

            $news_id = $_POST['first_id'];

            if ($news != "Error") {
                $news = json_decode($news, true);
                $news_name = $news['Название'];
                $news_lid = $news['Лид'];
                $news_body = $news['Содержание'];
                $news_rubric = $news['Рубрика'];
                $news_date = $news['Дата'];
                echo "<b>Идентификатор:</b> $news_id <br>
                      <b>Название:</b> $news_name <br>
                      <b>Лид:</b> $news_lid<br>
                      <b>Содержание:</b> $news_body<br>
                      <b>Рубрика:</b> $news_rubric<br>
                      <b>Дата:</b> $news_date<br>";
            } else {
                echo "Новость с идентификатором [$news_id] не найдена.";
            }

        } elseif (isset($_POST['first_sub'])) {
            $first_id = $_POST['first_id'];
            echo "Введены некорректные данные: $first_id";
        }
    }
    //endregion

    //region Вторая функция (Выборка новостей по дате)
    if (isset($_POST['second']) || isset($_POST['second_sub'])) {
        echo 'Выборка новостей по дате.<br>Введите дату новости:<br>';
        echo '
                <form method="POST"> 
                <input type="text" name="second_date">
                <input type="submit" name="second_sub" value="Ввод">
                <input type="submit" name="menu" value="Назад">
                </form>';
        if (isset($_POST['second_sub'])) {
            $news_all = $DataBase->second_method_date($_POST['second_date']);

            if ($news_all != "Error") {
                $news_all = json_decode($news_all, true);


                foreach ($news_all['news'] as $news) {
                    $news_id = $news['id'];
                    $news_name = $news['Название'];
                    $news_lid = $news['Лид'];
                    $news_body = $news['Содержание'];
                    $news_rubric = $news['Рубрика'];
                    $news_date = $news['Дата'];
                    echo "<b>Идентификатор:</b> $news_id <br>
                          <b>Название:</b> $news_name <br>
                          <b>Лид:</b> $news_lid<br>
                          <b>Содержание:</b> $news_body<br>
                          <b>Рубрика:</b> $news_rubric<br>
                          <b>Дата:</b> $news_date<br><br>";
                }


            } else {
                $news_date = $_POST['second_date'];
                echo "Новости с датой [$news_date] не найдены.";
            }
        }
    }
    //endregion

    //region Третья функция (Добавление новости)
    if (isset($_POST['third']) || isset($_POST['third_sub'])) {
        echo 'Добавление новости.<br>';
        echo '
                <form method="POST"> 
                <label><input type="text" name="third_name">:Название</label><br>
                <label><input type="text" name="third_lid">:Лид</label><br>
                <label><input type="text" name="third_body">:Содержание</label><br>
                <label><input type="text" name="third_rubric">:Рубрика</label><br>
                <label><input type="text" name="third_date">:Дата(формат 00.00.0000)</label><br>
                <input type="submit" name="third_sub" value="Ввод">
                <input type="submit" name="menu" value="Назад">
                </form>';
        if (isset($_POST['third_sub'])) {
            if ($_POST['third_name'] != "" && $_POST['third_lid'] != "" && $_POST['third_body'] != "" && $_POST['third_rubric'] != "" && $_POST['third_date'] != "") {
                if (preg_match('/[0-2][0-9]\.[0-2][0-9]\.[0-9]{4}/', $_POST['third_date'])) {

                    $news = json_encode(array("Название" => $_POST['third_name'],
                        "Лид" => $_POST['third_lid'], "Содержание" => $_POST['third_body'],
                        "Рубрика" => $_POST['third_rubric'], "Дата" => $_POST['third_date']), JSON_UNESCAPED_UNICODE);

                    $DataBase->third_method_row($news);

                    echo "Добавлены данные<br>";
                    $news_name = $_POST['third_name'];
                    $news_lid = $_POST['third_lid'];
                    $news_body = $_POST['third_body'];
                    $news_rubric = $_POST['third_rubric'];
                    $news_date = $_POST['third_date'];
                    echo "
                      Название:[$news_name]<br>
                      Лид:[$news_lid]<br>
                      Содержание:[$news_body]<br>
                      Рубрика:[$news_rubric]<br>
                      Дата:[$news_date]<br>";

                } else {
                    echo "Некорректный формат даты<br>";
                    $news_name = $_POST['third_name'];
                    $news_lid = $_POST['third_lid'];
                    $news_body = $_POST['third_body'];
                    $news_rubric = $_POST['third_rubric'];
                    $news_date = $_POST['third_date'];
                    echo "
                      Название:[$news_name]<br>
                      Лид:[$news_lid]<br>
                      Содержание:[$news_body]<br>
                      Рубрика:[$news_rubric]<br>
                      Дата:[$news_date]<br>";
                }
            } else {
                $news_name = $_POST['third_name'];
                $news_lid = $_POST['third_lid'];
                $news_body = $_POST['third_body'];
                $news_rubric = $_POST['third_rubric'];
                $news_date = $_POST['third_date'];
                echo "Не все данные были введены.<br>
                      Название:[$news_name]<br>
                      Лид:[$news_lid]<br>
                      Содержание:[$news_body]<br>
                      Рубрика:[$news_rubric]<br>
                      Дата:[$news_date]<br>";
            }
        }
    }
    //endregion

    //region Четвертая функция (Удаление товара с указанным идентификатором)
    if (isset($_POST['fourth']) || isset($_POST['fourth_sub'])) {
        echo 'Удаление товара с указанным идентификатором.<br>Введите идентификатор новости:<br>';
        echo '
                <form method="POST"> 
                <input type="text" name="fourth_id">
                <input type="submit" name="fourth_sub" value="Ввод">
                <input type="submit" name="menu" value="Назад">
                </form>';
        if (isset($_POST['fourth_sub']) && is_numeric($_POST['fourth_id'])) {

            $DataBase->fourth_method_id($_POST['fourth_id']);
            echo "Данные удалены";

        } elseif (isset($_POST['fourth_sub'])) {
            $fourth_id = $_POST['fourth_id'];
            echo "Введены некорректные данные: $fourth_id";
        }
    }
    //endregion

    //region Пятая функция (Редактирование новости с указанным идентификатором)
    if (isset($_POST['fifth']) || isset($_POST['fifth_sub']) || isset($_POST['fifth_sub_second']) || isset($_POST['fifth_menu'])) {
        echo 'Редактирование новости с указанным идентификатором.<br>';

        if (isset($_POST['fifth_menu'])) {
            echo 'Введите идентификатор новости:<br>';
            $_POST = array();
        }

        if (isset($_POST['fifth'])) {
            echo 'Введите идентификатор новости:<br>';
        }

        if (!isset($_POST['fifth_id'])) {
            echo '
                    <form method="POST"> 
                    <input type="text" name="fifth_id">
                    <input type="submit" name="fifth_sub" value="Ввод">
                    <input type="submit" name="menu" value="Назад">
                    </form><br>';
        }

        if ((isset($_POST['fifth_sub']) && is_numeric($_POST['fifth_id'])) || isset($_POST['fifth_sub_second'])) {

            $news = $DataBase->first_method_id($_POST['fifth_id']);

            $news_id = $_POST['fifth_id'];

            if ($news != "Error") {
                $news = json_decode($news, true);
                $news_name = $news['Название'];
                $news_lid = $news['Лид'];
                $news_body = $news['Содержание'];
                $news_rubric = $news['Рубрика'];
                $news_date = $news['Дата'];


                if (isset($_POST['fifth_sub_second'])) {

                    if (preg_match('/[0-2][0-9]\.[0-2][0-9]\.[0-9]{4}/', $_POST['fifth_date']) && $_POST['fifth_name'] != "" && $_POST['fifth_lid'] != "" && $_POST['fifth_body'] != "" && $_POST['fifth_rubric'] != "" && $_POST['fifth_date'] != "") {

                        $news_fifth = json_encode(array("id" => $_POST['fifth_id'], "Название" => $_POST['fifth_name'],
                            "Лид" => $_POST['fifth_lid'], "Содержание" => $_POST['fifth_body'],
                            "Рубрика" => $_POST['fifth_rubric'], "Дата" => $_POST['fifth_date']), JSON_UNESCAPED_UNICODE);

                        $DataBase->fifth_method_row($news_fifth);
                        $error = "";

                    } else {
                        $error = "Error";
                    }

                    if ($error != "Error") {

                        $news_name_f = $_POST['fifth_name'];
                        $news_lid_f = $_POST['fifth_lid'];
                        $news_body_f = $_POST['fifth_body'];
                        $news_rubric_f = $_POST['fifth_rubric'];
                        $news_date_f = $_POST['fifth_date'];

                        echo "Данные изменены<br>
                        Было:<br><br>
                              <b>Идентификатор:</b> $news_id <br>
                      <b>Название:</b> $news_name <br>
                      <b>Лид:</b> $news_lid<br>
                      <b>Содержание:</b> $news_body<br>
                      <b>Рубрика:</b> $news_rubric<br>
                      <b>Дата:</b> $news_date<br>
                      
                      Стало:<br><br>
                              <b>Идентификатор:</b> $news_id <br>
                      <b>Название:</b> $news_name_f <br>
                      <b>Лид:</b> $news_lid_f<br>
                      <b>Содержание:</b> $news_body_f<br>
                      <b>Рубрика:</b> $news_rubric_f<br>
                      <b>Дата:</b> $news_date_f<br>";

                        echo "<form method='POST'>
                                <input type='submit' name='fifth_menu' value='Назад'>
                                </form>";
                        die;
                    } else {
                        $news_name = $_POST['fifth_name'];
                        $news_lid = $_POST['fifth_lid'];
                        $news_body = $_POST['fifth_body'];
                        $news_rubric = $_POST['fifth_rubric'];
                        $news_date = $_POST['fifth_date'];
                        echo "Некорректные данные<br>
                                Вы ввели:<br>
                              <b>Идентификатор:</b> $news_id <br>
                      <b>Название:</b> $news_name <br>
                      <b>Лид:</b> $news_lid<br>
                      <b>Содержание:</b> $news_body<br>
                      <b>Рубрика:</b> $news_rubric<br>
                      <b>Дата:</b> $news_date<br>";

                    }

                }


                echo "
                <form method='POST'>
                <input type='hidden' name='fifth_id' value='$news_id'>
                <label><input type='text' name='fifth_name' value='$news_name'>:Название</label><br>
                <label><input type='text' name='fifth_lid' value='$news_lid'>:Лид</label><br>
                <label><input type='text' name='fifth_body' value='$news_body'>:Содержание</label><br>
                <label><input type='text' name='fifth_rubric' value='$news_rubric'>:Рубрика</label><br>
                <label><input type='text' name='fifth_date' value='$news_date'>:Дата(формат 00.00.0000)</label><br>
                <input type='submit' name='fifth_sub_second' value='Ввод'>
                <input type='submit' name='fifth_menu' value='Назад'>
                </form>";

            } else {
                echo 'Введите идентификатор новости:<br>';
                echo '
                <form method="POST"> 
                <input type="text" name="fifth_id">
                <input type="submit" name="fifth_sub" value="Ввод">
                <input type="submit" name="menu" value="Назад">
                </form><br>';
                echo "Новость с идентификатором [$news_id] не найдена.";
            }


        } elseif (isset($_POST['fifth_sub'])) {
            $fifth_id = $_POST['fifth_id'];
            echo 'Введите идентификатор новости:<br>';
            echo '
                <form method="POST"> 
                <input type="text" name="fifth_id">
                <input type="submit" name="fifth_sub" value="Ввод">
                <input type="submit" name="menu" value="Назад">
                </form><br>';
            echo "Введены некорректные данные: $fifth_id";
        }
    }
    //endregion

} else {

    //region Вывод главного меню
    echo '  
            <form method="POST">
            <input type="submit" value="Выборка новости по ее идентификатору" name="first">
            <br>
            <input type="submit" value="Выборка новостей по дате" name="second">
            <br>
            <input type="submit" value="Добавление новости" name="third">
            <br>
            <input type="submit" value="Удаление новости с указанным идентификатором" name="fourth">
            <br>
            <input type="submit" value="Редактирование новости с указанным идентификатором" name="fifth">
            <br>
            </form>';
    //endregion

}


?>


</body>
</html>