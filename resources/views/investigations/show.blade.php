@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
<section class="news-inner news-inner--investigation">
    <div class="news-inner__head">
        <small class="news-inner__category">
            Розслідування
        </small>
        <span class="news-inner__date">{{$investigation_by_id['post_date']}}</span>
        <p class="news-inner__region"></p>
    </div>
    <article class="news-article news-article--investigation">
        <div class="news-article__container">
            <header class="news-article__title">{{$investigation_by_id['h1']}}</header>
            <p class="news-article__main-paragraph"><em>
                    {{$investigation_by_id['content']}}</em></p>
        </div>
        <figure class="news-article__photo">
            <?php $img = $investigation_by_id['img']?>
            @if($img != '')
                <img src={{asset("img/investigation_images/$img")}} alt="">
            @endif
            <figcaption><span class="strong">Джерело:</span>{{$investigation_by_id['source']}}</figcaption>
        </figure>
    </article>
</section>
<section class="news-individual news-individual--investigation">
    <h3 class="title title--about title--about-cells title--about-cells-investigation">
        РОЗСЛІДУВАННЯ
    </h3>
</section>
<section class="news-blocks news-blocks--individual">
    <div class="news-blocks__container investigationContainer">
        @foreach($all_investigations as $investigations_publication)
        <article class="news-item" id="post-" .="">
            <?php $img = $investigations_publication['img']?>
            @if($img != '')
                <img class="news-item__photo" src={{asset("img/investigation_images/$img")}} alt="">
            @endif
            <div class="news-item__container">
                <div class="news-item__date">{{$investigations_publication['post_date']}}</div>
                <h4 class="news-item__title">{{$investigations_publication['h1']}}</h4>
                <p class="news-item__info">{{$investigations_publication['short-content']}}</p>
                <a href="{{config('app.url')}}/investigations/{{$investigations_publication['id']}}" class="news-item__details">Детальніше</a>
            </div>
        </article>
        @endforeach
    </div>
    <div class="load-more load-more--investigation">
        <span class="load-more__button load-more-js">
        БІЛЬШЕ РОЗСЛІДУВАНЬ
        </span>
    </div>
</section>
@endsection