<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Refferals Orders <span>Refferals Orders ELJEBO</span></h2>

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
                    <h1 class="custom-font"><strong>Refferals Orders</strong></h1>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-custom" id="example">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Stylist Name</th>
                                <th>Customer Name</th>
                                <th>Referral Name</th>
                                <th>Appointment Date</th>
                                <th>Amount</th>
                                <th>Referral Amount</th>
                                <th>Settlement Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($final_data)){
                                
                            foreach($final_data as $d){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $d->refeoderID; ?></td>
                                <td><?php echo ucfirst($d->stylerFname); ?> <?php echo ucfirst($d->stylerLname); ?></td>
                                <td><?php echo ucfirst($d->customerFname); ?> <?php echo ucfirst($d->customerLname); ?></td>
                                <td><?php echo ucfirst($d->referralName);  ?></td>
                                <td>
                                    <?php 
                                 echo $newDate = date("Y-m-d", strtotime($d->appointment_date)); ?> 
                                     
                                </td>
                                <td>£<span id="amount"><?php echo $d->amount; ?></span></td>
                                <?php $val = 10/100;
                                      $ReferralAmount = $val * $d->amount; ?>
                                <td>£<span></span><?php echo $ReferralAmount; ?>.00</td>
                                <td>
                                    <?php if($d->settlement_status == 1){
                                        echo "Settled";
                                    }else{
                                        echo "Unsettled";
                                    } ?>
                                        
                                    </td>

                            </tr>
                            <?php }} ?>
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
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>