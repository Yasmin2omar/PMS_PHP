<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php require_once('inc/header.php'); ?>
<?php include_once("core/function.php"); ?>
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
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php $totalPay=0; ?>
                            <?php foreach($_SESSION['cartData'] as $key=>$value): ?>
                            <li class="border p-2 my-1"> <?=$value['name']; ?>
                                <span class="text-success mx-2 mr-auto bold"><?=$value['quantity']." x $".$value['price'];$totalPay+=$value['quantity']*$value['price'] ;?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <h3><?="$".$totalPay;?></h3>
                </div>
            </div>
            <div class="col-8">
                            <?php showMessege(); ?>
                <form  method="POST" action="handlers/checkout_handler.php" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="note"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>