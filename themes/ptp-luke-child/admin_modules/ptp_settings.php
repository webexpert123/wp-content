<?php
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

    if(isset($_POST["ptp_setting_submit"])){
        $coach_profile_policy = sanitize_textarea_field($_POST["coach_profile_cancellation_policy"]);
        update_option("_coach_profile_policy", $coach_profile_policy);
        echo "<script>Swal.fire({ title: 'Changes Saved', text: '', icon: 'success' });</script>";
    }

    echo '<div class="wrap">';
    echo '<h1>PTP Settings</h1><hr>'; 

    $coach_profile_policy_val = get_option("_coach_profile_policy", true);
    ?>
    <form action="" method="POST">
        <table class="form-table">
            <tr>
                <th scope="row"><label for="coach_profile_cancellation_policy">Cancellation Policy (Coach Profile Page)</label></th>
                <td><textarea id="coach_profile_cancellation_policy" name="coach_profile_cancellation_policy" rows="5" cols="50" class="large-text" required><?php echo esc_html(wp_unslash($coach_profile_policy_val)); ?></textarea></td>
            </tr>
        </table>
        <?php submit_button('Save Changes', 'primary', 'ptp_setting_submit'); ?>
    </form>
    <?php
    echo '</div>';