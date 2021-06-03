<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_SESSION['username'])) {
    header("location: home.php");
}
?>


<?php

if (isset($_POST['Submit'])) {
    include_once("backend/config.php");
    $u_username = mysqli_real_escape_string($mysqli, $_POST['user_user_name']);
    $u_password = md5($_POST['user_pass']);
    $query = "SELECT * FROM users WHERE u_name ='{$u_username}' AND passwd = '{$u_password}'";

    $result = mysqli_query($mysqli, $query);
    $rows = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);
    session_start();
    if ($rows == 1) {
        $_SESSION['username'] = $row['u_name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['fname'] = $row['f_name'];
        $_SESSION['lname'] = $row['l_name'];
        $_SESSION['slink'] = $row['s_link'];
        header("Location: home.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo "Username or Password don't match";
        echo "</div>";
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | diff-it</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">diff-it</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                </ul>
                <ul class="navbar-nav d-flex">
                    <li class=" nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="s_form">
            <form role="form" action="login.php" method="post">

                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Username</label>
                    <input type="text" name="user_user_name" placeholder="username" class="form-username form-control mb-2" required />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="form-about-yourself">Password</label>
                    <input type="password" name="user_pass" placeholder="password" class="form-username form-control mb-2" required />
                </div>

                <button type="submit" class="btn btn-dark" name="Submit">Login</button>
            </form>
        </div>


    </div>


    <footer class="footer-fix">
        <p id="copyrightid">Copyright &copy; HasiburRahman 2021</p>
    </footer>




    <script src="js/jquerymin.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>