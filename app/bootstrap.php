<?php
require_once "../app/configs/Configs.php";
// require_once "../app/libs/Core.php";
// require_once "../app/libs/Controllers.php";
// require_once "../app/libs/Database.php";

spl_autoload_register(function($className){
    require_once "../app/libs/".$className.".php";
})

?>