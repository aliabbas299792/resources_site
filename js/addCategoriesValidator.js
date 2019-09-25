var title = document.getElementById('title');
var textarea = document.getElementById('textarea');
var select_subject_options = document.getElementById('select_subject_options');
var saveInfo = document.getElementById('saveInfo');
var responseText = document.getElementById('responseText');

function deleteNotification(){
    responseText.setAttribute('style','top:-20% !important;');
    setTimeout(
        function(){
            responseText.innerHTML = '';
            responseText.setAttribute('class','');
            responseText.setAttribute('style','');
    },200);
}

function failureResponse(message){
    responseText.setAttribute('class','failureResponse');
    responseText.innerHTML = message;
}

function validateCategoryForm(e){
    if(title.value != ''){
        if(textarea.value != ''){
            var option = select_subject_options.options.selectedIndex;
            if(select_subject_options[select_subject_options.selectedIndex].innerHTML != "-------"){
                if(select_group_options[select_group_options.selectedIndex].innerHTML != "-------"){
                    //they pass
                }else{
                    console.log(select_group_options[option].innerHTML);
                    e.preventDefault();
                    failureResponse('Please select a category group');
                    setTimeout(deleteNotification,2000);
                }
            }else{
                e.preventDefault();
                failureResponse('Please select a subject');
                setTimeout(deleteNotification,2000);
            }
        }else{
            e.preventDefault();
            failureResponse('Please enter some information');
            setTimeout(deleteNotification,2000);
        }
    }else{
        e.preventDefault();
        failureResponse('Please enter the title');
        setTimeout(deleteNotification,2000);
    }
}

var informationId = 'textarea';
var textAreaHighlightId = 'textAreaHighlight';
var preTextId = 'preText';
var titleId = 'title';

textHighlights(textAreaHighlightId, informationId);

saveInfo.addEventListener('click',function(e){validateCategoryForm(e);},false);

setTimeout(function(){textarea.addEventListener('scroll',function(){scrollWithTextarea(informationId, textAreaHighlightId);},false);},200);
textarea.addEventListener('input',function(){textHighlights(textAreaHighlightId, informationId);},false);
window.addEventListener('keypress',function(){if(textarea.value == ''){document.getElementById('textAreaHighlight').innerHTML = '';}});
window.addEventListener('resize',function(){textHighlights(textAreaHighlightId, informationId);},false);
previewInfo.addEventListener('click', function(){processTextRegex(informationId, preTextId, titleId, true);}, false)