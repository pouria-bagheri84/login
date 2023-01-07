


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registery</title>
    <!-- bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "method.php";

if (isset($_POST['login_btn'])) {
    $data = $_POST['frm'];
	login($data);
    
}


?>
    <main class="w-50 m-auto">
        <form action="login.php" method="POST" class="mt-5 pt-5 row align-item-center justify-content-center needs-validation" novalidate>
            <h1 class="text-center">Login!</h1>
            <div class="mb-3 col-lg-6">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="frm[email]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <div class="invalid-feedback">
                     Please provide a valid Email address.
                </div>
            </div><br>
            <div class="mb-3 col-lg-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="frm[password]" class="form-control" id="exampleInputPassword1" required>
                <div class="invalid-feedback">
                     Please provide a valid Password.
                </div>
            </div><br>
            <div class="mb-3 form-check col-lg-6">
                <a href="index.php">create an account</a>
            </div><br><br>
            
            <div class="mb-3 form-check col-lg-6 text-center">
                <button type="submit" name="login_btn" class="btn btn-primary btn-sm col-lg-4">Submit</button>
            </div>

        </form>
    </main>

    <script src="asset/js/main.js"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>