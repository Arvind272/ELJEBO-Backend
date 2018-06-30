<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Beauty SubCategory <span>Beauty SubCategory ELJEBO</span></h2>

        <!-- <div class="page-bar">

            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html"><i class="fa fa-home"></i> Minovate</a>
                </li>
                <li>
                    <a href="#">Tables</a>
                </li>
                <li>
                    <a href="tables-datatables.html">Datatables</a>
                </li>
            </ul>

        </div> -->

    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">

            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Beauty SubCategory</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                    <ul class="controls">
                        <li>
                            <a role="button" tabindex="0" id="add-entry" href="<?php echo site_url();?>admin/add_BeautySubCategory"><i class="fa fa-plus mr-5"></i> Add Beauty SubCategory</a>
                        </li>


                    </ul>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-custom" id="example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Beauty Category name</th>
                                <th>Beauty SubCategory name</th>
                                <th style="width: 160px;" class="no-sort">Actions</th>
                                <th style="width: 160px;" class="no-sort">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                           if(isset($bsubcat)){
                                $i=1;
                           }
                            foreach($bsubcat as $data): ?>
                            <tr class="odd gradeX">
                                <td><a href="<?php echo site_url();?>admin/edit_beautySubCategory/<?php echo $data->id ; ?>"><?php echo $data->id; ?></a></td>
                                <?php $whr['id'] = $data->beauty_category_id;
                                $bcat_data = $this->Admin_model->fetchrowedit('beauty_category',$whr);
                                foreach ($bcat_data as $bcat) { ?>
                                <td><?php echo ucfirst($bcat->name) ; ?></td>
                                <?php } ?>
                                <td><?php echo ucfirst($data->name) ; ?></td>
                                
                                <td class="actions"><a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/edit_beautySubCategory/<?php echo $data->id ; ?>" >Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php echo $data->id ; ?>" data-method="delete_Suzbeautycategory">Remove</a></td>

                                 <td class="actions">
                    <?php $status = $data->status;

                    if($status ==1){ ?>
                        <a href="<?php echo base_url(); ?>admin/active_SubbeautyCat/<?php echo $data->id; ?>" class="label label-success">Active</a>
                 <?php   }else{ ?>
                        <a href="<?php echo base_url(); ?>admin/deactive_SubbeautyCat/<?php echo $data->id; ?>" class="label label-info">Inactive</a>
             <?php   }  ?>
                        
                                 </td>

                                 
                            </tr>
                            <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /tile body -->
            </section>
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>