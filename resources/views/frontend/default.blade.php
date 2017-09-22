<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> {{ setting()->meta_title }} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="content-language" content="vi" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="vi-vn" />

    <meta name="keywords" content="{{ setting()->meta_keyword }}">
    <meta name="description" content="{{ setting()->meta_description }}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ setting()->meta_title }}">
    <meta itemprop="description" content="{{ setting()->meta_description }}">
    <meta itemprop="image" content="{{ setting()->image ? setting()->image : (setting()->meta_image ? url(parse_image_url(setting()->meta_image)) : "" ) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ setting()->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    @if(setting()->image instanceof Illuminate\Support\Collection || is_array(setting()->image))
        @foreach(setting()->image as $item)
            <meta property="og:image" content="{{ $item }}" />
        @endforeach
    @else
        <meta property="og:image" content="{{ setting()->image ? setting()->image : (setting()->meta_image ? url(parse_image_url(setting()->meta_image)) : "" ) }}" />
    @endif
    <meta property="og:image:width" content="{{ config('metadata.image_width') }}">
    <meta property="og:image:height" content="{{ config('metadata.image_height') }}">
    <meta property="og:description" content="{{ setting()->meta_description }}" />
    <meta property="og:site_name" content="{{ $_SERVER['SERVER_NAME'] }}" />
    <meta property="fb:admins" content="{{ config('metadata.fb_admins') }}" />
    <meta property="fb:app_id" content="{{ config('metadata.fb_app_id') }}" />

    @yield('styles')
</head>

<body class="{{ setting()->body_class }}">
    @yield('content')
</body>
</html>