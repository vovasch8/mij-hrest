require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Site scripts
$('.avatars img').click(function() {
    $('.avatars img').each(function() {
        $(this).removeClass("active-avatar");
    });
    $(this).addClass("active-avatar");
    $('#avatar').val(this.getAttribute('numberAvatar'));
});


//End site scripts



