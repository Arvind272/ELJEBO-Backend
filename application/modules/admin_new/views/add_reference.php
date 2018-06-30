<div class="page page-tables-datatables">
    <div class="pageheader">
        <h2>Add Customer Referral<span>Add Customers Referral ELJEBO</span></h2>
    </div>
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
            <section class="tile">
                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add Customer Referral</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->
                <!-- tile body -->
                <div class="tile-body">
                   <form action="<?php echo base_url(); ?>admin/add_customerReference" id="customer" method='POST'>
                      <div class="form-group">
                        <label for="pwd">Name:</label>
                        <input type="text" class="form-control" id="name"  name="name" value="">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Description:</label>
                        <input type="text" class="form-control" id="description"  name="description" value="">
                    </div>
                    <input type="submit" name="add_customerReference" class="btn btn-default" value="Submit">
                </form>
            </div>
            <!-- /tile body -->
        </section>
    </div>
    <!-- /col -->
</div>
<!-- /row -->
</div>