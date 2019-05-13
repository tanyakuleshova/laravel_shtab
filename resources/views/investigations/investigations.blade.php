@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
<section class="news-individual news-individual--investigation">
    <h3 class="title title--about title--about-cells title--about-cells-investigation">
        РОЗСЛІДУВАННЯ
    </h3>
    <div class="news-individual__item">
        <div class="news-individual__container">
            <div class="news-individual__date">{{ $last_investigations['post_date'] }}</div>
            <h3 class="news-individual__title">{{ $last_investigations['h1'] }}</h3>
            <p class="news-individual__info">{{$last_investigations['short-content']}}</p>
            <a href="/shtab.php-academy.org/investigations/{{$last_investigations['id']}}" class="news-individual__details">Детальніше</a>
        </div>
        <div class="news-individual__photo">
            <?php $img = $last_investigations['img']?>
            @if($img != '')
                    <img src={{asset("img/investigation_images/$img")}} alt="">
            @endif
        </div>
    </div>
</section>
<section class="news-blocks news-blocks--individual">
    <div class="news-blocks__container investigationContainer">
        @foreach($all_investigations as $investigations)
        <article class="news-item" id="post-" .="">
            <?php $img = $investigations['img']?>
            @if($img != '')
                <img class="news-item__photo" src={{asset("img/investigation_images/$img")}} alt="">
            @endif
            <div class="news-item__container">
                <div class="news-item__date">{{$investigations['post_date']}}</div>
                <h4 class="news-item__title">{{$investigations['h1']}}</h4>
                <p class="news-item__info">{{$investigations['short-content']}}</p>
                <a href="/investigations/{{$investigations['id']}}" class="news-item__details">Детальніше</a>
            </div>
        </article>
        @endforeach
    </div>
    <div class="load-more load-more--investigation">
        <span class="load-more__button load-more-js"">
        БІЛЬШЕ РОЗСЛІДУВАНЬ
        </span>
    </div>
</section>
@endsection