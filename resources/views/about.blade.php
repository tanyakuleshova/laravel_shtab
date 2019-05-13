@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
<section class="about">
    <h2 class="title title--about">
        ПРО НАС
    </h2>
    <div class="about__container">
        <article>
            <p><strong>Антикорупційний штаб</strong> – це громадська організація, створена влітку 2014 року. Ми ставимо собі за мету виявлення корупційних схем, розкрадань бюджету і ресурсів громади та інших корупційних порушень можновладців з метою притягнення їх до відповідальності.</p>
            <p>Наша команда вірить, що головною передумовою зменшення корупції в Україні – є нульова терпимість корупції серед тотальної більшості населення. Тому наш принцип – максимальне залучення людей до антикорупційного руху. Ми вважаємо внесок кожної людини в боротьбу з корупцією безцінним. <strong><a href="#">Дізнайтесь як стати волонтером Антикорупційного штабу.</a></strong></p>
            <p>З 2016 року організація розпочала створення регіональних антикорупційних штабів як доповнення до державної політики децентралізації. В цьому році ми плануємо відкрити щонайменше 5 регіональних штабів в різних регіонах України. Щоб ініціювати створення антикорупційного штабу у вашому регіоні, будь ласка, <strong><a href="#">сконтактуйте з нами.</a></strong></p>
        </article>
        <div class="about__image"><img class="img--about" src={{asset("img/about_img.png")}} alt=""></div>
    </div>
</section>
<section class="members">
    <h2 class="title title--about title--about-members">
        КОМАНДА
    </h2>
    <div class="members__container">
        @foreach($members as $member_info)
        <div class="member">
            <div class="member__photo">
                <?php $img = $member_info['img']?>
                @if($img != '')
                    <img src={{asset("img/members_photo/$img")}} alt="">
                @endif
            </div>
            <div class="member__info">
                <p>
                    {{$member_info['name']}}
                </p>
                <p>
                    {{$member_info['surname']}}
                </p>
                <small>
                    {{$member_info['position']}}
                </small>
                <div class="social-icons">
                    <a href="{{$member_info['facebook_link']}}" class="social-icons__item social-icons__item--facebook"></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <section class="btn-box btn-box--support">
        <h3 class="title title--btn-box-support">
            БАЖАЄШ ПІДТРИМАТИ КОМАНДУ АНТИКОРУПЦІЙНОГО ШТАБУ?
        </h3>
        <a href="{{config('app.url')}}/join_us" class="btn btn--btn-box-support">
            ПІДТРИМАТИ
        </a>
    </section>
</section>
<section class="volunteers">
    <h2 class="title title--about title--about-volunteers">
        ВОЛОНТЕРИ
    </h2>
    <div class="volunteers__container">
        @foreach($volunteers as $volunteer_info)
        <div class="volunteer">
            <?php $img = $volunteer_info['img']?>
            @if($img != '')
                <img class="volunteer__photo" src={{asset("img/volunteers_photo/$img")}} alt="">
            @endif
            <p class="volunteer__info">
                <span>
                    {{$volunteer_info['name']}}
                </span>
                <span>
                    {{$volunteer_info['surname']}}
                </span>
            </p>
        </div>
        @endforeach
    </div>
</section>
<section class="btn-box btn-box--join">
    <h3 class="title title--btn-box-join">
        ХОЧЕШ СТАТИ ЧАСТИНОЮ КОМАНДИ?
    </h3>
    <a href="{{config('app.url')}}/join_us" class="btn btn--btn-box-join">
        ДОЛУЧИТИСЬ
    </a>
</section>
<section class="news-individual">
    <h3 class="title title--about title--about-cells title--about-cells-news">
        НОВИНИ
    </h3>
</section>
<section id="news_content" class="news-blocks news-blocks--individual">
    <div class="news-blocks__container newsContainer">
        @foreach($news as $news_publication)
        <article class="news-item" id="post-" .="">
            <?php $img = $news_publication['img']?>
            @if($img != '')
                <img class="news-item__photo" src={{asset("img/news_images/$img")}} alt="">
            @endif
            <div class="news-item__container">
                <div class="news-item__date">{{$news_publication['post_date']}}</div>
                <h4 class="news-item__title">{{$news_publication['h1']}}</h4>
                <p class="news-item__info">{{$news_publication['short_content']}}</p>
                <a class="news-item__details" href="{{config('app.url')}}/news/{{$news_publication['id']}}">Детальніше</a>
            </div>
        </article>
        @endforeach
    </div>
</section>
@endsection