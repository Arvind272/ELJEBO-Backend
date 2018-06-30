<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Refferals <span>Refferals ELJEBO</span></h2>

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
                    <h1 class="custom-font"><strong>Refferals</strong></h1>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-custom" id="referrals">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th style="width: 160px;" class="no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data as $d): ?>
                            <tr class="odd gradeX">
                                <td><?php echo $d['id']; ?></td>
                                <td><?php echo $d['name']; ?></td>
                                <td><?php echo $d['description']; ?></td>
                                <td class="actions"><a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a>
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