<?php
ob_start();
session_start();
$ac='home';


if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
    $user_type=$_SESSION['user_type'];
if($user_type==2){
    header("Location: user.php");
}elseif($user_type==1){
    header("Location: admin/admin_master.php");
}elseif($user_type==3){
    header("Location:admin/super_admin.php");
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HomeLand</title>
        <!--mobile apps-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Home Rental Agency Bangladesh"/>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--mobile apps-->
        <!--Custom Theme files -->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="css/prettySticky.css" type="text/css">
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
        <div  id="home" class="banner">
            <div class="banner-info">
                <!--navigation-->
                <?php include './includes/header.php'; ?>
                <!--//navigation-->
                <div class="banner-text">
                    <!--banner Slider starts Here-->
                    <script src="js/responsiveslides.min.js"></script>
                    <script>
// You can also use "$(window).load(function() {"
$(function () {
// Slideshow 3
$("#slider3").responsiveSlides({
auto: true,
pager: true,
nav: false,
speed: 500,
namespace: "callbacks",
before: function () {
    $('.events').append("<li>before event fired.</li>");
},
after: function () {
    $('.events').append("<li>after event fired.</li>");
}
});

});
                    </script>
                    <!--//End-slider-script-->
                    <?php 
                        include './pages/home_content.php';
                    ?>
                    
        <!--//tabs-->
        <!-- services -->

        <!-- //services -->
        <!--slid-->

        <!--//slid-->
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