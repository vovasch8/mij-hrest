@extends('layout.admin')

@section('title-category') Статті @endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('inc.admin-aside')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 d-inline">Статті</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="input-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#addСategoryModal">Додати Категорію</button>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Категорія
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach($categories as $category)
                                        <li><a class="dropdown-item" href="{{route('admin-category-articles', $category->id)}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @include('inc.messages')

                <div class="container">
                        <h5 class="d-inline">{{$active->name}} </h5>
                    <button id_category="{{$active->id}}" type="button" class="btn btn-sm btn-outline-secondary mb-1 btn-add-article" data-bs-toggle="modal" data-bs-target="#addArticleModal">+</button>
                    <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Тема</th>
                                    <th>Контент</th>
                                    <th>Фото</th>
                                    <th>Відео</th>
                                    <th>Перегляди</th>
                                    <th>Джерело</th>
                                    <th>Функції</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                        <tr class="test">
                                            <td><a class="link-dark" href="{{route('article', $article->id)}}">{{$article->id}}</a></td>
                                            <td class="td-subject">{{$article->subject}}</td>
                                            <td>{{mb_substr($article->content, 0, 20) . '...'}} <div class="visually-hidden td-content">{{$article->content}}</div></td>
                                            <td class="td-image">{{$article->image}}</td>
                                            <td class="td-video">{{$article->video}}</td>
                                            <td class="td-views">{{$article->views}}</td>
                                            <td class="td-source">{{$article->source}}</td>
                                            <td class="text-center">
                                                <button id_article="{{$article->id}}" id_category="{{$article->id_category}}" class="btn btn-warning btn-sm mb-1 btn-edit-article" data-bs-toggle="modal" data-bs-target="#editArticleModal">Редагувати</button>
                                                <button id_article="{{$article->id}}" class="btn btn-danger btn-sm btn-delete-article" data-bs-toggle="modal" data-bs-target="#deleteArticleModal">Видалити</button>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-end btn-sm mt-3">
                            {!! $articles->links() !!}
                        </div>
                </div>
            </main>
        </div>
    </div>
    @include('inc.modals.admin-articles-modals')


@endsection
