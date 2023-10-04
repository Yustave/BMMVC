<?php 
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container">
    <div class="row">
        <section class="col-md-3" style="display: inline;">
                <ul class="list-group">
                    <?php foreach($data as $cat) : ?>
                        <li class="list-group-item"><a href="#"><?php echo $cat->name?></a></li>
                    <?php endforeach; ?>    
                </ul>   
        </section>
        
        <section class="col-md-9" style="display: inline;">
                <p>POST</p>
        </section>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"?>


    