<?php
    include('../includes/db_connect.php');
    session_start();
    if(!isset($_SESSION['emailid']))
    {
        header('location:../../login.php');
    }
    $user_email=$_SESSION['emailid'];
    $sql ="SELECT * FROM users as u JOIN placement_interested as p_i on p_i.stud_id=u.id WHERE u.emailid='$user_email'";
		$result = $connect->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$stud_id=$row['id'];
            $user_firstname=$row['firstname'];
            $user_lastname=$row['lastname'];
            $interested_status=$row['interested_status'];
            $plament_status_query = "SELECT * FROM placement_status WHERE studentid=$stud_id";
            $placment_status_res = $connect->query($plament_status_query);
                if ($placment_status_res->num_rows > 0) {
                    while($row2 = $placment_status_res->fetch_assoc()) {
                        $placement_status_id=$row2['id'];
                        $placement_status=$row2['placement_status'];
                    }
                }
        }
    }
?>
<html>
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
     

        <title>Placement Cell | Student</title>
        <style> 
        * {
    box-shadow: none;
}

.container {
    max-width: 1000px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.switch-holder {
    margin-top:25px;
    display: flex;
    padding: 10px 20px;
    border-radius: 10px;
    margin-bottom: 30px;
    box-shadow: -8px -8px 15px rgba(255,255,255,.7),
                10px 10px 10px rgba(0,0,0, .3),
                inset 8px 8px 15px rgba(255,255,255,.7),
                inset 10px 10px 10px rgba(0,0,0, .3);
    justify-content: space-between;
    align-items: center;
}

.switch-label {
    width: 150px;
}

.switch-label i {
    margin-right: 5px;
}

.switch-toggle {
    height: 40px;
}

.switch-toggle input[type="checkbox"] {
    position: absolute;
    opacity: 0;
    z-index: -2;
}

.switch-toggle input[type="checkbox"] + label {
    position: relative;
    display: inline-block;
    width: 100px;
    height: 40px;
    border-radius: 20px;
    margin: 0;
    cursor: pointer;
    box-shadow: inset -8px -8px 15px rgba(255,255,255,.6),
                inset 10px 10px 10px rgba(0,0,0, .25);
    
}

.switch-toggle input[type="checkbox"] + label::before {
    position: absolute;
    content: 'NO';
    font-size: 13px;
    text-align: center;
    line-height: 25px;
    top: 8px;
    left: 8px;
    width: 45px;
    height: 25px;
    border-radius: 20px;
    background-color: #d1dad3;
    box-shadow: -3px -3px 5px rgba(255,255,255,.5),
                3px 3px 5px rgba(0,0,0, .25);
    transition: .3s ease-in-out;
}

.switch-toggle input[type="checkbox"]:checked + label::before {
    left: 50%;
    content: 'YES';
    color: #fff;
    background-color: #00b33c;
    box-shadow: -3px -3px 5px rgba(255,255,255,.5),
                3px 3px 5px #00b33c;
}

</style>
    </head>
    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header__toggle ">
                <i class='bx bx-menu bx-x' id="header-toggle"></i>
            </div>
             <div class="header_title mt-2 ml-5">
                <h5>Student Panel</h5>
             </div>
 <div class="switch-holder">
            <div class="switch-label">
                <span>Placement Interested</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="bluetooth" <?php echo $interested_status==1?'checked':null?> onclick="return no()">
                <label for="bluetooth"></label>
            </div>
        </div>


        <script>
	// function no(){
    //     var checkbox = document.getElementById('bluetooth');
    //     if (checkbox.checked == true)
    //     {
    //         if(confirm("Are you sure you want to update the placement status")){
    //        <?php 
    //          $interested_status_query="UPDATE placement_interested set interested_status=1 WHERE id=3";
    //          $interested_status_result=mysqli_query($connect,$interested_status_query);
            
    //         ?>
    //         }else{
    //             location.reload();
    //         }
    //     }else if(checkbox.checked == false) {
    //        if(confirm("Are you sure you are not interested in placement")){
    //         <?php 
    //          $interested_status_query="UPDATE placement_interested set interested_status=0 WHERE id=3";
    //          $interested_status_result=mysqli_query($connect,$interested_status_query);
            
    //         ?>
    //        }else{
    //         location.reload();
    //        }
    //     }
        
	// }
	</script>
        </header>

        <div class="l-navbar showing" id="nav-bar">
            <nav class="nav" style="overflow-y:auto">
                <div>
                    <a class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Student</span>
                    </a>

                    <div id= "left-nav" class="nav__list admin_nav_list">
                        <a href="../student/dashboard.php" class="nav__link admin_nav_link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="../student/company.php" class="nav__link admin_nav_link">
                        <i class="fa-regular fa-building"></i>
                            <span class="nav__name">Company</span>
                        </a>

                        <a href="../student/guidelines.php" class="nav__link admin_nav_link">
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