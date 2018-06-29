<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Edit Category <span>Category ELJEBO</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Edit Category</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->
                <!-- tile body -->
                <div class="tile-body">
                    <?php if(isset($fetch_category)){
                        foreach ($fetch_category as $cate_data) { ?>
                   <form action="<?php echo site_url();?>admin/updatecategory" method='POST' id="category">
                      <input type="hidden" name="id" value="<?php echo $cate_data->id; ?>">
                      <div class="form-group">
                        <label for="pwd">Category Name:</label>
                        <input type="text" class="form-control" id="category_name" value="<?php echo ucfirst($cate_data->category_name); ?>"  name="category_name">
                      </div>
                       <input type="submit" class="btn btn-default" name="update" value="Submit">
                    </form>
                    <?php }} ?>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>