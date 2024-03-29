const inputCriteria = {
    "first_name":{
        name: "First Name",
        min: 2,
        max: 25,
        isRequired: true,
        regex: /^[0-9a-zA-Z\s-_\u00C0-\u02AF]+$/
    },
    "last_name":{
        name: "Last Name",
        min: 2,
        max: 25,
        isRequired: true,
        regex: /^[0-9a-zA-Z\s-_\u00C0-\u02AF]+$/
    },
    "email":{
        name: "Email",
        min: 3,
        max: 50,
        isRequired: true,
        regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    },
    "subject":{
        name: "Subject",
        min: 3,
        max: 25,
        isRequired: true,
        regex: /^[0-9a-zA-Z\s-_\u00C0-\u02AF]+$/
    },
    "message":{
        name: "Message",
        min: 3,
        max: 9999,
        isRequired: true
    }
};

function checkError(id, inputValue) {
    //  Get the criteria for the input's validation
    const currCriteria = inputCriteria[id];

    //  Check if required
    if(currCriteria?.isRequired) {
        //      Check if below minimum or above maximum
        if(inputValue.length <= currCriteria.min) {
            return {
                hasError: true,
                errorMessage: `${currCriteria.name} must be more than ${currCriteria.min} characters long!`
            }
        } else if (inputValue.length > currCriteria.max) {
            return {
                hasError: true,
                errorMessage: `${currCriteria.name} must be below ${currCriteria.max} characters!`
            }
        }
        if(!inputValue.match(currCriteria.regex)){
            return {
                hasError: true,
                errorMessage: `Invalid ${currCriteria.name} entered!`
            }
        }
    }
    return {
        hasError: false
    }
}

function displayError(inputGroup, message) {
    //  Get the input group's label element
    const inputLabel = inputGroup.children('label');
    
    //  Add the error class to the input group, only if it hasn't already.
    if(!inputGroup.hasClass('error')){
        inputGroup.addClass('error');
    }
    if(!inputLabel.hasClass('error')){
        inputLabel.addClass('error');
    }
    inputLabel.html(` <span class="icon-cross"></span> ${message}`);
}

function clearError(inputGroup) {
    const inputLabel = inputGroup.children('label');
    if(inputGroup.hasClass('error')) {
        inputGroup.removeClass('error');
    }
    if(inputLabel.hasClass('error')){
        inputLabel.removeClass('error');
    }
    inputLabel.html('');
}

function displaySuccess(inputGroup) {
    const inputLabel = inputGroup.children('label');
    if(!inputGroup.hasClass('success')){
        //<span class="icon-cross"></span>
        inputGroup.addClass('success');
    }
    inputLabel.html(` <span class="icon-check"></span>`);
        
}

function clearSuccess(inputGroup) {
    if(inputGroup.hasClass('success'))
        inputGroup.removeClass('success');
}

$('.form-input').on('keyup', function(){
    const validInput = checkError($(this).attr('id'), $(this).val());
    if(validInput.hasError) {
        //  Apply styles
        clearSuccess($(this).parent());
        displayError($(this).parent(), validInput.errorMessage);
    } else {
        clearError($(this).parent());
        displaySuccess($(this).parent());
    }
});

$('.form-contact #submit').on('click', function(event){
    
    //  For each input, show an error if they're empty
    $('.form-input').each(function() {
        const validInput = checkError($(this).attr('id'), $(this).val());
        if(validInput.hasError) {
            //  Apply styles
            clearSuccess($(this).parent());
            displayError($(this).parent(), validInput.errorMessage);
            event.preventDefault();
        } else {
            clearError($(this).parent());
            displaySuccess($(this).parent());
        }
    });

});

$('.form-contact #reset').on('click', function(event) {
    event.preventDefault();
    //  For each input, show an error if they're empty
    $('.form-input').each(function(index, element){
        clearSuccess($(this).parent());
        clearError($(this).parent());
        $(this).val('');
    });
});