<?php
if(isset($_GET['Town'])) {
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $_GET['Town'] . '&appid=11c0d3dc6093f7442898ee49d2430d20&units=metric';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
} else {
    echo json_encode(["error" => "error"], JSON_UNESCAPED_UNICODE);
}
?>