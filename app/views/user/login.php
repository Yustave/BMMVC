<?php 
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1 class="text-primary">Constellation Account Login</h1>
        <div class="card p-5">
        
        <form action="<?php echo URLROOT."user/login" ?>" method="post">

            <div class="mb-3">
                <input type="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid': '' ; ?>" id="Email" name="Email" placeholder="Email">
                <span class="text-danger"><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control <?php echo !empty($data['pass_err']) ? 'is-invalid': '' ; ?>" id="password" name="password" placeholder="Passwords" >
                <span class="text-danger"><?php echo !empty($data['pass_err']) ? $data['pass_err'] : ''; ?></span>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">remember me</label>
            </div>

            <button type="submit" class="btn btn-primary">LOG IN</button>

            <div>
                <p>Don't have one? <a href="<?php echo URLROOT."user/register" ?>">Register</a></p>
            </div>

    </form>
            </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"?>