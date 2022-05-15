<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width"/>

    <title>Новости науки</title>

    <!-- Included CSS Files (Compressed) -->
    <style type="text/css">
        .SubmitDelete:hover {
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="{{asset('stylesheets/foundation.min.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/app.css')}}">

    <script src="{{asset('javascripts/modernizr.foundation.js')}}"></script>

    <link rel="stylesheet" href="{{asset('fonts/ligature.css')}}">

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic'
          rel='stylesheet' type='text/css'/>

    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

<!-- ######################## Main Menu ######################## -->

<nav>

    <div class="twelve columns header_nav">
        <div class="row">

            <ul id="menu-header" class="nav-bar horizontal">

                <li><a href="{{route('MainPage')}}">Главная</a></li>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                @foreach($rubrics as $key=>$rubric)
                    <li><a href="{{route('RubricsPage',['id'=>$key])}}">{{$rubric}}</a></li>
                @endforeach

            </ul>


        </div>
    </div>

</nav><!-- END main menu -->

<!-- ######################## Header (featured posts) ######################## -->

<header>


    <div class="row">

        <h1>Новости науки</h1>

</header>

<!-- ######################## Section ######################## -->

<section>

    <div class="section_main">

        <div class="row">

            <section class="eight columns">

                <h3>Новости науки</h3>

                <article class="blog_post">

                    <form method="POST" action="{{route('ArticleAddPost')}}">
                        <p>Введите новость</p>
                        <label>Название новости<br><textarea style="resize: none; height: 50px"
                                                             name="title"></textarea></label><br>

                        <label>Лид новости<br><textarea style="resize: none; height: 70px"
                                                        name="lid"></textarea></label><br>

                        <label>Контент новости<br><textarea style="resize: none; height: 100px"
                                                            name="content"></textarea></label><br>

                        <select name="rubrics">
                            <option disabled selected>Выберите рубрику</option>
                            @foreach($rubrics as $rubric)
                                <option>{{$rubric}}</option>
                            @endforeach
                        </select>

                        <br><br>

                        <select name="image">
                            <option disabled selected>Выберите аватарку</option>
                            @foreach($avatars as $avatar)
                                <option>{{$avatar->getFilename()}}</option>
                            @endforeach
                        </select>

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

                </article>

            </section>

        </div>

    </div>

</section>


<!-- ######################## Section ######################## -->

<section>

    <div class="section_dark">
        <div class="row">

            <h2></h2>

            <div class="two columns">
                <img src="{{asset('images/thumb1.jpg')}}" alt="desc"/>
            </div>

            <div class="two columns">
                <img src="{{asset('images/thumb2.jpg')}}" alt="desc"/>
            </div>

            <div class="two columns">
                <img src="{{asset('images/thumb3.jpg')}}" alt="desc"/>
            </div>

            <div class="two columns">
                <img src="{{asset('images/thumb4.jpg')}}" alt="desc"/>
            </div>

            <div class="two columns">
                <img src="{{asset('images/thumb5.jpg')}}" alt="desc"/>
            </div>

            <div class="two columns">
                <img src="{{asset('images/thumb6.jpg')}}" alt="desc"/>
            </div>


        </div>
    </div>

</section>


<!-- ######################## Footer ######################## -->

<footer>

    <div class="row">

        <div class="twelve columns footer">
            <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px">Twitter</a>
            <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px">Facebook</a>
            <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px">Pinterest</a>
            <a href="" class="lsf-icon" style="font-size:16px">Instagram</a>
        </div>

    </div>

</footer>

<!-- ######################## Scripts ######################## -->

<!-- Included JS Files (Compressed) -->
<script src="{{asset('javascripts/foundation.min.js')}}" type="text/javascript"></script>
<!-- Initialize JS Plugins -->
<script src="{{asset('javascripts/app.js')}}" type="text/javascript"></script>
</body>
</html>
