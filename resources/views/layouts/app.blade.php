<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>InProduk</title>
    @include('includes.home.style')
    @stack('prepend-style')
</head>


<body>

@yield('content')
@include('includes.home.script')
@stack('prepend-script')
</body>

</html>
