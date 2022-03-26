<!-- Create Topic Modal -->
<div class="modal fade" id="createTopicModal" tabindex="-1" role="dialog" aria-labelledby="createTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('createTopic')}}" method="get">
                @csrf
                <div class="modal-header d-flex align-items-center bg-primary text-white">
                    <h6 class="modal-title mb-0" id="createTopicModalLabel">Нова дискусія</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @auth
                        <input id="id_user" type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    @endauth
                    <div class="form-group">
                        <label for="topicCategory">Категорія</label>
                        <select class="form-select" name="id_category" id="topicCategory">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="topicTitle">Тема</label>
                        <input name="topic" type="text" class="form-control" id="topicTitle" placeholder="Введіть тему" autofocus="" />
                    </div>
                    <div class="form-group">
                        <label for="threadTitle">Повідомлення</label>
                        <textarea id="topicMessage" name="message" class="form-control summernote" placeholder="Введіть повідомлення"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Відправити</button>
                </div>
            </form>
        </div>
    </div>
</div>
