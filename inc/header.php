<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<?php require_once __DIR__ ."/../handlers/addToCart_handler.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>🅷𝗘Ⓡ ᴄ𝐴🆁𝐄</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css?v=1" rel="stylesheet" />

    </head>
    <body >
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!" style="color:#281606">🅷𝗘Ⓡ ᴄ𝐴🆁𝐄</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                        <?php if(isset($_SESSION['user'])): ?>
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="home.php"><b>Home</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php"><b>About</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php"><b>Contact</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="handlers/logout_handler.php"><b>Logout</b></a></li>
                    </ul>
                    <form class="d-flex" action="cart.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?=$totalQuantity?></span>
                        </button>
                    </form>
                        <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="index.php"><b>Login</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php"><b>About</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php"><b>Contact</b></a></li>
                        <?php endif; ?>
                </div>
            </div>
        </nav>