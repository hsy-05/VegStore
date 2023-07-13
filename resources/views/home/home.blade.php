<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">

    <title>蔬菜購物網</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <<script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <header class="text-center">
        @include('home.navTop')
    </header>

    <div class="main">
        {{-- 幻燈片 --}}
        @include('home.carousel')

        {{-- 分類 --}}
        <div class="container" style="margin-top: 10px; margin-bottom:10px">
            {{-- <div class="col-2">
                    @include('pjNavCategory')
                </div> --}}
            <div class="row justify-content-center">
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer" style="background-color: lightblue;">
        <div class="container">
            <h3>聯絡我們</h3>
            <div>&#128338; 週一至週五 13:00-20:00 &nbsp; &nbsp; &nbsp; 每周六，日公休</div>
            <div>&#127980; 地址：XX市XX區XX路XX巷XX號</div>
            <div>&#x260E; 電話：(06)2345678</div>
            <hr>
            <div>版權所有 copyright © 2022. All Rights Reserved. </div>
        </div>
    </footer>

</body>

</html>
