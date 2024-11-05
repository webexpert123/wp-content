<?php
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'twentytwentyone-style' for the Twenty Twenty-One theme.

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style)
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


function custom_page_templates($template) {
    if (is_page('home')) {
        $template = locate_template('pages/page-home.php');
    } elseif (is_page('contact')) {
        $template = locate_template('pages/page-contact.php');
    } elseif (is_page('about')) {
        $template = locate_template('pages/page-about.php');
    }
    return $template;
}
//add_filter('page_template', 'custom_page_templates');

function add_custom_roles() {
    // Add Coach Role
    add_role('coach', 'Coach', array(
        'read' => true, // Allow reading content
        'edit_posts' => true, // Allow editing posts
        'delete_posts' => false, // Disable deleting posts
        'publish_posts' => true, // Allow publishing posts
    ));

    // Add Athlete Role
    add_role('athlete', 'Athlete', array(
        'read' => true, // Allow reading content
        'edit_posts' => false, // Disable editing posts
        'delete_posts' => false, // Disable deleting posts
        'publish_posts' => false, // Disable publishing posts
    ));
}
add_action('init', 'add_custom_roles');

function add_sport_menu() {
    add_menu_page(
        'Sports', // Page title
        'Sports', // Menu title
        'manage_options', // Capability required to view this menu
        'sports', // Menu slug
        'sports_menu_page', // Callback function to display the content of the page
        'dashicons-heart', // Icon (optional, use any Dashicon)
        6 // Position (optional)
    );
}
add_action( 'admin_menu', 'add_sport_menu' );

function sports_menu_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'sports';
    $message="";
    if(isset($_POST['add_sport'])){
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $attachment_id = media_handle_upload('upload_image', 0);

        if (is_wp_error($attachment_id)) {
            $error_message = $attachment_id->get_error_message();
            $message = "Error uploading image: $error_message";
        }else{
            $query = $wpdb->prepare( "INSERT INTO $table_name (`sport_name`,`image`) VALUES ('$_POST[sport_name]','$attachment_id')" );
            $wpdb->query($query);

            if ($wpdb->last_error) {
               $message = "<p style='color:red;'>There was an error inserting the data.</p>";
            } 
            else {
               $message = "<p style='color:green;'>Added successfully!</p>";
            }
        }
        
    }

    if(isset($_POST['edit_sport'])){
        if($_FILES['upload_image']['name'] != ''){
           require_once(ABSPATH . 'wp-admin/includes/image.php');
           require_once(ABSPATH . 'wp-admin/includes/file.php');
           require_once(ABSPATH . 'wp-admin/includes/media.php');
           $attachment_id = media_handle_upload('upload_image', 0);
           if (is_wp_error($attachment_id)) {
              $error_message = $attachment_id->get_error_message();
              $message = "Error uploading image: $error_message";
           }else{
              $query = $wpdb->prepare( "UPDATE $table_name SET `sport_name`='$_POST[sport_name]' ,`image`='$attachment_id' WHERE sportID='$_POST[sportID]' " );
              $wpdb->query($query);
            }
        }else{
           $query = $wpdb->prepare( "UPDATE $table_name SET `sport_name`='$_POST[sport_name]' WHERE sportID='$_POST[sportID]' " );
           $wpdb->query($query);
        }
        $message = "<p style='color:green;'>Updated successfully!</p>";
    }
    

    if(isset($_REQUEST['sid'])){
        $query = $wpdb->prepare( "DELETE FROM $table_name WHERE sportID = '$_REQUEST[sid]' " );
        $wpdb->query( $query );
        $message = "<p style='color:green;'>Deleted successfully!</p>";
    }
 ?>
 <style>
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      text-align: left;
    }
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 30%;
    }
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    table td{
        text-align: center;
    }
    </style>

    <div class="wrap">
        <h1>Add Sports</h1><hr>
        <?php echo $message; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Sport Image:&nbsp;&nbsp;</label><input type="file" name="upload_image" required><br><br>
            <label>Sport Name:&nbsp;&nbsp;</label><input type="text" name="sport_name" placeholder="Enter sport name" required><br><br>
            <button type="submit" name="add_sport">ADD</button>
        </form>
        <br><br>

        <h1>Sports List</h1><hr>
        <table border="1" style="width:100%;">
            <tr>
               <th>S.No.</th>
               <th>IMAGE</th>
               <th>SPORT NAME</th>
               <th>ACTION</th>
            </tr>
            <?php $results = $wpdb->get_results("SELECT * FROM $table_name");
            $i=0;
            foreach ($results as $row) { ?>
              <tr>
                <th><?php echo ++$i; ?>.</th>

                <td><?php $image_url = wp_get_attachment_url($row->image);
                if($image_url){echo "<img src='".$image_url."' width='70' height='70' />";}?></td>

                <td><?php echo $row->sport_name; ?></td>

                <td><a href="javascript:void(0)" onclick="open_popup('myModal<?php echo $row->sportID; ?>')">EDIT</a> &nbsp;&nbsp; 
                <a href="/wp-admin/admin.php?page=sports&sid=<?php echo $row->sportID; ?>">DELETE</a>
                <div id="myModal<?php echo $row->sportID; ?>" class="modal">
                    <div class="modal-content">
                        <span class="close"  onclick="close_popup('myModal<?php echo $row->sportID; ?>')">&times;</span>
                        <h1>Edit Sport</h1><hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="sportID" value="<?php echo $row->sportID; ?>">
                            <label>Sport Image:&nbsp;&nbsp;</label><input type="file" name="upload_image"> <br>(Select image if you want to change otherwise leave it!)<br><br>
                            <label>Sport Name:&nbsp;&nbsp;</label><input type="text" name="sport_name" placeholder="Enter sport name" value="<?php echo $row->sport_name; ?>" required><br><br>
                            <button type="submit" name="edit_sport">UPDATE</button>
                        </form>
                    </div>
                </div></td>
              </tr>
            <?php } ?>
        </table>
    </div>
    <script>
        function open_popup(popupID){
            var modal = document.getElementById(popupID);
            modal.style.display = "block";
        }
        function close_popup(popupID){
            var modal = document.getElementById(popupID);
            modal.style.display = "none";
        }
    </script>
<?php
}





