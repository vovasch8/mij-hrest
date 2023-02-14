@extends('layout.app')

@section('title-block') Альбоми @endsection

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
                                <div class="fotorama bg-light p-2" data-width="100%" data-ratio="800/600" data-allowfullscreen="true" data-nav="thumbs" data-loop="true">
                                    @foreach($album['images'] as $image)
                                        <img src="{{asset('storage') . '/albums/' . $image}}" />
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


    <script>
        lightGallery(document.getElementById('album'), {
            thumbnail: true,
        });
    </script>
@endsection

