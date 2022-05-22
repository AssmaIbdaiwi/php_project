<?php
//set page title 
function getTitle(){
    global $pageTitle;
    if (isset($pageTitle)) {
        return langs($pageTitle);
    }
    else{
        return langs('DEFAULT');
    }
}


?>