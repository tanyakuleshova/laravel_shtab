@extends('layouts.layout')

@section('title', 'Laracode')

@section('content')
<section class="news-individual">
    <h3 class="title title--about title--about-cells title--about-cells-news">
        НОВИНИ
    </h3>
    <div class="news-individual__item">
        <div class="news-individual__container">
            <div class="news-individual__date">{{ $last_news['post_date'] }}</div>
            <h3 class="news-individual__title">{{ $last_news['h1'] }}</h3>
            <p class="news-individual__info">{{ $last_news['short_content'] }}</p>
            <a class="news-individual__details" href="/news/{{$last_news['id']}}">
                Детальніше</a>
        </div>
        <div class="news-individual__photo">
            <?php $img = $last_news['img']?>
            @if($img != '')
                <img src={{asset("img/news_images/$img")}} alt="">
            @endif
        </div>
    </div>

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
                <div class="news-item__date">{{$news_publication['post_date']}}</div>
                <h4 class="news-item__title">{{$news_publication['h1']}}</h4>
                <p class="news-item__info">{{$news_publication['short_content']}}</p>
                <a class="news-item__details" href="/news/{{$news_publication['id']}}">Детальніше</a>
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
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>

<script src= {{asset('js/ajax.load_more.news.js')}}></script>
@endsection