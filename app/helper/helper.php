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

function setCateID($values){
    if(isset($_SESSION['currentID'])){
        unset($_SESSION['currentID']);
    }
    $_SESSION['currentID'] = $values;
}

function getCateID(){
    if(isset($_SESSION['currentID'])){
        return $_SESSION['currentID'];
    }
}

function unsetCateID(){
    unset($_SESSION['currentID']);
}
?>