<?php
    session_start();
    //session_destroy();
    //var_dump($_SESSION);



function logS($login, $bd){
 $host = "localhost";
 $database = $bd;
 $user = $login;
 $password = "mysql";
    
    
$link = @mysqli_connect($host, $user, $password, $database);
    
if(!$link){
    return("Ошибка");
} else {
    $text = array("Подключение успешно", $link);
    return($text);
}  
}

function compS($company, $link) {
    if(preg_match('/[^A-Za-z\s]/',$company)){
        return ("Введены некорректные данные");
    }
    $query = "SELECT models,images FROM tents WHERE company='$company'";
    $result = mysqli_query($link, $query);
    $rez = mysqli_fetch_assoc($result);
    if($rez ==""){
        $rez = "Введены некорректные данные";
    }
    return($rez);
    
}


function quantS($quantity, $link) {
    if(preg_match('/[^0-9]/',$quantity)){
        return ("Введены некорректные данные");
    }
    $quantity = (int)$quantity;
    $query = "SELECT description FROM tents WHERE quantity=$quantity";
    $result = mysqli_query($link, $query);
    $rez = mysqli_fetch_assoc($result);
    if($rez ==""){
        $rez = "Введены некорректные данные";
    }
    return($rez);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>lab1</title>
    <meta charset="utf-8">
</head>
<body style="border: black 3px solid; border-radius: 20px; width: 500px; min-height: 100px; padding: 5px 10px; margin: 10px auto">
    
    <?php
    
if((isset($_POST["login"]) && isset($_POST["bd"])) || (($_POST["login"]!="") || $_POST["bd"]!="")){
    $login = $_POST["login"];
    $bd = $_POST["bd"];
    
    $text = logS($login, $bd);
    echo $text[0];
    
    if($text[0] == "Подключение успешно" && !isset($_SESSION['login'])) {
        session_start(['cookie_lifetime' => 1800]);
        $_SESSION['login'] = $login;
        $_SESSION['bd'] = $bd;
    }
    
} elseif(!isset($_SESSION['login'])) {
    echo "Введите имя пользователя и имя базы данных";
} elseif(isset($_SESSION['login'])) {
        $text = logS($_SESSION['login'], $_SESSION['bd']);
        echo $text[0];
}

if(!isset($_SESSION['login'])) {
    echo "
    <form method='POST' style='margin: 5px 0px 0px 10px'>
    <label>
        Имя пользователя: 
    <input type='text' name='login'>
    </label>
    <br>
    <label>
        Имя базы данных: 
    <input type='text' name='bd'>
    </label>
    <br>
    <input type='submit' name='sub' value='Вход'>
    
    </form>
";
}
    

if(isset($_SESSION['login'])){
    echo "
    <form method='POST' style='margin: 5px 0px 0px 10px'>
    <label>
        Введите название фирмы:
    <input type='text' name='company'>
    </label>
    <br>
    <input type='submit' name='sub' value='Поиск'>
    
    </form>
    ";
    echo "
    <form method='POST' style='margin: 5px 0px 0px 10px'>
    <label>
        Введите количество мест палатки:
    <input type='text' name='quantity'>
    </label>
    <br>
    <input type='submit' name='sub' value='Поиск'>
    
    </form>
    ";
    
}
    
if(isset($_POST['company']) && $_POST['company'] != ""){
    $comp = compS($_POST['company'], $text[1]);
    if(is_array($comp)) {
        $model = $comp["models"];
         $pic = "/images/" . $comp["images"];
        
        echo "$model
        <br>
        <img src=$pic>";
    } elseif($comp != "") {
        echo $comp;
    }
}
    
    if(isset($_POST['quantity']) && $_POST['quantity'] != ""){
    $quant = quantS($_POST['quantity'], $text[1]);
    if(is_array($quant)) {
        $descript = $quant["description"];
        
        echo "$descript";
    } elseif($quant != "") {
        echo $quant;
    }
}
    
    
    
    
    
?>    

</body>
</html>

<?php






?>

