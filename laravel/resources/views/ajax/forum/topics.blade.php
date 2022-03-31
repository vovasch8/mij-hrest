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
                            {{$topic->message}}
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
