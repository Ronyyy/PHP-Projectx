<?php
session_start();
require_once 'admin/functions.php';
$admin_obj=new functions();
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

if (isset($_POST['btn'])) {
    
    $message=$admin_obj->Check_user($_POST);
    $new_mess = 'Wrong! ';
    $class_name='alert-danger';
}
if (isset($_POST['btn_reg'])) {
    $message =$admin_obj-> user_registration($_POST);
    $new_mess = '';
    $class_name='alert-success';


//    echo '<pre>';
//    print_r($_POST);
}
?>

<html >
    <head>
        <meta charset="UTF-8">
        <title>Login</title>


        <link rel="stylesheet" href="admin/css/reset.css">

        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="admin/css/login_style.css">
        <link href="admin/css/style.css" rel='stylesheet' type='text/css' />
        <link href="admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <script src="admin/js/jquery-1.10.2.min.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">


    </head>

    <body>


        <!-- Form Mixin-->
        <!-- Input Mixin-->
        <!-- Button Mixin-->
        <!-- Pen Title-->

        <div class="pen-title">
            <?php
            if (isset($message)) {
                ?>
                <div class="grid_3 grid_5">
                    <div class="but_list">
                        <div class="alert <?php echo $class_name;?>" role="alert">
                            <?php
                            echo"<strong>$new_mess</strong>" . ' ' . $message;
                            unset($message);
                            unset($new_mess);
                            unset($class_name);
                            ?>
                        </div>
                    </div>
                </div>

                    <?php } ?>
            <h1>Login</h1>
        </div>
        <!-- Form Module-->
        <div class="module form-module">
            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                <div class="tools">Sign Up</div>
            </div>
            <div class="form">

                <h2>Login to your account</h2>
                <form name="login_form" action="" method="post">
                    <input type="email" placeholder="Email Address" name="email_address" />
                    <input type="password" placeholder="Password" name="password"/>
                    <button name="btn">Login</button>
                </form>
            </div>
            <div class="form">

                <h2>Create an account</h2>
                <form action="" method="post">
                    <input required type="text" placeholder="First Name" name="first_name"/>
                    <input required type="text" placeholder="Last Name" name="last_name"/>
                    <input required type="password" placeholder="Password" name="password"/>
                    <input required type="email" placeholder="Email Address" name="email_address"/>
                    <div class="form-group">

                        <div>
                            <select name="user_type" id="selector1" class="form-control1">
                                <option style="color:#999"><-------- Account Type --------></option>
                                <option value="1">Landlord</option>
                                <option value="2">Renter</option>
                            </select></div>
                        <br/>
                    </div>
                    <button name="btn_reg">Register</button>
                </form>
            </div>
            
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="admin/js/index.js"></script>




    </body>
</html>
