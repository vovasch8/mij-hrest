@extends('layout.forum')

@section('title-block') Форум @endsection

@section('content')
    <!-- Inner main -->
    <div class="inner-main">
    @include('inc.messages')
    <!-- Inner main header -->
        <div class="inner-main-header">
            <a id="btn-sidebar" class="nav-link nav-icon rounded-circle nav-link-faded d-md-none">
                <img src="https://img.icons8.com/material-outlined/18/000000/menu--v1.png"/>
            </a>
            <select id="sort" class="custom-select custom-select-sm w-auto mr-1" onchange="sortTopics()">
                <option value="1" selected>Останні</option>
                <option value="2">Найбільше переглядів</option>
                <option value="3">Найбільше коментарів</option>
            </select>
            <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input id="searchTopics" type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Пошук по дискусіях"/>
            </span>
        </div>
        <!-- /Inner main header -->

        <!-- Inner main body -->

        <!-- Forum List -->
        <div id="main-body" class="inner-main-body p-2 p-sm-3 collapse forum-content show">
            @foreach($topics as $topic)
                <div class="card mb-2">
                    <div class="card-body p-2 p-sm-3">
                        <div class="media forum-item">
                            <div class="media-body ml-3">
                                <a class="text-dark text-body" href="{{route('topic', $topic->id)}}"><h5 class="mt-1">{{$topic->topic}}</h5></a>
                                <span class="small">
                                        <img src="https://img.icons8.com/material-outlined/18/000000/facebook-messenger--v1.png"/>
                                        <span class="text-secondary">{{\App\Models\Topic::timeAgo($topic->created_at)}}</span>
                                </span>
                                <div class="mt-3 font-size-sm">
                                    <p>
                                        @if(strlen($topic->message) > 700)
                                            {{mb_substr($topic->message, 0, 700) . '...'}}
                                        @else
                                            {{$topic->message}}
                                        @endif
                                    </p>
                                </div>
                                <span>
                                    Створив: <a href="{{route('user', $topic->id_author)}}"  class="text-body text-muted">{{\App\Models\User::find($topic->id_author)->name}}</a>
                                </span>
                            </div>
                            <div class="text-muted small text-center align-self-center">
                                <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{$topic->views}}</span>
                                <span><i class="far fa-comment ml-2"></i> {{$topic->comments}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /Forum List -->

        <!-- /Inner main body -->
    </div>
    <!-- /Inner main -->
    <script>
        function sortTopics (){
            let id_category = $('#nav-category').attr('active-category');
            let sort = $('#sort').val();
            $.ajax({
                type:'POST',
                url:"{{ route('sortTopics') }}",
                data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_category" : id_category, "sort": sort},
                success: function (response) {
                    $('#main-body').html(response);
                }
            });
        }
        $("#searchTopics").keyup(function(event){

            if(event.keyCode == 13){
                let id_category = $('#nav-category').attr('active-category');
                let sort = $('#sort').val();
                let search = $('#searchTopics').val();
                $.ajax({
                    type:'POST',
                    url:"{{ route('searchTopics') }}",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_category" : id_category, "sort": sort, 'search': search},
                    success: function (response) {
                        $('#main-body').html(response);
                    }
                });
            }
        })
        var count = 0;
        let btn_sidebar = document.getElementById('btn-sidebar');
        btn_sidebar.addEventListener('click', function handleClick(event) {
            count++;
            if(count % 2 != 0){
                document.getElementById('forumSidebar').style.left = '0px';
                document.getElementById('forumSidebar').style.marginTop = '185px';
            }else{
                document.getElementById('forumSidebar').style.left = '-250px';
            }
        });
    </script>
@endsection
