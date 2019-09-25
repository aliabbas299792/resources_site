//__Login__\\

function closeLoginBoxFunc(){    
    overlay.setAttribute('style','opacity:0');
    setTimeout(                                     //Need to set timeout for transition to work
        function(){
            overlay.setAttribute('class','');
            overlay.setAttribute('style','');
        }
    ,200);
    loginBox.setAttribute('class','');
    responseText.setAttribute('class','');
    responseText.innerHTML = '';
}

var loginButton = document.getElementById('login');
var loginBox = document.getElementById('loginBox');
var overlay = document.getElementById('overlay');
var response = '';

var submit = document.getElementById('login_submit');
var username = document.getElementById('login_username');
var password = document.getElementById('login_password');
var responseText = document.getElementById('responseText');

var closeLoginBox = document.getElementById('closeLoginBox');


loginButton.onclick = function(){
    overlay.setAttribute('class','overlay');
    overlay.setAttribute('style','opacity:1');
    loginBox.setAttribute('class','loginBox');
}

function addScriptTag(){
    var scriptTag = document.createElement('script');
    scriptTag.src = '/js/loggedInNav.js';
    scriptTag.setAttribute('id','JS');
    document.getElementsByTagName('footer')[0].appendChild(scriptTag);
}

function loginProcesses(){
    function responseParser(response){
        var spanProfileButton = document.createElement('span');
        var spanProfileButton_text = document.createTextNode(userValue);
        spanProfileButton.appendChild(spanProfileButton_text);
        spanProfileButton.setAttribute('id','profileButton');
        
        var script
        loginBox.parentNode.insertAdjacentHTML('afterbegin',response);
        loginBox.parentNode.removeChild(loginBox);
        var js = document.getElementById('JS');
        addScriptTag();
        js.parentNode.removeChild(js);
        loginButton.parentNode.replaceChild(spanProfileButton, loginButton);
    };
    var GetOrPost = 'GET';
    var requestUrl = '/../loggedInFile.php';
    ajaxUtils(responseParser,GetOrPost,requestUrl);
}

function loginSubmit(){
    responseText.setAttribute('class','');
    responseText.innerHTML = '';
    
    passValue = password.value;
    userValue = username.value;
    
    requestUrl = '/loginProcessor.php?username='+userValue+'&password='+passValue;
    
    function responseParser(response){
        if(response.indexOf('success') != -1){
            responseText.setAttribute('class','successResponse');
            responseText.innerHTML = 'Login success';
            username.value = '';
            password.value = '';
            closeLoginBoxFunc();
            setTimeout(loginProcesses,200);
        }else{
            responseText.setAttribute('class','failureResponse');
            responseText.innerHTML = 'Login failure';
            username.value = '';
            password.value = '';
        }
    }
    
    ajaxUtils(responseParser,'GET',requestUrl);
}

function nextLoginField(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13){
        switch (e.target.getAttribute('id')){
            case 'login_username':
                password.focus();
                break;
            case 'login_password':
                loginSubmit();
                break;
        }
    }
}

username.parentNode.addEventListener('keydown',nextLoginField,false);
password.addEventListener('keydown',nextLoginField,false);

submit.addEventListener('click',loginSubmit,false);

closeLoginBox.addEventListener('click',closeLoginBoxFunc,false);
overlay.addEventListener('click',closeLoginBoxFunc,false);