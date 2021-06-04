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

        .proimg {
            width: 150px;
            height: 180px;
            margin: 1rem;
        }
    </style>

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

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">



        <div class="row" style="margin-top: 3rem;">
            <div class="col">
            </div>
            <div class="col-7">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/def_pp.png" class="proimg" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php
                                    echo $_SESSION['fname'], " ", $_SESSION['lname'];
                                    echo "<br><i>@", $_SESSION['username'], "</i>";
                                    ?>
                                </h4>
                                <h6>
                                    <?php
                                    echo "Email: ", $_SESSION['email'];
                                    ?>
                                </h6>
                                <h8>
                                    <?php
                                    echo "Social Media Link: ";
                                    echo "<a href=", $_SESSION['slink'], " target='_blank' >click here</a>";
                                    ?>
                                </h8>
                                <p class="card-text"><small class="text-muted"></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
        <hr>
        <h5 class="text-center">All Posts</h5>
        <hr>


        <?php

        include_once('backend/config.php');

        $uid = $_SESSION['id'];

        $sql = "SELECT posts_table.p_title FROM posts_table INNER JOIN users ON posts_table.a_id=users.id WHERE users.id={$uid} ORDER BY posts_table.p_id DESC";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <div class='border rounded border-primary p-2 mb-5 cc'>
                    <h4 class='text-center mt-2 border border-primary p-2'> <?php echo $row['p_title'] ?>
                        <a href="#" class="btn btn-dark btn-sm">View This Post</a>
                    </h4>
                </div>

        <?php
            }
        }
        ?>





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