<!doctype html>
<html lang="en">
<?php
    session_start();
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        echo("<script>window.alert('$error');</script>");
        unset($_SESSION['error']);
    }
    session_unset();
    session_destroy();
    ?>
<head>
    <title>login libritis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">biblioteca</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">accedi qui !</h3>
                    <form action="./php/logincheck.php" method="POST" class="signin-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="user" id="user" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" autocomplete="off" class="form-control" placeholder="Password" name="psw" id="psw" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
