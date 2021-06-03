<!DOCTYPE html>
<html lang="en">

<?php
include_once("backend/config.php");
if (isset($_POST['Submit'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['user_first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['user_last_name']);
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_pass = mysqli_real_escape_string($mysqli, md5($_POST['user_pass']));
    $user_social_link = mysqli_real_escape_string($mysqli, $_POST['user_s_link']);

    $select_qu = "SELECT * FROM users WHERE u_name='$user_name'";
    $ins_qu = "INSERT INTO users(f_name,l_name, u_name, email, passwd, s_link) VALUES('$first_name','$last_name', '$user_name','$user_email','$user_pass', '$user_social_link')";

    $res_check = mysqli_query($mysqli, $select_qu);

    if (mysqli_num_rows($res_check) > 0) {
        $uname_error = "Sorry... username already taken";
    } else {
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
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signup | diff-it</title>

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
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                </ul>
                <ul class="navbar-nav d-flex">
                    <li class=" nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="s_form">
            <form role="form" action="signup.php" method="post">
                <div class="form-group">
                    <label class="sr-only" for="form-first-name">First name</label>
                    <input type="text" name="user_first_name" placeholder="firstname" class="form-username form-control mb-2" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Last name</label>
                    <input type="text" name="user_last_name" placeholder="lastname" class="form-username form-control mb-2" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Username</label>
                    <input type="text" name="user_user_name" placeholder="username" class="form-username form-control mb-2" required />
                </div>

                <?php if (isset($uname_error)) : ?>
                    <span><?php echo $uname_error; ?></span>
                <?php endif ?>

                <div class="form-group">
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="email" name="user_email" placeholder="email address" class="form-username form-control mb-2" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-about-yourself">Password</label>
                    <input type="password" name="user_pass" placeholder="password" class="form-username form-control mb-2" required />
                </div>
                <div class="form-group">
                    <label class="sr-only" for="form-last-name">Social Media Link</label>
                    <input type="text" name="user_s_link" placeholder="fb, twitter or any" class="form-username form-control mb-2" />
                </div>
                <button type="submit" class="btn btn-dark" name="Submit"><strong>Sign up</strong></button>
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