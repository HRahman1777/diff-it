<!DOCTYPE html>
<html lang="en">

<?php
include_once("config.php");
if (isset($_POST['Submit'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['user_first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['user_last_name']);
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_pass = mysqli_real_escape_string($mysqli, md5($_POST['user_pass']));
    $user_social_link = mysqli_real_escape_string($mysqli, $_POST['user_s_link']);

    $ins_qu = "INSERT INTO users(f_name,l_name, u_name, email, passwd, s_link) VALUES('$first_name','$last_name', '$user_name','$user_email','$user_pass', '$user_social_link')";

    $result = mysqli_query($mysqli, $ins_qu);
    if ($ins_qu == true) {
        if ($result == true) {
            header("Location: signup.php");
        } else {
            echo "you have a error [2]";
        }
    } else {
        echo "you have a error [1]";
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
        <a class="navbar-brand" href="home.php">diff_it</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> About </a></li>
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> Contact </a></li>

            </ul>
            <ul class="navbar-nav">

                <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i>
                        Login</a></li>

            </ul>

        </div>
    </nav>

    <div class="container">

        <div class="s_form">
            <form role="form" action="signup.php" method="post">
                <div class="form-group">
                    <label class="sr-only" for="form-first-name">First name</label>
                    <input type="text" name="user_first_name" placeholder="firstname" class="form-username form-control" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Last name</label>
                    <input type="text" name="user_last_name" placeholder="lastname" class="form-username form-control" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Username</label>
                    <input type="text" name="user_user_name" placeholder="username" class="form-username form-control" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="email" name="user_email" placeholder="email address" class="form-username form-control" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-about-yourself">Password</label>
                    <input type="password" name="user_pass" placeholder="password" class="form-username form-control" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Social Media Link</label>
                    <input type="text" name="user_s_link" placeholder="fb, twitter or any" class="form-username form-control" />
                </div>
                <button type="submit" class="btn btn-dark" name="Submit"><strong>Sign up</strong></button>
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