<html><head>
    <link rel=stylesheet href="{{asset('style.css')}}" type='text/css'>
    <title>{{$header}}</title></head><body>

<div class="header"><!--*****************Логотип и шапка********************-->
    Резюме и вакансии
    <div id="logo"></div>
</div>

<div class="message">
    {{$message}}
</div>

<div class="leftcol"><!--**************Основное содержание страницы************-->


    <div class="pinline1">
        <img class="pic" src="{{asset('images/ava1.jpg')}}">
    </div>

    <p class="pinline second">
        Иванов Иван

        <br>
        Телефон:
        111111

    </p>

    <p  class="pinline third">
        Программист
        <br>

        Стаж:
        10 лет

    </p>
</div>

<div class="rightcol"><!--*******************Навигационное меню*******************-->
    <ul class="menu">
        <li><a href="">Вакансии</a></li>
        <li><a href="">Резюме по профессиям</a></li>
        <li><a href="">Избранное резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2017</div>

</body></html>
