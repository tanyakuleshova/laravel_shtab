

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href= {{ asset('css/shtab.css') }}  rel="stylesheet">
    <link href= {{ asset('css/libs.css') }} rel="stylesheet">
    <link href= {{ asset('css/style.css') }} rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<header class='header'>

    <a class="logo logo--head" href="/">
        <img src={{ asset('img/logo.png') }} alt='Anticorruption'>
    </a>
    <ul id="menu-header-ukrainian-menu" class="menu menu--head">
        <li class="menu__item"><a href="/">Головна</a></li>
        <li class="menu__item"><a href="/news">Новини</a></li>
        <li class="menu__item"><a href="/support-us" id="support-us">Підтримати</a></li>
        <li class="menu__item"><a href="/about">Про нас</a></li>
        <li class="menu__item"> <a href="/investigations">Розслідування</a></li>
        <li class="menu__item"> <a href="/join-us" id="join-us">Приєднатись</a></li>
        <li class="menu__item"> <a href="/contacts">Контакти</a></li>
        <li class="menu__item"><a href="https://map.shtab.net/">Карта ремонтів</a></li>
        <li class="menu__item"><a href="https://interes.shtab.net/">Приховані інтереси</a></li>
    </ul>

    <button class="btn btn-search btn-search--head"></button>
    <div class="search-box">
        <form method = "post" action="/search" class="form form--search-box" >
            @csrf
            <input name="search" id="search" type="text"  value="" class="input input--search-box" autocomplete="off" placeholder="Пошук">
            <input type="submit" class="btn btn--search-box" value="">
            <div class="result"></div>
        </form>
    </div>

    <div class="lang-switcher lang-switcher--head">
        <select class="lang-switcher__selector">
        </select>
    </div>
</header>

<p>
    @yield('content')
</p>

<footer class='footer'>
    <div class='footer__container'>
        <!-- Блок контактов -->
        <div class='contacts'>
            <h3 class='title title--contacts'>КОНТАКТИ"; </h3>

            <!-- Email -->
            <ul class='info info--contacts'>
                <li class='info__item info__item--email'>
                    <h4>Email</h4>
                    <a href='mailto:shtab.net@gmail.com'>shtab.net@gmail.com</a>
                </li>

                <!-- Телефон-->
                <li class='info__item info__item--phone'>
                    <h4>Phone</h4>
                    <a href='tel:+380735005022'>+38 (073) 500 50 22</a>
                </li>

                <!-- Адресс -->
                <li class='info__item info__item--address'>
                    <h4>Address</h4>
                    <address>01015 м. Київ, вул.<br>Московська, 41/8, оф.102 </address>
                </li>
            </ul>
        </div>


        <!-- Блок Социалок -->
        <div class='social'>
            <h3 class='title title--social'>"МИ У СОЦМЕРЕЖАХ</h3>

            <!-- Ссылки на ФБ и Твиттер -->
            <ul class='info info--social'>
                <li class='info__item info__item--facebook'>
                    <a href='https://www.facebook.com/shtab.net/'>facebook</a>
                </li>
                <li class='info__item info__item--twitter'>
                    <a href='https://twitter.com/shtab_net'>twitter</a>
                </li>
            </ul>
        </div>


        <!-- Блок подписки на рассылку -->
        <div class='subscribe'>
            <h3 class='title title--subscribe'>ПІДПИСАТИСЬ НА ОНОВЛЕННЯ</h3>

            <!-- Форма отправки данных для рассылки обновлений -->
            <form method = "POST" onsubmit="return checkForm(this.elements)" class='form form--subscribe' action='investigations'>
                @csrf
                @include('layouts.error')
                @if (session('message_footer_subscribe'))
                    <div class="info-box">{{ session('message_footer_subscribe') }}</div>
                @endif
                <input type='text' class='input input--subscribe-name' placeholder="Ваше ім'я" name="subscribe_name"/>
                <input type='text' class='input input--subscribe-email' placeholder='Ваш Email' name="subscribe_email"/>

                <input type='submit' class='btn btn--subscribe' value=''>
            </form>



            <!-- &copy -->
            <small class='copyright copyright--subscribe'>ГО «Антикорупційний штаб» &copy; 2017
            </small>


            <!-- Закрываем футер -->
        </div>
    </div>
</footer>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>

<script>
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("{{ route('search') }}", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>

<script type= "text/javascript"  src={{ asset('js/jquery.flexslider-min.js') }}></script>
<script src= {{ asset('js/news_slider.js') }} ></script>
<script src= {{ asset('js/shtab.js') }} ></script>

</body>
</html>