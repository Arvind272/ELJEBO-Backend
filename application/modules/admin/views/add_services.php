<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Add Service <span>Services GlamArmy</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add Services</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                   <form action="<?php echo site_url();?>admin/add_servicess" method="post" id="service" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="email">Select Category:</label>
 
                        <select class="form-control" name="category_id" id="category_id" >
                            
                            <?php if(isset($category_nam)){

                                foreach ($category_nam as $data) { ?>
                                <option value="<?php echo $data->id; ?>"><?php echo ucfirst($data->category_name); ?></option>
                                   
                                <?php }

                                }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Service Name:</label>
                        <input type="text" class="form-control" id="service_name"  name="service_name">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Service Charge:</label>
                        <input type="number" class="form-control" id="service_charge"  name="service_charge">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Choose Image:</label>
                        <input type="file" class="form-control" id="service_image"  name="service_image">
                      </div>
                     
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>