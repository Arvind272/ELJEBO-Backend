<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>kitchen<span>Registered kitchen of chefx</span></h2>

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
    <h1 class="custom-font"><strong>kitchen</strong></h1>
    <ul class="controls">
        <li class="dropdown">

            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                <i class="fa fa-cog"></i>
                <i class="fa fa-spinner fa-spin"></i>
            </a>

            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                <li>
                    <a role="button" tabindex="0" class="tile-toggle">
                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                    </a>
                </li>
                <li>
                    <a role="button" tabindex="0" class="tile-fullscreen">
                        <i class="fa fa-expand"></i> Fullscreen
                    </a>
                </li>
            </ul>

        </li>
        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
    </ul>
</div>
<!-- /tile header -->

<!-- tile body -->

<div class="tile-body">
    <div class="table-responsive">
        <table class="table table-custom" id="kitchen-list">
            <thead>
            <tr>
                <th>Id</th>
                <th>Chef_id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Address</th>
                <th>Timings</th>
                <th>Ratings</th>
                <th>Seats</th>
                <th>Type</th>
                <!-- <th>image</th> -->
                <!-- <th>Licensce</th> -->
                <th style="width: 160px;" class="no-sort">Actions</th>
                <th style="width: 160px;" class="no-sort">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($info as $data) : ?>
                <tr class="odd gradeX">
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['chef_id'];?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['description'];?></td>
                <td><?php echo $data['address'];?></td>
                <td><?php echo $data['timings'];?></td>
                <td><?php echo $data['ratings'];?></td>
                <td><?php echo $data['seats'];?></td>
                <td><?php echo $data['type'];?></td>
                <!-- <td><img src="<?php echo base_url(); ?>uploads/licensce/<?php echo $data['image'];?>"></td> -->
                <!-- <td><?php // echo $data['licensce'];?></td> -->
                <td class="actions"><!-- <a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a> --><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" data-remove="<?php echo $data['id'];?>">Remove</a></td>
                <td class="actions">
                    <?php if($data['status']==1){ ?>   
                        <span data-id="<?php echo $data['id'];?>" data-status="<?php echo $data['status'];?>" tabindex="0" class="text-primary text-uppercase text-strong text-sm mr-10" id="active">Active</span>
                    <?php } else { ?>
                        <span tabindex="0" data-id="<?php echo $data['id'];?>" data-status="<?php echo $data['status'];?>" class="text-danger text-uppercase text-strong text-sm mr-10" id="deactive">Inactive</span>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
</div>
<!-- /tile body -->

</section>
<!-- /tile -->
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>