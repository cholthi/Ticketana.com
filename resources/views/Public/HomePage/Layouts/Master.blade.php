<html>

<head>

    <title>@yield('title')</title>

    @include('Shared/Layouts/ViewJavascript')

    @include('Shared.Partials.GlobalMeta')

    <!--JS-->
    {!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
    {!! Html::script('vendor/bootstrap/dist/js/bootstrap.min.js') !!}
    <!--/JS-->

    <!--Style-->
    {!!Html::style('assets/stylesheet/main.css?'.time()) !!}
    {!!Html::style('assets/stylesheet/icons/iconfont/style.css?v=3s') !!}
    {!!Html::style('assets/stylesheet/style.css?v=3s') !!}
    <!--/Style-->

    @yield('head')

</head>

<body>
    @include('Public.HomePage.Partials.Nav')
    <section id="main" role="main">

        @yield('content')

    </section>
    <div style="text-align: center; color: white">
    </div>

    @include("Shared.Partials.LangScript")
    {!! Html::script('assets/javascript/main.js') !!}
    @include('Public.HomePage.Layouts.Footer')
    @yield('footer')
</body>
@include('Shared.Partials.GlobalFooterJS')

</html>