<!DOCTYPE html>
<html lang="en">


<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | diff-it</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">

    <style>
        .cc {
            background-color: #F4ECF7;
        }
    </style>

</head>

<body>

    <input type="text" id="aid" value="<?php echo $_SESSION['id'] ?>" hidden>
    <input type="text" id="aname" value="<?php echo $_SESSION['username'] ?>" hidden>

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
                        <a class="nav-link" href="profile.php"><i class="bi bi-person-fill"></i>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo $_SESSION['username'];
                            } else {
                                echo "username";
                            } ?>
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <h1 class="text-center">This is Home Page</h1>

        <div class="text-center border rounded border-dark p-2 mb-5">
            <form class="postFormId">
                <div class="input-group">
                    <textarea class="form-control mb-2" id="postTitleId" placeholder="write your topic......" required></textarea>
                </div>
                <button type="submit" id="postSubmitId" class="btn btn-dark"><strong>Post it</strong></button>

            </form>
        </div>

        <div id="postDiv">
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