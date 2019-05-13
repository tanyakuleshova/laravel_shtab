@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')

    <section class="news-individual">
        <h3 class="title title--about title--about-cells title--about-cells-news">
            Результати пошуку
        </h3>
    </section>
    <section class="news-blocks news-blocks--individual">
        <p class="search-paragraph"></p>
        <div class="search_result_box news-blocks__container newsContainer">


            @if($rows)
            @foreach ($rows as $item)
            <article class="news-item" id="post-" .="">
                <?php $img = $item['img']; ?>
                @if($item['img'])
                    <img class="news-item__photo" src={{asset("img/news_images/$img")}} alt="">
                @endif

                <div class="news-item__container">
                    <div class="news-item__date">{{$item['post_date']}}</div>
                    <h4 class="news-item__title">{{$item['h1']}}</h4>
                    <p class="news-item__info">{{$item['content']}}</p>
                    <a class="news-item__details" href="{{ config('app.url') }}/news/{{ $item['id'] }}">Детальніше</a>
                </div>
            </article>
            @endforeach
                @else
            <p>Немає результатів</p>
                @endif
        </div>
    </section>

@endsection