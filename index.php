<!DOCTYPE html>
<html lang="en">

<?php
session_start();
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
                <li class="nav-item"><a class="nav-bg nav-link" href="home.php"> Home </a></li>
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> Posts </a></li>
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> About </a></li>
                <li class="nav-item"><a class="nav-link nav-bg" href="#"> Contact </a></li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="profile.php"><i class="bi bi-person-fill"></i>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "username";
                        } ?>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="signup.php"><i class="bi bi-person-fill"></i> Sign
                        Up</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i>
                        Login</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i>
                        Logout</a></li>
            </ul>

        </div>
    </nav>

    <div class="container">

        <h1>This is index page</h1>

    </div>


    <footer class="footer-fix">
        <p id="copyrightid">Copyright &copy; HasiburRahman 2021</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>