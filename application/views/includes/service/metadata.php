<!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <base href="<?php base_url(); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if(isset($title)){ echo $title; }else{ echo 'Glam Army'; } ?></title>
    <link rel="icon" type="image/ico" href="<?php echo site_url('assets/images/favicon.ico');?>" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ============================================
    ================= Stylesheets ===================
    ============================================= -->
    <!-- vendor css files -->
    <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor/animate.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/animsition/css/animsition.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/fullcalendar/fullcalendar.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/colorpicker/css/bootstrap-colorpicker.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/chosen/chosen.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/summernote/summernote.css');?>">
    <!-- project main css files -->
    <link rel="stylesheet" href="<?php echo site_url('assets/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/sweetalert2.css');?>">
    <!--/ stylesheets -->
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datatables/css/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datatables/datatables.bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css');?>">
    <!-- ==========================================
    ================= Modernizr ===================
    =========================================== -->
    <script src="<?php echo site_url('assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js');?>"></script>
    <!--/ modernizr -->
    <script type="text/javascript">
        var SITE_URL = "<?php echo site_url();?>";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <style type="text/css">.modal-backdrop{display: none !important;}</style>
</head>