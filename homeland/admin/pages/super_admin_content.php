<?php
$query = $admin_obj->select_all_user_info();

//echo '<pre>';
//while ($row = mysqli_fetch_assoc($query)) {
//    print_r($row);
//}
//die();
?>
<div class="bs-example4" data-example-id="simple-responsive-table">
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
