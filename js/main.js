$('button.hamburger').on('click',function(){
    let navMenu = $('.nav-menu');
    console.log(navMenu);
    if (navMenu.hasClass('is-active')) {
        navMenu.removeClass('is-active');
        $(this).removeClass('is-active');
    } else {
        navMenu.addClass('is-active');
        $(this).addClass('is-active');
    }
});