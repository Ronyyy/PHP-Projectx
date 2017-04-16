<?php

class functions
{

    public $db_connect;

    public function __construct()
    {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_homeland';

        $db_connect = mysqli_connect($host_name, $user_name, $password);
        if ($db_connect) {
            if (mysqli_select_db($db_connect, $db_name)) {
                return $db_connect;
            } else {
                die('Selection Fail ' . mysqli_error($db_connect));
            }
        } else {
            die('Connection Fail ' . mysqli_error($db_connect));
        }
    }

    function img_resize($target, $newcopy, $w, $h, $ext)
    {
        list($w_orig, $h_orig) = getimagesize($target);
        $scale_ratio = $w_orig / $h_orig;
        if (($w / $h) > $scale_ratio) {
            $w = $h * $scale_ratio;
        } else {
            $h = $w / $scale_ratio;
        }
        $img = "";
        $ext = strtolower($ext);
        if ($ext == "gif") {
            $img = imagecreatefromgif($target);
        } else if ($ext == "png") {
            $img = imagecreatefrompng($target);
        } else {
            $img = imagecreatefromjpeg($target);
        }
        $tci = imagecreatetruecolor($w, $h);
        // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
        imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
        imagejpeg($tci, $newcopy, 80);
    }

    function user_registration($data)
    {
        $db_connect = $this->__construct();
        $pass = md5($data['password']);
        $sql = "INSERT INTO tbl_user(first_name,last_name,email_address,password,user_type)VALUES('$data[first_name]','$data[last_name]','$data[email_address]','$pass','$data[user_type]')";
        $sql2 = "INSERT INTO tbl_user_profile(pro_first_name,pro_last_name,pro_email)VALUES('$data[first_name]','$data[last_name]','$data[email_address]')";


        if ($query = mysqli_query($db_connect, $sql2)) {

        } else {
            $mess = "Cann't Registration.Change email or password then try again.";
            return $mess;
        }

        if ($query = mysqli_query($db_connect, $sql)) {
            $mess = "You Successfully Complete Your Registration.";
            return $mess;
        } else {

            $mess = "Can't Registration.Change email or password then try again.";

            return $mess;
        }
    }

    function Check_user($data)
    {
        $db_connect = $this->__construct();
        $pass = md5($data['password']);
        $sql = "SELECT * FROM tbl_user WHERE email_address='$data[email_address]'AND password='$pass' ";

        if ($query = mysqli_query($db_connect, $sql)) {
            $admin_info = mysqli_fetch_assoc($query);

            if ($admin_info) {

                $_SESSION['user_id'] = $admin_info['user_id'];
                $_SESSION['first_name'] = $admin_info['first_name'];
                $_SESSION['user_type'] = $admin_info['user_type'];
                $_SESSION['email_address'] = $admin_info['email_address'];

//                if ($_SESSION['user_type'] == 2) {
//                    header("Location: admin/admin_master.php");
//                } elseif ($_SESSION['user_type'] == 3) {
//                    header("Location: admin/super_admin.php");
//                }
                header("Location: index.php");
            } else {
                $mess = "Please use valid Email Address and Password.";
                return $mess;
            }
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['user_type']);
        unset($_SESSION['email_address']);

        header("Location: index.php");
    }

    function add_property($data, $id)
    {
        $db_connect = $this->__construct();
        if ($_FILES['pro_image']['size'] > 0) {
            $directory = 'profile_image/';
            $fileName = $_FILES["pro_image"]["name"];
            $target_file = $directory . $_FILES['pro_image']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $_FILES['pro_image']['size'];
            $check = getimagesize($_FILES['pro_image']['tmp_name']);
            if ($check) {
                if (file_exists($target_file)) {
                    echo 'This file is already Exists.Please try new one';
                } else {
                    if ($file_size > 1002555) {
                        echo "File is too large.Please try nw one";
                    } else {
                        if ($file_type != 'jpg' && $file_type != 'png') {
                            echo 'File type is not valid. Please try new one';
                        } else {
                            $move_result = move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_file);
                            if ($move_result != true) {
                                echo "ERROR: File not uploaded. Try again.";
                                unlink($_FILES['pro_image']['tmp_name']); // Remove the uploaded file from the PHP temp folder
                                exit();
                            }
                            $resized_file = "profile_image/resized_$fileName";
                            $wmax = 100;
                            $hmax = 100;

                            $this->img_resize($target_file, $resized_file, $wmax, $hmax, $file_type);

                            $sql = "INSERT INTO tbl_property(pr_title,pr_speciality,pr_rent,pr_location,pr_image,re_image,pub_status,let_type,pr_des,pro_user_id)VALUES('$data[pro_title]','$data[pro_speciality]','$data[pro_rent]','$data[pro_location]','$target_file','$resized_file','$data[pub_status]','$data[let_type]','$data[pro_des]','$id')";
                            if (mysqli_query($db_connect, $sql)) {
                                $message = "Product info Save Successfully";
                                return $message;
                            } else {
                                die("Query Problem " . mysqli_error($db_connect));
                            }
                        }
                    }
                }
            } else {
                echo "This is not an Image";
            }
        } else {

            $sql = "INSERT INTO tbl_property(pr_title,pr_speciality,pr_rent,pr_location,pub_status,let_type,pr_des,pro_user_id)VALUES('$data[pro_title]','$data[pro_speciality]','$data[pro_rent]','$data[pro_location]','$data[pub_status]','$data[let_type]','$data[pro_des]','$id')";

            if (mysqli_query($db_connect, $sql)) {
                $message = "Product info Save Successfully";
                return $message;

            } else {
                die("Query Problem " . mysqli_error($db_connect));
            }
        }
    }

    function manage_property($id)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pro_user_id='$id'";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function view_property_by_id($id)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pr_id=$id";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function delete_property($id)
    {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_property SET deletion_status=1 WHERE pr_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Property Successfully Deleted";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    function update_property($method, $id)
    {
        $db_connect = $this->__construct();
        if ($_FILES['pro_image']['size'] > 0) {
            $directory = 'property_image/';
            $fileName = $_FILES["pro_image"]["name"];
            $target_file = $directory . $_FILES['pro_image']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $_FILES['pro_image']['size'];
            $check = getimagesize($_FILES['pro_image']['tmp_name']);
            if ($check) {
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
                if ($file_size > 1002555) {
                    echo "File is too large.Please try nw one";
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png') {
                        echo 'File type is not valid. Please try new one';
                    } else {
                        $move_result = move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_file);
                        if ($move_result != true) {
                            echo "ERROR: File not uploaded. Try again.";
                            unlink($_FILES['pro_image']['tmp_name']); // Remove the uploaded file from the PHP temp folder
                            exit();
                        }
                        $resized_file = "property_image/resized_$fileName";
                        if (file_exists($resized_file)) {
                            unlink($resized_file);
                        }
                        $wmax = 100;
                        $hmax = 100;

                        $this->img_resize($target_file, $resized_file, $wmax, $hmax, $file_type);

                        $sql = "UPDATE tbl_property SET pr_title='$method[pro_title]',pr_speciality='$method[pro_speciality]',pr_rent='$method[pro_rent]',pr_location='$method[pro_location]',pr_image='$target_file',re_image='$resized_file',pub_status='$method[pub_status]',let_type='$method[let_type]',pr_des='$method[pro_des]'WHERE pr_id=$id ";
                        if (mysqli_query($db_connect, $sql)) {
                            header("Location:property.php?action=manage_property");
                        } else {
                            die("Query Problem " . mysqli_error($db_connect));
                        }
                    }
                }
            } else {
                echo "This is not an Image";
            }
        } else {

            $sql = "UPDATE tbl_property SET pr_title='$method[pro_title]',pr_speciality='$method[pro_speciality]',pr_rent='$method[pro_rent]',pr_location='$method[pro_location]',pub_status='$method[pub_status]',let_type='$method[let_type]',pr_des='$method[pro_des]'WHERE pr_id=$id ";
            if (mysqli_query($db_connect, $sql)) {
                header("Location:property.php?action=manage_property");
            } else {
                die("Query Problem " . mysqli_error($db_connect));
            }
        }
    }

    function show_profile($data)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_user_profile WHERE pro_email='$data'";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function update_profile($method, $email, $id)
    {

        $db_connect = $this->__construct();
        if ($_FILES['pro_image']['size'] > 0) {
            if ($_SESSION['user_type'] == 2) {
                $directory = 'admin/profile_image/';
            } else {
                $directory = 'profile_image/';
            }


            $fileName = $_FILES["pro_image"]["name"];

            $target_file = $directory . $_FILES['pro_image']['name'];

            if (file_exists($target_file)) {
                unlink($target_file);
            }
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $_FILES['pro_image']['size'];
            $check = getimagesize($_FILES['pro_image']['tmp_name']);
            if ($check) {
                if ($file_size > 1002555) {
                    echo "File is too large.Please try nw one";
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
                        echo 'File type is not valid. Please try new one';
                    } else {
                        if ($_SESSION['user_type'] == 2) {
                            $resized_file = "admin/profile_image/resized_$fileName";
                        } else {
                            $resized_file = "profile_image/resized_$fileName";
                        }


                        if (file_exists($resized_file)) {
                            unlink($resized_file);
                        }

                        $move_result = move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_file);

                        if ($move_result != true) {
                            echo "ERROR: File not uploaded. Try again.";
                            unlink($_FILES['pro_image']['tmp_name']); // Remove the uploaded file from the PHP temp folder
                            exit();
                        }

                        $wmax = 150;
                        $hmax = 150;

                        $this->img_resize($target_file, $resized_file, $wmax, $hmax, $file_type);

                        $sql = "UPDATE tbl_user_profile SET user_id='$id',pro_picture_full='$target_file',pro_picture_re='$resized_file',pro_first_name='$method[pr_first_name]',pro_last_name='$method[pr_last_name]',pro_phn='$method[pro_phn_num]',pro_address='$method[pro_address]' WHERE pro_email='$email' ";

                        if (mysqli_query($db_connect, $sql)) {
                            header("Location:profile.php?id=$id");
                        } else {
                            die("Query Problem " . mysqli_error($db_connect));
                        }
                    }
                }
            } else {
                echo "This is not an Image";
            }
        } else {

            $sql = "UPDATE tbl_user_profile SET user_id='$id',pro_first_name='$method[pr_first_name]',pro_last_name='$method[pr_last_name]',pro_phn='$method[pro_phn_num]',pro_address='$method[pro_address]' WHERE pro_email='$email' ";

            if (mysqli_query($db_connect, $sql)) {

                header("Location:profile.php?id=$id");
            } else {
                die("Query Problem " . mysqli_error($db_connect));
            }
        }
    }

    function looking_for_content()
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pub_status=1";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function sent_request($p_id, $u_id)
    {
        $db_connect = $this->__construct();
        $sql = "INSERT INTO tbl_request(req_client_id,re_property_id)VALUES('$u_id','$p_id')";
        if ($query = mysqli_query($db_connect, $sql)) {
            $mess = "Request sent Successfully";
            return $mess;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function select_all_user_info()
    {
        $db_connect = $this->__construct();
        $sql = "SELECT u.user_id,u.pro_first_name,u.pro_phn,r.*,p.pr_id,p.pr_title,p.re_image,p.let_type FROM tbl_user_profile as u,tbl_property as p,tbl_request as r WHERE r.req_client_id=u.user_id AND r.re_property_id=p.pr_id AND r.re_status!=2";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function select_user_profile($email)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_user_profile WHERE pro_email='$email'";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function request_property($id)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT DISTINCT p.*,r.* FROM tbl_property AS p,tbl_request AS r WHERE p.pr_id=r.re_property_id AND r.req_client_id='$id'";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }
    function show_requested_property($id)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT DISTINCT p.*,r.*,u.* FROM tbl_property AS p,tbl_request AS r,tbl_user_profile as u WHERE r.req_client_id=u.user_id AND r.re_property_id=p.pr_id AND p.pro_user_id='$id'";

        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }


    function change_status_accept($id)
    {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_request SET re_status=1 WHERE req_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            return TRUE;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    function change_status_reject($id)
    {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_request SET re_status=2 WHERE req_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            return TRUE;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    function change_status_pending($id)
    {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_request SET re_status=0 WHERE req_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            return TRUE;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    function view_request_by_id($user_id, $pro_id)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT req_id FROM tbl_request WHERE req_client_id='$user_id' AND re_property_id='$pro_id'";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    function looking_for_content_rent()
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pub_status=1 AND let_type=1";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function looking_for_content_sell()
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pub_status=1 AND let_type=2";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

    function search($data)
    {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_property WHERE deletion_status=0 AND pub_status=1 AND pr_location LIKE '%$data%'";
        if ($query = mysqli_query($db_connect, $sql)) {
            return $query;
        } else {
            die("Query Problem " . mysqli_error($db_connect));
        }
    }

}

?>
