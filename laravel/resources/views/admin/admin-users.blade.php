@extends('layout.admin')

@section('title-block') Користувачі @endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('inc.admin-aside')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Користувачі</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">

                        </div>
                    </div>
                </div>

                @include('inc.messages')

                <div class="container">
                    <div class="table-responsive">
                        <div class="pagination float-end link-dark">
                            {!! $users->links() !!}
                        </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ім'я</th>
                                    <th>Email</th>
                                    <th>Роль</th>
                                    <th>Телефон</th>
                                    <th>Адреса</th>
                                    <th>Аватар</th>
                                    <th>Функції</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><a class="link-dark" href="{{route("user", $user->id)}}">{{$user->id}}</a></td>
                                            <td class="td-name">{{$user->name}}</td>
                                            <td class="td-email">{{$user->email}}</td>
                                            <td class="td-role">{{$user->role}}</td>
                                            <td class="td-phone">{{$user->phone}}</td>
                                            <td class="td-location">{{$user->location}}</td>
                                            <td class="td-avatar">{{$user->avatar}}</td>
                                            <td class="text-center">
                                                <button id_user="{{$user->id}}" class="btn mb-1 btn-warning btn-sm btn-edit-role" data-bs-toggle="modal" data-bs-target="#editRoleModal">Змінити роль</button>
                                                <button id_user="{{$user->id}}" class="btn btn-danger btn-sm btn-delete-user mb-1" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Видалити</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('inc.modals.admin-users-modals')
@endsection
