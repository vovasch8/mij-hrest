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
                    <div class="p-3 col-lg-6 col-md-12 scale">
                        <div class="bg-dark p-2 border border-success rounded">
                            <h5 class="text-center text-light fw-bold">Фото парафії</h5>
                            <div class="fotorama bg-light p-2" data-width="100%" data-ratio="800/600" data-allowfullscreen="true" data-nav="thumbs" data-loop="true">
                                <img src="https://images.unsplash.com/photo-1510011560141-62c7e8fc7908?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib" />
                                <img src="https://images.unsplash.com/photo-1586276393635-5ecd8a851acc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                            </div>
                        </div>
                    </div>
                    <div class="p-3 col-lg-6 col-md-12 scale">
                        <div class="bg-dark p-2 border border-success rounded">
                        <h5 class="text-center text-light fw-bold">Фото дітей</h5>
                            <div class="fotorama bg-light p-2" data-width="100%" data-ratio="800/600" data-allowfullscreen="true" data-nav="thumbs" data-loop="true">
                                <img src="https://images.unsplash.com/photo-1510011560141-62c7e8fc7908?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib" />
                                <img src="https://images.unsplash.com/photo-1586276393635-5ecd8a851acc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                                <img src="https://cdn.shopify.com/s/files/1/3026/6974/files/nnnance_living_room_gallery_wall.jpg?v=1614021649" />
                            </div>
                        </div>
                    </div>
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

