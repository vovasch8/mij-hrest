<!--Update Article Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <form action="{{route('editProfile', Auth::user()->id)}}" method="get">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Редагування профілю</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">Виберіть аватар</h6>
                    <div class="avatars text-center mb-3">
                        <input id="avatar" type="hidden" name="avatar" value="{{Auth::user()->avatar}}">
                        <img numberAvatar="avatar1.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar1.png'}}" alt="Avatar">
                        <img numberAvatar="avatar2.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar2.png'}}" alt="Avatar">
                        <img numberAvatar="avatar3.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar3.png'}}" alt="Avatar">
                        <img numberAvatar="avatar4.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar4.png'}}" alt="Avatar">
                        <img numberAvatar="avatar5.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar5.png'}}" alt="Avatar">
                        <img numberAvatar="avatar6.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar6.png'}}" alt="Avatar">
                        <img numberAvatar="avatar7.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar7.png'}}" alt="Avatar">
                        <img numberAvatar="avatar8.png" class="img-fluid img-thumbnail" src="{{'https://mij-hrest.com/storage/app/public'.'/users/avatar8.png'}}" alt="Avatar">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Повне Ім'я</span>
                        <input id="editSubjectInput" type="text" class="form-control" name="name" value="{{ Auth::user()->name}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Телефон</span>
                        <input type="phone" class="form-control" name="phone" value="{{ Auth::user()->phone}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Адреса</span>
                        <input type="text" class="form-control" name="location" value="{{ Auth::user()->location}}">
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
