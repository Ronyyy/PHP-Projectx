<?php
$pro_id = $_GET['id'];
$query_result=$admin_obj->view_property_by_id($pro_id);
$row=  mysqli_fetch_assoc($query_result);

if(isset($ch) && isset($user_id)){
    if($ch=='sent'){
        $message=$admin_obj->sent_request($pro_id,$user_id);
    }
}
$query_res=$admin_obj->view_request_by_id($user_id,$pro_id);



?>
<div style="color: #00aced">
    <h2><?php if(isset($message)){echo $message;unset($message);} ?></h2></div>
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!--single-page-->
<div class="single-page blog">
    <div class="container">			
        <div class="col-md-8 single-page-left">
            <div class="single-page-info">
                <img style="height:300px;width:500px;" src="admin/<?php echo $row['pr_image']; ?>" alt=""/>
                <h4><?php echo $row['pr_title']; ?> </h4>
                <p><?php echo $row['pr_des']; ?> </p>
            </div>	
            <!--related-posts-->

            <!--//related-posts-->


        </div>	
        <div class="col-md-4 blog-right">
            <p class="text-primary">Speciality</p>
            <ul class="catgry">
                <li><a><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><?php echo $row['pr_speciality']; ?> </a></li>
            </ul>
            <div class="blog-tags">
                <p class="text-primary"><?php 
                if($row['let_type']==1){
                    echo 'Rent';
                }elseif($row['let_type']==2){
                    echo 'Price';
                } ?></p>
                <h5><?php echo $row['pr_rent'].' TK'; ?></h5>
            </div>
            <div class="blog-tags">
                <p class="text-primary">For</p>
                <h5><?php 
                if($row['let_type']==1){
                    echo 'Rent';
                }elseif($row['let_type']==2){
                    echo 'Sell';
                } ?></h5>
            </div>
            <?php if(isset($user_type)){ ?>
            <?php if($user_type==2){if(!$check_req=mysqli_fetch_assoc($query_res)){ ?>
            
            <div class="blog-tags">
                <a class="btn btn-primary" href="?action=view_property&sr=sent&id=<?php echo $pro_id;?>">Sent Request</a>
                
            </div>
            
            <?php }else{?>
            <div class="blog-tags">
                <a class="btn btn-primary disabled" href="">Requested</a>
                
            </div>
            
            <?php }}}?>
            <div class="blog-tags">
                <p class="text-primary">Location</p>
                <ul>
                    <li><a href="#"><?php echo $row['pr_location']; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>	
</div>
