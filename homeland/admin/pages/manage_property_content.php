<?php 
$count = 1;

$query_result = $admin_obj->manage_property($user_id);
?>


<ul class="breadcrumb">
    <li>
        <span class="glyphicon glyphicon-home"></span>
        <a href="admin_master.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="property.php?action=manage_property">Manage Property</a></li>

</ul>
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

                                           <a class="btn btn-danger" href="<?php echo "?action=delete_property&id=".$row['pr_id'] ?> " onclick="return checkDelete()">
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