<!-- Add Article Modal -->
<div class="modal fade " id="addArticleModal" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">
    <form action="{{route('addArticle')}}" method="get">
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
                        <textarea type="text" class="form-control" name="add-content"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Фото</span>
                        <input type="text" class="form-control" name="image">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Відео</span>
                        <input type="text" class="form-control" name="video">
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
    <form action="{{route('editArticle')}}" method="get">
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
                        <span class="input-group-text">Фото</span>
                        <input id="editImageInput" type="text" class="form-control" name="image">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Відео</span>
                        <input id="editVideoInput" type="text" class="form-control" name="video">
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

<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'add-content' );
    CKEDITOR.replace( 'content' );
</script>
