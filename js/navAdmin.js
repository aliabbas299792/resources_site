//____________________________NAV_ADMIN_________________________________\\
var navAdminButton = document.getElementById('navAdminMobButton');                                             //Get the menu icon
var mobileExpand_admin = document.getElementById('navAdminLinks');                                             //Get the mobileOptionsList thing
var mobileExpand_li_admin = mobileExpand_admin.firstChild.nextSibling.clientHeight;                            //Get the height of the first element in the list

navAdminButton.onclick=function(){                                                    
    if(mobileExpand_admin.clientHeight == 0){                                                                  //If the height of the list is 0....
        mobileExpand_admin.setAttribute('style','height:'+mobileExpand_li_admin*5+'px;');                      //Expand it to 5 times the height of the first element (4 menu elements)
        navAdminButton.setAttribute('class','menu_active');                                                    //Set the menu icons background-color to the mobileExpand_li's colour
    }else{
        mobileExpand_admin.setAttribute('style','');                                                           //Else just make it unset
        navAdminButton.setAttribute('class','');                                                               //Unset menu icon class
    }
};

document.onclick = function(e){
    if(mobileExpand_admin.clientHeight != 0){
        if(e.target.getAttribute('data-type') != 'adminMenuItem'){
            mobileExpand_admin.setAttribute('style','');                                                       //Unset menu height styles
            navAdminButton.setAttribute('class','');                                                           //Unset menu icon class
        }
    }
}