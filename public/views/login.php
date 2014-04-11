<div id="db-login" class="login-page-content">
    <?php
    do_action('db_login');
    echo $menu;
    if (Dbm::getMsg('dbError')) {
        echo Dbm::getMsg('dbError');
    }
    ?>
    <form name="db-loginform" id="db-loginform" action="<?php echo esc_url( $actionUrl ); ?>" method="post">

    <p class="db-login-username">
        <label><?php _e('Username'); ?> </label>
        <input type="text" name="log" id="id_username" class="input" value="<?php echo Dbm::getValue('log'); ?>" size="20" />
    </p>

    <p class="login-password">
        <label><?php _e('Password'); ?></label>
        <input type="password" name="pwd" id="user_password" class="input" value="" size="20" />
    </p>

    <p class="login-remember">
        <label>
            <input name="rememberme" type="checkbox" id="id_remember" value="forever" />
            <?php _e('Remember Me'); ?>
        </label>
    </p>
    <p class="login-submit">
        <input type="submit" name="wp-submit" id="submit" class="button-primary" value="<?php _e('Login In'); ?>" />
        <!--<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />-->
        </p>
    </form>
</div>