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


    <form method="POST" action="{{route('resumeStore')}}">
        <p>Введите данные резюме</p>
        <label><input type="text" name="FIO"> :ФИО</label><br>

        <!--<label><input type="text" name="Staff"> :Должность</label><br>-->

        <select name="Staff">
            <option disabled selected>Выберите должность</option>
            @foreach($s as $staff)
                <option value="{{$staff['id']}}">{{$staff['staff']}}</option>
            @endforeach
        </select><br>

        <label><input type="text" name="Phone"> :Телефон</label><br>

        <label><input type="text" name="Stage"> :Стаж</label><br>

        <select name="Image">
            <option disabled selected>Выберите аватарку</option>
            @foreach($avatars as $avatar)
                <option value="{{$avatar->getFilename()}}">{{$avatar->getFilename()}}</option>
            @endforeach
        </select>

        {{--        <label><input type="file" name="Image"> :Image</label><br>--}}

        <br><br><input type="submit" value="Ввод">
        {{ csrf_field() }}
    </form>

    @if(count($errors)>0)
        <div class="error" style="color:red">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
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
