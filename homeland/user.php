<?php
ob_start();
session_start();
require_once 'admin/functions.php';
$admin_obj=new functions();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    $email_add = $_SESSION['email_address'];

    if ($user_type == 1) {
        header("Location:admin/admin_master.php");
    }
} else {
    $user_id=null;
    $user_type=null;
    if (isset($pages)) {
        if ($pages == 'rent') {
            $pages = 'rent_signout';
        } elseif ($pages == 'sell') {
            $pages = 'sell_signout';
        }
    } else {
        header("Location: error.php");
    }
}


if (isset($_GET['logout'])) {
    
    $admin_obj->user_logout();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homeland </title>

        <!--mobile apps-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Rental Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--mobile apps-->
        <!--Custom Theme files -->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="css/prettySticky.css" type="text/css">
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <!-- //Custom Theme files -->
        <!-- js -->
        <script src="js/jquery-1.11.1.min.js"></script> 
        <!-- //js -->
        <!-- start-smoth-scrolling-->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>

        <!--//end-smoth-scrolling-->
    </head>
    <body>
        <!--banner-->
        <div  id="home" class="banner about-banner">
            <div class="banner-info">
                <!--navigation-->
                <?php include './includes/header.php'; ?>
                <!--//navigation-->
                <div class="banner-text">
                    <h2>WE'LL HELP YOU FIND YOUR DREAM HOME</h2>
                </div>	
            </div>
        </div>
        <!--//banner-->
        <!--gallery-->
        <?php
        if (isset($pages)) {
            if ($pages == 'rent') {
                include './pages/rent_content.php';
            } elseif ($pages == 'sell') {
                include './pages/sell_content.php';
            } elseif ($pages == 'view_property') {
                include './pages/view_property_content.php';
            } elseif ($pages == 'rent_signout') {
                include './pages/rent_signout_content.php';
            } elseif ($pages == 'sell_signout') {
                include './pages/sell_signout_content.php';
            } elseif ($pages == 'error') {
                include './pages/error_content.php';
            } elseif ($pages == 'renter_profile') {
                include './pages/renter_profile_content.php';
            } elseif ($pages == 'search') {
                include './pages/search_result_content.php';
            }
        } else {
            include './pages/user_content.php';
        }
        ?>
        <!--//gallery-->
        <!--footer-->
        <?php include './includes/footer.php'; ?>
        <!--//footer-->
        <!-- script-for prettySticky -->
        <script src="js/prettySticky.js"></script>
        <!--//script-for prettySticky -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>