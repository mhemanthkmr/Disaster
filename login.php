<?php 
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['flag'] = 2;
    $_SESSION['message'] = "You are aldready logged in";
    header("Location: index.php");
    exit(0);
}
include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('message.php')?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method = "POST" class="">
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input required type="email" placeholder="Enter Email" class = "form-control" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input required type="password" placeholder="Enter Password" class = "form-control" name="password">
                            </div>
                            <div class="form-group mb-3 text-center">
                                <button class="btn btn-primary"  type="submit" name="login_btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>