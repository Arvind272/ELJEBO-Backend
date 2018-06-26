<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Edit Service <span>Services GlamArmy</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Edit Services</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->
                <!-- tile body -->
                <div class="tile-body">
                   <form action="<?php echo site_url();?>admin/update_service" method='POST' id="service" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                      <div class="form-group">
                        <label for="email">Select Category:</label>
 
                        <select class="form-control" name="category_id" id="category_id">
                            <?php if(!empty($category_names)){

                                foreach ($category_names as $key =>$value) { ?>
                                <option value="<?php echo $value['id']; ?>" <?php if($row->category_id == $value['id'] ){
                            echo "selected='selected'"; } ?> ><?php echo ucfirst($value['category_name']); ?></option>
                                   
                                <?php }

                                }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Service Name:</label>
                        <input type="text" class="form-control" id="service_name" required name="service_name" value="<?php if(isset($row->service_name)){
                            echo ucfirst($row->service_name); }else{
                                echo "";
                                }?>">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Service Charge:</label>
                        <input type="text" class="form-control" id="service_charge" required name="service_charge" value="<?php if(isset($row->service_charge)){
                            echo $row->service_charge; }else{
                                echo "";
                                }?>">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Service Charge:</label>
                        <input type="text" class="form-control" id="service_time" required name="service_time" value="<?php if(isset($row->service_time)){
                            echo $row->service_time; }else{
                                echo "";
                                }?>">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Choose Image:</label>
                        <input type="file" class="form-control" id="service_image"  name="service_image"  value="<?php echo $row->service_image; ?>">
                        <input type="hidden" class="form-control"  name="preimage" value="<?php echo $row->service_image; ?>">
                      </div>
                     
                      <input type="submit" class="btn btn-default" name="update" value="Update">
                    </form>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>