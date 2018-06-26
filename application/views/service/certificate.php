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
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary mb-10" data-toggle="modal" data-target="#Certificate">Add Certificate</button>
        </div>
        <!-- col -->
            <div class="col-md-12">
                <section class="tile">
                <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                         <h1 class="custom-font"><strong>Certificate</strong> List</h1>
                    </div>
                <!-- /tile header -->
                    <div class="tile-body p-0">
                        <?php if(!empty($data)){ ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Certificate Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $count =1;
                                  foreach ($data as $value) {
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo ucfirst($value->name); ?></td>
                                    <td><?php echo $value->year; ?></td>
                                    <td><img src="<?php echo $value->certificate_url; ?>" style="width:50px;height: 50px;"></td>
                                </tr>
                                <?php $count++; } ?>
                            </tbody>
                        </table>
                        <?php }else{ ?>
                            <span>No Data</span>
                        <?php } ?>
                    </div>
                <!-- /tile body -->
                </section>
           </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
<div class="modal" id="Certificate" tabindex="-1" role="dialog"  aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title custom-font">Certificate Add</h3>
                    </div>
                    <form role="form" name="certificateForm" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo site_url();?>Service/addCertificate" id="certificate">
                    <div class="modal-body">
                    <div class="tile-body">
                    <div class="form-group">
                        <label for="Certificate name">Certificate Name</label>
                        <input type="test" class="form-control" name="name" id="" placeholder="Enter Certificate Name">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select class="form-control" name="year">
                        <option value="">Year</option> 
                        <?php
                            $startdate = date("Y");
                            $enddate = 1998;                      
                            $years = range ($startdate,$enddate);
                            foreach($years as $year){ ?>
                               <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="Certificate name">Add Certificate</label>
                        <input type="file" class="form-control" name="certificate">
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" onclick="validateCertificateForm();"><i class="fa fa-arrow-right"></i> Add Certificate</button>
                        <button type="button" class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
                    </div>
                </form>
                </div>
            </div>
        </div>