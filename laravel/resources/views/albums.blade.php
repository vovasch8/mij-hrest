@extends('layout.app')

@section('title-block') Мій Хрест - Альбоми @endsection

@section('seo-block')
    <meta name="description" content="Альбоми - Центр Світло Надії, Полупанівська Свята Гора.">
    <meta name="keywords" content="Альбоми Світло Надії, Фотографії Світло Надії, Фото Світло Надії, Свята Гора фото, Полупанівська свята гора фото, Центр Світло Надії, Свята Гора, допомога дітям, альбоми">
    <meta name="author" content="Mij Hrest">

    <meta property="og:url" content="https://mij-hrest.org/albums">
    <meta property="og:type" content="Page">
    <meta property="og:title" content="Мій Хрест - Альбоми">
    <meta property="og:description" content="Альбоми - Центр Світло Надії, Полупанівська Свята Гора.">
    <meta property="og:image" content="{{asset('storage') . '/images/hrest.png'}}">
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <div class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h1 class="text-center">Альбоми</h1>
                <hr>
                <div class="row">
                    @foreach($albums as $album)
                        <div class="p-3 col-lg-6 col-md-12 scale">
                            <div class="bg-dark p-2 border border-success rounded">
                                <h5 class="text-center text-light fw-bold">{{$album['name']}}</h5>
                                <div id="fotorama" class="fotorama bg-light p-2" data-width="100%" data-ratio="800/600" data-allowfullscreen="true" data-nav="thumbs" data-loop="true">
                                    @foreach($album['images'] as $image)
                                        <img src="{{asset('storage') . '/albums/' . $image}}" />
                                    @endforeach
                                    @foreach($album['videos'] as $video)
                                            <a href="{{asset('storage') . '/albums/' . $video}}" data-video="true">
                                                <img src="{{asset('storage') . '/albums/video.jpg'}}" alt="">
                                            </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('inc.aside')
        </div>
    </div>
@endsection

