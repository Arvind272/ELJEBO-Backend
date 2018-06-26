<div class="main_content_dashboard customer_chat_main">
	<div class="tab_con_row chat_user">
		<div id="chat_container" class="chat_container">



			<div class="chat_header">
				<div class="user_box" id="chat_to_propic">
					<img src="assets/images/02.png">
				</div>
				<h3 id="chat_to_name"></h3>
			</div>
			<div id="chat_window" class="chat_window">
				<!-- <div class="user_first">
					<img src="assets/images/01.png">
					<div class="text_box">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
					</div>
				</div>
				<div class="user_second">
					<div class="text_box">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
					</div>
					<img src="assets/images/02.png">
				</div>	 -->
			</div>
			<div class="message_box">
				<form method="POST" onsubmit="return sendMessage();">
					<input type="text" id="curr_user_new_message" placeholder="type a message">
					<button type="submit" class="chat_send" name="submit_chat" value="Send">Send</button>
					<!-- <a class="chat_send" href="javascript:void(0)" >Send</a> -->
				</form>
			</div>



		</div>
	</div>
</div>

<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
	var curr_user_id 	= "<?php echo get_current_user_id(); ?>";
	var curr_user_name 	= "<?php echo get_current_user_data('firstname'); ?> <?php echo get_current_user_data('lastname'); ?>";
	var today_date 		= "<?php echo date('M d Y,H:i'); ?>"; // "May 22 2018,17:02"

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

		var room_id = room_obj.elements["room_id"].value;
		var receiver_id = room_obj.elements["chat_rec_id"].value;
		
		var date = today_date;
		var room_id = room_id;
		var curr_user_new_msg = document.getElementById("curr_user_new_message").value;
		firebase.database().ref("chats").child(room_id).push().set({
			sender_id: curr_user_id,
			text: curr_user_new_msg,
			date : date,
			name : curr_user_name,
			type : 1,
			url : ''
		});
		

		loadChatData(room_id);
		document.getElementById("curr_user_new_message").value = '';
		
		ajaxCallForinitiateChat(room_id,receiver_id,curr_user_new_msg);
		
		return false;
	}


	// function to load chat
	function loadChatData(room_id, name='',proPic='',receiver_id=''){

		if (name != '') {
			document.getElementById('chat_to_name').innerHTML = name;
		}
		if (proPic != '') {
			document.getElementById('chat_to_propic').innerHTML = '<img src="'+proPic+'">';
		}

		var curr_user_id 	= "<?php echo get_current_user_id(); ?>";
		var curr_user_name 	= "<?php echo get_current_user_data('firstname'); ?> <?php echo get_current_user_data('lastname'); ?>";
		var today_date 		= "<?php echo date('M d Y,H:i'); ?>"; // "May 22 2018,17:02"

		var urlRef =  firebase.database().ref('chats').child(room_id);
		var html = '';

		urlRef.once("value", function(snapshot) {

			if (name != '') {
				html += '<div class="chat_header"><div class="user_box" id="chat_to_propic"><img src="'+proPic+'"></div><h3 id="chat_to_name">'+name+'</h3></div>';
				html += '<div id="chat_window" class="chat_window" data-room_id="'+room_id+'">';
			}
			snapshot.forEach(function(child) {

				if(child.val().sender_id == curr_user_id){
					html += '<div class="user_second"><div class="text_box">'+child.val().text+'</div>';
					if(child.val().url != ''){
						html += '<img src="assets/images/02.png">';
					}
					html += '</div>';
				}else{
					html += '<div class="user_first">';
					if(child.val().url != ''){
						html += '<img src="assets/images/01.png">';
					}
					html += '<div class="text_box">'+child.val().text+'</div></div>';
				}
			});
			if (name!= '') {
				html += '</div>';
				html += '<div class="message_box"><form method="POST" onsubmit="return sendMessage(this);"><input type="hidden" id="curr_chat_room_id" name="room_id" value="'+room_id+'"><input type="hidden" id="chat_rec_id" name="chat_rec_id" value="'+receiver_id+'"><input type="text" id="curr_user_new_message" placeholder="type a message"><button type="submit" class="chat_send" name="submit_chat" value="Send">Send</button></form></div>';
			}
			
			if (html != '') {
				if (name!= '') {
					document.getElementById("chat_container").innerHTML = html;
				}else{
					document.getElementById("chat_window").innerHTML = html;
				}
			}
		});


		// setInterval(function(){
		// 	var element = document.getElementById('curr_chat_room_id').value;
		// 	loadChatData(element);
		// }, 5000);
	}
</script>
