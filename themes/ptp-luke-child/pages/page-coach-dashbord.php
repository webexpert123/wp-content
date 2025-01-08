<?php
/* Template Name: Coach My Account */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PTP-Dashboard</title>
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/Module/module.css" rel="stylesheet" />
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/Module/box-icon.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css" rel="stylesheet"/>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets//js/main.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> 
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script> 
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="module-template">
    <!-- container open -->
    <div id="inner-template">
        <div class="container-fluid">
            <?php require locate_template('layouts/coach-panel/header.php') ; ?>
        </div>
        <div class="inner-layout">
            <!-- sidebar start -->
            <?php require locate_template('layouts/coach-panel/sidebar.php') ; ?>
            <!-- sidebar End -->
            <!-- content col start -->
            <div class="content-wrapper">
               <?php 
               $template_name = $page.".php";
               $template_path = locate_template('layouts/coach-panel/' . $template_name);
               if ($template_path) {
                require $template_path;
               } else {
                  echo "<h1 class='text-light'>404 Template not found !</h1>";
               }
               ?> 
            </div>
            <!-- content col End -->
        </div>

        <!-- container close -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>
<script>
new DataTable('#example');

$('#datetimepicker').datetimepicker({
    uiLibrary: 'bootstrap5',
    modal: true,
    footer: true,
    format: 'yyyy-mm-dd hh:MM tt'
});
$('#datetimepicker2').datetimepicker({
    uiLibrary: 'bootstrap5',
    modal: true,
    footer: true,
    format: 'yyyy-mm-dd hh:MM tt'
});
$('#Edit_datetimepicker').datetimepicker({
    uiLibrary: 'bootstrap5',
    modal: true,
    footer: true,
    format: 'yyyy-mm-dd hh:MM tt'
});
$('#Edit_datetimepicker2').datetimepicker({
    uiLibrary: 'bootstrap5',
    modal: true,
    footer: true,
    format: 'yyyy-mm-dd hh:MM tt'
});
</script>
<script>
    function logout_user(){
        Swal.fire({
          title: "Logout Confirmation !",
          text: "Are you sure you want to do logout ?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Confirm"
        }).then((result) => {
          if (result.isConfirmed) {
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'POST',
                data: {action:"logout_user"}, 
                success: function(response) {
                    if (response.data.ajax_status == 'success') {
                      window.location.href = response.data.redirect_url;
                    }else{
                      Swal.fire({ title: response.data.message, text: '', icon: "error"});
                    }
                }
            });
          }
        });
    }

function copy_link(text) {
    const tempInput = document.createElement('textarea');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    try {
        document.execCommand('copy');
        Swal.fire({ title: "Copied !", text: '', icon: ""});
    } catch (err) {
        console.error('Failed to copy text:', err);
    }
    document.body.removeChild(tempInput);
}

</script>
</html>