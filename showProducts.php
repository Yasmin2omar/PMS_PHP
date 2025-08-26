
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<?php include_once("core/function.php"); ?>
<?php include_once("handlers/home_handler.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🅷𝗘Ⓡ ᴄ𝐴🆁𝐄 </title>
  <link rel="stylesheet" href="css/styles.css">

</head>
<body>

  <nav class="dashboard-navbar">
    <div class="logo">
      🅷𝗘Ⓡ ᴄ𝐴🆁𝐄 <span class="dashboard-text">Dashboard</span>
    </div>
    <ul class="nav-links">
      <li><a href="create.php" class="new-product-btn">New Product</a></li>
    </ul>
    <ul class="nav-links">
      <li><a href="showOrder.php" class="new-product-btn">Orders</a></li>
    </ul>
              <ul class="nav-links">
      <li><a href="showMesseges.php" class="new-product-btn">Messeges</a></li>
    </ul>
    <ul class="nav-links">
      <li><a href="admin.php" class="new-product-btn">Search</a></li>
    </ul>
    <ul class="nav-links">
      <li><a href="handlers/logout_handler.php" class="logout-btn">Logout</a></li>
    </ul>

  </nav>
  <div class="admin-container">

   <section class="py-5">
    <?php showMessege(); ?>
            <?php if(!empty($products)): ?>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($products as $product): ?>    
                <div class="col mb-5">
                        <div class="card h-100">
                                                        <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top"  src="<?= $product['img'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $product['name'] ?></h5>
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$<?= $product['old_price'] ?></span>
                                    <span class="fw-bold text-dark ms-2">$<?= $product['price'] ?></span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                <form method="POST" action="handlers/addToCart_handler.php">
                                    <input type="hidden" name="productId"value="<?= $product['id']?>">
                                    <input type="hidden" name="img" value="<?= $product['img'] ?>">
                                    <input type="hidden" name="name" value="<?= $product['name'] ?>">
                                    <input type="hidden" name="price" value="<?= $product['price'] ?>">
                                </form></div>
                            </div>
                        </div>
                    </div>
                 <?php endforeach; ?>
                 </div>
                 </div>
                 <?php endif;?>
                </section>
                </div>
<?php require_once ('inc/footer.php'); ?>