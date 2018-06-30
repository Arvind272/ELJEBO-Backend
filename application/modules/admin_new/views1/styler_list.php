<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Stylish <span>Registered stylish of glamarmy</span></h2>

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
    <h1 class="custom-font"><strong>Stylish</strong></h1>
</div>
<!-- /tile header -->

<!-- tile body -->

<div class="tile-body">
    <div class="table-responsive">
        <table class="table table-custom" id="stylish">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Create Date</th>
                <th style="width: 160px;" class="no-sort">Actions</th>
                <th style="width: 160px;" class="no-sort">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($info as $data) : ?>
                <tr class="odd gradeX">
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['firstname'];?></td>
                <td><?php echo $data['lastname'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['address'];?></td>
                <td><?php echo $data['create_date'];?></td>
                <td class="actions">
                    <a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a>
                    <!-- <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" data-remove="<?php echo $data['id'];?>">Remove</a> -->
                </td>
                <td class="actions">
                    <?php if($data['status']==1){ ?>
                    <ul class="list-inline">

                        <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                
                                <span><span class="statusa text-primary text-uppercase text-strong text-sm mr-10">Active</span> <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                                <li>
                                    <span style="cursor: pointer;" data-id="<?php echo $data['id'];?>" tabindex="0" class="text-primary text-uppercase text-strong text-sm mr-10 activate">Activate</span>
                                </li>
                                <li>
                                    <span style="cursor: pointer;" data-id="<?php echo $data['id'];?>" class="text-danger text-uppercase text-strong text-sm mr-10 deactivate">Deactivate</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <ul class="list-inline">

                        <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <span><span class="statusa text-danger text-uppercase text-strong text-sm mr-10">Inactive</span> <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                                <li>
                                    <span style="cursor: pointer;" data-id="<?php echo $data['id'];?>" class="text-primary text-uppercase text-strong text-sm mr-10 activate">Activate</span>
                                </li>
                                <li>
                                    <span style="cursor: pointer;" data-id="<?php echo $data['id'];?>" class="text-danger text-uppercase text-strong text-sm mr-10 deactivate">Deactivate</span>
                    
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                    
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>
</div>
<!-- /tile body -->
<!-- Splash Modal -->
<!-- <section>
    <div class="modal splash fade" id="splash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">I'm a modal!</h3>
                </div>
                <div class="modal-body">
                    <p>This sure is a fine modal, isn't it?</p>

                    <p>Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-border">Submit</button>
                    <button class="btn btn-default btn-border" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- /tile -->
            </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>