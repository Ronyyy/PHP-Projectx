<?php
$count = 1;
$query_result = $admin_obj->manage_property($user_id);
$query = $admin_obj->show_requested_property($user_id);
?>

<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="box-header" data-original-title>
        <h3>Requests<span class="text-danger h4"><?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?></span></h3>

    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Property Title</th>
                <th>Property Image</th>
                <th>Type</th>
                <th>Request By</th>
                <th>Phone No</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row['pr_title'] ?></td>
                    <td><img src="<?php echo $row['re_image'] ?>" alt=""></td>
                    <td><span class="label label-success"><?php
                            if ($row['let_type'] == 1) {
                                echo 'Sell';
                            } elseif ($row['let_type'] == 2) {
                                echo 'Rent';
                            }
                            ?></span></td>
                    <td><?php echo $row['pro_first_name'] ?></td>
                    <td><?php echo $row['pro_phn'] ?></td>
                    <td><span class="label <?php
                        if ($row['re_status'] == 0)
                            echo 'label-warning';
                        elseif ($row['re_status'] == 1) {
                            echo 'label-success';
                        }
                        ?>"><?php
                            if ($row['re_status'] == 0) {
                                echo 'Pending';
                            } elseif ($row['re_status'] == 1) {
                                echo 'Accepted';
                            }
                            ?></span> </td>
                    <td>
                        <?php if ($row['re_status'] == 0) { ?>
                            <a title="Accept" href="status.php?action=accept&id=<?php echo $row['req_id'] ?>" class="btn btn-primary" ><i class="glyphicon glyphicon-ok-sign"></i> </a>

                        <?php } elseif ($row['re_status'] == 1) { ?>
                            <a title="Pending" href="status.php?action=pending&id=<?php echo $row['req_id'] ?>" class="btn label-warning" ><i class="glyphicon glyphicon-remove"></i> </a>

                        <?php } ?>
                        <a href="status.php?action=reject&id=<?php echo $row['req_id'] ?>" class="btn btn-danger" onclick="return checkaccept();" ><i title="Reject" class="glyphicon glyphicon-remove-sign"></i> </a>


                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div></div>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h3>Manage Property &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger h4"><?php
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
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query_result)) { ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['pr_title']; ?></td>
                                        <td><?php echo $row['pr_rent']; ?></td>
                                        <td><?php echo $row['pr_location']; ?></td>
                                        <td><img src="<?php echo $row['re_image']; ?>" alt=""></td>
                                        <td><span class="label label-success"><?php
                                                if ($row['pub_status'] == 0) {
                                                    echo'UnPublished';
                                                } else {
                                                    echo 'Published';
                                                };
                                                ?></span></td>
                                        <td class="center">
                                            <a id="view" title="View" class="btn btn-success" href="property.php?action=view_property&id=<?php echo $row['pr_id']; ?>">
                                                <i class="glyphicon glyphicon-zoom-in"></i>  
                                            </a>
                                            <a id="edit" title="Edit" class="btn btn-info" href="property.php?action=edit_property&id=<?php echo $row['pr_id']; ?>">
                                                <i class="glyphicon glyphicon-edit"></i>  
                                            </a>

                                           <a class="btn btn-danger" href="<?php echo "property.php?action=delete_property&id=".$row['pr_id'] ?> " onclick="return checkDelete()">
                                    <i class="glyphicon glyphicon-trash"></i> 
                                </a>

                                        </td>
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