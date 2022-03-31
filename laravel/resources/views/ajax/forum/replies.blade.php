<!-- Forum Replies -->
@foreach($replies as $reply)
    <div class="card mb-2">
        <div class="card-body">
            <div class="media forum-item">
                <a href="javascript:void(0)" class="card-link">
                    <img src="{{asset('storage'). '/users/'.\App\Models\User::find($reply->id_user)->avatar}}" class="rounded-circle" width="50" alt="{{\App\Models\User::find($reply->id_user)->avatar}}" />
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
