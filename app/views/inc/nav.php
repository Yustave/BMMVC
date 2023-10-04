
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo APPROOT."/views/home/index.php"?>"><img src="<?php echo URLROOT . "assets/imgs/icon.png"?>" width="30px"
                height="30px" alt=""> YUSTAVE </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <?php if(getUserSession() == true) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo URLROOT."Home/index" ?>"><?php print_r(getUserSession()) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo URLROOT."user/logout" ?>">Logout</a>
                    </li>
                   
                    
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo URLROOT."user/register" ?>">Register</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="<?php echo URLROOT."user/login" ?>">Login</a>
                    </li>
                    
                <?php endif ; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#">CSGO</a></li>
                        <li><a class="dropdown-item" href="#">VALORANT</a></li>
                        <li><a class="dropdown-item" href="#">SUMMONOR RIFT</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>