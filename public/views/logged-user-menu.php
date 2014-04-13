<ul>
    <li>
        <a href="<?php echo LOGIN; ?>" title="<?php _e( 'Profile', 'dboard'); ?>">
            <?php _e( 'Profile', 'dboard'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo REGISTRATION; ?>" title="<?php _e( 'Reset Password', 'dboard'); ?>">
            <?php _e( 'Reset Password', 'dboard'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( 'Logout', 'dboard'); ?>">
            <?php _e( 'Logout', 'dboard'); ?>
        </a>
    </li>
</ul>