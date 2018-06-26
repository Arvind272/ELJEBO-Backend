<div class="page page-dashboard">
    <div class="pageheader">
        <h2><?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?><span> Activities</span></h2>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo site_url(); ?>Service/dashboard"><i class="fa fa-home"></i> GlamArmy</a>
                </li>
                <li>
                    <a href="<?php echo site_url(); ?>Service/serviceProfile">
                        <?php if(isset($title)){ echo $title; }else{ echo "Dashboard"; }?>
                    </a>
                </li>
            </ul>
           
        </div>
    </div>
    <!-- cards row -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <section class="tile tile-simple">
                <form role="form" name="profileForm" method="post" enctype="multipart/form-data" action="<?php echo site_url();?>Service/saveProfileData" class="serviceProfile">
                <!-- tile widget -->
                <div class="tile-widget p-30 text-center">
                    <div class="thumb thumb-xl">
                        <img class="img-circle" src="<?php if(isset($userdata[0]->profile_pic)){ echo $userdata[0]->profile_pic;} ?>" alt="profile pic">
                         <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil"></i></button> 
                    </div>

                    <h4 class="mb-0">
                    <strong>
                    <?php if(isset($userdata[0]->firstname)){ echo ucfirst($userdata[0]->firstname);} ?> </strong> 
                     <?php if(isset($userdata[0]->lastname)){ echo ucfirst($userdata[0]->lastname);} ?>
                    </h4>
                    <input type="hidden" name="" value="<?php if(isset($userdata[0]->firstname)){ echo $userdata[0]->firstname;} ?>">
                    <input type="hidden" name="" value="<?php if(isset($userdata[0]->lastname)){ echo $userdata[0]->lastname;} ?>">
                </div>
                <!-- /tile widget -->
                <!-- tile body -->
                <div class="tile-body">
                    <div class="row">
                        <h3 class="custom-font filled bg-lightred">Services</h3>
                        <div class="col-md-4">
                            <?php 
                            if(isset($userdata[0]->service_ids)){
                                $service_ids = $userdata[0]->service_ids;
                                $service_idsArray = explode(',', $service_ids);
                            }
                            if(!empty($allService)){ 
                                foreach ($allService as $ServicesName) {     
                             ?>
                            <label class="checkbox checkbox-custom-alt checkbox-custom-sm">
                                 <input  <?php if(in_array($ServicesName->id,$service_idsArray)){ echo 'checked="checked"';}?> type="checkbox" name="service_ids[]" value="<?php echo $ServicesName->id; ?>"><i></i> <?php echo ucfirst($ServicesName->service_name); ?>
                            </label>
                            <?php } } ?>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="custom-font filled bg-lightred">My Protfolio</h3>
                        <div class="col-md-12">
                            <input type="file" name="protfolio[]" multiple="multiple">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                         <div class="col-md-12"> 
                            <?php
                           
                              if(!empty($portFolioImgUrl)){
                                    foreach ($portFolioImgUrl as $portFolio) {
                             ?>                            
                            <div class="col-lg-3 col-md-4 col-xs-6" data-id="<?php echo $portFolio->image_id; ?>" id="col">
                              <a  class="d-block mb-4 h-100">
                                <img class="img-fluid img-thumbnail" src="<?php echo  $portFolio->image_url; ?>" alt="">
                              </a>
                              <span class="portFolio"><i class="fa fa-times"></i></span>
                            </div>
                             <?php } } ?> 
                        </div>
                    </div>
                    <hr class="line-dashed line-full">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                             <button type="submit" class="btn btn-darkgray mb-10">Save Profile</button>
                        </div>
                    </div>
                </div>
                <!-- /tile body -->
                </form>
            </section>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- Modal -->
