function but_1() {
    if(document.getElementById("Town").value !=="") {
        $.ajax({
            type: "GET",
            url: 'http://localhost:63342/phppr2/1.php?Town=' + document.getElementById("Town").value,
            dataType: "json",
            success: function(data){
                console.log(data);
                console.clear();
                if (data.name === document.getElementById("Town").value) {
                    document.getElementById("main").innerHTML =
                    "<b><br><span style='color: red; font-size: 20pt'>Город: </span><span style='color: red; font-size: 20pt'>" + data.name + "</span><br><br>" +
                    "<span style='color: blue; font-size: 18pt'>Небо: </span><span style='color: red; font-size: 18pt'>" + data.weather[0].main + "</span><br>" +
                    "<span style='color: blue; font-size: 18pt'>Скорость ветра (м/с): </span><span style='color: red; font-size: 18pt'>" + data.wind.speed + "</span><br>" +
                    "<span style='color: blue; font-size: 18pt'>Температура воздуха: </span><span style='color: red; font-size: 18pt'>" + data.main.temp + "</span><br>" +
                    "<span style='color: blue; font-size: 18pt'>Атмосферное давление: </span><span style='color: red; font-size: 18pt'>" + data.main.pressure + "</span><br></b>"
                    ;
                    console.log(data);
                } else {
                    document.getElementById("main").innerHTML = "";
                    alert("Ошибка");
                }
            }
        });
    }
}


