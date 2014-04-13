<div id="db-registration" class="registration-page-content">
    <?php echo $menu; ?>

    <div class="title">
        <h1><?php _e('Register your Account', 'dboard'); ?></h1>
    </div>

    <?php
    if (Dbm::getMsg('dbError')) {
        echo Dbm::getMsg('dbError');
    }

    if (Dbm::getMsg('dbSuccess')) {
        echo Dbm::getMsg('dbSuccess');
    }
    ?>
    <form action="<?php echo $actionUrl; ?>" name="db-registration" id="db-registration" method="post">
        <p class="db-reg-username">
            <label><?php _e('Username', 'dboard'); ?></label>
            <input type="text" name="user_login" value="<?php echo Dbm::getValue('user_login', __('Username', 'dboard')); ?>" id="user_login" class="input" />
        </p>
        <p class="db-reg-username">
            <label><?php _e('E-Mail', 'dboard'); ?></label>
            <input type="text" name="user_email" value="<?php echo Dbm::getValue('user_email', __('E-Mail', 'dboard')); ?>" id="user_email" class="input"  />
        </p>
        <?php do_action('db_registration'); ?>
        <p class="db-reg-submit">
            <input type="submit" name="wp-submit-login" value="<?php _e('Register', 'dboard'); ?>" id="register" />
            <input type="submit" name="wp-cancel" value="<?php _e('Cancel', 'dboard'); ?>" id="Cancel" />
        </p>
        <hr />
        <p class="statement"><?php _e('A password will be e-mailed to you', 'dboard'); ?></p>
    </form>
</div>
