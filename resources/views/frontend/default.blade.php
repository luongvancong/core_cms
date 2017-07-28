<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> {{ setting()->getMetaTitle() }} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/frontend.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/datepicker3.css" rel="stylesheet">

    @yield('styles')
</head>

<body>
    @yield('content')
</body>
</html>