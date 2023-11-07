<html>
<head>
    <title>Laravel | @yield('title', 'Home')</title>
{{--    Homeはデフォルト値--}}
</head>

<body>
@section('sidebar')
    <p>メインのサイドバー（共通部分）</p>
{{--    親レイアウトの場合は@show--}}
@show

<div id='container'>
    @yield('content')
</div>

@section('footer')
    <script src="app.js"></script>
@show
</body>
</html>
