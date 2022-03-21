<!--Update Article Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <form action="{{route('editProfile')}}" method="get">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Редагування профілю</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="user">
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="photoProfile">Фото профілю</label>
                            <input type="file" class="form-control" id="photoProfile" placeholder="Фото профілю">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Повне Ім'я</span>
                        <input id="editSubjectInput" type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Телефон</span>
                        <input type="phone" class="form-control" name="phone">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Адреса</span>
                        <input type="text" class="form-control" name="location">
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
