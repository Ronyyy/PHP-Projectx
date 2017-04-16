<?php 

//function user_registration($data) {
//    require 'admin/db_connect.php';
//    $pass = md5($data['password']);
//    $sql = "INSERT INTO tbl_user(first_name,last_name,email_address,password,user_type)VALUES('$data[first_name]','$data[last_name]','$data[email_address]','$pass','$data[user_type]')";
//    $sql2 = "INSERT INTO tbl_user_profile(pro_first_name,pro_last_name,pro_email)VALUES('$data[first_name]','$data[last_name]','$data[email_address]')";
//
//
//    if ($query = mysqli_query($db_connect, $sql2)) {
//        
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//
//    if ($query = mysqli_query($db_connect, $sql)) {
//        $mess = "You Successfully Complete Your Registration.";
//        return $mess;
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//}
//
//function Check_user($data) {
//    require 'admin/db_connect.php';
//    $pass = md5($data['password']);
//    $sql = "SELECT * FROM tbl_user WHERE email_address='$data[email_address]'AND password='$pass' ";
//
//    if ($query = mysqli_query($db_connect, $sql)) {
//        $admin_info = mysqli_fetch_assoc($query);
//
//        if ($admin_info) {
//
//            $_SESSION['user_id'] = $admin_info['user_id'];
//            $_SESSION['first_name'] = $admin_info['first_name'];
//            $_SESSION['user_type'] = $admin_info['user_type'];
//            $_SESSION['email_address'] = $admin_info['email_address'];
//            
//            header("Location: index.php");
//        } else {
//            $mess = "Please use valid Email Address and Password.";
//            return $mess;
//        }
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//}
//
//function request_property($id) {
//       require 'admin/db_connect.php';
//    $sql = "SELECT DISTINCT p.*,r.* FROM tbl_property AS p,tbl_request AS r WHERE p.pr_id=r.re_property_id AND r.req_client_id='$id'";
//    if ($query = mysqli_query($db_connect, $sql)) {
//        return $query;
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//}
//
//function user_logout() {
//    unset($_SESSION['user_id']);
//    header("Location:index.php");
//}
//
//function looking_for_content_rent() {
//    require 'admin/db_connect.php';
//    $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pub_status=1 AND let_type=1";
//    if ($query = mysqli_query($db_connect, $sql)) {
//        return $query;
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//}
//
//function view_property_by_id($id) {
//    require 'admin/db_connect.php';
//    $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pr_id=$id";
//    if ($query = mysqli_query($db_connect, $sql)) {
//        return $query;
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//}
//
//function sent_request($p_id, $u_id) {
//    require 'admin/db_connect.php';
//    $sql = "INSERT INTO tbl_request(req_client_id,re_property_id)VALUES('$u_id','$p_id')";
//    if ($query = mysqli_query($db_connect, $sql)) {
//        $mess = "Request sent Successfully";
//        return $mess;
//    } else {
//        $mess="Cannot request twice for one property";
//        return $mess;
//    }
//}
//
//function looking_for_content_sell() {
//        require 'admin/db_connect.php';
//    $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pub_status=1 AND let_type=2";
//    if ($query = mysqli_query($db_connect, $sql)) {
//        return $query;
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//    
//}
//
//function show_profile($data) {
//     require 'admin/db_connect.php';
//    $sql = "SELECT * FROM tbl_user_profile WHERE pro_email='$data'";
//    if ($query = mysqli_query($db_connect, $sql)) {
//        return $query;
//    } else {
//        die("Query Problem " . mysqli_error($db_connect));
//    }
//}
//function img_resize($target, $newcopy, $w, $h, $ext) {
//    list($w_orig, $h_orig) = getimagesize($target);
//    $scale_ratio = $w_orig / $h_orig;
//    if (($w / $h) > $scale_ratio) {
//        $w = $h * $scale_ratio;
//    } else {
//        $h = $w / $scale_ratio;
//    }
//    $img = "";
//    $ext = strtolower($ext);
//    if ($ext == "gif") {
//        $img = imagecreatefromgif($target);
//    } else if ($ext == "png") {
//        $img = imagecreatefrompng($target);
//    } else {
//        $img = imagecreatefromjpeg($target);
//    }
//    $tci = imagecreatetruecolor($w, $h);
//    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
//    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
//    imagejpeg($tci, $newcopy, 80);
//}
//function update_profile($method, $email, $id) {
//   require 'admin/db_connect.php';
//    if ($_FILES['pro_image']['size'] > 0) {
//        $directory = 'admin/profile_image/';
//        $fileName = $_FILES["pro_image"]["name"];
//        $target_file = $directory . $_FILES['pro_image']['name'];
//        
//        if (file_exists($target_file)) {
//            unlink($target_file);
//        }
//        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
//        $file_size = $_FILES['pro_image']['size'];
//        $check = getimagesize($_FILES['pro_image']['tmp_name']);
//        if ($check) {
//            if ($file_size > 1002555) {
//                echo "File is too large.Please try nw one";
//            } else {
//                if ($file_type != 'jpg' && $file_type != 'png' &&$file_type != 'gif') {
//                    echo 'File type is not valid. Please try new one';
//                } else {
//                    $resized_file = "admin/profile_image/resized_$fileName";
//                    if (file_exists($resized_file)) {
//                        unlink($resized_file);
//                    }
//                    $move_result = move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_file);
//                    if ($move_result != true) {
//                        echo "ERROR: File not uploaded. Try again.";
//                        unlink($_FILES['pro_image']['tmp_name']); // Remove the uploaded file from the PHP temp folder
//                        exit();
//                    }
//                    
//                    $wmax = 150;
//                    $hmax = 150;
//
//                    img_resize($target_file, $resized_file, $wmax, $hmax, $file_type);
//
//                    $sql = "UPDATE tbl_user_profile SET user_id='$id',pro_picture_full='$target_file',pro_picture_re='$resized_file',pro_first_name='$method[pr_first_name]',pro_last_name='$method[pr_last_name]',pro_phn='$method[pro_phn_num]',pro_address='$method[pro_address]' WHERE pro_email='$email' ";
//
//                    if (mysqli_query($db_connect, $sql)) {
//                        header("Location:profile.php?id=$id");
//                    } else {
//                        die("Query Problem " . mysqli_error($db_connect));
//                    }
//                }
//            }
//        } else {
//            echo "This is not an Image";
//        }
//    } else {
//
//        $sql = "UPDATE tbl_user_profile SET user_id='$id',pro_first_name='$method[pr_first_name]',pro_last_name='$method[pr_last_name]',pro_phn='$method[pro_phn_num]',pro_address='$method[pro_address]' WHERE pro_email='$email' ";
//
//        if (mysqli_query($db_connect, $sql)) {
//
//            header("Location:profile.php?id=$id");
//        } else {
//            die("Query Problem " . mysqli_error($db_connect));
//        }
//    }
//}
//function view_request_by_id($user_id,$pro_id){
//       require 'admin/db_connect.php';
//      $sql = "SELECT req_id FROM tbl_request WHERE req_client_id='$user_id' AND re_property_id='$pro_id'";
//    if ($query=mysqli_query($db_connect, $sql)) {
//        return $query;
//    } else {
//        die('Query Problem' . mysqli_error($db_connect));
//    }
//}
