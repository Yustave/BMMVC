<?php 
require_once APPROOT . "/views/inc/header.php";
require_once APPROOT . "/views/inc/nav.php";
?>

<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1 class="text-primary">Register To Be A Consellation</h1>
        <div class="card p-5">
        
            <form>
            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Passwords" >
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <div>
                <p>Aready have an account? <a href="<?php echo URLROOT."user/login" ?>">Register</a></p>
            </div>
            </form>
            </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"?>