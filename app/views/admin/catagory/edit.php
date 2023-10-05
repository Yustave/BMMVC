<?php 
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container">
    <div class="row">
        <section class="col-md-3" style="display: inline;">
                <ul class="list-group">
                <?php foreach($data['cats'] as $cat) : ?>
                    <li class="list-group-item"><a href="<?php echo URLROOT.'Catagory/edit/'.$cat->id?>"><?php echo $cat->name?></a></li>
                <?php endforeach; ?>  
                </ul>   
                <br><br>
                <li class="list-group-item bg-primary">
                    <a href="<?php echo URLROOT.'Catagory/create'?>" class=" text-white pd-5">Create New </a>
                </li>
        </section>
        
        
        <section class="col-md-9" style="display: inline;">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-primary">Edit Category</h1>
                <div class="card p-5">
                    <form action="<?php $this->view('Catagory/home')?>" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid': '' ; ?>" id="name" name="name" placeholder="Name">
                        <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </section>

        
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"?>


    