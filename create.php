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

  <div class="product-card">

    <div class="product-info">
    <form method="POST" action="handlers/createItem_handler.php">
      <p><b>Product Name: <input type="input" name="name" value="">&nbsp;&nbsp;</b></p>
      <p><strong>Old_Price: </strong><input type="input"name="old_price" value=""></p>
      <p><strong>New_Price: </strong><input type="input"name="new_price" value=""></p>
        <p><strong>Img_URL: </strong><input type="input"name="url" value=""></p>
    </div>
    <div class="product-actions">

        <button class="btn-update" type="submit" name="create"value="">Create</button>
      </form>
        
    </div>
  </div>
</div>


<?php require_once('inc/footer.php'); ?>