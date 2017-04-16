<?php 
if (isset($_POST['btn'])) {
    
    $message = $admin_obj->add_property($_POST,$user_id);
    $class_name = 'alert-success';
 
    
//    echo '<pre>';
//    print_r($_POST);
}
?>








<script src="js/jquery.cleditor.min.js"></script>
<?php
if (isset($message)) {
    ?>
    <div class="">
        <div class="but_list">
            <div class="alert <?php echo $class_name; ?>" role="alert">
                <?php
                echo $message;
                unset($message);
                unset($class_name);
                ?>
            </div>
        </div>
    </div>

<?php } ?>
<ul class="breadcrumb">
    <li>
        <span class="glyphicon glyphicon-home"></span>
        <a href="admin_master.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="property.php?action=add_property">Add Property</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h3>Add Property</h3>
        </div>
        <div class="box-content">
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>
                    <br/>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Property title</h4></label>
                        <div class="col-sm-8">
                            <input type="text" name="pro_title" class="form-control1" id="pro_title" placeholder="Property Title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Speciality" class="col-sm-2 control-label"><h4>Speciality</h4></label>
                        <div class="col-sm-8"><textarea name="pro_speciality" name="speciality" id="speciality" cols="50" rows="4" class="form-control1"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Price</h4></label>
                        <div class="col-sm-8">
                            <input type="number" name="pro_rent" class="form-control1" id="rent" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Location</h4></label>
                        <div class="col-sm-8">
                            <input type="text" name="pro_location" class="form-control1" id="location" placeholder="Location">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Publication Status</h4></label>
                        <div class="col-sm-8">
                            <select name="pub_status" class="form-control1">
                                <option><--------Select Status--------></option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Want to</h4></label>
                        <div class="col-sm-8">
                            <select name="let_type" class="form-control1">
                                <option><--------Select Type--------></option>
                                <option value="1">Rent</option>
                                <option value="2">Sell</option>
                            </select></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label label-input-sm"><h4>Image</h4></label>
                        <div class="col-sm-8">
                            <input type="file" name="pro_image">
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $("#description").cleditor();
                        });
                    </script>
                    <div class="form-group">
                        <label for="Description" class="col-sm-2 control-label"><h4>Description</h4></label>
                        <div class="col-sm-8"><textarea name="pro_des" id="description" cols="50" rows="4" class="form-control1"></textarea></div>
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