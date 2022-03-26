@extends('layout.admin')

@section('title-block') Головна @endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('inc.admin-aside')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Головна</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addBlockModal">Додати блок</button>
                        </div>
                    </div>
                </div>

                @include('inc.messages')

                <div class="container">
                    @foreach($blocks as $block)
                        <h5 class="d-inline">#{{$block->id}} - {{$block->name}} </h5><button id_block="{{$block->id}}" type="button" class="btn btn-sm btn-outline-secondary mb-1 btn-add-link" data-bs-toggle="modal" data-bs-target="#addLinkModal">+</button>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th>Посилання</th>
                                        <th>Сортування</th>
                                        <th>Функції</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($links as $link)
                                        @if($link->id_block == $block->id)
                                            <tr class="test">
                                                <td>{{$link->id}}</td>
                                                <td class="td-name">{{$link->name}}</td>
                                                <td class="td-link">{{$link->link}}</td>
                                                <td class="td-sort">{{$link->sort}}</td>
                                                <td class="text-center">
                                                    <button id_link="{{$link->id}}" id_block="{{$link->id_block}}" class="btn mb-1 btn-warning btn-sm btn-edit-link" data-bs-toggle="modal" data-bs-target="#editLinkModal">Редагувати</button>
                                                    <button id_link="{{$link->id}}" class="btn btn-danger btn-sm btn-delete-link mb-1" data-bs-toggle="modal" data-bs-target="#deleteLinkModal">Видалити</button>
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
    @include('inc.modals.admin-home-modals')
@endsection
