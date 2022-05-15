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

        <h1>Новости науки [Логин: {{$user->name}}]</h1>

</header>

<!-- ######################## Section ######################## -->

<section>

    <div class="section_main">

        <div class="row">

            <section class="eight columns">

                <h3>Новости науки</h3>

                @foreach($articles as $article)
                    <article class="blog_post">

                        <div class="three columns">
                            <a href="{{route('ArticlePage',['id'=>$article->id])}}" class="th"><img
                                    src="{{asset('images/' . $article->image)}}"
                                    alt="desc"/></a>
                        </div>
                        <div class="nine columns">
                            <a href="{{route('ArticlePage',['id'=>$article->id])}}"><h4>{{$article->title}}</h4></a>
                            <p>{{$article->content}}</p>

                            @if($user->is_admin)
                                <div>
                                    <form action="{{route('ArticleDelete',['article'=>$article->id])}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input class="SubmitDelete" type="submit" value="Удалить"
                                               style="border: none; background-color: white; color: dodgerblue; font-size: 14pt">
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            @endif

                        </div>

                    </article>
                @endforeach

            </section>


            @if($user->is_admin)
                <section class="four columns">
                    <H3> &nbsp; </H3>
                    <div class="panel">
                        <h3>Админ-панель</h3>

                        <ul class="accordion">
                            <li class="active">
                                <div class="title">
                                    <a href="{{route('ArticleAdd')}}"><h5>Добавить статью</h5></a>
                                </div>

                            </li>
                        </ul>

                    </div>
                </section>
            @endif

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


