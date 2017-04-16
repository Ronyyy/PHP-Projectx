<?php

$check = $_GET['action']; 
if ($check == 'add_property') {
    $pages = $check;
} elseif ($check == 'manage_property') {
    $pages = $check;
} elseif ($check == 'view_property') {
    $pages = $check;
} elseif ($check == 'delete_property') {
    if (isset($_GET['id'])) {
        require_once 'functions.php';
        $admin_obj=new functions();
        $check_id =$_GET['id'];
        $message =  $admin_obj->delete_property($check_id);
        $pages = 'manage_property';
    }
} elseif ($check == 'edit_property') {
    $check_id = $_GET['id'];
    if ($check_id) {
        $pages = $check;
    } else {
        header("Location:index.php");
    }
}elseif ($check=='looking_for') {
    $pages=$check;
}
elseif ($check=='sent_request') {
    session_start();
    require_once 'functions.php';
    $admin_obj=new functions();
$message=$admin_obj->sent_request($_GET['id'],$_SESSION['user_id']);
header("Location:index.php");
}

include './admin_master.php';
?>

