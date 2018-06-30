<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Appointments <span>Appointments ELJEBO</span></h2>

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
                    <h1 class="custom-font"><strong>Appointments</strong></h1>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-custom" id="appointments">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Styler Name</th>
                                <th>Customer Name</th>
                                <th>Service Name</th>
                                <th>Appointment Date</th>
                                <th>Status</th>
                                <th>More details</th>
                                <!-- <th style="width: 160px;" class="no-sort">Actions</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data as $d): ?>
                            <tr class="odd gradeX">
                                <td><?php echo $d['id']; ?></td>
                                <td><?php echo $d['styler_name']; ?></td>
                                <td><?php echo $d['customer_name']; ?></td>
                                <td><?php echo $d['service_name']; ?></td>
                                <td><?php echo $d['appointment_date']; ?></td>
                                <td><?php echo $d['status']; ?></td>
                                <td><button class="btn btn-warning mb-10 milkha" data-toggle="modal" data-id="<?php echo $d['id'];  ?>" data-target="#appointments" data-options="splash-8 splash-ef-8">More details</button></td>
                                <!-- <td class="actions"><a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a> -->
                                <!-- <a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a> -->
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