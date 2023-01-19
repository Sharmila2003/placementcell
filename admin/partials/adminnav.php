<?php
    include('../includes/db_connect.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:../../login.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Css Styslesheets-->
        <link rel="stylesheet" href="../assets/css/nav.css">
        <link rel="stylesheet" href="../assets/css/admin.css">

      
        <!-- =====GOOGLE FONT===== -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  

       
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     

        <title>Placement Cell | Admin</title>
         
    </head>
    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header__toggle ">
                <i class='bx bx-menu bx-x' id="header-toggle"></i>
            </div>
             <div class="header_title mt-2 ml-5">
                <h5>Admin Panel</h5>
             </div>

            
             <div class="mt-3">
                <a href="../includes/logout.php?user=admin" class="nav__link  admin_nav_link text-danger">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Logout</span>
                </a>
            </div>
        </header>

        <div class="l-navbar showing" id="nav-bar">
            <nav class="nav" style="overflow-y:auto">
                <div>
                    <a class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Admin</span>
                    </a>

                    <div id= "left-nav" class="nav__list admin_nav_list">
                        <a href="../admin/dashboard.php" class="nav__link admin_nav_link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="../admin/placementoff.php" class="nav__link admin_nav_link">
                        <i class='bx bxs-user-detail'></i>
                            <span class="nav__name">Placement Officer</span>
                        </a>

                        <a href="../admin/staff.php" class="nav__link admin_nav_link">
                        <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Staff</span>
                        </a>
                        <a href="../admin/student.php" class="nav__link admin_nav_link">
                        <i class="fa-sharp fa-solid fa-graduation-cap"></i>

                        <span class="nav__name">Students</span>
                        </a>
               
                        <a href="../admin/company.php" class="nav__link admin_nav_link">
                        <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Company Details</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>