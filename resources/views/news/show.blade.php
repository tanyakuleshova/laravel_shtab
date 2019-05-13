@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
    <section class="news-inner">

        <div class="news-inner__head">
            <small class="news-inner__category">
                Новини
            </small>
            <span class="news-inner__date">{{ $news_by_id['post_date'] }}</span>
            <p class="news-inner__region"></p>
        </div>
        <article class="news-article">
            <div class="news-article__container">
                <header class="news-article__title">{{ $news_by_id['h1'] }}</header>
                <p>{{ $news_by_id['content']}} &nbsp;</p>
                <br>
                <br>
            </div>

            <figure class="news-article__photo">
                <?php $img = $news_by_id['img']?>
                @if($img != '')
                    <img src={{asset("img/news_images/$img")}} alt="">
                @endif
                <figcaption>
                    <span class="strong">Джерело:</span>{{$news_by_id['source']}}
                </figcaption>
            </figure>
        </article>
    </section>
    <section class="news-individual">
        <h3 class="title title--about title--about-cells title--about-cells-news">
            НОВИНИ
        </h3>
    </section>
    <section id="news_content" class="news-blocks news-blocks--individual">
        <div class="news-blocks__container newsContainer">
            @foreach($all_news as $news_publication)
                <article class="news-item" id="post-" .="">
                    <?php $img = $news_publication['img']?>
                    @if($img != '')
                        <img class="news-item__photo" src={{asset("img/news_images/$img")}} alt="">
                    @endif

                    <div class="news-item__container">
                        <div class="news-item__date">{{ $news_publication['post_date'] }}</div>
                        <h4 class="news-item__title">{{ $news_publication['h1'] }}</h4>
                        <p class="news-item__info">{{ $news_publication['short_content'] }}</p>
                        <a class="news-item__details" href="{{ config('app.url') }}/news/{{ $news_publication['id'] }}">Детальніше</a>
                    </div>
                </article>
            @endforeach
        </div>
        <!--    <div class="load-more">-->
        <form action="post">
            <input name="load" id="show_more" count_show="6" count_add="3" type="button" value="Показать еще"/>
        </form>
        <!--    </div>-->
    </section>
@endsection