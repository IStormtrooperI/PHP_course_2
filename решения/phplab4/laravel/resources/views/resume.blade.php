<html><head>
    <link rel=stylesheet href='{{asset('style.css')}}' type='text/css'>
    <title>Резюме и вакансии </title></head><body>

<div class="header"><!--*****************Логотип и шапка********************-->
    Резюме и вакансии<div id="logo"></div>
</div>

<div class="leftcol"><!--**************Основное содержание страницы************-->
    <h1>Программист</h1>


    <p class="pinline second">
        {{$fio}}<br>
        Телефон: {{$phone}}
    </p>
    <p  class="pinline third">
        Стаж:
        {{$stazh}}
    </p>

</div>

<div class="rightcol"><!--*******************Навигационное меню*******************-->
    <ul class="menu">
        <li><a href="">Вакансии</a></li>
        <li><a href="">Резюме по профессиям</a></li>
        <li><a href="">Резюме по возрасту</a></li>
        <li><a href="">Избранное резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2017</div>

</body></html>
