<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
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
      <li><a href="handlers/logout_handler.php" class="logout-btn">Logout</a></li>
    </ul>

  </nav>
  <div class="admin-container">


    <?php showMessege();?>

<?php if(isset( $_SESSION['search'])): ?>
  <div class="product-card">
    <img src="<?= $_SESSION['search']['img']?>" alt="Product Image">
    <div class="product-info">
    <form method="get" action="handlers/editItem_handler.php">
      <p><b>Product Name: <input type="input" name="name" value="  <?= $_SESSION['search']['name']?>">&nbsp;&nbsp;</b></p>
      <p><strong>Old_Price: </strong><input type="input"name="old_price" value=" $<?= $_SESSION['search']['old_price']?>"></p>
      <p><strong>New_Price: </strong><input type="input"name="new_price" value=" $<?= $_SESSION['search']['price']?>"></p>
        <p><strong>Img_URL: </strong><input type="input"name="url" value=" <?= $_SESSION['search']['img']?>"></p>
    </div>
    <div class="product-actions">

        <button class="btn-update" type="submit" name="edit"value="<?= $_SESSION['search']['id']?>">Update</button>
      </form>
        
    </div>
    <?php endif; ?>
  </div>
</div>


<?php require_once('inc/footer.php'); ?>