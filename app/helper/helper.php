<?php
session_start();
function setUserSession($user){
    $_SESSION[('currentUser')] = $user;
}

function getUserSession(){
    if(isset($_SESSION['currentUser'])) {
        print_r( $_SESSION['currentUser']);
    }else{
        return false;
    }
}

function unsetUserSession(){
    unset($_SESSION['currentUser']);
}

?>