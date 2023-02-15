@extends('layout.app')

@section('title-block') {{$article->subject}} @endsection

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="row mb-2">
                    <div>
                        <div class="content">
                            <h4 class="text-center article-subject">{{$article->subject}}</h4>
                            <div class="mb-3">
                                <p class="text-success d-inline fw-bold">{{$category->getNameById($article->id_category)}} </p>
                                <p class="text-secondary d-inline">{{$article->updated_at->format('d.m H:i')}}</p>
                                @include('widgets.speach-reader')
                            </div>
                            <div class="article-content">
                                <?php echo $article->content; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="text-secondary">Переглядів: </span><span> {{$article->views}}</span>
                        <div class="float-end">
                            <span class="text-secondary">Джерело: </span>
                            <a class=" link-dark" @if($article->source){ href="{{$article->source}}" }@else href="{{route('home')}}" @endif>Посилання</a>
                        </div>
                        </div>
                </div>
                <div class="row mt-3 mb-3 text-center">
                    <h5 class="text-center">Поширити</h5>
                    <div class="shareon">
                        <a class="facebook"></a>
                        <a class="linkedin"></a>
                        <!-- FB App ID is required for the Messenger button to function -->
                        <a class="messenger" data-fb-app-id="5384706271591861"></a>
                        <a class="odnoklassniki"></a>
                        <a class="pinterest"></a>
                        <a class="telegram"></a>
                        <a class="twitter"></a>
                        <a class="viber"></a>
                        <a class="vkontakte"></a>
                        <a class="whatsapp"></a>
                    </div>
                </div>
            </div>

            @include('inc.aside')
        </div>

    </main>
@endsection

