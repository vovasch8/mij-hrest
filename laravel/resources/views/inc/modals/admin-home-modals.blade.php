<!-- Add Link Modal -->
<div class="modal fade" id="addLinkModal" tabindex="-1" aria-labelledby="addLinkModalLabel" aria-hidden="true">
    <form action="{{route('addLink')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLinkModalLabel">Додавання посилання</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_block" id="addLinkIdBlock">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Назва посилання</span>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Посилання</span>
                        <input type="text" class="form-control" name="link">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Номер сортування</span>
                        <input type="number" class="form-control" name="sort">
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


<!--Update Link Modal -->
<div class="modal fade" id="editLinkModal" tabindex="-1" aria-labelledby="editLinkModalLabel" aria-hidden="true">
    <form action="{{route('editLink')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLinkModalLabel">Редагування посилання</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editLinkId">
                    <input type="hidden" name="id_block" id="editLinkIdBlock">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Назва посилання</span>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Посилання</span>
                        <input type="text" class="form-control" name="link">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Номер сортування</span>
                        <input type="number" class="form-control" name="sort">
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

<!--Delete Link Modal -->
<div class="modal fade" id="deleteLinkModal" tabindex="-1" aria-labelledby="deleteLinkModalLabel" aria-hidden="true">
    <form action="{{route('deleteLink')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLinkModalLabel">Видалення посилання</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteLinkId">
                    <p class="text-center">Ви точно хочете видалити це посилання?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Видалити</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Add Block Modal -->
<div class="modal fade" id="addBlockModal" tabindex="-1" aria-labelledby="addBlockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('addBlock')}}" method="get">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlockModalLabel">Додавання блоків</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Назва блоку</span>
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
