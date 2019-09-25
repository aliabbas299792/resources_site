//____________________________EDITOR FUNCTIONS____________________________________\\
String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);    // From stackoverflow.com
}

function textHighlights(textAreaHighlight, information){
    var textAreaHighlight = document.getElementById(textAreaHighlight);
    var information = document.getElementById(information);
    var informationText = information.value;
    
    textAreaHighlight.innerHTML = informationText;
    
    textAreaHighlight.setAttribute('style', 'height: '+information.offsetHeight+'px; width: '+information.offsetWidth+'px;top:'+information.offsetTop+'px;');
    
    informationText = informationText.replace(/\[table\]/gi, "<span class='highlightWord'>[table]</span>");    
    informationText = informationText.replace(/\[tr\]/gi, "<span class='highlightWord'>[tr]</span>");    
    informationText = informationText.replace(/(\[t.+?\])/gi, "<span class='highlightWord'>$1</span>");   
    informationText = informationText.replace(/\[\/table\]/gi, "<span class='highlightWord'>[/table]</span>");    
    informationText = informationText.replace(/\[\/tr\]/gi, "<span class='highlightWord'>[/tr]</span>");    
    informationText = informationText.replace(/\[\/td\]/gi, "<span class='highlightWord'>[/td]</span>");    
    informationText = informationText.replace(/\[ul\]/gi, "<span class='highlightWord'>[ul]</span>");      
    informationText = informationText.replace(/\[\/ul\]/gi, "<span class='highlightWord'>[/ul]</span>");    
    informationText = informationText.replace(/\[ol\]/gi, "<span class='highlightWord'>[ol]</span>");      
    informationText = informationText.replace(/\[\/ol\]/gi, "<span class='highlightWord'>[/ol]</span>");   
    informationText = informationText.replace(/\[hr\]/gi, "<span class='highlightWord'>[hr]</span>");  
    informationText = informationText.replace(/\[li\]/gi, "<span class='highlightWord'>[li]</span>");    
    informationText = informationText.replace(/\[\/li\]/gi, "<span class='highlightWord'>[/li]</span>");  
    informationText = informationText.replace(/\[h1\]/gi, "<span class='highlightWord'>[h1]</span>");     
    informationText = informationText.replace(/\[\/h1\]/gi, "<span class='highlightWord'>[/h1]</span>"); 
    informationText = informationText.replace(/\[br\]/gi, "<span class='highlightWord'>[br]</span>"); 
    informationText = informationText.replace(/\[h2\]/gi, "<span class='highlightWord'>[h2]</span>");      
    informationText = informationText.replace(/\[\/h2\]/gi, "<span class='highlightWord'>[/h2]</span>"); 
    informationText = informationText.replace(/\[h3\]/gi, "<span class='highlightWord'>[h3]</span>");     
    informationText = informationText.replace(/\[\/h3\]/gi, "<span class='highlightWord'>[/h3]</span>");   
    informationText = informationText.replace(/\[b\]/gi, "<span class='highlightWord'>[b]</span>");      
    informationText = informationText.replace(/\[\/b\]/gi, "<span class='highlightWord'>[/b]</span>");     
    informationText = informationText.replace(/\[u\]/gi, "<span class='highlightWord'>[u]</span>");      
    informationText = informationText.replace(/\[\/u\]/gi, "<span class='highlightWord'>[/u]</span>");  
    informationText = informationText.replace(/\[i\]/gi, "<span class='highlightWord'>[i]</span>");        
    informationText = informationText.replace(/\[\/i\]/gi, "<span class='highlightWord'>[/i]</span>");
    informationText = informationText.replace(/\[code\]/gi, "<span class='highlightWord'>[code]</span>");      
    informationText = informationText.replace(/\[\/code\]/gi, "<span class='highlightWord'>[/code]</span>"); 
    informationText = informationText.replace(/\[highlight\]/gi, "<span class='highlightWord'>[highlight]</span>");      
    informationText = informationText.replace(/\[\/highlight\]/gi, "<span class='highlightWord'>[/highlight]</span>");  
    informationText = informationText.replace(/(\[img.+?\])/gi, '<span class="highlightWord">$1</span>');  
    informationText = informationText.replace(/(\[link.+?\])/gi, '<span class="highlightWord">$1</span>');
    informationText = informationText.replace(/(\[\/link\])/gi, '<span class="highlightWord">[/link]</span>');
    informationText = informationText.replace(/(\[squared\])/gi, '<span class="highlightWord">[squared]</span>');
    informationText = informationText.replace(/(\[cubed\])/gi, '<span class="highlightWord">[cubed]</span>');
    informationText = informationText.replace(/(\[lte\])/gi, '<span class="highlightWord">[lte]</span>');
    informationText = informationText.replace(/(\[gte\])/gi, '<span class="highlightWord">[gte]</span>');
    informationText = informationText.replace(/(\[approx\])/gi, '<span class="highlightWord">[approx]</span>');
    informationText = informationText.replace(/(\[theta\])/gi, '<span class="highlightWord">[theta]</span>');
    informationText = informationText.replace(/(\[divide\])/gi, '<span class="highlightWord">[divide]</span>');
    informationText = informationText.replace(/(\[multiply\])/gi, '<span class="highlightWord">[multiply]</span>');
    informationText = informationText.replace(/(\[pi\])/gi, '<span class="highlightWord">[pi]</span>');
    informationText = informationText.replace(/(\[ohm\])/gi, '<span class="highlightWord">[ohm]</span>');
    informationText = informationText.replace(/(\[space\])/gi, '<span class="highlightWord">[space]</span>');
    informationText = informationText.replace(/(\[lambda\])/gi, '<span class="highlightWord">[lambda]</span>');
    informationText = informationText.replace(/(\[gamma\])/gi, '<span class="highlightWord">[gamma]</span>');
    informationText = informationText.replace(/(\[degree\])/gi, '<span class="highlightWord">[degree]</span>');
    informationText = informationText.replace(/(\[sup\])/gi, '<span class="highlightWord">[sup]</span>');
    informationText = informationText.replace(/(\[\/sup\])/gi, '<span class="highlightWord">[/sup]</span>');
    informationText = informationText.replace("&", '&amp');
    informationText = informationText.replace(";", '&#59;');
    //informationText = informationText.replace(/(\&.+?\;)/gi, '<span class="highlightWord">$1</span>');
    
    textAreaHighlight.innerHTML = informationText+'<br />';
}


function scrollWithTextarea(textArea, textAreaHighlight){
    document.getElementById(textAreaHighlight).scrollTop = document.getElementById(textArea).scrollTop;
}

function processTextRegex(information, preText, title, editorOrNot){
    var informationEl = document.getElementById(information);
    var preText = document.getElementById(preText);
    
    if(editorOrNot){
        var information = informationEl.value;
        var title = document.getElementById(title).value;
    }else{
        var information = informationEl.innerHTML;
        var title = document.getElementById(title).innerHTML;
    }
    
    title = "<h1 class='titleBig'>"+title+"</h1>";
    
    information = information.replace(/\</gi, '&lt;');                                      // Replaces '<' with its HTML code 
    information = information.replace(/\>/gi, '&gt;');                                      // Replaces '>' with its HTML code     
    information = information.replace(/\[lte\]/gi, '&le;');                                 // Replaces '[lte]' with its HTML code   
    information = information.replace(/\[gte\]/gi, '&ge');                                  // Replaces '[gte]' with its HTML code    
    information = information.replace(/\[approx\]/gi, '&asymp;');                           // Replaces '[approx]' with its HTML code     
    information = information.replace(/\>/gi, '&gt');                                       // Replaces '>' with its HTML code         
    information = information.replace(/\[pi\]/gi, '&pi;');                                  // Replaces '[pi]' with its HTML code     
    information = information.replace(/\n/gi, "<br>");                                    // Replaces line breaks with '<br />'
    information = information.replace(/\[table\]/gi, "<table>");                            // Replaces '[table]' with '<table>'
    information = information.replace(/\[tr\]/gi, "<tr>");                                  // Replaces '[tr]' with '<tr>'
    //information = information.replace(/(\[t.+?\])/gi, "<td>");                            // Replaces '[td]' with '<td>'
    information = information.replace(/\[\/table\]/gi, "</table>");                         // Replaces '[/table]' with '</table>'
    information = information.replace(/\[\/tr\]/gi, "</tr>");                               // Replaces '[/tr]' with '</tr>'
    information = information.replace(/\[\/td\]/gi, "</td>");                               // Replaces '[/td]' with '</td>'
    information = information.replace(/\[ul\]/gi, "<ul>");                                  // Replaces '[ul]' with '<ul>'
    information = information.replace(/\[\/ul\]/gi, "</ul>");                               // Replaces '[/ul]' with '</ul>'
    information = information.replace(/\[ol\]/gi, "<ol>");                                  // Replaces '[ol]' with '<ol>'
    information = information.replace(/\[\/ol\]/gi, "</ol>");                               // Replaces '[/ol]' with '</ol>'
    information = information.replace(/\[li\]/gi, "<li>");                                  // Replaces '[li]' with '<li>'
    information = information.replace(/\[\/li\]/gi, "</li>");                               // Replaces '[/li]' with '</li>'
    information = information.replace(/\[hr\]/gi, "<hr>");                                  // Replaces '[hr]' with '<hr>'
    information = information.replace(/\[h1\]/gi, "<h1>");                                  // Replaces '[h1]' with '<h1>'
    information = information.replace(/\[\/h1\]/gi, "</h1>");                               // Replaces '[/h1]' with '</h1>'
    information = information.replace(/\[h2\]/gi, "<h2>");                                  // Replaces '[h2]' with '<h2>'
    information = information.replace(/\[\/h2\]/gi, "</h2>");                               // Replaces '[/h2]' with '</h2>'
    information = information.replace(/\[h3\]/gi, "<h3>");                                  // Replaces '[h3]' with '<h3>'
    information = information.replace(/\[\/h3\]/gi, "</h3>");                               // Replaces '[/h3]' with '</h3>'
    information = information.replace(/\[\/sup\]/gi, "</sup>");                             // Replaces '[/sup]' with '</sup>'
    information = information.replace(/\[sup\]/gi, "<sup>");                               // Replaces '[sup]' with '<sup>'
    information = information.replace(/\[br\]/gi, "<br>");                                  // New line
    information = information.replace(/\[b\]/gi, "<b>");                                    // Replaces '[b]' with '<b>'
    information = information.replace(/\[\/b\]/gi, "</b>");                                 // Replaces '[/b]' with '</b>'
    information = information.replace(/\[u\]/gi, "<u>");                                    // Replaces '[u]' with '<u>'
    information = information.replace(/\[\/u\]/gi, "</u>");                                 // Replaces '[/u]' with '</u>'
    information = information.replace(/\[i\]/gi, "<i>");                                    // Replaces '[i]' with '<i>'
    information = information.replace(/\[\/i\]/gi, "</i>");                                 // Replaces '[/i]' with '</i>'
    information = information.replace(/\[code\]/gi, "<span class='code'>");                 // Replaces '[i]' with '<i>'
    information = information.replace(/\[\/code\]/gi, "</span>");                           // Replaces '[/i]' with '</i>'
    information = information.replace(/\[highlight\]/gi, "<span class='highlight'>");       // Replaces '[i]' with '<i>'
    information = information.replace(/\[\/highlight\]/gi, "</span>");                      // Replaces '[/i]' with '</i>'
    information = information.replace(/\[squared\]/gi,"&sup2;");                            // Squared symbol
    information = information.replace(/\[cubed\]/gi,"&sup3;");                              // Cubed symbol 
    information = information.replace(/\[theta\]/gi,"&#1012;");                             // Theta symbol
    information = information.replace(/\[ohm\]/gi,"&#8486;");                               // Ohm symbol
    information = information.replace(/\[divide\]/gi,"&divide;");                           // Divide symbol
    information = information.replace(/\[multiply\]/gi,"&times;");                          // Multiply symbol
    information = information.replace(/\[lambda\]/gi,"&lambda;");                           // Lambda symbol (wavelength)
    information = information.replace(/\[gamma\]/gi,"&gamma;");                             // Gamma symbol (maths function/wavelength)
    information = information.replace(/\[degree\]/gi,"&deg;");                             // Degree symbol
    information = information.replace(/\[space\]/gi,"&nbsp;");                              // Space
    information = information.replace(/\[\/link\]/gi,"</a>");                               // Links
    
    //Removing extra <br>
    information = information.replace(/\<\/h3\>\<br\>/gi,"</h3>");
    information = information.replace(/\<\/h2\>\<br\>/gi,"</h2>");
    information = information.replace(/\<\/h1\>\<br\>/gi,"</h1>");
    information = information.replace(/\<\/tr\>\<br\>/gi,"</tr>"); 
    information = information.replace(/\<tr\>\<br\>/gi,"</tr>");               
    information = information.replace(/\<\/li\>\<br\>/gi,"</li>");             
    information = information.replace(/\<ol\>\<br\>/gi,"<ol>");             
    information = information.replace(/\<\/ol\>\<br\>/gi,"</ol>");             
    information = information.replace(/\<ul\>\<br\>/gi,"<ul>");             
    information = information.replace(/\<\/ul\>\<br\>/gi,"</ul>");             
    information = information.replace(/\<\/td\>\<br\>/gi,"</tr>");                   
    information = information.replace(/\<br\>\<table\>\<br\>/gi,"<table>");        
    information = information.replace(/\<\/table\>\<br\>/gi,"</table>");                  
    information = information.replace(/\<span class='highlight'\>\<br\>/gi,"<span class=\"highlight\">");                
    information = information.replace(/\<span class='code'\>\<br\>/gi,"<span class=\"code\">");                     
    information = information.replace(/\<\/span\>\<br\>/gi,"</span>");                                
    information = information.replace(/\<\/a\>\<br\>/gi,"</a>");                                
    information = information.replace(/\<hr\>\<br\>/gi,"<hr>");                         
    
    if(information.indexOf('[img') !== -1){
        var imgOccurences = (information.match(/\[img/gi)).length;
        
        for(var i = 0;i < imgOccurences; i++){
            var imgLocation = information.indexOf('[img');
            var endImgLocation = information.indexOf(']', imgLocation+1);
            
            if(imgLocation != -1 && endImgLocation != -1){
                information = information.replaceAt(imgLocation, '<img');
                information = information.replaceAt(endImgLocation, '>    ');
            }
        }
    }
    
    if(information.indexOf('[td') !== -1){
        var TdOccurences = (information.match(/\[td/gi)).length;
        
        for(var i = 0;i < TdOccurences; i++){
            var TdLocation = information.indexOf('[td');
            var endTdLocation = information.indexOf(']', TdLocation+1);
            
            if(imgLocation != -1 && endImgLocation != -1){
                information = information.replaceAt(TdLocation, '<td');
                information = information.replaceAt(endTdLocation, '>');
            }
        }
    }
    
    if(information.indexOf('[link') !== -1){
        var linkOccurences = (information.match(/\[link/gi)).length;
        
        for(var i = 0;i < linkOccurences; i++){
            var linkLocation = information.indexOf('[link');
            var endOfLinkLocation = information.indexOf(']', linkLocation+1);
            
            if(imgLocation != -1 && endOfLinkLocation != -1){
                information = information.replaceAt(linkLocation, '<a   ');                               //Need spaces to get rid of the rest of the word 'link'
                information = information.replaceAt(endOfLinkLocation, '>');
            }
        }
    }
    
    information = information.replace(/href=\'/gi,"target='_blank' href='");                              // Links Begin
    
    if(editorOrNot){
        preText.innerHTML = title+information;
    }else{
        preText.innerHTML = information;
    }
}

//____________________________GENERAL___________________________________\\

function emailVerif(emailInput){
    if(emailInput.value == ''){
        return '';
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

function windowLocation(){
    var window_location = window.location.href;
    var window_location_startPath = window_location.indexOf('/',10);
    return window_location.slice(window_location_startPath+1,-1)+window_location.slice(-1);
}

windowLocation();

//_______________________________AJAX UTILS______________________________\\
function ajaxUtils(responseParser,GetOrPost,requestUrl){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            responseParser(xhr.response);
        }
    }
    xhr.open(''+GetOrPost+'',''+requestUrl+'');
    xhr.send(null);
}

//------------------------------------------------------------------------//

function ajaxUtilsXML(responseParser,GetOrPost,requestUrl){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            responseParser(xhr.responseXML);
        }
    }
    xhr.open(''+GetOrPost+'',''+requestUrl+'');
    xhr.send(null);
}

//_________________________________NAV___________________________________\\
var menu = document.getElementById('smallMenu');                                                        //Get the menu icon
var mobileExpand = document.getElementById('mobileExpand');                                             //Get the mobileOptionsList thing
var mobileExpand_li = mobileExpand.firstChild.nextSibling.clientHeight;                                 //Get the height of the first element in the list

menu.onclick=function(){                                                    
    if(mobileExpand.clientHeight == 0){                                                                 //If the height of the list is 0....
        mobileExpand.setAttribute('style','height:'+mobileExpand_li*3+'px;');                           //Expand it to 4 times the height of the first element (4 menu elements)
        menu.setAttribute('class','menu_active');                                                       //Set the menu icons background-color to the mobileExpand_li's colour
    }else{
        mobileExpand.setAttribute('style','');                                                          //Else just make it unset
        menu.setAttribute('class','');                                                                  //Unset menu icon class
    }
};

document.body.onclick = function(e){
    if(mobileExpand.clientHeight != 0){console.log(mobileExpand.clientHeight);
        if(e.target.getAttribute('data-type') != 'menu_item'){
            mobileExpand.setAttribute('style','');                                                      //Unset menu height styles
            menu.setAttribute('class','');                                                              //Unset menu icon class
        }
    }
}

//______________________________EDITOR___________________________________\\
if(windowLocation().indexOf('addCategories') !== -1 && windowLocation != 'editorUse'){
    var information = document.getElementById('textarea');
    
    var informationId = 'textarea';
    var textAreaHighlightId = 'textAreaHighlight';
    var preTextId = 'preText';
    var titleId = 'title';
    
    setTimeout(function(){information.addEventListener('scroll',function(){scrollWithTextarea(informationId, textAreaHighlightId, preTextId);},false);},200);
    information.addEventListener('input',function(){textHighlights(textAreaHighlightId, informationId);},false);
    window.addEventListener('keypress',function(){if(information.value == ''){document.getElementById('textAreaHighlight').innerHTML = '';}});
    window.addEventListener('resize',function(){textHighlights(textAreaHighlightId, informationId);},false);
    previewInfo.addEventListener('click', function(){processTextRegex(informationId, preTextId, titleId, true);}, false);
}

//_____________________________CATEGORIES_________________________________\\

if(windowLocation().search(/subjects\/([^\s]+)\/([^\s]+)\/([0-9+])/) !== -1 && windowLocation != 'addCategories'){
    var normalizeText = 'preText';
    var categoriesTitle = 'categoriesTitle';
    window.addEventListener('load',function(){processTextRegex(normalizeText,normalizeText,categoriesTitle,false);}, false);
}










