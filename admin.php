<?php
session_start();

if (!isset($_SESSION["nom"])) {
    header("Location:template/loginAdmin.php");
    exit();
}
require('database.php');

if (isset($_GET['page'])) {
    $page = strval($_GET['page']);
    if ($page == 'admin') {
        $page_inc = "admin.php";
    } elseif ($page == 'categories') {
        $page_inc = "template/categories.php";
    } elseif ($page == 'subCategories') {
        $page_inc = "template/subCategories.php";
    } elseif ($page == 'adCategories') {
        $page_inc = "template/adCategories.php";
    } elseif ($page == 'adSubCategories') {
        $page_inc = "template/adSubCategories.php";
    } else {
        $page_inc = "template/categories.php";
    }
} else {
    $page_inc = "template/categories.php";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Dashboard</title>
</head>

<body>
    <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark position-absolute " style="width: 280px; height:929px">
            <a href="admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2 " width="40" height="32">

                </svg>
                <span class="fs-4 ms-4"><i class="bi bi-house"></i></span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="admin.php?page=categories" class="nav-link text-white" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                       
                        </svg>
                        Catégories
                    </a>
                </li>

                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                          
                        </svg>
                        Options
                    </a>
                </li>

                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                         
                        </svg>
                        Products
                    </a>
                </li>

            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">

                    <strong><?php echo $_SESSION['nom']; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="template/adAdmin.php">Add admin</a></li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="model/adminLogout.php">Log out</a></li>
                </ul>
            </div>
        </div>
        <?php
        include("$page_inc");
        ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>