<?php
include('../includes/db_connect.php');
session_start();
if(!isset($_SESSION['emailid']))
{
    header('location:../../login.php');
}


$user_email=$_SESSION['emailid'];
$name="SELECT * FROM users";
$result_name= mysqli_query($connect, $name);
$user_email=$_SESSION['emailid'];
    $sql = "SELECT * FROM users WHERE emailid='$user_email'";
		$result = $connect->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$user_id=$row['id'];
            $user_firstname=$row['firstname'];
            $user_lastname=$row['lastname'];
        
        }
    }
?><html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Css Styslesheets-->
        <link rel="stylesheet" href="../assets/css/nav.css">

      
        <!-- =====GOOGLE FONT===== -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,900&family=Roboto&family=Rubik:ital,wght@1,900&family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/c91aa22992.js" crossorigin="anonymous"></script>
       
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     

        <title>Placement Cell | PlacementOfficer</title>
         
    </head>
    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header__toggle ">
                <i class='bx bx-menu bx-x' id="header-toggle"></i>
            </div>
             <div class="header_title mt-2 ml-5">
                <h5>PlacementOfficer Panel</h5>
             </div>
             <div class="mt-3">
                <h4>Welcome <?php echo $user_firstname.' '.$user_lastname?></h4>    
            </div>
        </header>

        <div class="l-navbar showing" id="nav-bar">
            <nav class="nav" style="overflow-y:auto">
                <div>
                    <a class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Placementofficer</span>
                    </a>

                    <div id= "left-nav" class="nav__list admin_nav_list">
                        <a href="../placementofficer/dashboard.php" class="nav__link admin_nav_link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                       <a href="../placementofficer/staff.php" class="nav__link admin_nav_link">
                        <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Staff</span>
                        </a>
                        <a href="../placementofficer/student.php" class="nav__link admin_nav_link">
                        <i class="fa-sharp fa-solid fa-graduation-cap"></i>

                        <span class="nav__name">Students</span>
                        </a>
                        
                        <a href="../placementofficer/company.php" class="nav__link admin_nav_link">
                        <i class="fa-regular fa-building"></i>
                            <span class="nav__name">Company Details</span>
                        </a>
                        <a href="../placementofficer/placementdetails.php" class="nav__link admin_nav_link">
                        <i class="fa-sharp fa-solid fa-laptop-file"></i>
                            <span class="nav__name">Placement Details</span>
                        </a>
                        <a href="../placementofficer/guidelines.php" class="nav__link admin_nav_link">
                        <i class="fa-sharp fa-solid fa-laptop-file"></i>
                            <span class="nav__name">Guidelines</span>
                        </a>
                    </div>
            </div>
                <div class="mt-3">
                <a href="../includes/logout.php?user=admin" class="nav__link  admin_nav_link text-light">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Logout</span>
                </a>
            </div>
            </nav>
        </div>