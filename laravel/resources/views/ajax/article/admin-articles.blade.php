@foreach($articles as $article)
    <tr class="test">
        <td><a class="link-dark" href="{{route('article', $article->id)}}">{{$article->id}}</a></td>
        <td class="td-subject">{{$article->subject}}</td>
        <td>{{mb_substr($article->content, 0, 20) . '...'}} <div class="visually-hidden td-content">{{$article->content}}</div></td>
        <td class="td-image">{{$article->image}}</td>
        <td class="td-video">{{$article->video}}</td>
        <td class="td-views">{{$article->views}}</td>
        <td class="td-source">{{$article->source}}</td>
        <td class="text-center">
            <button id_article="{{$article->id}}" id_category="{{$article->id_category}}" class="btn btn-warning btn-sm mb-1 btn-edit-article" data-bs-toggle="modal" data-bs-target="#editArticleModal">Редагувати</button>
            <button id_article="{{$article->id}}" class="btn btn-danger btn-sm btn-delete-article" data-bs-toggle="modal" data-bs-target="#deleteArticleModal">Видалити</button>
        </td>
    </tr>
@endforeach

