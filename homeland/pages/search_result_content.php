<?php
$data=$_GET['location'];
$query_result =$admin_obj->looking_for_content_rent();
$query=$admin_obj->search($data);
?>

<div class="blog">
    <div class="container">
        <h3 class="title">Available for Rent </h3>
        <div class="blog-info">
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col-md-6 blog-grids">
                    <div class="blog-img">
                        <a href="property.php?action=view_property&id=<?php echo $row['pr_id'];?>"> <img src="admin/<?php echo $row['pr_image'] ?>" class="img-responsive zoom-img" alt=""/></a>

                    </div>
                    <span style="font-size: 24px"><a href=""><?php echo $row['pr_location']; ?></a></span>
                    <span style="font-size: 18px;color: red;">{<?php if($row['let_type']==1) {
                            echo "For Rent";
                        }elseif ($row['let_type']==2){
                            echo "For Sell";
                        }
                        ?>}</span>
                    <p><?php echo $row['pr_des']; ?></p>
                    <div class="more more2">
                        <a href="property.php?action=view_property&id=<?php echo $row['pr_id'];?>" class="button-pipaluk button--inverted"> Read More</a>
                    </div>
                </div>

            <?php } ?>
            <div class="clearfix"> </div>


        </div>
    </div>
</div>
