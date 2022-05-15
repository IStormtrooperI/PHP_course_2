<html>
<head>
    <link rel=stylesheet href="{{asset('style.css')}}" type='text/css'>
    <title>{{$header}}</title></head>
<body>

<div class="header"><!--*****************Логотип и шапка********************-->
    Резюме и вакансии
    <div id="logo"></div>
</div>

<div class="message">
    {{$message}}
</div>

<div class="leftcol"><!--**************Основное содержание страницы************-->

    @if(!isset($person))
        <div class="pinline1">
            <img class="pic" src="{{asset('images/ava1.jpg')}}">
        </div>

        <p class="pinline second">
            Иванов Иван

            <br>
            Телефон:
            111111

        </p>

        <p class="pinline third">
            Программист
            <br>

            Стаж:
            10 лет

        </p>
    @else
        <div class="resume">
            <img class="pic" src="{{asset('images/'. $person->Image )}}">
            <br>
            <p class="pinline second">
                {{$person->FIO}}

                <br>
                Телефон:
                {{$person->Phone}}

            </p>
            <br>
            <p class="pinline third">
                {{$staff->staff}}
                <br>

                Стаж:
                {{$person->Stage}} лет

            </p>
        </div>
    @endif
</div>

<div class="rightcol"><!--*******************Навигационное меню*******************-->
    <ul class="menu">
        <li><a href="{{route('resumes')}}">Вакансии</a></li>
        <li><a href="{{route('resumeStaff')}}">Резюме по профессиям</a></li>
        <li><a href="{{route('resumeAge')}}">Резюме по возрасту</a></li>
        <li><a href="{{route('resumeShowMy')}}">Избранное резюме</a></li>
        <li><a href="{{route('add-content')}}">Добавить резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2017</div>

</body>
</html>
