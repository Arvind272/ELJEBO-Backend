<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Service </h2>
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
                    <h1 class="custom-font"><strong>Service List</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                    <ul class="controls">
                        <li>
                            <?php $role = $this->session->userdata('role');
                            if($role != '3'){?>
                                 

                                 <a role="button" tabindex="0" id="add-entry" href="<?php echo site_url();?>admin/add_category"><i class="fa fa-plus mr-5"></i> Add Services</a>
                            

                            <?php }?>

                           


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
                                <th>Service name</th>
                                <th>Create Date</th>

                                <?php 
                            if($role != '3'){?>
                                 
                                <th style="width: 160px;" class="no-sort">Actions</th>
                            <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                           if(isset($fetch_category)){
                                $i=1;
                           }
                            foreach($fetch_category as $data): ?>
                            <tr class="odd gradeX">
                                <td><a href="<?php echo site_url();?>admin/edit_category/<?php echo $data->id ; ?>"><?php echo $data->id; ?></a></td>
                                <td><?php echo ucfirst($data->category_name); ?></td>
                                <td><?php echo $data->create_date ; ?></td>
                                <?php $role = $this->session->userdata('role');
                            if($role != '3'){?>
                                 
                               
                                <td class="actions"><a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/edit_category/<?php echo $data->id ; ?>" >Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php echo $data->id ; ?>" data-method="delete_category">Remove</a></td>
                            <?php } ?>
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