@extends('layout.app')

@section('title-block') Мій Хрест @endsection

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 border-bottom">
                    Статті
                </h3>
                <div class="row mb-2">
                        <div class="mb-3 category-block">
                            <a href="{{route('home')}}"><span class="badge rounded-pill bg-secondary btn-category">Всі</span></a>
                            @foreach($category->all() as $c)
                                <a href="{{route('category-articles', $c->id)}}"><span class="badge rounded-pill bg-secondary btn-category">{{$c->name}}</span></a>
                            @endforeach
                        </div>
                    <div id="articles-content">
                        @foreach($articles as $article)
                            <div class="col-md-12">
                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-success">{{$category->getNameById($article->id_category)}}</strong>
                                        <h3 class="mb-0">{{$article->subject}}</h3>
                                        <div class="mb-1 text-muted">{{$article->updated_at->format('d.m H:i')}}</div>
                                        <p class="mb-auto art-text">{{mb_substr(strip_tags($article->content), 0, 100) . '...'}}</p>
                                        <a href="{{route('article', $article->id)}}" class="stretched-link">Продовжити читати</a>
                                    </div>
                                    <div class="col-auto img-fluid art-div">
                                        <img id="art-image" class="img-thumbnail" src="{{$article->image}}" alt="{{$category->getNameById($article->id_category)}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>

            @include('inc.aside')
        </div>

    </main>
@endsection

