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
                <h1 class="custom-font"><strong>Contact </strong> Form</h1>                              
            </div>
            <!-- /tile header -->
            <div class="tile-body">
                <div class="row">                               
                    <div class="col-md-12">
                        <form role="form" name="contactForm" method="post">
                        <div class="form-group">
                            <label for="mobilenumber">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control postalcode" name="postalcode" placeholder="Postal Code">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                        </div>
                        <button type="button" onclick="validateContactForm();" class="btn btn-rounded btn-success btn-sm">Submit</button>
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