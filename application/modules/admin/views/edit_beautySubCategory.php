<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Edit Beauty SubCategory <span>Beauty SubCategory ELJEBO</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add Beauty SubCategory</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <?php if(isset($fetch_subcat)){
                        foreach ($fetch_subcat as $subcat) { ?>
                   <form action="<?php echo site_url();?>admin/update_bsubcat" method="post" id="beautysubcat" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $subcat->id; ?>">
                      <div class="form-group">
                        <label for="email">Select Beauty Category name:</label>
 
                        <select class="form-control" name="beauty_category_id" id="beauty_category_id" >
                            
                            <?php if(isset($bcat)){

                                foreach ($bcat as $data) { ?>
                                <option value="<?php echo $data->id; ?>"<?php if($data->id == $subcat->beauty_category_id){echo 'selected';} ?>><?php echo ucfirst($data->name); ?></option>
                                   
                                <?php }

                                }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Beauty SubCategory name:</label>
                        <input type="text" class="form-control" id="name"  name="name" value="<?php echo ucfirst($subcat->name); ?>">
                      </div>

                      <button type="submit" class="btn btn-default">Submit</button>
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