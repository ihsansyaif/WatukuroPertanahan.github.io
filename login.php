<?php
// login.php
error_reporting(E_ALL);
// Menerima data yang dikirim dari formulir

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Melakukan validasi dan otentikasi (misalnya dengan membandingkan dengan data pengguna di database)
if ($username === "admin" && $password === "password") {
    $validCredentials = true;
} else {
    $validCredentials = false;
}

$errorMsg = "";
// Jika login berhasil, set session dan arahkan pengguna ke halaman terotentikasi
if ($validCredentials) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: index.html");
    exit();
} else {
    $errorMsg = "Invalid username or password. Please try again.";
    $_SESSION['errorMsg'] = $errorMsg;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <style type="text/css">
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <br><br><br><br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <form class="user" action="login.php" method="post">
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" id="username" name="username" class="form-control form-control-user" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Password" required>

                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                            if (isset($_SESSION['errorMsg'])) {
                                                echo '<div class="error-message">' . $_SESSION['errorMsg'] . '</div>';
                                                unset($_SESSION['errorMsg']);
                                            }
                                        }
                                        ?>

                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>