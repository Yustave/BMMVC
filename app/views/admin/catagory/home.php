<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<h1 class="text-info text-center my-3">Admin Category Panel</h1>
 
<div class="container-fluid container">
    <div class="row">
        <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <a class=" btn btn-primary mb-2" aria-current="page" href="<?php echo URLROOT . "admin/home"; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>                 
                    </div>

                    <div class="card-block">
                        <ul class="list-group ">                         
                                <?php foreach($data['cats'] as $cate): ?>
                                    <li class="list-group-item rounded-0 d-flex d-flex justify-content-between" >
                                       <span><?php echo  $cate->name;?></span>
                                       <span>
                                        <a href="<?php echo URLROOT . 'catagory/edit/' . $cate->id ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="<?php echo URLROOT . 'catagory/delete/' . $cate->id ;?>" style="margin-left: 10px;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                       </span>                                       
                                    </li>
                                <?php endforeach;?>                                                          
                        </ul>
                    </div>
                </div>
        </div>


            <div class="col-md-5 offset-md-1 border p-4 ">
                <form action="<?php echo URLROOT . 'catagory/create'?>" method="post" >
                            <h1 class="text-center text-info mb-3">Add Category</h1>
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : '' ?>" id="name"  name="name">
                                <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : '' ?></span>
                            </div>
                            <div class="">
                                <div class="float-end">
                                        <button class="btn btn-outline-secondary">Cancle</button>
                                        <button class="btn btn-primary">Create</button>
                                </div>
                            </div>
                </form>
            </div>

    </div>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>