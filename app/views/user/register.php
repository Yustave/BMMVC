<?php 
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1 class="text-primary">Register To Be A Consellation</h1>
        <div class="card p-5">
        
            <form action="<?php echo URLROOT."user/register" ?>" method="post"> 

                <div class="mb-3">
                    <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid': '' ; ?>" id="username" name="username" placeholder="Username"
                            >
                    <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid': '' ; ?>" id="Email" name="Email" placeholder="Email">
                    <span class="text-danger"><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control <?php echo !empty($data['pass_err']) ? 'is-invalid': '' ; ?>" id="password" name="password" placeholder="Passwords" >
                    <span class="text-danger"><?php echo !empty($data['pass_err']) ? $data['pass_err'] : ''; ?></span>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control <?php echo !empty($data['comfrimPass_err']) ? 'is-invalid': '' ; ?>" id="comfrim_password" name="comfrim_password" placeholder="Confrim Passwords" >
                    <span class="text-danger"><?php echo !empty($data['comfrimPass_err']) ? $data['comfrimPass_err'] : ''; ?></span>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">remember me</label>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
                
                <div>
                    <p>Aready have an account? <a href="<?php echo URLROOT."user/login" ?>">login</a></p>
                </div>

            </form>
            </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"?>