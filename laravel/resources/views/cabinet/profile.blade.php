@extends('layout.app')

@section('title-block')Профіль@endsection

@section('content')
    <div class="container">
        @include('inc.messages')
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset('storage') .'/users/'.Auth::user()->avatar}}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name}}</h4>
                                    <p class="text-secondary mb-1">{{ Auth::user()->email}}</p>
                                    <a href="https://bibleonline.ru/bible/ubio/"><button class="btn btn-primary">Біблія</button></a>
                                    <a href="{{route('forum')}}"><button class="btn btn-outline-primary">Форум</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            @foreach($links->where('id_block', '1') as $link)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <a class="link-dark" href="{{$link->link}}">{{$link->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Повне Ім'я</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Телефон</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Адреса</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->location}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button data-bs-toggle="modal" data-bs-target="#editProfileModal" class="btn btn-primary">Редагувати</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.modals.cabinet-profile-modals')
@endsection
