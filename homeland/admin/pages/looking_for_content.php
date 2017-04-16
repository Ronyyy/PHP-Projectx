<?php 
$query_result =$admin_obj-> looking_for_content();
?>
<div class="blog">
    <div class="container">
        <h3 class="title"> </h3>
        <div class="blog-info">
            <form>
            <?php while ($row = mysqli_fetch_assoc($query_result)) { ?>
               
                <div class="col-md-6 blog-grids">
                    <div class="blog-img" style="margin-bottom: 20px;">
                        <a href=""> <img src="<?php echo $row['pr_image'] ?>" class="img-responsive zoom-img" alt=""/></a>
                    </div>
                    <h4><a href=""><?php echo $row['pr_location']; ?></a></h4>
                    <p><?php echo $row['pr_des']; ?></p>
                    <div style="margin-bottom: 20px;margin-top: 5px;">
                        <a href="property.php?action=view_property&id=<?php echo $row['pr_id'];?>" class="btn-primary" type="submit">Read More</a>
                    </div>
                </div>
                
            <?php } ?>

            <div class="clearfix"> </div>

            </form>
        </div>	
    </div>	
</div>	