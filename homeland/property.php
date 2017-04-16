<?php
$check = $_GET['action'];
if($check == 'view_property') {
    $pages = $check;
}

if(isset($_GET['sr'])){
   $ch='sent';
}

include './user.php';