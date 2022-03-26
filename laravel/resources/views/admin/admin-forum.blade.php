@extends('layout.admin')

@section('title-category') Форум @endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('inc.admin-aside')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Форум</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addСategoryModal">Додати Категорію</button>
                        </div>
                    </div>
                </div>

                @include('inc.messages')

                <div class="container">
                    <h5 class="d-inline">Категорії </h5><button type="button" class="btn btn-sm btn-outline-secondary mb-1 btn-add-category" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+</button>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Назва</th>
                                    <th>Функції</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm mb-1 btn-edit-category" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Редагувати</button>
                                            <button class="btn btn-danger btn-sm btn-delete-category" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Видалити</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <h5 class="text-center">Теми форму</h5>
                <div class="container">
                    @foreach($categories as $category)
                        <h5 class="d-inline">{{$category->name}} </h5><button id_category="{{$category->id}}" type="button" class="btn btn-sm btn-outline-secondary mb-1 btn-add-article" data-bs-toggle="modal" data-bs-target="#addArticleModal">+</button>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Автор</th>
                                    <th>Тема</th>
                                    <th>Контент</th>
                                    <th>Переглядів</th>
                                    <th>Коментарів</th>
                                    <th>Функції</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($topics->all()->where('id_category', $category->id) as $topic)
                                        <tr class="test">
                                            <td><a class="link-dark" href="{{route('article', $topic->id)}}">{{$topic->id}}</a></td>
                                            <td><a class="link-dark" href="{{route('user', $topic->id_author)}}">{{$topic->id_author}}</a></td>
                                            <td class="td-topic">{{$topic->topic}}</td>
                                            <td>{{mb_substr($topic->message, 0, 20) . '...'}} <div class="visually-hidden td-content">{{$topic->content}}</div></td>
                                            <td>{{$topic->views}}</td>
                                            <td>{{$topic->comments}}</td>
                                            <td class="text-center">
                                                <button id_topic="{{$topic->id}}" id_author="{{$topic->id_author}}" id_category="{{$topic->id_category}}" class="btn btn-warning btn-sm mb-1 btn-edit-article" data-bs-toggle="modal" data-bs-target="#editTopicModal">Редагувати</button>
                                                <button id_topic="{{$topic->id}}" class="btn btn-danger btn-sm btn-delete-article" data-bs-toggle="modal" data-bs-target="#deleteTopicModal">Видалити</button>
                                            </td>
                                        </tr>
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
