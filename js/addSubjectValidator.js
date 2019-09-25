var responseText = document.getElementById('responseText');
var addSubjectSubmit = document.getElementById('addSubjectSubmit');

function failureResponse(message){
    responseText.setAttribute('class','failureResponse');
    responseText.innerHTML = message;
}

function deleteNotification(){
    responseText.setAttribute('style','top:-20% !important;');
    setTimeout(
        function(){
            responseText.innerHTML = '';
            responseText.setAttribute('class','');
            responseText.setAttribute('style','');
    },200);
}

function validateFormCategoryGroup(e){
    if(document.getElementById('subjectName').value == ''){
        e.preventDefault();
        failureResponse('Please enter a name for the subject');
        setTimeout(deleteNotification,2000);
    }else{
        if(document.getElementById('subjectIcon').value == ''){
            e.preventDefault();
            failureResponse('Please select an icon');
            setTimeout(deleteNotification,2000);
        }
    }
}

addSubjectSubmit.addEventListener('click',function(e){validateFormCategoryGroup(e);},false);