<?php
ob_start();
session_start();
require_once 'functions.php';
$admin_obj=new functions(); 



$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['first_name'];
$user_type = $_SESSION['user_type'];
$email_add = $_SESSION['email_address'];

if ($user_type == 2 || $user_id == null) {
    header("Location: ../index.php");
} elseif ($user_id == 3) {
    header("Location: admin/super_admin.php");
}

if (isset($_GET['action'])) {
    $check = $_GET['action'];
    if ($check == 'logout') {
        
        $admin_obj->user_logout();
    }
}
$query = $admin_obj->select_user_profile($email_add);
$row = mysqli_fetch_assoc($query);
$pro_pic = $row['pro_picture_re'];
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/jquery.cleditor.css" />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <!-- chart -->

        <!-- //chart -->
        <!--animate-->
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="js/wow.min.js"></script>

        <script>
            function checkaccept() {
                var check = confirm('Are you sure to do this?');
                if (check) {
                    return true;
                } else {
                    return false;
                }
            }
            function checkDelete() {
                var check = confirm('Are you sure to delete this?');
                if (check) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        <script>
            new WOW().init();
        </script>
        <!--//end-animate-->
        <!----webfonts--->
        <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        <!---//webfonts---> 
        <!-- Meters graphs -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!-- Placed js at the end of the document so the pages load faster -->


    </head> 

    <body class="sticky-header left-side-collapsed"  onload="initMap()">
        <section>
            <!-- left side start-->
            <div class="left-side sticky-left-side">

                <!--logo and iconic logo start-->
                <div class="logo">
                    <h1><a href="admin_master.php"><!--condition for admin types -->Easy <span>Admin</span></a></h1>
                </div>
                <div class="logo-icon text-center">
                    <a href="admin_master.php"><i class="lnr lnr-home"></i> </a>
                </div>

                <!--logo and iconic logo end-->
                <div class="left-side-inner">

                    <!--sidebar nav start-->
                    <ul class="nav nav-pills nav-stacked custom-nav">
                        <?php if ($user_type == 1) { ?>
                            <li class="active"><a href="admin_master.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>

                            <li><a href="property.php?action=add_property"><i class="lnr lnr-cog"></i> <span>Add Property</span></a></li>
                            <li><a href="property.php?action=manage_property"><i class="lnr lnr-spell-check"></i> <span>Manage Property</span></a></li>


                        <?php } elseif ($user_type == 2) { ?>
                            <li class="active"><a href="admin_master.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>

                            <li><a href="property.php?action=looking_for"><i class="lnr lnr-cog"></i> <span>Looking For</span></a></li>
                            <li><a href="property.php?action=for_rent"><i class="lnr lnr-spell-check"></i> <span>For Rent</span></a></li>
                            <li><a href="property.php?action=for_sell"><i class="lnr lnr-menu"></i> <span>For Sell</span></a></li>              

                        <?php } elseif ($user_type == 3) { ?>
                            <li><a href="super_admin.php"><i class="lnr lnr-power-switch"></i> <span>Dashboard</span></a></li>

                        <?php } ?>
                    </ul>
                    <!--sidebar nav end-->
                </div>
            </div>
            <!-- left side end-->

            <!-- main content start-->
            <div class="main-content">
                <!-- header-starts -->
                <div class="header-section">

                    <!--toggle button start-->
                    <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
                    <!--toggle button end-->

                    <!--notification menu start -->
                    <div class="menu-right">
                        <div class="user-panel-top">  	
                            <div class="profile_details_left">
                            </div>
                            <div class="profile_details">		
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">	
                                                <img src="<?php echo $pro_pic; ?>" alt="" style="height: 50px;width: 50px;border-radius: 100%;">
                                                <div class="user-name" style="width:30%;">
                                                    <p><?php echo $user_name; ?> <span><?php
                                                            if ($user_type == 1) {
                                                                echo'Landlord';
                                                            } elseif ($user_type == 2) {
                                                                echo 'Renter';
                                                            }
                                                            ?></span></p>
                                                </div>
                                                <i class="lnr lnr-chevron-down"></i>
                                                <i class="lnr lnr-chevron-up"></i>
                                                <div class="clearfix"></div>	
                                            </div>	
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            
                                            <li> <a href="profile.php?id=<?php echo $user_id ?>"><i class="fa fa-user"></i>Profile</a> </li> 
                                            <li> <a href="?action=logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                        </ul>
                                    </li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>		

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--notification menu end -->
                </div>
                <!-- //header-ends -->
                <div id="page-wrapper">
                    <?php
                    if (isset($pages)) {
                        if ($pages == 'add_property') {
                            include './pages/add_property_content.php';
                        } elseif ($pages == 'manage_property') {
                            include './pages/manage_property_content.php';
                        } elseif ($pages == 'view_property') {
                            include './pages/view_property_content.php';
                        } elseif ($pages == 'edit_property') {
                            include './pages/edit_property_content.php';
                        } elseif ($pages == 'profile') {
                            include './pages/profile_content.php';
                        } elseif ($pages == 'clients') {
                            include './pages/clients_contents.php';
                        } elseif ($pages == 'looking_for') {
                            include './pages/looking_for_content.php';
                        } elseif ($pages == 'super_admin') {
                            include './pages/super_admin_content.php';
                        }
                    } else {
                        include './includes/contents.php';
                    }
                    ?> 
                    <!--body wrapper start-->
                </div>
                <!--body wrapper end-->
            </div>
            <!--footer section start-->
            <footer>
                <p>&copy 2017 HomeLand Agency. All Rights Reserved | Design by <a href="" target="_blank">MSR IT LTD.</a></p>
            </footer>
            <!--footer section end-->

            <!-- main content end-->
        </section>

        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>