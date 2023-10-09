<?php 
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container">
    <h1 style="text-align: center;">Admin Pannel</h1>
    <div width="60vw" style="margin: 0 auto;">
        <ul class="list-group"  width="30vw" style="margin: 0 auto;">
            <li class="list-group-item"><a href="<?php echo URLROOT.'Catagory/create'?>">Catagory</a></li>
            <li class="list-group-item"><a href="<?php echo URLROOT.'Post/home/1'?>">Post</a></li>
        </ul>   
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"?>