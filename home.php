<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php require_once ('inc/header.php'); ?>
<?php include_once("handlers/home_handler.php");?>
        <!-- Header-->
        <header class=" py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Your Skin Deserves the Best</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Premium skincare products for a glowing and healthy look</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
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
                                    <button type="submit" class="btn btn-outline-dark mt-auto" name="add" >Add To Cart</button>
                                </form></div>
                            </div>
                        </div>
                    </div>
                 <?php endforeach; ?>
                 </div>
                 </div>
                </section>
<?php require_once ('inc/footer.php'); ?>