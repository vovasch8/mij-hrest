require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Admin panel scripts

//admin-home page
const editLinkBtns = document.querySelectorAll('.btn-edit-link');
const deleteLinkBtns = document.querySelectorAll('.btn-delete-link');
const addLinkBtns = document.querySelectorAll('.btn-add-link');
const addSaveBlockBtn = document.getElementById('saveBlock');

addLinkBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('addLinkIdBlock').setAttribute('value', this.getAttribute('id_block'));
    });
});
editLinkBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('editLinkId').setAttribute('value', this.getAttribute('id_link'));
        document.getElementById('editLinkIdBlock').setAttribute('value', this.getAttribute('id_block'));
        let name = this.parentNode.parentNode.querySelector('.td-name').textContent;
        let link = this.parentNode.parentNode.querySelector('.td-link').textContent;
        let sort = this.parentNode.parentNode.querySelector('.td-sort').textContent;
        document.getElementById('editNameInput').value = name;
        document.getElementById('editLinkInput').value = link;
        document.getElementById('editSortInput').value = sort;
    });
});
deleteLinkBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('deleteLinkId').setAttribute('value', this.getAttribute('id_link'));
    });
});

addSaveBlockBtn.addEventListener('click', function(){
    document.getElementById('addLinkSaveIdBlock').setAttribute('value', '3');
});

//admin-articles page
const editArticleBtns = document.querySelectorAll('.btn-edit-article');
const deleteArticleBtns = document.querySelectorAll('.btn-delete-article');
const addArticleBtns = document.querySelectorAll('.btn-add-article');

addArticleBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('addArticleIdCategory').setAttribute('value', this.getAttribute('id_category'));
    });
});
editArticleBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('editArticleId').setAttribute('value', this.getAttribute('id_article'));
        document.getElementById('editArticleIdCategory').setAttribute('value', this.getAttribute('id_category'));
        let subject = this.parentNode.parentNode.querySelector('.td-subject').textContent;
        let content = this.parentNode.parentNode.querySelector('.td-content').textContent;
        let image = this.parentNode.parentNode.querySelector('.td-image').textContent;
        let video = this.parentNode.parentNode.querySelector('.td-video').textContent;
        let source = this.parentNode.parentNode.querySelector('.td-source').textContent;
        document.getElementById('editSubjectInput').value = subject;
        document.getElementsByClassName('note-editable')[1].innerHTML = content;
        document.getElementById('editImageInput').value = image;
        document.getElementById('editVideoInput').value = video;
        document.getElementById('editSourceInput').value = source;

    });
});
deleteArticleBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('deleteArticleId').setAttribute('value', this.getAttribute('id_article'));
    });
});

//admin-users page
const editRoleBtns = document.querySelectorAll('.btn-edit-role');
const deleteUserBtns = document.querySelectorAll('.btn-delete-user');

editRoleBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('editRoleId').setAttribute('value', this.getAttribute('id_user'));
        let role = this.parentNode.parentNode.querySelector('.td-role').textContent;
        document.getElementById('editRoleInput').value = role;
    });
});
deleteUserBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('deleteUserId').setAttribute('value', this.getAttribute('id_user'));
    });
});

//Admin forum page
const editForumCategoryBtns = document.querySelectorAll('.btn-edit-forum-category');
const deleteForumCategoryBtns = document.querySelectorAll('.btn-delete-forum-category');

editForumCategoryBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('editCategoryId').setAttribute('value', this.getAttribute('id_category'));
        let name = this.parentNode.parentNode.querySelector('.td-name').textContent;
        document.getElementById('editNameInput').value = name;
    });
});
deleteForumCategoryBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('deleteCategoryId').setAttribute('value', this.getAttribute('id_category'));
    });
});

const editTopicBtns = document.querySelectorAll('.btn-edit-topic');
const deleteTopicBtns = document.querySelectorAll('.btn-delete-topic');

editTopicBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('editTopicId').setAttribute('value', this.getAttribute('id_topic'));
        document.getElementById('editTopicSelect').value = this.getAttribute('id_category');
        let topic = this.parentNode.parentNode.querySelector('.td-topic').textContent;
        document.getElementById('editTopicInput').value = topic;
        let message = this.parentNode.parentNode.querySelector('.td-message').textContent;
        document.getElementById('editMessageInput').value = message;
    });
});
deleteTopicBtns.forEach(btn => {
    btn.addEventListener('click', function handleClick(event) {
        document.getElementById('deleteTopicId').setAttribute('value', this.getAttribute('id_topic'));
    });
});
//End admin panel scripts

