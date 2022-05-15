

//************************************index.html**********************************************************************************************************************************************************
//первая кнопка
function button_1() {
    document.location.href = "1.html";
}

//вторая кнопка
function button_2() {
    document.location.href = "2.html";
}

//третья кнопка
function button_3() {
    document.location.href = "3.html";
}

//четвертая кнопка
function button_4() {
    document.location.href = "4.html";
}

//пятая кнопка
function button_5() {
    document.location.href = "5_1.html";
}
//********************************************************************************************************************************************************************************************************
//********************************************************************************************************************************************************************************************************


//****************************Назад в меню в 1,2,3,4,5****************************************************************************************************************************************************
//Назад (Меню)
function back() {
    document.location.href = "index.html";
}
//********************************************************************************************************************************************************************************************************
//********************************************************************************************************************************************************************************************************


function first() {
    if(document.getElementById("first_id").value !="") {
        $.ajax({
            type: "GET",
            url: 'http://phplab2/1.php',
            dataType: "json",
            data: {id: document.getElementById("first_id").value},
            success: function(data){
                console.clear();
                if (data.id) {
                    document.getElementById("main").innerHTML = "<br><b>Идентификатор:</b><br>" + data.id + "<br><br>" +
                                                                "<b>Название:</b><br>" + data.Название + "<br><br>" +
                                                                "<b>Лид:</b><br>" + data.Лид + "<br><br>" +
                                                                "<b>Содержание:</b><br>" + data.Содержание + "<br><br>" +
                                                                "<b>Рубрика:</b><br>" + data.Рубрика + "<br><br>" +
                                                                "<b>Дата:</b><br>" + data.Дата+ "<br><br>";
                    console.log(data);
                } else {
                    document.getElementById("main").innerHTML = "";
                    alert(data.error);
                }
            }
        });
    }
}



function second() {
    if(document.getElementById("second_date").value !="") {
        $.ajax({
            type: "GET",
            url: 'http://phplab2/2.php',
            dataType: "json",
            data: {date: document.getElementById("second_date").value},
            success: function(data){
                console.clear();
                console.log(data);
                if (data.news) {
                    for (let i = 0; i<data.news.length;i++) {
                        document.getElementById("main").innerHTML = document.getElementById("main").innerHTML +
                            "<br><b>Идентификатор:</b><br>" + data.news[i].id + "<br><br>" +
                            "<b>Название:</b><br>" + data.news[i].Название + "<br><br>" +
                            "<b>Лид:</b><br>" + data.news[i].Лид + "<br><br>" +
                            "<b>Содержание:</b><br>" + data.news[i].Содержание + "<br><br>" +
                            "<b>Рубрика:</b><br>" + data.news[i].Рубрика + "<br><br>" +
                            "<b>Дата:</b><br>" + data.news[i].Дата+ "<br>" +
                        "_______________________________________________________";
                    }
                } else {
                    document.getElementById("main").innerHTML = "";
                    alert(data.error);
                }
            }
        });
    }
}



function third() {
    if(document.getElementById("name").value !="" && document.getElementById("lid").value !="" && document.getElementById("body").value !="" && document.getElementById("rubric").value !="" && document.getElementById("date").value !="") {
        $.ajax({
            type: "POST",
            url: 'http://phplab2/3.php',
            dataType: "json",
            data: {
                name: document.getElementById("name").value,
                lid: document.getElementById("lid").value,
                body: document.getElementById("body").value,
                rubric: document.getElementById("rubric").value,
                date: document.getElementById("date").value
            },
            success: function(data){
                console.clear();
                if (data.success) {
                    document.getElementById("main").innerHTML =
                        "<b>Название:</b><br>" + document.getElementById("name").value + "<br><br>" +
                        "<b>Лид:</b><br>" + document.getElementById("lid").value + "<br><br>" +
                        "<b>Содержание:</b><br>" + document.getElementById("body").value + "<br><br>" +
                        "<b>Рубрика:</b><br>" + document.getElementById("rubric").value + "<br><br>" +
                        "<b>Дата:</b><br>" + document.getElementById("date").value + "<br><br>";
                    alert(data.success);
                    console.log(data);
                } else {
                    document.getElementById("main").innerHTML = "";
                    alert(data.error);
                }
            }
        });
    } else {
        document.getElementById("main").innerHTML = "Не все поля заполнены !";
    }
}



function fourth() {
    if(document.getElementById("fourth_id").value !="") {
        $.ajax({
            type: "POST",
            url: 'http://phplab2/4.php',
            dataType: "json",
            data: {id: document.getElementById("fourth_id").value},
            success: function(data){
                console.clear();
                if (data.success) {
                    document.getElementById("main").innerHTML = data.success;
                    console.log(data);
                } else {
                    document.getElementById("main").innerHTML = "";
                    alert("Не удалось удалить новость");
                }
            }
        });
    }
}

function fifth_1() {
    if(document.getElementById("fifth_id").value !="") {
        $.ajax({
            type: "GET",
            url: 'http://phplab2/5.php',
            dataType: "json",
            data: {id: document.getElementById("fifth_id").value},
            success: function(data){
                console.clear();
                if (data.id) {
                    document.getElementById("main").innerHTML = data.form;
                    // document.location.href = "5_2.html";
                    document.getElementById("id").value = data.id;
                    document.getElementById("name").value = data.Название;
                    document.getElementById("lid").value = data.Лид;
                    document.getElementById("body").value = data.Содержание;
                    document.getElementById("rubric").value = data.Рубрика;
                    document.getElementById("date").value = data.Дата;
                    console.log(data);
                } else {
                    document.getElementById("main").innerHTML = "";
                    alert("Не удалось найти новость");
                }
            }
        });
    }
}



function fifth_2() {
    if(document.getElementById("name").value !="" && document.getElementById("lid").value !="" && document.getElementById("body").value !="" && document.getElementById("rubric").value !="" && document.getElementById("date").value !="") {
        $.ajax({
            type: "POST",
            url: 'http://phplab2/6.php',
            dataType: "json",
            data: {
                id: document.getElementById("id").value,
                name: document.getElementById("name").value,
                lid: document.getElementById("lid").value,
                body: document.getElementById("body").value,
                rubric: document.getElementById("rubric").value,
                date: document.getElementById("date").value
            },
            success: function(data){
                console.clear();
                if (data.success == document.getElementById("id").value) {
                    alert("Новость изменена");
                    document.getElementById("main").innerHTML = "" +
                        "<b>Идентификатор:</b><br>" + document.getElementById("id").value + "<br><br>" +
                        "<b>Название:</b><br>" + document.getElementById("name").value + "<br><br>" +
                        "<b>Лид:</b><br>" + document.getElementById("lid").value + "<br><br>" +
                        "<b>Содержание:</b><br>" + document.getElementById("body").value + "<br><br>" +
                        "<b>Рубрика:</b><br>" + document.getElementById("rubric").value + "<br><br>" +
                        "<b>Дата:</b><br>" + document.getElementById("date").value + "<br><br>";
                    console.log(data);
                } else {
                    console.log(data);
                    alert("Не удалось изменить новость\n" + data.error);
                }
            }
        });
    }
}



//Назад (Редактирование)
function back_5_1() {
    document.location.href = "5_1.html";
}