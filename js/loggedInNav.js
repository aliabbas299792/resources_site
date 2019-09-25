//__Logged In__\\

var responseText = document.getElementById('responseText');
var profileButton = document.getElementById('profileButton');
var loggedIn = document.getElementById('loggedIn');
var overlay = document.getElementById('overlay');
var logout = document.getElementById('profileLogout');
var managementLink = document.getElementById('managementLink');

managementLink.onclick = function(){
    window.location = '/../management_panel';
}

profileButton.onclick = function(){
    overlay.setAttribute('class','overlay');
    overlay.setAttribute('style','opacity:1;');
    loggedIn.setAttribute('class','loggedIn');
}

function closeProfile(){
    overlay.setAttribute('style','opacity:0');
    setTimeout(                                     //Need to set timeout for transition to work
        function(){
            overlay.setAttribute('class','');
            overlay.setAttribute('style','');
        }
    ,200);
    loggedIn.setAttribute('class','');
}

function addScriptTag(){
    var scriptTag = document.createElement('script');
    scriptTag.src = '/js/notLoggedInNav.js';
    scriptTag.setAttribute('id','JS');
    document.getElementsByTagName('footer')[0].appendChild(scriptTag);
}

function logoutProcesses(){
    function responseParser(response){
        var spanProfileButton = document.createElement('span');
        var spanProfileButton_text = document.createTextNode('Login');
        spanProfileButton.appendChild(spanProfileButton_text);
        spanProfileButton.setAttribute('id','login');
        
        var script
        loggedIn.parentNode.insertAdjacentHTML('afterbegin',response);
        loggedIn.parentNode.removeChild(loggedIn);
        var js = document.getElementById('JS');
        addScriptTag();
        js.parentNode.removeChild(js);
        profileButton.parentNode.replaceChild(spanProfileButton, profileButton);
    };
    var GetOrPost = 'GET';
    var requestUrl = '/../loginFile.php';
    ajaxUtils(responseParser,GetOrPost,requestUrl);
}

logout.onclick = function(){
    function responseParser(response){};
    var GetOrPost = 'GET';
    var requestUrl = '/../logoutProcessor.php';
    ajaxUtils(responseParser,GetOrPost,requestUrl);
    setTimeout(logoutProcesses(),200);
}

overlay.addEventListener('click',closeProfile,false);
logout.addEventListener('click',closeProfile,false);

//-------------------------------------------------------------------------\\

var email_original = document.getElementById('settings_email_original');
var email_new = document.getElementById('settings_email');
var passwordEdit = document.getElementById('settings_password');
var passwordEdit_again = document.getElementById('settings_password_again');
var passwordEdit_original = document.getElementById('settings_password_original');
var settingsSubmit = document.getElementById('settings_submit');

var profileSettings_settings = document.getElementById('profileSettings_settings');

/* 
function moveToNextPass(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13){
        if(e.target.getAttribute('id') == 'settings_password_original'){
            passwordEdit.focus();
            passwordEdit.select();
            console.log(e.target);
        }else if(e.target.getAttribute('id') == 'settings_password'){
            passwordEdit_again.focus();
            passwordEdit_again.select();
            console.log(e.target);
        }else if(e.target.getAttribute('id') == 'settings_password_again'){
            email_original.focus();
            email_original.select();
            console.log(e.target);
        }else if(e.target.getAttribute('id') == 'settings_email_original'){
            email_new.focus();
            email_new.select();
            console.log(e.target);
        }else if(e.target.getAttribute('id') == 'settings_email'){
            settingsSubmit.focus();
            console.log(e.target);
        }
    }
}


passwordEdit.addEventListener('keyup', moveToNextPass, false);
email_original.addEventListener('keyup', moveToNextPass, false);
*/

function deleteNotification(){
    responseText.setAttribute('style','top:-20% !important;');
        setTimeout(
            function(){
                responseText.innerHTML = '';
                responseText.setAttribute('class','');
                responseText.setAttribute('style','');
        },200);
}

function editDetails(){
    var passwordPass = true;
    var emailPass = true;
    
    if(passwordEdit.value != '' || passwordEdit_again.value != ''){
        if(passwordEdit_original == ''){
            responseText.setAttribute('class','failureResponse');
            responseText.innerHTML = 'Please enter your original password';
            setTimeout(deleteNotification,2000);
        }else{
            if(passwordEdit.value.length < 6){
                responseText.setAttribute('class','failureResponse');
                responseText.innerHTML = 'Your password must be atleast 6 characters in length';
                setTimeout(deleteNotification,2000);
            }else{
                if(passwordEdit.value != passwordEdit_again.value){
                    responseText.setAttribute('class','failureResponse');
                    responseText.innerHTML = 'Your passwords must match';
                    setTimeout(deleteNotification,2000);
                }else{
                    passwordPass = true;
                }
            }
        }
    }
    
    if(email_new.value != ''){
        if(email_original.value == ''){
            responseText.setAttribute('class','failureResponse');
            responseText.innerHTML = 'Please enter your original email';
            setTimeout(deleteNotification,2000);
        }else{
            var errorText = emailVerif(email_original);
            var errorText2 = emailVerif(email_new);
            
            if(errorText2 != '' && errorText != ''){
                errorText = errorText + ' and ' + errorText2;
            }else if(errorText2 == '' && errorText != ''){
                errorText = errorText;
            }else if(errorText2 != '' && errorText == ''){
                errorText = errorText2;
            }
            
            if(errorText != '' || errorText2 != ''){
                responseText.setAttribute('class','failureResponse');
                responseText.innerHTML = errorText;
                setTimeout(deleteNotification,2000);
            }else{
                if(passwordEdit_original.value == ''){
                    responseText.setAttribute('class','failureResponse');
                    responseText.innerHTML = 'Please enter your original password';
                    setTimeout(deleteNotification,2000);
                }else{
                    emailPass = true;
                }
            }
        }
    } 
    if(emailPass == true && passwordPass == true){
        function responseParser(response){
            if(response.indexOf('true') != -1){
                responseText.setAttribute('class','successResponse');
                responseText.innerHTML = 'Changes saved';
                setTimeout(deleteNotification,2000);
            }else{
                responseText.setAttribute('class','failureResponse');
                responseText.innerHTML = 'Changes not saved';
            } 
        }
        ajaxUtils(responseParser,'GET','/../editDetails.php?password='+passwordEdit_original.value+'&passwordNew='+passwordEdit.value+'&passwordNewAgain='+passwordEdit_again.value+'&emailOriginal='+email_original.value+'&emailNew='+email_new.value);
    }
}

function nextLoginField(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13){
        switch (e.target.getAttribute('id')){
            case 'settings_password_original':
                passwordEdit.focus();
                break;
            case 'settings_password':
                passwordEdit_again.focus();
                break;
            case 'settings_password_again':
                email_original.focus();
                break;
            case 'settings_email_original':
                email_new.focus();
                break;
            case 'settings_email':
                settingsSubmit.focus();
                editDetails();
        }
    }
}

profileSettings_settings.addEventListener('keydown',nextLoginField,false);

settingsSubmit.addEventListener('keyup',editDetails,false);
settingsSubmit.addEventListener('click',editDetails,false);



















