<!-- Add Link Modal -->
<div class="modal fade" id="addSaveLinkModal" tabindex="-1" aria-labelledby="addLinkSaveModalLabel" aria-hidden="true">
    <form action="{{route('addLink')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLinkSaveModalLabel">Додавання посилання</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_block" id="addLinkSaveIdBlock">
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
