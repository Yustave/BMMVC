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

function setCurrentId($value){
    if(isset($_SESSION['curId'])){
        unset($_SESSION['curId']);
    }
    $_SESSION['curId'] = $value;
}
function getCurrentId(){
    if(isset($_SESSION['curId'])){
        return ($_SESSION['curId']);
    }
}
function deleteCurrentId(){
    if(isset($_SESSION['curId'])){
        unset($_SESSION['curId']);
    }
}
?>