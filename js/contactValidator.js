var contactEmail = document.getElementById('contact_email');
var contactName = document.getElementById('contact_name');
var contactComments = document.getElementById('contact_comments');
var contactSubmit = document.getElementById('contact_submit');

function deleteNotification(){
    responseText.setAttribute('style','top:-20% !important;');
        setTimeout(
            function(){
                responseText.innerHTML = '';
                responseText.setAttribute('class','');
                responseText.setAttribute('style','');
        },200);
}

function emailContactVerif(emailInput){
    if(emailInput.value == ''){
        return 'Your E-mail is invalid';
    }else if(emailInput.value.lastIndexOf('@') == -1 || emailInput.value.lastIndexOf('.') == -1){
        return 'Your E-mail is invalid';
    }else if(emailInput.value.lastIndexOf('@') > emailInput.value.lastIndexOf('.')){
        return 'Your E-mail is invalid';
    }else if(emailInput.value.length <= 5){
        return 'Your E-mail is invalid';
    }else if(emailInput.value.indexOf('@') == 0){
        return 'Your E-mail is invalid';
    }else if(emailInput.value.lastIndexOf('.') == emailInput.value.lastIndexOf('@')+1){
        return 'Your E-mail is invalid';
    }else{
        return '';
    }
}

function validateSubmitForm(e){
    if(contactName.value != ''){
        if(contactEmail.value != ''){
            var isEmailValid = emailContactVerif(contactEmail);
            if(isEmailValid == ''){
                if(contactComments.value != ''){
                    //They pass
                }
            }else{
                e.preventDefault();
                responseText.setAttribute('class','failureResponse');
                responseText.innerHTML = isEmailValid;
                setTimeout(deleteNotification,2000);
            }
        }else{
            e.preventDefault();
            responseText.setAttribute('class','failureResponse');
            responseText.innerHTML = 'You must enter an E-mail address';
            setTimeout(deleteNotification,2000);
        }
    }else{
        e.preventDefault();
        responseText.setAttribute('class','failureResponse');
        responseText.innerHTML = 'You must enter your name';
        setTimeout(deleteNotification,2000);
    }
}

contactSubmit.addEventListener('click',function(e){validateSubmitForm(e);},false);
contactSubmit.addEventListener('keypress',function(e){if(e.keycode == 13){validateSubmitForm(e);}});