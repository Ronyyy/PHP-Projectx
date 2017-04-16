<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    if($id==$user_id){
        
       $query_result=$admin_obj->show_profile($email_add);
       $row=  mysqli_fetch_assoc($query_result);
     
    }else{
        header("Location:index.php");
    }
}

if (isset($_POST['btn'])) {
//    echo '<pre>';
//print_r($row);
//die();
//    
    $message = $admin_obj->update_profile($_POST,$email_add,$id);
    $class_name = 'alert-success';
}
//echo '<pre>';
//print_r($row);
//die();

?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h3>Profile <span style="color: green;"> <?php if(isset($message)) echo $message;unset($message); ?> </span> </h3>
            
        </div>
        <div class="box-content">
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>
                    <br/>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Profile Picture</h4></label>
                        <div class="col-sm-8">
                            <img src="<?php echo $row['pro_picture_re'];?>">
                            <input value="Change" placeholder="Change" type="file" name="pro_image">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>First Name</h4></label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['pro_first_name'] ?>" type="text" name="pr_first_name" class="form-control1" id="pro_title" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Last Name</h4></label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['pro_last_name'] ?>" type="text" name="pr_last_name" class="form-control1" id="pro_title" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Email Address</h4></label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['pro_email'] ?>" type="text" name="pr_email_add" class="form-control1" id="pro_title" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Phone Number</h4></label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row['pro_phn'] ?>" type="text" name="pro_phn_num" class="form-control1" id="pro_title" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Speciality" class="col-sm-2 control-label"><h4>Address</h4></label>
                        <div class="col-sm-8"><textarea name="pro_address" name="speciality" id="speciality" cols="50" rows="4" class="form-control1"><?php echo $row['pro_address'] ?></textarea></div>
                    </div>
                    


                </fieldset>
                <div class="form-actions">

                    <button type="submit" name="btn" class="btn btn-primary">Save</button>
                    <button type="reset" name="reset" class="btn btn-default">Reset</button>
                </div>
            </form>   

        </div>
    </div><!--/span-->

</div>