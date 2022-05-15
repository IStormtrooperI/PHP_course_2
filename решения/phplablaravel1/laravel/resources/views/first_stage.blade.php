<html><head>
    <link rel=stylesheet href='{{asset('style.css')}}' type='text/css'>
    <title>Резюме и вакансии </title></head><body>

<div class="header"><!--*****************Логотип и шапка********************-->
    Резюме и вакансии<div id="logo"></div>
</div>

<div class="leftcol"><!--**************Основное содержание страницы************-->

    @if (isset($persons))
        <table>
            <tr><th>ФИО</th></tr>
            @foreach($persons as $person)
            <tr><td>{{$person['FIO']}}</td></tr>
            @endforeach
        </table>
    @endif

</div>

<div class="rightcol"><!--*******************Навигационное меню*******************-->
    <ul class="menu">
        <li><a href="{{route('resumes')}}">Назад</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2017</div>

</body></html>
