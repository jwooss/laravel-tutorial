<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>라라벨</title>
    @yield('style')
</head>
<body>
    @yield('content')
    @yield('script')
    @include('footer')
</body>
</html>