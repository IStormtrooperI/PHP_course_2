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

<!-- ######################## Header ######################## -->

<header>

    <div class="row">

        @foreach($rubrics as $key=>$rubric)
            @if($rubric == $article->rubrics)
                <h4><a style="color: black; font-family: Arial"
                       href="{{route('RubricsPage',['id'=>$key])}}">{{$article->rubrics}}  [Логин: {{$user->name}}]</a></h4>
                @break
            @endif
        @endforeach

        <article>

            <div class="twelve columns">
                <h1>{{$article->title}}</h1>
                <p class="excerpt">
                    {{$article->lid}}
                </p>
            </div>

        </article>


    </div>

</header>

<!-- ######################## Section ######################## -->

<section class="section_light">


    <div class="row">


        <p><img src="{{asset('images/'. $article->image)}}" alt="desc" width=400 align=left hspace=30>

            {{$article->content}}

        </p>

    </div>

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
