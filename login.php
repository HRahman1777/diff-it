<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_SESSION['username'])) {
    header("location: home.php");
}
?>


<?php

if (isset($_POST['Submit'])) {
    include_once("config.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">diff_it</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> About </a></li>
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> Contact </a></li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="signup.php"><i class="bi bi-person-fill"></i> Sign
                        Up</a></li>
            </ul>

        </div>
    </nav>

    <div class="container">

        <div class="s_form">
            <form role="form" action="login.php" method="post">

                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Username</label>
                    <input type="text" name="user_user_name" placeholder="username" class="form-username form-control" required />
                </div>

                <div class="form-group">
                    <label class="sr-only" for="form-about-yourself">Password</label>
                    <input type="password" name="user_pass" placeholder="password" class="form-username form-control" required />
                </div>

                <button type="submit" class="btn btn-dark" name="Submit"><strong>Login</strong></button>
            </form>
        </div>


    </div>


    <footer class="footer-fix">
        <p id="copyrightid">Copyright &copy; HasiburRahman 2021</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>