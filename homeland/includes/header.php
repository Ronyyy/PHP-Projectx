<div class="top-nav">
    <nav>
        <div class="container">
            <div class="navbar-header logo">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a href="index.php">Homeland</a></h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-right">
                    <form style="float: left;margin-top: 5px;margin-right: 100px;" action="search.php" method="get">
                    <li>
                        <div class="row">
                            <div class="col-md-8">
                                <input name="location" type="text" class="form-control" placeholder="Location">
                            </div>
                            <div class="col-md-4"><input type="submit" class="form-control" value="Search"></div>
                        </div>


                    </li>
                    </form>
                    <li><a href="index.php" class="link-kumya <?php if($ac==NULL) echo 'active';?> "><span data-letters="Home">Home</span></a></li>
                    <?php if(isset($user_id)){ ?>
                    <li><a href="profile.php?id=<?php echo $user_id;?>" class="link-kumya <?php if($ac=='profile') echo 'active';?> "><span data-letters="Profile">Profile</span></a></li>
                   <?php } ?>
                    <li><a href="rent.php" class="link-kumya <?php if($ac=='rent') echo 'active';?> "><span data-letters="Rent">Rent</span></a></li>	
                    <li><a href="sell.php" class="link-kumya <?php if($ac=='sell') echo 'active';?> "><span data-letters="Sell">Sell</span></a></li>
                    
                        <?php if(isset($user_id)){ ?>
                    <li><a href="user.php?logout" class="link-kumya"><span data-letters="Logout"> Logout</span></a></li>
                   <?php }else{ ?>
                     <li><a href="login.php" class="link-kumya"><span data-letters="Login"> Login</span></a></li>
                   
                   <?php } ?>
                </ul>	
                <div class="clearfix"> </div>
            </div>
        </div>
    </nav>
</div>