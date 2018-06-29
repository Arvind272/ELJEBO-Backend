<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Add Beauty SubCategory <span>Beauty SubCategory GlamArmy</span></h2>
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
                   <form action="<?php echo site_url();?>admin/insert_bsubcat" method="post" id="beautysubcat" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="email">Select Beauty Category name:</label>
 
                        <select class="form-control" name="beauty_category_id" id="beauty_category_id" >
                            
                            <?php if(isset($bcat)){

                                foreach ($bcat as $data) { ?>
                                <option value="<?php echo $data->id; ?>"><?php echo ucfirst($data->name); ?></option>
                                   
                                <?php }

                                }?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Beauty SubCategory name:</label>
                        <input type="text" class="form-control" id="name"  name="name">
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