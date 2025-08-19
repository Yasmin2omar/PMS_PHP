
<?php require_once('inc/header.php'); ?>
<?php include_once __DIR__."/handlers/addToCart_handler.php";?>

<!-- Header-->
<header class="bg-dark py-5">
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
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Image</th>        
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                            <?php $totalPay=0;?>
                            <?php if (!empty($_SESSION['cartData'])): ?> 
                            <?php foreach($_SESSION['cartData'] as $index=> $product): ?>

                        <tr>
                            <th scope="row"><?=$index+1?></th>
                            <td><?= $product['name'] ?></td>
                            <td><img src="<?= $product['img'] ?>" width="100px"></td>
                            <td><?= "$".$product['price'] ?></td>
                            <td>
                                <input type="number" value="<?= $product['quantity'] ?>">
                            </td>
                            <td><?="$".$_SESSION['total']=$product['quantity']*$product['price'];$totalPay+=$product['quantity']*$product['price']?></td>
                            
                            <td>
                                <form method="get" action="handlers/delete_handler.php">
                                    <button type="submit" name="delete" class="btn btn-danger" value="<?=$index?>">Delete</button>
                                </form>
                            </td>
                        </tr>                    
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td colspan="2">
                                Total Price
                            </td>
                            <td colspan="4">
                                <h3><?="$". $totalPay ?></h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>