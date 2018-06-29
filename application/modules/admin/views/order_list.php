<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Orders <span>Registered orders of ELJEBO</span></h2>

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
    <h1 class="custom-font"><strong>Orders</strong></h1>
</div>
<!-- /tile header -->

<!-- tile body -->

<div class="tile-body">
    <div class="table-responsive">
        <table class="table table-custom" id="orders">
            <thead>
            <tr>
                <th>id</th>
                <th>Styler name</th>
                <th>Customer name</th>
                <th>Amount</th>
                <th>Remaining amount</th>
                <th>Transaction id</th>
                <th>Order date</th>
                <!-- <th>Time</th> -->
                <!-- <th>status</th> -->
                <!-- <th style="width: 160px;" class="no-sort">Actions</th> -->
                <th style="width: 160px;" class="no-sort">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($info as $data) : ?>
                <tr class="odd gradeX">
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['styler_name'];?></td>
                <td><?php echo $data['customer_name'];?></td>
                <td><?php echo $data['amount'];?></td>
                <td><?php echo $data['remain_amount'];?></td>
                <td><?php echo $data['trans_id'];?></td>
                <td><?php echo $data['create_date'];?></td>
                <!-- <td><?php // echo $data['time'];?></td> -->
                <!-- <td><?php //echo $data['status'];?></td> -->
                <!-- <td class="actions"><a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a></td> -->
                <td class="actions">
                    <?php if($data['status']==2){ ?>   
                        <span data-id="<?php echo $data['id'];?>" data-status="<?php echo $data['status'];?>" tabindex="0" class="text-primary text-uppercase text-strong text-sm mr-10" id="active">Accept</span>
                    <?php } else if($data['status']==3) { ?>
                        <span tabindex="0" data-id="<?php echo $data['id'];?>" data-status="<?php echo $data['status'];?>" class="text-danger text-uppercase text-strong text-sm mr-10" id="deactive">Reject</span>
                    <?php } else { ?>
                        <span tabindex="0" data-id="<?php echo $data['id'];?>" data-status="<?php echo $data['status'];?>" class="text-warning text-uppercase text-strong text-sm mr-10" id="deactive">Pending</span>
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