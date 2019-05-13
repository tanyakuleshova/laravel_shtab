@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
    <section class="banner banner--main">
        <h1 class="banner__title">
            КАРТА РЕМОНТІВ </h1>
        <p class="banner__info">
            Слідкуйте за виконанням обіцянок можновладців безпосередньо на мапі України та відстежуйте куди йдуть ваші
            гроші </p>
        <div class="banner__date">
            <a href="#">01</a>
            <span> / </span>
            <a href="#">05</a>
        </div>
        <a href="https://map.shtab.net" class="btn btn--banner">
            ПЕРЕЙТИ ДО КАРТИ </a>
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
    <section class="news">
        <div class="date-box date-box--news">

            <h2 class="date-box__title">
                ОСТАННІ НОВИНИ
            </h2>
            <div class="date-box__date">
                <p>
                    {{ date('d', strtotime($last_news['post_date'])) }}
                </p>
                <p>
                    {{ date('F', strtotime($last_news['post_date'])) }},
                    {{ date('y', strtotime($last_news['post_date'])) }}
                </p>
</div>
<a href="{{config('app.url')}}/news" class="btn btn--date-box btn--date-box-slider btn--date-box-slider-reverse">
БІЛЬШЕ НОВИН
</a>

</div>
<div class="news-slider-container">
<div class="flexslider">
<ul class="slides">
    @foreach($all_news as $item)
    <li>
        <div class="news-slider-content">
            <div class="news-slider-text">
                <small class="news-box__address">
                    {{ $item['adress'] }}</small>
                <h3 class="news-box__title">
                    {{ $item['h1'] }}
                </h3>
                <p class="news-box__news">
                    {{ $item['short_content'] }}
                </p>
                <a href="" class="read-more">Детальніше</a>
            </div>
            <div class="news-slider-image">

                @if($item['img'] != '')
                    <img src="img/news_images/{{ $item['img'] }}">
                @endif

            </div>
        </div>
    </li>
    @endforeach
</ul>
</div>
</div>
</section>
<section class="news news--investigation">
<div class="date-box date-box--news date-box--news-reverse">

<h2 class="date-box__title">
РОЗСЛІДУВАННЯ
</h2>


<div class="date-box__date">
<p>{{ date('d', strtotime($last_investigation['post_date'])) }}</p>
<p>{{ date('F', strtotime($last_investigation['post_date'])) }},
     {{ date('y', strtotime($last_investigation['post_date'])) }}</p>
</div>

<a href="{{config('app.url')}}/investigations" class="btn btn--date-box btn--date-box-slider btn--date-box-slider-reverse">
БІЛЬШЕ РОЗСЛІДУВАНЬ
</a>

</div>
<div class="investigation-slider-container">
<div class="flexslider">
<ul class="slides">
    @foreach($all_investigations as $item)
    <li>
        <div class="news-slider-content">
            <div class="news-slider-image">
                <?php $img = $item['img']?>
                @if($img != '')
                <img src={{ asset("img/investigation_images/$img") }}>
                @endif
            </div>
            <div class="news-slider-text">
                <small class="news-box__address">
                    {{ $item['adress'] }}</small>
                <h3 class="news-box__title">
                   {{ $item['h1'] }}
                </h3>
                <p class="news-box__news">
                   {{ $item['short-content'] }}
                </p>
                <a href="" class="read-more">Детальніше</a>
            </div>
        </div>
    </li>
    @endforeach
</ul>
</div>
</div>

</section>

@endsection