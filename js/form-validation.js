// const formElements = {
//     'first-name': $('#first-name'),
//     'last-name': $('#last-name'),
//     'email': $('#email'),
//     'subject': $('#subject'),
//     'message': $('#message')
// };

$('.form-contact #submit').on('click', function(event){
    event.preventDefault();
    $('.form-input').each(function(index, element){
        if($(this).val() === ""){
            $(this).css('border', '1px solid red');
            $(this).prev().append(` <small class="error">- must not be empty</small>`);
        }
    });
    // $(this).css('background-color', 'green');
});