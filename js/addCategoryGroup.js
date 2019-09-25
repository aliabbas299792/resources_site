var select_subject_options = document.getElementById('select_subject_options');
var responseText = document.getElementById('responseText');
var addCategoryGroupSubmit = document.getElementById('addCategoryGroupSubmit');

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
    if(document.getElementById('groupName').value == ''){
        e.preventDefault();
        failureResponse('Please enter a group name');
        setTimeout(deleteNotification,2000);
    }else{
        if(select_subject_options[select_subject_options.selectedIndex].innerHTML != "-------"){
            console.log()
        }else{
            e.preventDefault();
            failureResponse('Please select a subject');
            setTimeout(deleteNotification,2000);
        } 
    }
}

addCategoryGroupSubmit.addEventListener('click',function(e){validateFormCategoryGroup(e);},false);