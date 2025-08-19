<?php include("inc/header.php")  ?>
<?php include_once("core/function.php") ?>
<section class="py-5 d-flex align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
             <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4">Register</h3>
                    <?php showMessege();?>
                    <form method="post" action="handlers/register_handler.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">confirm_password:</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>    
                  </div>                  
        </div>
    </div>
</div>
</section>
<?php include("inc/footer.php") ?>
