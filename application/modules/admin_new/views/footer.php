        </section>
        </div>
        <!--/ Application Content -->

        <!-- Splash Modal -->
        <div class="modal splash fade" id="appointments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title custom-font">Appointment Details</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="list-unstyled">
                            <li>
                                <span><b>Appointment location</b></span>
                                <span id="location"></span>
                            </li>
                            <li>
                                <span><b>Categories</b></span>
                                <span id="categories"></span>
                            </li>
                            <li>
                                <span><b>Services</b></span>
                                <span id="services"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default btn-border" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="assets/js/vendor/slider/bootstrap-slider.min.js"></script>

        <script src="assets/js/vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script>

        <script src="assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>

        <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>

        <script src="assets/js/vendor/summernote/summernote.min.js"></script>

        <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script src="assets/js/sweetalert2.min.js"></script>



        <!--/ vendor javascripts -->


        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/admin_script.js"></script>
        <!--/ custom javascripts -->


        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->

        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                
                jQuery('#open-chats ul#inbox li.active a.active').trigger("click");

                //initialize basic datatable
                var table = $('#basic-usage').DataTable({
                    "ajax": 'assets/extras/datatables-basic.json',
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

                var colvis = new $.fn.dataTable.ColVis(table4);

                $(colvis.button()).insertAfter('#colVis');
                $(colvis.button()).find('button').addClass('btn btn-default').removeClass('ColVis_Button');

                var tt = new $.fn.dataTable.TableTools(table4, {
                    sRowSelect: 'single',
                    "aButtons": [
                        'copy',
                        'print', {
                            'sExtends': 'collection',
                            'sButtonText': 'Save',
                            'aButtons': ['csv', 'xls', 'pdf']
                        }
                    ],
                    "sSwfPath": "assets/js/vendor/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                });

                $(tt.fnContainer()).insertAfter('#tableTools');
                //*initialize responsive datatable

            });
        </script>
        <!--/ Page Specific Scripts -->
        <script>
            $(window).load(function(){
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
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>
</html>