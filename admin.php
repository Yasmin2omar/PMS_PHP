<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<?php include_once("handlers/admin_handler.php");?>
<?php include_once("core/function.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Navbar</title>
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
      <li><a href="handlers/logout_handler.php" class="logout-btn">Logout</a></li>
    </ul>

  </nav>
  <div class="admin-container">

  <div class="search-box">
    <?php showMessege();?>
    <form method="POST" action="handlers/admin_handler.php">
      <input type="text" name="search" placeholder="Search by product name...">
      <button type="submit">Search</button>
    </form>
  </div>
<?php if(isset( $_SESSION['search'])): ?>
  <div class="product-card">
    <img src="<?= $_SESSION['search']['img']?>" alt="Product Image">
    <div class="product-info">
      <p><b><?= $_SESSION['search']['name']?>&nbsp;&nbsp;</b></p>
      <p><strong>Old_Price:</strong> $<?= $_SESSION['search']['old_price']?></p>
      <p><strong>New_Price:</strong> $<?= $_SESSION['search']['price']?>&nbsp;</p>

    </div>
    <div class="product-actions">
      <form method="get" action="handlers/deleteItem_handler.php">
        <button type="submit" class="btn-delete" name="delete" value="<?= $_SESSION['search']['id']?>">Delete</button>
      </form>

      <form method="get" action="edit.php">
        &nbsp;<button class="btn-update" type="submit" name="edit"value="<?= $_SESSION['search']['id']?>">Edit</button>
      </form>
        
    </div>
    <?php endif; ?>
  </div>
</div>


<?php require_once('inc/footer.php'); ?>