<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Add Beauty Category <span>Beauty Category GlamArmy</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add Beauty Category</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                   <form action="<?php echo site_url();?>admin/insertBeautyCat" method='POST' id="beautycategory">
                      
                      <div class="form-group">
                        <label for="pwd">Beauty Category Name:</label>
                        <input type="text" class="form-control" id="name"  name="name">
                      </div>
                       <input type="submit" class="btn btn-default" name="add_beautycat" value="Submit">
                    </form>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>