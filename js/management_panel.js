var areYouSureEl = document.getElementById('areYouSure');
var areYouSure_yes = document.getElementById('areYouSure_yes');
var areYouSure_no = document.getElementById('areYouSure_no');
var categoryId_el;
var categoryId;

if(document.getElementById('displayEditCategories')){
    var displayEditCategories = document.getElementById('displayEditCategories');
}else{
    var displayEditCategories = document.documentElement;
}

function closeResponsePrompt(){ //Closes the response prompt
    overlay.setAttribute('style','opacity:0');
    setTimeout(                                     //Need to set timeout for transition to work
        function(){
            overlay.setAttribute('class','');
            overlay.setAttribute('style','');
        }
    ,200);
    areYouSureEl.setAttribute('class','');
}

function ajaxDelete(){
    if(displayEditCategories.innerHTML.indexOf('data-category_id') !== -1){
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
            if(xhr.status == 200 && xhr.readyState == 4){
                if(xhr.responseText.indexOf('element_deleted') !== -1){
                    categoryId_el.parentNode.removeChild(categoryId_el);
                }
            }
        }
        xhr.open('GET','/deleteCategory.php?id='+categoryId, true);
        xhr.send(null);
    }else{
        //console.log(subjectOrCategory);
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){
            if(xhr.status == 200 && xhr.readyState == 4){
                if(xhr.responseText.indexOf('element_deleted') !== -1){
                    categoryId_el.parentNode.removeChild(categoryId_el);
                }
            }
        }
        xhr.open('GET','/deleteSubject.php?subject_id='+subjectName, true);
        xhr.send(null);
    }
}

function areYouSure(e){ //This one brings a prompt up for final assurance
    var areYouSure = document.getElementById('areYouSure');
    overlay.setAttribute('class','overlay');
    overlay.setAttribute('style','opacity:1;');
    areYouSure.setAttribute('class','areYouSure');
}

function areYouSure2(e){ //This one brings a prompt up for final assurance
    var areYouSure = document.getElementById('areYouSure');
    overlay.setAttribute('class','overlay');
    overlay.setAttribute('style','opacity:1;');
    areYouSure.setAttribute('class','areYouSure');
    
    overlay.onclick=function(){areYouSure.setAttribute('class','');}
    
}

function deleteCategory(e){ //The initial click
    if(e.target.getAttribute('data-element') == 'i'){
        if(e.target.parentNode.parentNode.getAttribute('data-category_id') != ''){
            categoryId = e.target.parentNode.parentNode.getAttribute('data-category_id');
            subjectOrCategory = 'category';
            categoryId_el = e.target.parentNode.parentNode;
            areYouSure(); //Prompts a final yes or no
        }
    }
}

function deleteCategory2(e){ //The initial click
    if(e.target.getAttribute('data-element') == 'i'){
        if(e.target.parentNode.parentNode.getAttribute('data-subject_id') != ''){
            subjectName = e.target.parentNode.parentNode.getAttribute('data-subject_id');
            subjectOrCategory = 'subject';
            categoryId_el = e.target.parentNode.parentNode;
            areYouSure2(); //Prompts a final yes or no
        }
    }
}
    
areYouSure_yes.onclick = function(){
    closeResponsePrompt();
    
    ajaxDelete(); //If you click yes it's deleted
}
areYouSure_no.onclick = function(){
    closeResponsePrompt(); //Elese the prompt is just closed
}

document.body.addEventListener('click',function(e){deleteCategory(e);},false);
document.body.addEventListener('click',function(e){deleteCategory2(e);},false);