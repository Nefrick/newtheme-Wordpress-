<?php

function sj_theme_opts_page() {
    $theme_opts                 = get_option( 'sj_opts' );
?>

<div class="wrap">
    <div class="panel panel-success">
        <h3 class="panel-title"><?php _e('New Theme Settings', 'newtheme' ); ?></h3>
    </div>
    <div class="panel-body">
        <?php
        if(isset($_GET['status']) && $_GET['status'] == 1){
            ?>
            <div class="alert alert-success">Success!</div>
            <?php
        }
        ?>
        <form action="admin-post.php" method="post">
            <input type="hidden" name="action" value="sj_save_options">

            <?php wp_nonce_field('sj_options_verify'); ?>

            <h4><?php _e('Social Icons', 'newtheme'); ?></h4>
            <div class="form-group">
                <label><?php _e('Twitter','newtheme'); ?></label>
                <input type="text" class="form-control" name="sj_inputTwitter" value="<?php echo $theme_opts['twitter']; ?>">
            </div>
            <div class="form-group">
                <label><?php _e('Facebook','newtheme'); ?></label>
                <input type="text" class="form-control" name="sj_inputFacebook" value="<?php echo $theme_opts['facebook']; ?>">
            </div>
            <div class="form-group">
                <label><?php _e('YouTube','newtheme'); ?></label>
                <input type="text" class="form-control" name="sj_inputYouTube" value="<?php echo $theme_opts['youtube']; ?>">
            </div>
            <h4><?php _e('Logo', 'newtheme'); ?></h4>
            <div class="form-group">
                <label><?php _e('Logo Type','newtheme'); ?></label>
                <select class="form-control" name="sj_inputLogoType" >
                    <option value="1"><?php _e('Site Name', 'newtheme'); ?></option>
                    <option value="2" <?php echo $theme_opts['logo_type'] == 2 ? 'SELECTED' : ''; ?> ><?php _e('Image', 'newtheme'); ?></option>
                </select>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Logo Image" name="sj_inputLogoImg"
                       value="<?php echo $theme_opts['logo_img']; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" id="sj_uploadLogoImgBtn"><?php _e('Upload', 'newtheme'); ?></button>
                </span>
            </div>
            <br>
            <h4><?php _e('Footer', 'newtheme'); ?></h4>
            <div class="form-group">
                <label><?php _e('Footer Text(HTML Allowed)','newtheme'); ?></label>
                <textarea class="form-control" name="sj_inputFooter"  cols="60" rows="5"><?php echo stripslashes_deep($theme_opts['footer']); ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" ><?php _e('UPDATE', 'newtheme'); ?></button>
            </div>
        </form>
    </div>
</div>

<?php
}