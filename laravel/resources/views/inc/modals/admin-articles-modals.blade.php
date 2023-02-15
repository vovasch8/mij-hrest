<!-- Add Article Modal -->
<div class="modal fade " id="addArticleModal" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">
    <form action="{{route('addArticle')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addArticleModalLabel">Додавання статті</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_category" id="addArticleIdCategory">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Тема статті</span>
                        <input type="text" class="form-control" name="subject">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Контент</span>
                        <textarea id="addContentArea" type="text" class="form-control" name="add-content"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Фото статті</span>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Джерело</span>
                        <input type="text" class="form-control" name="source">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!--Update Article Modal -->
<div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
    <form action="{{route('editArticle')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editArticleModalLabel">Редагування статті</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editArticleId">
                    <input type="hidden" name="id_category" id="editArticleIdCategory">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Тема статті</span>
                        <input id="editSubjectInput" type="text" class="form-control" name="subject">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Контент</span>
                        <textarea id="editContentArea" type="text" class="form-control" name="content"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Старе фото: <span id="old-foto"></span></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Нове фото</span>
                        <input id="editImageInput" type="file" class="form-control" name="image">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Джерело</span>
                        <input id="editSourceInput" type="text" class="form-control" name="source">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Delete Article Modal -->
<div class="modal fade" id="deleteArticleModal" tabindex="-1" aria-labelledby="deleteArticleModalLabel" aria-hidden="true">
    <form action="{{route('deleteArticle')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteArticleModalLabel">Видалення статті</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteArticleId">
                    <p class="text-center">Ви точно хочете видалити цю статтю?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Видалити</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addСategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('addCategory')}}" method="get">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Додавання Категорії</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Назва категорії</span>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="/public/js/summernote-uk-UA.js"></script>
<script>
    $('#addContentArea').summernote({
        placeholder: 'Текст статті',
        tabsize: 2,
        height: 100,
        lang: 'uk-UA'
    });
    $('#editContentArea').summernote({
        tabsize: 2,
        height: 100,
        lang: 'uk-UA'
    });
</script>
