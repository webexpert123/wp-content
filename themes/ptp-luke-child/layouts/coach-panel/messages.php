<style>
    #emoji-picker {
        position: absolute;
        z-index: 999;
        bottom: 60px;
        right: 40px;
    }
    #emoji-trigger{
        background: #1c2229 !important;
        border: none !important;
    }
</style>
<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">Message</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>Message</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- top cols of dashboard -->
                    <div class="profile-page">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                       <div class="chat-main">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="chat-list">
                                                    <div class="card radius-10 overflow-hidden w-100">
                                                        <div class="card-body">
                                                          <div class="mb-3">
                                                            <h5 class="">All Athletes</h5><hr>
                                                            <div class="card-title mb-4 d-flex align-items-center justify-content-between">
                                                                <div class="form-group mb-0">
                                                                    <input type="text" class="form-control" id="searchStudentName" placeholder="Search athlete name...">
                                                                </div>
                                                            </div>
                                                            <div class="student-list">
                                                            <?php
                                                            global $wpdb;
                                                            $i=0;
                                                            $args_custom = array(
                                                                'role'    => 'athlete', 
                                                                'fields'  => 'ID'
                                                            );
                                                            $user_query_custom = new WP_User_Query($args_custom);
                                                            foreach ($user_query_custom->results as $athleteID) {
                                                              $athlete_name = get_user_meta($athleteID, "fullname", true);
                                                              $athlete_info = get_userdata($athleteID);
                                                              $athlete_email = $athlete_info->user_email;
                                                              $chat_link = site_url('my-account-coach/?section=messages&rid='.md5($athleteID));
                                                              $attachment_id = get_user_meta($athleteID, "_profile_pic_id", true);
                                                              if( $attachment_id ) {
                                                                $profile_img_link = wp_get_attachment_image_url($attachment_id, 'thumbnail');
                                                              }else{
                                                                $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
                                                              }

                                                              $latest_chat_id = $wpdb->get_var( $wpdb->prepare( "SELECT MAX(chatID) as chatID FROM {$wpdb->prefix}chat_messages WHERE (sender_id = %d AND receiver_id = %d)  OR (sender_id = %d AND receiver_id = %d) ORDER BY chatID ASC", $athleteID, $user_id, $user_id, $athleteID ) );
                                                              $latest_chat_id = $latest_chat_id ? $latest_chat_id : 0; ?>
                                                                <a href="<?php echo $chat_link; ?>" data-username="<?php echo $athlete_name; ?>" data-latest_chat_id="<?php echo $latest_chat_id; ?>">
                                                                    <div class="customers-list-item d-flex align-items-center p-2 py-3 cursor-pointer">
                                                                    <div class="student-thumb">
                                                                        <img src="<?php echo $profile_img_link; ?>" class="rounded-circle" width="46" height="46" alt="">
                                                                        <!-- <span class="user-online"></span> -->
                                                                    </div>
                                                                    <div class="ms-2">
                                                                        <h6 class="mb-1 font-14"><?php echo $athlete_name; ?></h6>
                                                                        <p class="mb-0 font-13 text-light-2"><?php echo $athlete_email; ?></p>
                                                                    </div>
                                                                    <div class="list-inline d-flex customers-contacts ms-auto">
                                                                        <?php $unread_count = get_unread_message_count_func2($user_id,$athleteID );
                                                                        if($unread_count != 0){
                                                                            echo '<span class="badge badge-pill badge-danger">'.$unread_count.'</span>';
                                                                        } ?>
                                                                    </div>
                                                                </div></a>
                                                              <?php } ?>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      </div>
                                                </div>
                                            </div>

                                <div class="col-md-9">
                                    <?php
                                    if(!isset($_REQUEST["rid"]) || empty($_REQUEST["rid"])){
                                        echo "<h2 class='text-center text-light'>WELCOME TO THE PTP CHAT SYSTEM</h2>";
                                        echo '<center><img src="'.get_stylesheet_directory_uri().'/assets/images/lesson_coordinator.png" class="mt-5" width="350" height="200"></center>';
                                    }
                                    else{ 
                                        $hash = $_REQUEST["rid"]; 
                                        $receiver_id = $wpdb->get_var( $wpdb->prepare("SELECT ID FROM {$wpdb->users} WHERE MD5(ID) = %s ", $hash ) );
                                        if ( $receiver_id ) {
                                            $receiver_name = get_user_meta($receiver_id, "fullname", true);
                                            $receiver_info = get_userdata($receiver_id);
                                            $receiver_email = $athlete_info->user_email;
                                            $receiver_attachment_id = get_user_meta($receiver_id, "_profile_pic_id", true);
                                            if( $receiver_attachment_id ) {
                                                $receiver_profile_img_link = wp_get_attachment_image_url($receiver_attachment_id, 'thumbnail');
                                            }else{
                                                $receiver_profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
                                            } ?>
                                        <div class="single-chat-tab">
                                            <div class="chat-header">
                                                <div class="media">
                                                    <div class="user-dp position-relative">
                                                        <img class="" src="<?php echo $receiver_profile_img_link; ?>" alt="img">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mt-0"><?php echo $receiver_name; ?></h5>
                                                        <p class="m-0"><?php echo $receiver_email; ?></p>
                                                    </div>
                                                    <div class="list-inline d-flex customers-contacts dropleft ms-auto dropdown"></div>
                                                </div>
                                            </div>
                                            <div id="emoji-picker"></div>
                                            <div id="load_messages" class="chat-body">
                                            </div>
                                            <div class="chat-footer">
                                                <div class="input-group md-form form-sm form-2 pl-0">
                                                    <div class="input-group-append add_attachment">
                                                        <input type="file" id="attachments" multiple="multiple" onchange="validateFiles()" accept=".jpg, .png, .pdf, .docx, .mp4, .webm" />
                                                        <button class="btn input-group-text lighten-3" id="basic-text1">
                                                        <i class="bx bx-plus-circle"></i>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" id="receiverid" value="<?php echo $receiver_id; ?>">
                                                    <input id="message_txt" class="form-control my-0 py-1 red-border" type="text" placeholder="Write a message...">
                                                    <div class="input-group-append send_btn">
                                                        <button type="button" class="btn" id="emoji-trigger">😀</button>
                                                        <button type="button" class="btn input-group-text  lighten-3" id="basic-text1" onclick="send_message();">
                                                            <i class="fadeIn animated bx bx-send"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p id="sending_txt" class="text-light" style="display:none;">Sending..</p>
                                            </div>
                                        </div>
                                        <?php }else{ echo "<h2 class='text-center text-danger'>Invalid Chat Link !</h2>";}
                                    }
                                    ?>
                                </div>
                                          </div>
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

<script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', () => {
            const picker = new EmojiMart.Picker({
                onEmojiSelect: (emoji) => {
                    const input = document.getElementById('message_txt');
                    const cursorPos = input.selectionStart;
                    const textBefore = input.value.substring(0, cursorPos);
                    const textAfter = input.value.substring(cursorPos);
                    
                    input.value = textBefore + emoji.native + textAfter;
                    input.focus();
                    input.selectionStart = cursorPos + emoji.native.length;
                    input.selectionEnd = cursorPos + emoji.native.length;
                },
                set: 'native', 
                theme: 'light',
                showPreview: false,
                showSkinTones: true,
                emojiSize: 20
            });

            const triggerButton = document.getElementById('emoji-trigger');
            const pickerDiv = document.getElementById('emoji-picker');
            
            pickerDiv.appendChild(picker);
            pickerDiv.style.display = 'none';

            triggerButton.addEventListener('click', () => {
                pickerDiv.style.display = pickerDiv.style.display === 'none' ? 'block' : 'none';
            });

            // Close picker when clicking outside
            document.addEventListener('click', (e) => {
                if (!pickerDiv.contains(e.target) && e.target !== triggerButton) {
                    pickerDiv.style.display = 'none';
                }
            });
        });
        
    function send_message(){
       var message = jQuery("#message_txt").val();
       var receiverid = jQuery("#receiverid").val();
       if(message==""){
          Swal.fire({ title: "Please enter message !", text: '', icon: "warning"});
          return false;
       }
       jQuery("#basic-text1").attr("disabled" , true);
       jQuery.ajax({
          url: "/wp-admin/admin-ajax.php",
          type: 'POST',
          dataType: "html",
          data: {action: "send_chat_message", message: message, senderid: "<?php echo $user_id; ?>", receiverid: receiverid},
          success: function(html) {
            jQuery("#message_txt").val('');
            jQuery("#basic-text1").attr("disabled" , false);
            get_messages(0);
          }
       });
    }


    function get_messages(spinner = 1){
       var receiverid = jQuery("#receiverid").val();
       if(receiverid==""){ return false; }
       if ( spinner == 1) {
         jQuery("#load_messages").html('<center><div class="spinner-border text-light mt-5"></div></center>');
       }
       else if ( spinner == 0){
        jQuery("#sending_txt").show();
       }

       jQuery.ajax({
          url: "/wp-admin/admin-ajax.php",
          type: 'POST',
          dataType: "html",
          data: {action: "get_chat_messages", senderid: "<?php echo $user_id; ?>", receiverid: receiverid},
          success: function(html) {
            jQuery("#sending_txt").hide();
            jQuery("#load_messages").html(html);
            jQuery('#load_messages').scrollTop(jQuery('#load_messages')[0].scrollHeight);
          }
       });
    }

    $(document).ready(function() {
        get_messages();
        $('#message_txt').on('keydown', function(e) {
           if (e.keyCode === 13) {
             e.preventDefault(); 
             send_message(); 
           }
        });

        //arrange chat list by last chat
        var $anchors = $('.student-list a');
        $anchors.sort(function(a, b) {
            var aValue = $(a).data('latest_chat_id');
            var bValue = $(b).data('latest_chat_id');
            return bValue - aValue;
        });
        $('.student-list').html($anchors);
    });

    function get_unread_message_count(){
       var receiverid = jQuery("#receiverid").val();
       jQuery.ajax({
          url: "/wp-admin/admin-ajax.php",
          type: 'POST',
          dataType: "html",
          data: {action: "get_unread_message_count", sender: "<?php echo $user_id; ?>", receiver: receiverid, ajax:1},
          success: function(html) {
            if(Number(html.trim()) > 0){
             get_messages(2);
             var audio = new Audio('<?php echo get_stylesheet_directory_uri(); ?>/assets/media/notification.mp3');
             audio.play(); 
            }
          }
       });
    }
    setInterval(get_unread_message_count, 5000);

    function validateFiles() {
        const fileInput = document.getElementById('attachments');
        const files = fileInput.files;
        let valid = true;
        const validExtensions = ['.jpg', '.jpeg', '.png', '.pdf', '.doc', '.docx', '.mp4', '.webm'];

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.size > 2 * 1024 * 1024) { 
                valid = false;
                break;
            }
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (!validExtensions.includes('.' + fileExtension)) {
                valid = false;
                break;
            }
        }

        if (!valid) {
            Swal.fire({ title: "Invalid file. Ensure it's less than 2MB and has a valid extension (e.g.: .jpg, .png, .pdf, .docx, .mp4, .webm)", text: '', icon: "warning"});
            document.getElementById('attachments').value = ''; 
        } else {
           const message = document.getElementById('message_txt').value;
           const files = document.getElementById('attachments').files;
           const receiverid = document.getElementById('receiverid').value;
           const senderid = "<?php echo $user_id; ?>";

           jQuery("#basic-text1").attr("disabled", true);
           jQuery("#sending_txt").show();

           const formData = new FormData();
           formData.append('action', 'send_chat_message');
           formData.append('message', "Documents attachments");
           formData.append('senderid', senderid);
           formData.append('receiverid', receiverid);

           for (let i = 0; i < files.length; i++) {
             formData.append('attachments[]', files[i]);
             console.log(files[i]);
           }
           jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'POST',
                dataType: "html",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(response) {
                    jQuery("#message_txt").val('');
                    jQuery("#attachments").val('');
                    jQuery("#sending_txt").hide(); 
                    jQuery("#basic-text1").attr("disabled", false);
                    get_messages(0);
                }
            });
        }
    }

    $('#searchStudentName').on('input', function() {
      var searchValue = $(this).val().toLowerCase();
      $('.student-list a').each(function() {
        var username = $(this).data('username').toLowerCase();
        if (username.indexOf(searchValue) !== -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
</script>