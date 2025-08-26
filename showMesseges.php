<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<?php include_once("handlers/showMessegeToAdmin_handler.php");?>
<?php include_once("core/function.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>🅷𝗘Ⓡ ᴄ𝐴🆁𝐄 </title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
    .admin-container section {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .order-container {
        flex: 1 1 calc(33% - 20px);
        max-width: 400px;
        min-width: 280px;
    }

    .card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card h2 {
        margin-bottom: 15px;
        font-size: 20px;
        color: #333;
    }

    .card table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .card table th,
    .card table td {
        padding: 8px;
        text-align: left;
    }

    .card table th {
        background: #f5f5f5;
    }
    </style>

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
            <li><a href="showProducts.php" class="new-product-btn">Products</a></li>
        </ul>
        <ul class="nav-links">
            <li><a href="showOrder.php" class="new-product-btn">Orders</a></li>
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
    <?php if(!empty($Messeges)): ?>
    <?php foreach($Messeges as $key=> $Messege):?>
        <div class="order-container">
            <div class="card">
                <h2>Client <?=$key+1?> Messege</h2>
                <div class="user-info">
                    <p><strong>Name:</strong> <?= $Messege['name']?></p>
                    <p><strong>Email:</strong> <?= $Messege['email']?></p>
                    <p><strong>Messege:</strong> <?= $Messege['messege']?></p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    <?php endif;?>
</section>

    </div>
    <?php require_once ('inc/footer.php'); ?>