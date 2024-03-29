@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
<section class="main-contacts">
    <div class="contacts--main-contacts">
        <h3 class="title title--about title--about-cells title--about-cells-contacts">
            КОНТАКТИ
        </h3>
        <ul class="info info--main-contacts">
            <li class="info__item info__item--email">
                <h4>Email</h4>
                <a href="mailto:shtab.net@gmail.com">shtab.net@gmail.com</a>
            </li>
            <li class="info__item info__item--phone">
                <h4>
                    Телефон
                </h4>
                <a href="tel:+380735005022">+38 (073) 500 50 22</a>
            </li>
            <li class="info__item info__item--address">
                <h4>
                    Адреса
                </h4>
                <address>
                    01015 м. Київ, вул.<br>Московська, 41/8, оф.102
                </address>
            </li>
        </ul>
    </div>
</section>
<section class="btn-box btn-box--team">
    <small class="btn-box__head">
        Команда </small>
    <h2 class="title title--btn-box-team">
        ЗНАЙОМТЕСЬ
        <br>З НАШОЮ КОМАНДОЮ
    </h2>
    <a href="{{config('app.url')}}/about" class="btn btn--btn-box-team">
        ПРО НАС </a>
</section>
@endsection