<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Sub Services </h2>

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
                    <h1 class="custom-font"><strong>Sub Services</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                    <ul class="controls">
                        <?php $role = $this->session->userdata('role');
                            if($role == '0'){?>
                        <li>
                            <a role="button" tabindex="0" id="add-entry" href="<?php echo site_url();?>admin/add_service"><i class="fa fa-plus mr-5"></i> Add Sub Service</a>
                        </li>
                    <?php } ?>


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
                                <th>Sub Service name</th>
                                <th>Charge</th>
                                <th>Duration</th>
                                  <?php 
                            if($role == '0'){?>
                                <th style="width: 160px;" class="no-sort">Status</th>
                              
                                <th style="width: 160px;" class="no-sort">Actions</th>
                                <?php } ?> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(isset($info)) {
                                $i=1;
                            
                                foreach($info as $data): ?>
                                <tr class="odd gradeX">
                                    <td><a href="<?php echo site_url();?>admin/edit_service/<?php echo $data['id']; ?>"><?php echo $data['id']; ?></a></td>
                                    <td><?php echo ucfirst($data['category_name']); ?></td>
                                    <td><?php echo ucfirst($data['service_name']); ?></td>

                                    <td><?php

                                     $check = explode('$', $data['service_charge']);

                                     echo "$".end($check);

                                    
                                      ?></td>
                                      <td><?php echo $data['service_time']; ?>min</td>

                                       <?php 
                            if($role == '0'){?>
                                      <td class="actions">



                                    <?php $status = $data['status'];

                                    if($status ==1){ ?>
                                        <a href="<?php echo base_url(); ?>admin/active_service/<?php echo $data['id']; ?>" class="label label-success">Active</a>
                                 <?php   }else{ ?>
                                        <a href="<?php echo base_url(); ?>admin/deactive_service/<?php echo $data['id']; ?>" class="label label-info">Inactive</a>
                             <?php   }  ?>


                                        
                                </td>
                               
                                    <td class="actions"><a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/edit_service/<?php echo $data['id']; ?>" >Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10 delete_row" data-id="<?php echo $data['id']; ?>" data-method="delete_service">Remove</a></td>

                                <?php } ?>
                                </tr>
                                <?php $i++; endforeach; }?>
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