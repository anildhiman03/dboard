<?php
trait UserHelper
{
    public $error = '';
    public function loginSubmit()
    {
        $log = sanitize_text_field($_POST['log']);
        $pwd = sanitize_text_field($_POST['pwd']);
        $log = addslashes_gpc($log);
        $pwd = addslashes_gpc($pwd);
        if (!isset($log) || empty($log)) {
            $this->error = __('Empty Username');
        } elseif (!isset($pwd) || empty($pwd)) {
            $this->error = __('Empty Password');
        } elseif ( !username_exists( $log ) ) {
            $this->error = __('Invalid User Credentials');
        } else {
            $user = get_user_by('login', $log);
            if ( !wp_check_password($pwd, $user->user_pass, $user->ID)) {
                $this->error = __('Invalid User Credentials');
            } else {
                $this->error = '';
            }
        }
        if(isset($_POST['rememberme'])) {
            $rememberMe = $_POST['rememberme'];
        } else {
            $rememberMe = '';
        }
        if ($this->error) {
            Dbm::setErrorMsg($this->error);
            return false;
        } else {
            $credentials['user_login'] = $log;
            $credentials['user_password'] = $pwd;
            $credentials['remember'] = $rememberMe;
            $user = wp_signon($credentials);
            return $user;
        }
    }
}
?>