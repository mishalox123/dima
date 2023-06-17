<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/one_news.css')}}">
    <link rel="shortcut icon" href="{{asset('img/etc/logo.png')}}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>{{$news[0]->title_name}}</title>
</head>
<body>

@include('blocks/header')

@foreach($news as $one_news)
<div class="feed-pic">
    <div class="feed-container-pic">
        <p style="color: white; font-size: 40px; font-weight: bolder">{{$one_news->title_name}}</p>
    </div>
</div>
<div class="feed-container">
    <div class="feed-main">
        <div class="link"><div style="display: flex"><a href="{{url('/')}}" class="a-link">Главная</a>&nbsp / &nbsp<a href="{{url('/news')}}" class="a-link">Все новости</a>&nbsp / &nbsp</div><a style="color: #3a713b">{{$one_news->title_name}}</a></div>
        <div class="feed-block">
            <img src="{{asset($one_news->img_news)}}" class="img-feed">
            <div class="news-italic">
                <p style="font-size: 25px; font-style: italic; margin-bottom: 10px">{{$one_news->des1}}</p>
                <p style="font-size: 18px; color: #3a713b">{{$one_news->date}}</p>
            </div>
            <div style="margin-top: 25px; font-size: 18px;">
                {!!$one_news->des2!!}
            </div>
        </div>
        <div class="oneline"><div class="btn-other-feed">Другие новости</div><a href="{{url('/news')}}" class="a-allfeed">Все новости</a></div>
        <div style="display: flex; flex-flow: column">
            <div class="news-container">
                @include('blocks/news_container')
            </div>
        </div>
    </div>
</div>
@endforeach
@include('blocks/footer')

<!--<script src="assets/js/jquery-3.6.1.min.js"></script>-->
<!--<script src="assets/js/feed-lenght.js"></script>-->

</body>
</html>
