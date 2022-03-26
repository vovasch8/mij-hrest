@extends('layout.admin')

@section('title-category') Статті @endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('inc.admin-aside')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Статті</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addСategoryModal">Додати Категорію</button>
                        </div>
                    </div>
                </div>

                @include('inc.messages')

                <div class="container">
                    @foreach($categories as $category)
                        <h5 class="d-inline">{{$category->name}} </h5><button id_category="{{$category->id}}" type="button" class="btn btn-sm btn-outline-secondary mb-1 btn-add-article" data-bs-toggle="modal" data-bs-target="#addArticleModal">+</button>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Тема</th>
                                    <th>Контент</th>
                                    <th>Фото</th>
                                    <th>Відео</th>
                                    <th>Функції</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    @if($article->id_category == $category->id)
                                        <tr class="test">
                                            <td><a class="link-dark" href="{{route('article', $article->id)}}">{{$article->id}}</a></td>
                                            <td class="td-subject">{{$article->subject}}</td>
                                            <td>{{mb_substr($article->content, 0, 20) . '...'}} <div class="visually-hidden td-content">{{$article->content}}</div></td>
                                            <td class="td-image">{{$article->image}}</td>
                                            <td class="td-video">{{$article->video}}</td>
                                            <td class="text-center">
                                                <button id_article="{{$article->id}}" id_category="{{$article->id_category}}" class="btn btn-warning btn-sm mb-1 btn-edit-article" data-bs-toggle="modal" data-bs-target="#editArticleModal">Редагувати</button>
                                                <button id_article="{{$article->id}}" class="btn btn-danger btn-sm btn-delete-article" data-bs-toggle="modal" data-bs-target="#deleteArticleModal">Видалити</button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
    @include('inc.modals.admin-articles-modals')
@endsection
