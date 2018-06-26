<main class="main_content_dashboard your_beauty_details_main">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <div class="slide-toggle text-center">
        <div class="container">
            <!-- fluid -->
            <form method="post" class="update_beautydetails" action="<?php echo site_url(); ?>Home/updateBeautyDetails" enctype="multipart/form-data" id="BeautyDetails">
                <div class="box-toggle">
                    <?php
                    $success =  $this->session->flashdata('success');
                    if($success != ''){
                        echo '<div class="alert alert-success">'.$success.'</div>';
                    }

                    $getBeautyCategory = getDataByMethod('getBeautyCategory');

                    if (!empty($getBeautyCategory)) { 
                        $i = 1;
                        foreach ($getBeautyCategory as $getBeauty) { ?>
                        <div class="contorol">
                            <h3><?php echo ucfirst($getBeauty->category_name); ?></h3>
                            <span class="toggle-info pull-left"><i class="fa fa-plus"></i></span>
                        </div>  
                        <div class="content-box">
                            <?php
                            if(!empty($getBeauty->beauty_sub_category)){
                                $j=1;
                                foreach ($getBeauty->beauty_sub_category as $beautySubCat) {
                                    ?><p><input type="radio" name="beauty_sub_category_ids<?php echo $i; ?>" id="yourBeauty" class="div_dd contact-group" value="<?php echo $beautySubCat->id; ?>" <?php echo ($j==1) ? 'checked' : ''; ?> > <?php echo ucfirst($beautySubCat->name); ?></p><?php
                                    $j++;
                                }
                            }
                            ?>
                        </div>
                        <?php $i++;}} ?>

                    </div>

                    <div class="contorol">
                        <input type="text" name="allergy" placeholder="Any Allergies" class="drop_in">
                    </div>
                    <!--start add icon-->
                    <div class="tab_con_container">

                        <p class="file pull-left lest">

                            <input type="file" class="form-control" id="file" multiple="multiple" required name="image_ids[]">
                            <span class="icon"><label for="file" class="fa fa-plus"></label></span>
                        </p>

                    </div>
                    <div class="chooseButtn">
                        <a data-tab="treat"></a>
                        <input type="submit" name="submit" class="submitButton detials" id="submit" value="Choose Treatment">
                    </div>


                </form>
                <!--end add icon-->
            </div>
        </div>


    </main>

</div>
</div>
</div>

<!-- res nav js -->
<script src="http://localhost/glamarmy/assetweb/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".content-box").hide();
        $(".contorol").click(function() {
            $(this)
            .next(".content-box")
            .slideToggle()
            .siblings(".content-box")
            .slideUp();
            if ($("i").hasClass("fa-plus")) {
                $(this)
                .find("i")
                .toggleClass("fa-minus");
            }
        });
    });
</script>