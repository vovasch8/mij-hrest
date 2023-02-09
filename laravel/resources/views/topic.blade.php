@extends('layout.forum')

@section('title-block') {{$topic->topic}} @endsection

@section('content')
    <!-- Inner main -->
    <div class="inner-main">
    @include('inc.messages')
    <!-- Inner main header -->
        <div class="inner-main-header">
            <a id="btn-sidebar" class="nav-link nav-icon rounded-circle nav-link-faded d-md-none" href="#" data-toggle="inner-sidebar">
                <img src="https://img.icons8.com/material-outlined/18/000000/menu--v1.png"/>
            </a>
            <span id="back" class="btn btn-secondary btn-sm has-icon" onclick="history.back()"><i class="fa fa-arrow-left mr-2"></i>Назад</span>
            <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input id="searchReply" type="text" class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4" placeholder="Пошук по повідомленях" />
            </span>
        </div>
        <!-- /Inner main header -->

        <!-- Inner main body -->

        <!-- Forum Topic -->
        <div class="inner-main-body p-2 p-sm-3 forum-content ">
            <div id="topic" id_topic="{{$topic->id}}" class="card mb-2">
                <div class="card-body">
                    <div class="media forum-item">
                        <a href="javascript:void(0)" class="card-link">
                            <img src="{{'https://mij-hrest.com/storage/app/public' . '/users/' . \App\Models\User::find($topic->id_author)->avatar}}" class="rounded-circle" width="50" alt="{{\App\Models\User::find($topic->id_author)->name}}" />
                        </a>
                        <div class="media-body ml-3">
                            <h6><a href="{{route('user', $topic->id_author)}}"  class="text-body text-muted">{{\App\Models\User::find($topic->id_author)->name}}</a>
                                <span class="small">
                                        <img src="https://img.icons8.com/ios/18/000000/response.png"/>
                                        <span class="text-secondary font-weight-bold">{{\App\Models\Topic::timeAgo($topic->created_at)}}</span>
                                </span>
                            </h6>
                            <h5 class="mt-1">{{$topic->topic}}</h5>
                            <div class="mt-3 font-size-sm">
                                <p>
                                    {{$topic->message}}
                                </p>
                            </div>
                        </div>
                        <div class="text-muted small text-center">
                            <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> {{$topic->views}}</span>
                            <span><i class="far fa-comment ml-2"></i> <span id="comments">{{$topic->comments}}</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-2 mb-2">

            <div id="replies">
            <!-- Forum Replies -->
            @foreach($replies as $reply)
                <div class="card mb-2">
                <div class="card-body">
                    <div class="media forum-item">
                        <a href="javascript:void(0)" class="card-link">
                            <img src="{{'https://mij-hrest.com/storage/app/public'. '/users/'.\App\Models\User::find($reply->id_user)->avatar}}" class="rounded-circle" width="50" alt="{{\App\Models\User::find($reply->id_user)->avatar}}" />
                        </a>
                        <div class="media-body ml-3">
                            <span><a href="{{route('user', $reply->id_user)}}"  class="text-body text-muted">{{\App\Models\User::find($reply->id_user)->name}}</a>
                                <span class="small">
                                        <img src="https://img.icons8.com/ios/18/000000/response.png"/>
                                        <span class="text-secondary">{{\App\Models\Topic::timeAgo($reply->created_at)}}</span>
                                </span>
                            </span>
                            <div class="mt-3 font-size-sm">
                                <p>
                                    {{$reply->message}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /Forum Replies -->
            </div>
            <div id="msg">

            </div>

        </div>
        <!-- /Forum Topic -->
        @auth
            <div class="write-message-block p-2 p-sm-3">
                <div class="smile emoji-panel">
                    <img id="emoji-picker" class="img-message chat-input-tool" src="https://img.icons8.com/glyph-neue/33/000000/happy.png"/>
                </div>
                @include('inc.emoji')
                <div class="area-message">
                    <textarea name="message" id="message-area" cols="30" rows="2" class="form-control" placeholder="Ваше повідомлення" on></textarea>
                </div>
                <div class="send">
                    <span onclick="getMessages()">
                        <img class="img-message" src="https://img.icons8.com/external-prettycons-lineal-prettycons/33/000000/external-send-social-media-prettycons-lineal-prettycons.png"/>
                    </span>
                </div>

            </div>
        @else
            <div class=" message-login text-center">
                <h6 class="text-center d-inline">Щоб відправити повідомлення увійдіть, це швидко!</h6>
                <a class="btn btn-primary " href="{{route('login')}}">Увійти</a>
            </div>
        @endauth

        <!-- /Inner main body -->
    </div>
    <!-- /Inner main -->
    <script>
        function getMessages(){
            let id_user = $('#id_user').attr('value');
            let id_topic = {{$topic->id}};
            let message = $('#message-area').val();
            $('#message-area').val('');


            $.ajax({
                type:'POST',
                url:"{{ route('sendMessage') }}",
                data: {"_token": $('meta[name="csrf-token"]').attr('content'), "id_user" : id_user, "id_topic" : id_topic, "message" : message},
                success: function (response) {
                    $('#msg').append(response);
                    let comments = $('#comments').text();
                    $('#comments').text(++comments);
                }
            });
        }
        $("#searchReply").keyup(function(event){

            if(event.keyCode == 13){

                let search = $('#searchReply').val();
                let id_topic = $('#topic').attr('id_topic');

                $.ajax({
                    type:'POST',
                    url:"{{ route('searchReply') }}",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), 'search': search, 'id_topic': id_topic},
                    success: function (response) {
                        $('#replies').html(response);
                    }
                });
            }
        })


        //Smiles
        $(document).on("click","#emoji-picker",function(e){
            e.stopPropagation();
            $('.intercom-composer-emoji-popover').toggleClass("active");
        });

        $(document).click(function (e) {
            if ($(e.target).attr('class') != '.intercom-composer-emoji-popover' && $(e.target).parents(".intercom-composer-emoji-popover").length == 0) {
                $(".intercom-composer-emoji-popover").removeClass("active");
            }
        });

        $(document).on("click",".intercom-emoji-picker-emoji",function(e){
            $(".test-emoji").append($(this).html());
        });

        $('.intercom-composer-popover-input').on('input', function() {
            var query = this.value;
            if(query != ""){
                $(".intercom-emoji-picker-emoji:not([title*='"+query+"'])").hide();
            }
            else{
                $(".intercom-emoji-picker-emoji").show();
            }
        });

        $('.intercom-emoji-picker-group span').click(function (){
            let area = $('#message-area').val();
            $('#message-area').val(area + this.textContent);
        });

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

