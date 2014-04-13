<div id="db-forget-password" class="forget-password-page-content">
    <?php echo $menu; ?>

    <div class="title">
        <h1><?php _e('Forget Password', 'dboard'); ?></h1>
    </div>

    <?php
    if (Dbm::getMsg('dbError')) {
        echo Dbm::getMsg('dbError');
    }

    if (Dbm::getMsg('dbSuccess')) {
        echo Dbm::getMsg('dbSuccess');
    }
    ?>
    <form name="db-forget-password" id="db-forget-password"  action="<?php echo $actionUrl; ?>" method="post">
        <p class="db-forget-password">
            <label><?php _e('E-Mail', 'dboard'); ?></label>
            <input type="text" name="user_email" value="<?php echo Dbm::getValue('user_email', __('E-Mail', 'dboard')); ?>" id="user_email" class="input"  />
        </p>
        <?php do_action('db_forget_password'); ?>
        <p class="db-forget-password-submit">
            <input type="submit" name="wp-submit-forget-password" value="<?php _e('Retrieve Password', 'dboard'); ?>" id="retrieve_password" />
            <input type="submit" name="wp-cancel" value="<?php _e('Cancel', 'dboard'); ?>" id="Cancel" />
        </p>
        <hr />
        <p class="statement"><?php _e('A password will be e-mailed to you', 'dboard'); ?></p>
    </form>
</div>
