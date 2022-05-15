<html>
<head>
    <link rel=stylesheet href='{{asset('style.css')}}' type='text/css'>
    <title>Резюме и вакансии </title></head>
<body>

<div class="header"><!--*****************Логотип и шапка********************-->
    Резюме и вакансии
    <div id="logo"></div>
</div>

<div class="leftcol"><!--**************Основное содержание страницы************-->

    @foreach($persons as $person)
        <p class="pinline second" style="border: 1px solid green; padding:10px">
            {{$person['FIO']}},
            Телефон: {{$person['Phone']}}

            <span class="pinline third">
                Стаж: {{$person['Stage']}} лет
            </span>
            <a href="{{route('resumeShow',['id'=>$person->id])}}">Подробнее</a>
        <form action="{{route('resumeDelete',['person'=>$person->id])}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Удалить">
            {{csrf_field()}}
        </form>
        </p>
    @endforeach


</div>

<div class="rightcol"><!--*******************Навигационное меню*******************-->
    <ul class="menu">
        <li><a href="{{route('resumes')}}">Вакансии</a></li>
        <li><a href="{{route('resumeStaff')}}">Резюме по профессиям</a></li>
        <li><a href="{{route('resumeAge')}}">Резюме по возрасту</a></li>
        <li><a href="{{route('resumeShowMy')}}">Избранное резюме</a></li>
        <li><a href="{{route('add-content')}}">Добавить резюме</a></li>
        <li><a href="{{route('first')}}">Вакансии со стажем 5-15 лет</a></li>
        <li><a href="{{route('second')}}">Вакансии Программистов</a></li>
        <li><a href="{{route('third')}}">Общее число резюме</a></li>
        <li><a href="{{route('fourth')}}">Представители каких профессий есть в списк резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2017</div>

</body>
</html>
