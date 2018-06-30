<div class="page page-tables-datatables">
    <div class="pageheader">
        <h2>Referral List <span>=Referral List ELJEBO</span></h2>
    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
            <section class="tile">
                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Referral List</strong></h1>
                    <?php echo $this->session->flashdata('message'); ?>
                    <ul class="controls">
                        <li><a role="button" tabindex="0" id="add-entry" href="<?php echo site_url();?>admin/add_reference"><i class="fa fa-plus mr-5"></i> Add Referral</a></li>
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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th> 
                                    <th style="width: 160px;" class="no-sort">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                
                                $i=1;
                                if (!empty($final_data) && is_array($final_data)) {
                                    foreach($final_data as $data): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><a href="<?php echo get_current_page_method_url('getreferenceview/'.$data->id); ?>"> <?php echo ucfirst($data->name); ?></a></td>
                                            <td><?php echo date("Y-m-d", strtotime($data->create_date)); ?></td>
                                            <td><?php $statusLog = $data->status;
                                            if($statusLog =='1'){ ?>
                                                <a href="<?php echo base_url(); ?>admin/active_reference/<?php echo $data->id; ?>"  class="label label-success">Active</a> 
                                            <?php }else{ ?>
                                                <a href="<?php echo base_url(); ?>admin/inactive_reference/<?php echo $data->id; ?> " class="label label-info">Inactive</a> 
                                            <?php } ?>
                                        </td>

                                        <td class="actions">
                                            <a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/editReference/<?php echo $data->id ; ?>" >Edit</a>
                                            <a class="edit text-primary text-uppercase text-strong text-sm mr-10" href="<?php echo site_url();?>admin/getReferenceView/<?php echo $data->id ; ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                endforeach;
                            }

                            ?>
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