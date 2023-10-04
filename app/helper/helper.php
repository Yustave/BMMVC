<?php
session_start();

function redirect($page){
    header('Location:'.$page);
}
function setUserSession($user){
    $_SESSION[('currentUser')] = $user;
}

function getUserSession(){
    if(isset($_SESSION['currentUser'])) {
        return ( $_SESSION['currentUser']);
    }else{
        return false;
    }
}

function unsetUserSession(){
    unset($_SESSION['currentUser']);
}

?>