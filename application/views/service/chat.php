<div class="page page-full page-chat">
    <div class="tbox tbox-sm">
        <!-- left side -->
        <div class="tcol w-xl bg-tr-white lt b-r">
            <!-- left side header-->
            <div class="p-15 bg-white">
                <h3 class="custom-font m-0 mr-5 inline-block">Chat</h3><!-- <span class="badge bg-lightred">3</span> -->
                <div class="btn-group pull-right">
                    <button class="btn btn-sm btn-default pull-right visible-sm visible-xs ml-5" data-toggle="collapse" data-target="#open-chats" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-bars"></i></button>
                    <!-- <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        More <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul> -->
                </div>
            </div>
            <!-- /left side header -->
            <!-- left side body -->
            <div class="p-15 collapse collapse-xs collapse-sm" id="open-chats">
                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                <ul class="list-unstyled" id="inbox">
                    <?php 
                    $chatlist = getDataByMethod('getChatList');
                    if (!empty($chatlist) && is_array($chatlist)) {
                        $i = 1;
                        foreach ($chatlist as $key => $chatdata) {

                            $room_id        = $chatdata->room_id;
                            $profile_pic    = $chatdata->profile_pic;
                            $name           = ucwords($chatdata->firstname.' '.$chatdata->lastname);
                            $user_id        = $chatdata->user_id;
                            $active_class = ($i == 1) ? 'active' : '';
                            ?>
                            <li class="<?php echo $active_class; ?>">
                                <a href="javascript:void(0);" onclick="return loadChatData('<?php echo $room_id ?>', '<?php echo $name; ?>','<?php echo $user_id; ?>');" class="<?php echo $active_class; ?>">
                                    <div class="media">
                                        <div class="media-left thumb thumb-sm">
                                            <?php if (dcrf_image_exist($chatdata->profile_pic)) : ?>
                                                <img class="media-object img-circle" src="<?php echo $chatdata->profile_pic; ?>">
                                            <?php else: ?>
                                                <img class="media-object img-circle" src="<?php echo site_url(); ?>/assetweb/images/user_placeholder.jpg">
                                            <?php endif; ?>
                                        </div>
                                        <div class="media-body">
                                            <p class="media-heading">
                                                <span class="text-strong"><?php echo $chatdata->firstname.' '.$chatdata->lastname; ?></span>
                                                <!-- <span class="badge bg-lightred">2</span> -->
                                                <small class="text-muted pull-right"><?php //echo $chatdata->created_date; ?></small>
                                            </p>
                                            <div class="chat-actions pull-right">
                                                <span class="mark-readed"><i class="fa fa-circle-o"></i></span>
                                                <!-- <span class="archive"><i class="fa fa-times"></i></span> -->
                                            </div>
                                            <!-- <small class="text-muted message">Commodo sunt minim incid id unt ipsum dolore veniam nulla Lorem reprehenderit officia. Ut esse cillum quis deserunt.</small> -->
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php $i++;
                        }
                    }
                    ?>
                </ul>

            </div>
            <!-- /left side body -->
        </div>
        <!-- /left side -->




        <!-- right side -->
        <div class="tcol chat_main_container">
            <!-- right side header -->
            <div class="p-15 bg-white b-b chat_header">
                <!-- <div class="btn-toolbar pull-right">
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm br-2"><i class="fa fa-plus"></i> New Message</button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm br-2"><i class="fa fa-cog"></i> Settings</button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm br-2"><i class="fa fa-search"></i></button>
                    </div>
                </div> -->
                <h3 class="custom-font m-0 mr-5 inline-block" id="chat_to_name">Unknown</h3>
            </div>
            <!-- /right side header -->

            <!-- right side body -->
            <div class="p-15">

                <!-- chats -->
                <ul id="chat_window" class="chats p-0">
                    <!-- <li class="text-center"><a href="javascript:;" onclick="loadPreviousChatData();">Load More...</a></li> -->
                    <!-- <li class="conversation-divider"><span>Conversation started at 26.03.2014</span></li> -->
                    <!-- <li class="conversation-divider"><span>Today</span></li> -->
                </ul>
                <!-- / chats -->

            </div>
            <!-- /right side body -->

        </div>
        <!-- /right side -->

    </div>

</div>




<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
    var curr_user_id    = "<?php echo get_current_user_id(); ?>";
    var curr_user_name  = "<?php echo get_current_user_data('firstname'); ?> <?php echo get_current_user_data('lastname'); ?>";
    var today_date      = "<?php echo date('M d Y,H:i'); ?>"; // "May 22 2018,17:02"

    var config = {
        apiKey: "AIzaSyBU3V-wgW5FB9-el8sVAPZbOjwJeEKUlng",
        authDomain: "glamarmy-616f9.firebaseapp.com",
        databaseURL: "https://glamarmy-616f9.firebaseio.com",
        projectId: "glamarmy-616f9",
        storageBucket: "glamarmy-616f9.appspot.com",
        messagingSenderId: "811035752333"
    };
    // Init Firebase Chat
    firebase.initializeApp(config);

    // Load Chat
    function sendMessage(room_obj) {

        var room_id             = room_obj.elements["curr_chat_room_id"].value;
        var receiver_id         = room_obj.elements["chat_rec_id"].value;
        var receiver_name         = room_obj.elements["chat_rec_name"].value;
        var curr_user_new_msg   = room_obj.elements["curr_user_new_msg"].value;
        
        var date = today_date;
        var room_id = room_id;
        //var curr_user_new_msg = document.getElementById("curr_user_new_message").value;
        firebase.database().ref("chats").child(room_id).push().set({
            sender_id: curr_user_id,
            text: curr_user_new_msg,
            date : date,
            name : curr_user_name,
            type : 1,
            url : ''
        });
        
        loadChatData(room_id,receiver_name,receiver_id);
        document.getElementById("curr_user_new_msg").value = '';
        
        ajaxCallForinitiateChat(room_id,receiver_id,curr_user_new_msg);
        
        return false;
    }


    // function to load chat
    function loadChatData(room_id, name='',receiver_id=''){

        if (name != '') {
            document.getElementById('chat_to_name').innerHTML = name;
        }

        var curr_user_id    = "<?php echo get_current_user_id(); ?>";
        var curr_user_name  = "<?php echo get_current_user_data('firstname'); ?> <?php echo get_current_user_data('lastname'); ?>";
        var today_date      = "<?php echo date('M d Y,H:i'); ?>"; // "May 22 2018,17:02"

        var urlRef =  firebase.database().ref('chats').child(room_id);//.limitToLast(2);
        var html = '';

        urlRef.once("value", function(snapshot) {

            //html += '<li class="text-center"><a href="javascript:;" onclick="loadPreviousChatData('+room_id+');">Load More...</a></li>';
            //     html += '<div id="chat_window" class="chat_window" data-room_id="'+room_id+'">';
            // }
            snapshot.forEach(function(child) {

                //console.log(child.val());

                if(child.val().sender_id == curr_user_id){

                    html += '<li class="out"><div class="media"><div class="pull-right thumb thumb-sm">';
                    if(child.val().url != ''){
                        html += '<img class="media-object img-circle chat_to_propic" src="" alt="">';
                    }
                    html += '</div><div class="media-body"><p class="media-heading"><a href="#" class="name">'+curr_user_name+'</a><span class="datetime"></span></p><span class="body">'+child.val().text+'</span></div></div></li>';

                }else{
                    html += '<li class="in"><div class="media"><div class="pull-left thumb thumb-sm">';
                    if(child.val().url != ''){
                        html += '<img class="media-object img-circle chat_to_propic" src="" alt="">';
                    }
                    html += '</div><div class="media-body"><p class="media-heading"><a href="#" class="name">'+name+'</a><span class="datetime"></span></p><span class="body">'+child.val().text+'</span></div></div></li>';
                }
            });
            
            html += '<li class="out"><div class="media"><div class="pull-right thumb thumb-sm"><img class="media-object img-circle" src="assets/images/profile-photo.jpg" alt=""></div><div class="media-body"><div><form method="POST" onsubmit="return sendMessage(this);"><div class="panel-footer text-left"><textarea id="curr_user_new_msg" class="form-control mb-10" rows="3"></textarea><input type="hidden" id="curr_chat_room_id" name="room_id" value="'+room_id+'"><input type="hidden" id="chat_rec_id" name="chat_rec_id" value="'+receiver_id+'"><input type="hidden" id="chat_rec_name" name="chat_rec_name" value="'+name+'"><button type="submit" class="btn btn-greensea btn-ef btn-ef-7 btn-ef-7b b-0 br-2"><i class="fa fa-envelope"></i> Send Message</button></div></form></div></div></div></li>';
            
            if (html != '') {
                document.getElementById("chat_window").innerHTML = html;
            }

        });


        // setInterval(function(){
        //  var element = document.getElementById('curr_chat_room_id').value;
        //  loadChatData(element);
        // }, 5000);
    }


    /**
     * Load Previous Chat
     */
     // function to load chat
    function loadPreviousChatData(room_id){

        var urlRef =  firebase.database().ref('chats').child(room_id).limitToLast(10);
        var html = '';
        urlRef.once("value", function(snapshot) {
            snapshot.forEach(function(child) {
                console.log(child.val());
                if(child.val().sender_id == curr_user_id){
                    html += '<li class="out"><div class="media"><div class="pull-right thumb thumb-sm">';
                    if(child.val().url != ''){
                        html += '<img class="media-object img-circle chat_to_propic" src="" alt="">';
                    }
                    html += '</div><div class="media-body"><p class="media-heading"><a href="#" class="name">'+child.val().name+'</a><span class="datetime"></span></p><span class="body">'+child.val().text+'</span></div></div></li>';

                }else{
                    html += '<li class="in"><div class="media"><div class="pull-left thumb thumb-sm">';
                    if(child.val().url != ''){
                        html += '<img class="media-object img-circle chat_to_propic" src="" alt="">';
                    }
                    html += '</div><div class="media-body"><p class="media-heading"><a href="#" class="name">'+child.val().name+'</a><span class="datetime"></span></p><span class="body">'+child.val().text+'</span></div></div></li>';
                }
            });
            if (html != '') {
                document.getElementById("chat_window").appendChild = html;
            }
        });
    }

</script>
