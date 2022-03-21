@extends('layout.app')

@section('title-block') {{$article->subject}} @endsection

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="row mb-2">
                    <div>
                        <img class="article-image" src="{{$article->image}}" alt="{{$category->getNameById($article->id_category)}}">
                        <div class="content">
                            <h4 class="text-center article-subject">{{$article->subject}}</h4>
                            <div class="mb-3">
                                <p class="text-success d-inline text-end fw-bold">{{$category->getNameById($article->id_category)}}</p>
                                <p class="text-secondary d-inline float-end">{{$article->updated_at->format('d.m H:i')}}</p>
                                <br>
                            </div>
                            <div class="article-content">
                                @include('widgets.speach-reader')
                                <?php echo $article->content ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3 text-center">
                    <h5 class="text-center">Поширити</h5>
                    <div class="shareon">
                        <a class="facebook"></a>
                        <a class="linkedin"></a>
                        <a class="messenger" data-fb-app-id="FACEBOOK APP IDD"></a>
                        <a class="odnoklassniki"></a>
                        <a class="pinterest"></a>
                        <button class="telegram"></button>
                        <button class="twitter"></button>
                        <button class="viber"></button>
                        <button class="vkontakte"></button>
                        <button class="whatsapp"></button>
                    </div>
                </div>
            </div>

            @include('inc.aside')
        </div>

    </main>
@endsection

