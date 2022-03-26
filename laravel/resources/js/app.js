require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Shareon.init();

//Site scripts
$('.avatars img').click(function() {
    $('.avatars img').each(function() {
        $(this).removeClass("active-avatar");
    });
    $(this).addClass("active-avatar");
    $('#avatar').val(this.getAttribute('numberAvatar'));
});

$( document ).scroll( function() {
    if( $( document ).scrollTop() + $( window ).height() === $( document ).height()) {
        console.log('scroll');
    }
});
//End site scripts



//Admin panel scripts

//admin-home page
const editLinkBtns = document.querySelectorAll('.btn-edit-link');
const deleteLinkBtns = document.querySelectorAll('.btn-delete-link');
const addLinkBtns = document.querySelectorAll('.btn-add-link');

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

function addInSaveBlock(){
    alert(5);
    document.getElementById('addLinkIdBlock').setAttribute('value', '3');
}

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
        document.getElementById('editSubjectInput').value = subject;
        let iframe = document.getElementsByTagName("iframe")[1];
        var el = iframe.contentWindow.document.getElementsByTagName("body")[0];
        el.innerHTML = content;
        document.getElementById('editImageInput').value = image;
        document.getElementById('editVideoInput').value = video;
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
//End admin panel scripts
