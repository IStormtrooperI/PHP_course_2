<html><head>
    <link rel=stylesheet href='{{asset('style.css')}}' type='text/css'>
    <title>Резюме и вакансии </title></head><body>

<div class="header"><!--*****************Логотип и шапка********************-->
    Резюме и вакансии<div id="logo"></div>
</div>

<div class="leftcol"><!--**************Основное содержание страницы************-->

    @if (isset($persons))
        <table>
            <tr><th>ФИО</th><th>Стаж</th></tr>
            @foreach($persons as $person)
                <tr><td>{{$person['FIO']}}</td><td>{{$person['Stage']}}</td></tr>
            @endforeach
        </table>
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

</body></html>
