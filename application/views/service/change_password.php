
<div class="page page-dashboard">
    <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?><span> Activities</span></h2>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-home"></i> GlamArmy</a>
                </li>
                <li>
                    <a href="#"><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?></a>
                </li>
            </ul>
            
        </div>
    </div>
    <!-- cards row -->
    <div class="row">
        <!-- col -->
            <div class="col-md-6">
            <!-- tile -->
            <section class="tile">
            <!-- tile header -->
            <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>Change Password</strong> Form</h1>                              
            </div>
            <!-- /tile header -->
            <div class="tile-body">
                <div class="row">                               
                    <div class="col-md-12">
                        <form role="form" name="changePassword" method="post">
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="" placeholder="Enter Old Password">
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="Enter New Password" id="pass">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirm" placeholder="Enter Confirm Password">
                        </div>
                        <button type="button" onclick="validateChangePassword();" class="btn btn-rounded btn-success btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /tile body -->
            </section>
            <!-- /tile -->
            </div>  
        <!-- /col -->
    </div>
    <!-- /row -->
</div>