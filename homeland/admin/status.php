<?php
require_once 'functions.php';
$admin_obj=new functions();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accept') {
        $re_id = $_GET['id'];
        
        if ($admin_obj->change_status_accept($re_id)) {
            header("Location: admin_master.php");
        }
    }elseif($_GET['action'] == 'reject') {
        $re_id = $_GET['id'];
        
        if ($admin_obj->change_status_reject($re_id)) {
            header("Location: admin_master.php");
        }
    }
    elseif($_GET['action'] == 'pending') {
        $re_id = $_GET['id'];
        if ($admin_obj->change_status_pending($re_id)) {
            header("Location: admin_master.php");
        }
    }
}