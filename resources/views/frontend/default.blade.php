<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> {{ setting()->getMetaTitle() }} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/frontend.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/css/datepicker3.css" rel="stylesheet">

    @yield('styles')
</head>

<body>

<div class="nav">
    <a href="/">
        <div class="logo"></div>
    </a>
    <ul class="menu">
        <li class="btMenu">
           <a class="navbar-minimalize minimalize-styl-2 btn btn-primary tool-mobile" href="#"><i class="fa fa-bars"></i> </a>
        </li>
        <li class="menuItem">
            <a>
                <span class="header-blue-tel" id="header-hotline-link">
                    <i class="fa fa-phone rotate-phone"></i>Hotline: {{ setting()->getHotLine() }}
                </span>
            </a>
        </li>
        <li class="menuItem">
            <a href="{{ route('checkOrderInfo.index') }}">
                <span class="check_ticket"><i class="fa fa-check-square-o" aria-hidden="true"></i> Kiểm tra vé</span>
            </a>
        </li>
        {{-- <li class="menuItem"><a href="#">Tin tức</a></li> --}}
        <?php
            $page = page_repository()->getById(1);
        ?>
        <li class="menuItem"><a href="{{ route('page.detail', $page->getSlug()) }}">Liên hệ</a></li>
        {{-- <li class="menuItem">
            <a class="menuRegis" href="#">
                <span class=""><i class="fa fa-pencil" aria-hidden="true"></i> Đăng ký ngay</span>
            </a>
            <a class="menuLogin" href="#">
                <span class=""><i class="fa fa-user" aria-hidden="true"></i> Đăng nhập</span>
            </a>
        </li> --}}
    </ul>
</div>

<div class='wrapper'>

    @yield('content')


    <section id="contact" class="gray-section contact">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Liên hệ </h1>
                    <p>Liên hệ với chúng tôi để được chăm sóc một cách tốt nhất</p>
                </div>
            </div>
            <div class="row m-b-lg">
                <div class="col-lg-4 col-lg-offset-2">
                    <address>
                        <strong><span class="navy">Sapa Limousine, Inc.</span></strong><br>
                        {{ setting()->getAddress() }}
                        <abbr title="Phone">P:</abbr> {{ setting()->getPhone_1() }}
                    </address>
                </div>
                <div class="col-lg-4 col-lg-offset-0">
                    <p class="text-color">
                        Trường hợp bạn đi du lịch Sapa theo nhóm hoặc gia đình, có thể chọn thuê cả xe Limousine để đi Sapa. Xe sẽ đón trả tận nơi, đi theo giờ của mình mà không phụ thuộc nhà xe.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="m-t-sm">
                        Chúng tôi trên mạng xã hội
                    </p>
                    <ul class="list-inline social-icon">
                        <li><a href="{{ setting()->getTwitter() }}"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="{{ setting()->getFacebook() }}"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="{{ setting()->getLinkin() }}"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                    <p><strong>© 2016 SapaLimousine</strong><br> Trường hợp bạn đi du lịch Sapa theo nhóm hoặc gia đình, có thể chọn thuê cả xe Limousine để đi Sapa. Xe sẽ đón trả tận nơi, đi theo giờ của mình mà không phụ thuộc nhà xe.</p>
                </div>
            </div>
        </div>
    </section>



    </div> <!-- /WRAPPER ENDS HERE DESIGNED BY VIJAYAN PP-->
    <script type='text/javascript' src='/js/jquery.js'></script>
    <script type='text/javascript' src='/bs3/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='/js/scrollReveal.js'></script>

    <script src="/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript" src="/js/functions.js"></script>

    <script type='text/javascript'>

    jQuery(document).ready(function(){


        $('#date_added').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#date_modified').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('.ui-datepicker-trigger').datepicker({

        });


    });

    </script>

    @yield('scripts')


</body>
</html>