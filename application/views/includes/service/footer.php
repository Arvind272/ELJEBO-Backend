        </section>
    </div>
    <div class="modal fade in" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form role="form" name="profileForm" method="post" enctype="multipart/form-data" action="<?php echo site_url();?>Service/profilePicUpdate">
                    <div class="modal-header">
                        <h3 class="modal-title custom-font">Update Profile Pic</h3>
                    </div>
                    <div class="modal-body">
                     <input type="file" name="pic_file">   
                 </div>
                 <div class="modal-footer">   
                    <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Submit</button>
                    <button type="button" class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c closes" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
                </div>
            </form> 
        </div>
    </div>
</div>
        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="<?php echo site_url('assets/js/vendor/jquery/jquery-1.11.2.min.js');?>"><\/script>')</script>
        <script src="<?php echo site_url();?>assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/slider/bootstrap-slider.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/chosen/chosen.jquery.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
        <script src="<?php echo site_url(); ?>assets/js/vendor/summernote/summernote.min.js"></script>


        <script src="<?php echo site_url(); ?>assets/js/vendor/fullcalendar/lib/moment.min.js"></script>
        <script src="<?php echo site_url(); ?>assets/js/vendor/fullcalendar/lib/jquery-ui.custom.min.js"></script>
        <script src="<?php echo site_url(); ?>assets/js/vendor/fullcalendar/fullcalendar.min.js"></script>


        <script src="<?php echo site_url();?>assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!-- <script src="<?php echo site_url();?>assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js"></script> -->
        <script src="<?php echo site_url();?>assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo site_url();?>assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script src="<?php echo site_url();?>assets/js/sweetalert2.min.js"></script>
        <script src="<?php echo site_url('assetweb/js/jquery.validate.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo site_url('assetweb/js/additional-methods.min.js');?>" type="text/javascript"></script>
        <!--/ vendor javascripts -->
        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="<?php echo site_url();?>assets/js/main.js"></script>
        <script src="<?php echo site_url();?>assets/js/admin_script.js"></script>
        <script src="<?php echo site_url('assetweb/js/developer.js');?>" type="text/javascript"></script>
        <!--/ custom javascripts -->
        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                //initialize basic datatable
                var table = $('#basic-usage').DataTable({
                    "ajax": '<?php echo site_url();?>assets/extras/datatables-basic.json',
                    "columns": [
                    { "data": "id" },
                    { "data": "firstName" },
                    { "data": "lastName" }
                    ],
                    "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                    "dom": 'Rlfrtip'
                });
                $('#questions').DataTable();
                $('#referrals').DataTable();
                $('#customers').DataTable();
                $('#stylish').DataTable();
                $('#orders').DataTable();
                $('#services').DataTable();
                

                $('#basic-usage tbody').on( 'click', 'tr', function () {
                    if ( $(this).hasClass('row_selected') ) {
                        $(this).removeClass('row_selected');
                    }
                    else {
                        table.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });
                //*initialize basic datatable

                $('#appointments').DataTable();
                //initialize editable datatable

                function restoreRowc(oTable, nRow) {
                    var aData = cTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                        cTable.row(nRow).data(aData[i]);
                    }

                    cTable.draw();
                }
                function editRowc(oTable, nRow) {
                    var aData = cTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    jqTds[0].innerHTML = jqTds[0].innerHTML+'<input type="hidden" class="form-control input-sm" value="' + aData[0] + '">';
                    jqTds[1].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[1] + '">';
                    jqTds[2].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[2] + '">';
                    jqTds[3].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[3] + '">';
                    jqTds[4].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[4] + '">';
                    jqTds[5].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[5] + '">';
                    jqTds[6].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[6] + '">';
                    jqTds[7].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[7] + '">';
                    jqTds[8].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[8] + '">';
                    jqTds[9].innerHTML = '<a role="button" tabindex="0" class="edit text-success text-uppercase text-strong text-sm mr-10">Save</a><a role="button" tabindex="0" class="cancel text-warning text-uppercase text-strong text-sm mr-10">Cancel</a>';
                }

                function saveRowc(oTable, nRow) {
                    var jqInputs = $('input', nRow);
                    $.ajax('<?php echo base_url(); ?>/admin/editUser',{
                        type: 'POST',
                        data: { 
                            id: jqInputs[0].value,
                            firstname: jqInputs[1].value,
                            lastname: jqInputs[2].value,
                            username: jqInputs[3].value,
                            email: jqInputs[4].value,
                            address: jqInputs[5].value,
                            gender: jqInputs[6].value,
                            phone_number: jqInputs[7].value,
                            dob: jqInputs[8].value
                        },
                        success: function(data,status) {
                            cTable.cell(nRow, 1).data(jqInputs[1].value);
                            cTable.cell(nRow, 2).data(jqInputs[2].value);
                            cTable.cell(nRow, 3).data(jqInputs[3].value);
                            cTable.cell(nRow, 4).data(jqInputs[4].value);
                            cTable.cell(nRow, 5).data(jqInputs[5].value);
                            cTable.cell(nRow, 6).data(jqInputs[6].value);
                            cTable.cell(nRow, 7).data(jqInputs[7].value);
                            cTable.cell(nRow, 8).data(jqInputs[8].value);
                            cTable.cell(nRow, 9).data('<a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a>');
                            cTable.draw();
                        },
                        error: function() {
                            alert("some error occured");
                        }
                    })
                    // oTable.cell(nRow, 0).data(jqInputs[0].value);
                }

                //initialize editable datatable

                function restoreRowu(oTable, nRow) {
                    var aData = oTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    console.log(aData);
                    for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                        oTable.row(nRow).data(aData[i]);
                    }

                    oTable.draw();
                }

                function editRowu(oTable, nRow) {
                    var aData = oTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    jqTds[0].innerHTML = jqTds[0].innerHTML+'<input type="hidden" class="form-control input-sm" value="' + aData[0] + '">';
                    jqTds[1].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[1] + '">';
                    jqTds[2].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[2] + '">';
                    jqTds[3].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[3] + '">';
                    jqTds[4].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[4] + '">';
                    jqTds[5].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[5] + '">';
                    jqTds[6].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[6] + '">';
                    jqTds[7].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[7] + '">';
                    jqTds[8].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[8] + '">';
                    jqTds[9].innerHTML = '<a role="button" tabindex="0" class="edit text-success text-uppercase text-strong text-sm mr-10">Save</a><a role="button" tabindex="0" class="cancel text-warning text-uppercase text-strong text-sm mr-10">Cancel</a>';
                }

                function saveRowu(oTable, nRow) {
                    var jqInputs = $('input', nRow);
                    $.ajax('<?php echo base_url(); ?>/admin/editUser',{
                        type: 'POST',
                        data: { 
                            id: jqInputs[0].value,
                            firstname: jqInputs[1].value,
                            lastname: jqInputs[2].value,
                            username: jqInputs[3].value,
                            email: jqInputs[4].value,
                            address: jqInputs[5].value,
                            gender: jqInputs[6].value,
                            phone_number: jqInputs[7].value,
                            dob: jqInputs[8].value
                        },
                        success: function(data,status) {
                            oTable.cell(nRow, 1).data(jqInputs[1].value);
                            oTable.cell(nRow, 2).data(jqInputs[2].value);
                            oTable.cell(nRow, 3).data(jqInputs[3].value);
                            oTable.cell(nRow, 4).data(jqInputs[4].value);
                            oTable.cell(nRow, 5).data(jqInputs[5].value);
                            oTable.cell(nRow, 6).data(jqInputs[6].value);
                            oTable.cell(nRow, 7).data(jqInputs[7].value);
                            oTable.cell(nRow, 8).data(jqInputs[8].value);
                            oTable.cell(nRow, 9).data('<a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a>');
                            oTable.draw();
                        },
                        error: function() {
                            alert("some error occured");
                        }
                    })
                    // oTable.cell(nRow, 0).data(jqInputs[0].value);
                }

                var table2 = $('#editable-usage');

                var oTable = $('#editable-usage').DataTable({
                    "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                    "scrollX": true
                });

                var cTable = $('#editbable-usage').DataTable({
                    "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                    "scrollX": true
                });

                var nEditing = null;
                var nNew = false;

                $('#add-entry').click(function (e) {
                    e.preventDefault();

                    if (nNew && nEditing) {
                        if (confirm("Previous row is not saved yet. Save it ?")) {
                            saveRowu(oTable, nEditing); // save
                            $(nEditing).find("td:first").html("Untitled");
                            nEditing = null;
                            nNew = false;

                        } else {
                            oTable.row(nEditing).remove().draw(); // cancel
                            nEditing = null;
                            nNew = false;

                            return;
                        }
                    }

                    var aiNew = oTable.row.add(['', '', '', '', '', '', '']).draw();
                    var nRow = oTable.row(aiNew[0]).node();
                    editRow(oTable, nRow);
                    nEditing = nRow;
                    nNew = true;
                });

                table2.on('click', '.delete', function (e) {
                    e.preventDefault();

                    if (confirm("Are you sure?") == false) {
                        return;
                    }
                    if($(this).data('remove') == 0){
                        alert('No! please don\'t delete your self');
                        return 1;
                    }
                    $.ajax('<?php echo base_url(); ?>/admin/deleteUser',{
                        type: 'POST',
                        data: { id: $(this).data('remove') },
                        success: function(data,status) {
                            var nRow = $(this).parents('tr')[0];
                            oTable.row(nRow).remove().draw();
                            alert("Deleted!");
                        },
                        error: function() {
                            alert("some error occured");
                        }
                    })
                });

                table2.on('click', '.cancel', function (e) {
                    e.preventDefault();
                    if (nNew) {
                        oTable.row(nEditing).remove().draw();
                        nEditing = null;
                        nNew = false;
                    } else {
                        restoreRowu(oTable, nEditing);
                        nEditing = null;
                    }
                });

                table2.on('click', '.edit', function (e) {
                    e.preventDefault();
                    /* Get the row as a parent of the link that was clicked on */
                    var nRow = $(this).parents('tr')[0];

                    if (nEditing !== null && nEditing != nRow) {
                        /* Currently editing - but not this row - restore the old before continuing to edit mode */
                        restoreRowu(oTable, nEditing);
                        editRowu(oTable, nRow);
                        nEditing = nRow;
                    } else if (nEditing == nRow && this.innerHTML == "Save") {
                        /* Editing this row and want to save it */
                        saveRowu(oTable, nEditing);
                        nEditing = null;
                        alert("Updated!");
                    } else {
                        /* No edit in progress - let's start one */
                        editRowu(oTable, nRow);
                        nEditing = nRow;
                    }
                });
                //*initialize editable datatable

                function restoreRowk(pTable, nRow) {
                    var aData = pTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                        pTable.row(nRow).data(aData[i]);
                    }

                    pTable.draw();
                }

                function editRowk(pTable, nRow) {
                    var aData = pTable.row(nRow).data();
                    var jqTds = $('>td', nRow);
                    jqTds[0].innerHTML = jqTds[0].innerHTML+'<input type="hidden" class="form-control input-sm" value="' + aData[0] + '">';
                    jqTds[1].innerHTML = jqTds[1].innerHTML+'<input type="hidden" class="form-control input-sm" value="' + aData[1] + '">';
                    jqTds[2].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[2] + '">';
                    jqTds[3].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[3] + '">';
                    jqTds[4].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[4] + '">';
                    jqTds[5].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[5] + '">';
                    jqTds[6].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[6] + '">';
                    jqTds[7].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[7] + '">';
                    jqTds[8].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[8] + '">';
                    jqTds[9].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[8] + '">';
                    jqTds[10].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[8] + '">';
                    jqTds[11].innerHTML = '<input type="text" class="form-control input-sm" value="' + aData[8] + '">';
                    jqTds[12].innerHTML = '<a role="button" tabindex="0" class="edit text-success text-uppercase text-strong text-sm mr-10">Save</a><a role="button" tabindex="0" class="cancel text-warning text-uppercase text-strong text-sm mr-10">Cancel</a>';
                }

                function saveRowk(pTable, nRow) {
                    var jqInputs = $('input', nRow);
                    $.ajax('<?php echo base_url(); ?>/admin/editKitchen',{
                        type: 'POST',
                        data: { 
                            id: jqInputs[0].value,
                            name: jqInputs[2].value,
                            description: jqInputs[3].value,
                            lattitude: jqInputs[4].value,
                            address: jqInputs[5].value,
                            timings: jqInputs[6].value,
                            ratings: jqInputs[7].value,
                            seats: jqInputs[8].value,
                            type: jqInputs[8].value,
                        },
                        success: function(data,status) {
                            pTable.cell(nRow, 1).data(jqInputs[1].value);
                            pTable.cell(nRow, 2).data(jqInputs[2].value);
                            pTable.cell(nRow, 3).data(jqInputs[3].value);
                            pTable.cell(nRow, 4).data(jqInputs[4].value);
                            pTable.cell(nRow, 5).data(jqInputs[5].value);
                            pTable.cell(nRow, 6).data(jqInputs[6].value);
                            pTable.cell(nRow, 7).data(jqInputs[7].value);
                            pTable.cell(nRow, 8).data(jqInputs[8].value);
                            pTable.cell(nRow, 9).data(jqInputs[9].value);
                            pTable.cell(nRow, 10).data(jqInputs[10].value);
                            pTable.cell(nRow, 11).data(jqInputs[11].value);
                            pTable.cell(nRow, 12).data('<a role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a><a role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10">Remove</a>');
                            pTable.draw();
                        },
                        error: function() {
                            alert("some error occured");
                        }
                    })
                    // oTable.cell(nRow, 0).data(jqInputs[0].value);
                }
                //initialize responsive datatable
                var table3 = $('#kitchen-list')
                pTable = $('#kitchen-list').DataTable({
                    "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                    "scrollX": true
                });

                table3.on('click', '.delete', function (e) {
                    e.preventDefault();

                    if (confirm("Are you sure?") == false) {
                        return;
                    }
                    $.ajax('<?php echo base_url(); ?>/admin/deleteKitchen',{
                        type: 'POST',
                        data: { id: $(this).data('remove') },
                        success: function(data,status) {
                            var nRow = $(this).parents('tr')[0];
                            pTable.row(nRow).remove().draw();
                            alert("Deleted!");
                        },
                        error: function() {
                            alert("some error occured");
                        }
                    })
                });

                table3.on('click', '.cancel', function (e) {
                    e.preventDefault();
                    if (nNew) {
                        pTable.row(nEditing).remove().draw();
                        nEditing = null;
                        nNew = false;
                    } else {
                        restoreRowk(pTable, nEditing);
                        nEditing = null;
                    }
                });

                table3.on('click', '.edit', function (e) {
                    e.preventDefault();
                    /* Get the row as a parent of the link that was clicked on */
                    var nRow = $(this).parents('tr')[0];
                    if (nEditing !== null && nEditing != nRow) {
                        /* Currently editing - but not this row - restore the old before continuing to edit mode */
                        restoreRowk(pTable, nEditing);
                        editRowk(pTable, nRow);
                        nEditing = nRow;
                    } else if (nEditing == nRow && this.innerHTML == "Save") {
                        /* Editing this row and want to save it */
                        saveRowk(pTable, nEditing);
                        nEditing = null;
                        alert("Updated!");
                    } else {
                        /* No edit in progress - let's start one */
                        editRowk(pTable, nRow);
                        nEditing = nRow;
                    }
                });
                //*initialize responsive datatable
                //initialize responsive datatable
                function stateChange(iColumn, bVisible) {
                    console.log('The column', iColumn, ' has changed its status to', bVisible);
                }

                var table4 = $('#advanced-usage').DataTable({
                    "ajax": 'assets/extras/datatables-basic.json',
                    "columns": [
                    { "data": "id" },
                    { "data": "firstName" },
                    { "data": "lastName" }
                    ],
                    "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ]
                });

                // var colvis = new $.fn.dataTable.ColVis(table4);

                // $(colvis.button()).insertAfter('#colVis');
                // $(colvis.button()).find('button').addClass('btn btn-default').removeClass('ColVis_Button');

                // var tt = new $.fn.dataTable.TableTools(table4, {
                //     sRowSelect: 'single',
                //     "aButtons": [
                //         'copy',
                //         'print', {
                //             'sExtends': 'collection',
                //             'sButtonText': 'Save',
                //             'aButtons': ['csv', 'xls', 'pdf']
                //         }
                //     ],
                //     "sSwfPath": "assets/js/vendor/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                // });

                // $(tt.fnContainer()).insertAfter('#tableTools');
                //*initialize responsive datatable

            });
        </script>
        <!--/ Page Specific Scripts -->
        <script>
            $(window).load(function(){


                jQuery('#open-chats ul#inbox li.active a.active').trigger("click");


                $('#ex1').slider({
                    formatter: function(value) {
                        return 'Current value: ' + value;
                    }
                });
                $("#ex1").on("slide", function(slideEvt) {
                    $("#ex1SliderVal").text(slideEvt.value);
                });

                $("#ex2, #ex3, #ex4, #ex5").slider();

                //load wysiwyg editor
                $('#summernote').summernote({
                    height: 200   //set editable area's height
                });
                //*load wysiwyg editor
            });
        </script>
        <!--/ Page Specific Scripts -->
        <script>
            $(document).ready(function(){
                $(".activate").click(function(){
                    let id = $(this).data("id");
                    var data = {
                        id : id,
                        status : '1'
                    }
                    $.ajax({
                        url: "http://localhost/chef/admin/userStatus", 
                        type: 'POST',
                        data: data,
                        success: function(result){
                    // console.log($(this).html('asdjad'));
                    $(this).html('Active');
                }
            });
                });

                $(".deactivate").click(function(){
                    let id = $(this).data("id");
                    var data = {
                        id : id,
                        status : '0'
                    }
                    $.ajax({
                        url: "http://localhost/chef/admin/userStatus", 
                        type: 'POST',
                        data: data,
                        success: function(result){
                    // console.log($(this).parent().html());
                    $(this).html('Inactive');
                }
            });
                });
            });   
        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
        // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        // e.src='https://www.google-analytics.com/analytics.js';
        // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        // ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery(".closes").click(function(){
                jQuery("#myModal3").css("display","none");
            });
        });
    </script>














    <?php 
    $_POST['start_date']='2018-06-01';
    $_POST['end_date']='2018-06-30';
    $event_data = getDataByMethod('dashboard',$_POST,'json');
    $event_data = json_decode($event_data);

    //print_r($event_data); die();

    $event_all_data = '';
    if (!empty($event_data) && is_object($event_data)) {
        if (property_exists($event_data, 'allData')) {
            $monthly_data = (array)$event_data->allData;
            foreach ($monthly_data as $month => $month_data) {

                $status = $month_data->status;
                $class = 'b-l b-2x b-primary';
                $class = ($status == 2) ? 'bg-dutch' : $class; // accept
                $class = ($status == 1) ? 'b-l b-2x b-warning' : $class; // New Prosper
                $class = ($status == 3) ? 'b-l b-2x b-drank' : $class; // // Reject
                //if (!empty($month_data)) {
                    //foreach ($month_data as $key => $value) {
                $event_all_data .= "{ title: '".ucwords(get_current_user_data('firstname', $month_data->customer_id).' '.get_current_user_data('lastname', $month_data->customer_id))."',start: '".$month_data->appointment_date."',className: '".$class."'},";
                    //}
                //}
            }
        }
    }
    ?>
        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev',
                        center: 'title',
                        right: 'next'
                    },
                    defaultDate: new Date(),
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar
                    drop: function() {
                        // if ($('#drop-remove').is(':checked')) {
                        //     $(this).remove();
                        // }
                    },
                    eventLimit: true, // allow "more" link when too many events
                    events: [ <?php echo $event_all_data; ?> ]
                });

                // Hide default header
                //$('.fc-header').hide();



                // Previous month action
                $('#cal-prev').click(function(){
                    $('#calendar').fullCalendar( 'prev' );
                });

                // Next month action
                $('#cal-next').click(function(){
                    $('#calendar').fullCalendar( 'next' );
                });

                // Change to month view
                $('#change-view-month').click(function(){
                    $('#calendar').fullCalendar('changeView', 'month');

                    // safari fix
                    $('#content .main').fadeOut(0, function() {
                        setTimeout( function() {
                            $('#content .main').css({'display':'table'});
                        }, 0);
                    });

                });

                // Change to week view
                $('#change-view-week').click(function(){
                    $('#calendar').fullCalendar( 'changeView', 'agendaWeek');

                    // safari fix
                    $('#content .main').fadeOut(0, function() {
                        setTimeout( function() {
                            $('#content .main').css({'display':'table'});
                        }, 0);
                    });

                });

                // Change to day view
                $('#change-view-day').click(function(){
                    $('#calendar').fullCalendar( 'changeView','agendaDay');

                    // safari fix
                    $('#content .main').fadeOut(0, function() {
                        setTimeout( function() {
                            $('#content .main').css({'display':'table'});
                        }, 0);
                    });

                });

                // Change to today view
                $('#change-view-today').click(function(){
                    $('#calendar').fullCalendar('today');
                });

                /* initialize the external events
                -----------------------------------------------------------------*/
                $('#external-events .event-control').each(function() {

                    // store data so the calendar knows to render an event upon drop
                    $(this).data('event', {
                        title: $.trim($(this).text()), // use the element's text as the event title
                        stick: true // maintain when user navigates (see docs on the renderEvent method)
                    });

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true,      // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });

                $('#external-events .event-control .event-remove').on('click', function(){
                    $(this).parent().remove();
                });

                // Submitting new event form
                $('#add-event').submit(function(e){
                    e.preventDefault();
                    var form = $(this);

                    var newEvent = $('<div class="event-control p-10 mb-10">'+$('#event-title').val() +'<a class="pull-right text-muted event-remove"><i class="fa fa-trash-o"></i></a></div>');

                    $('#external-events .event-control:last').after(newEvent);

                    $('#external-events .event-control').each(function() {

                        // store data so the calendar knows to render an event upon drop
                        $(this).data('event', {
                            title: $.trim($(this).text()), // use the element's text as the event title
                            stick: true // maintain when user navigates (see docs on the renderEvent method)
                        });

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 999,
                            revert: true,      // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });

                    $('#external-events .event-control .event-remove').on('click', function(){
                        $(this).parent().remove();
                    });

                    form[0].reset();

                    $('#cal-new-event').modal('hide');

                });


            });
        </script>
    </body>
    </html>