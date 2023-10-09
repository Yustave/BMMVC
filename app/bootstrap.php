<?php
require_once "../app/configs/Configs.php";
require_once "../app/helper/helper.php";

spl_autoload_register(function($className){
    require_once "../app/libs/".$className.".php";
})

?>