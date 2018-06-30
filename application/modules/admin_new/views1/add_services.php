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
                   <form action="<?php echo site_url();?>admin/add_service" method='POST'>
                      <div class="form-group">
                        <label for="email">Select Category:</label>
 
                        <select class="form-control" name="category_id" required>
                            <option value="">Select</option>
                            <?php if(!empty($category_names)){

                                foreach ($category_names as $key =>$value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                                   
                                <?php }

                                }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Service Name:</label>
                        <input type="text" class="form-control" id="service_name" required name="service_name">
                      </div>

                      <div class="form-group">
                        <label for="pwd">Service Charge:</label>
                        <input type="number" class="form-control" id="service_charge" required name="service_charge">
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