<?php
$count = 1;
$query_result = $admin_obj->request_property($user_id);

?>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h3>Requested Property &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger h4"><?php
                    if (isset($message)) {
                        echo $message;
                        unset($message);
                    }
                    ?></span></h3>

        </div>
        <div class="box-content">
            <fieldset>
                <div class="container">

                    <div class="table-responsive">          
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Property Name</th>
                                    <th>Rent</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Request Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query_result)) { ?>
                                <?php if($row['re_status'] == 0){$class_name='label-warning';}
                                elseif($row['re_status'] == 1){$class_name='label-success';}
                                ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['pr_title']; ?></td>
                                        <td><?php echo $row['pr_rent']; ?></td>
                                        <td><?php echo $row['pr_location']; ?></td>
                                        <td><img src="<?php echo $row['re_image']; ?>" alt=""></td>
                                        <td><span style="font-size: 18px;" class="label <?php echo $class_name;?> "><?php
                                                if ($row['re_status'] == 0) {
                                                    echo'Pending....';
                                                } else {
                                                    echo 'Accepted';
                                                };
                                                ?></span></td>
                                        
                                    </tr>
                                    <?php
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </fieldset>

        </div>
    </div><!--/span-->

</div>