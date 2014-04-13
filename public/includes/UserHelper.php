<?php
trait UserHelper
{
    public $error = false;
    public $userId = false;
    public function loginSubmit()
    {
        $log = sanitize_text_field($_POST['log']);
        $pwd = sanitize_text_field($_POST['pwd']);
        $log = addslashes_gpc($log);
        $pwd = addslashes_gpc($pwd);
        if (!isset($log) || empty($log)) {
            $this->error = __('Empty Username', 'dboard');
        } elseif (!isset($pwd) || empty($pwd)) {
            $this->error = __('Empty Password', 'dboard');
        } elseif ( !username_exists( $log ) ) {
            $this->error = __('Invalid User Credentials', 'dboard');
        } else {
            $user = get_user_by('login', $log);
            if ( !wp_check_password($pwd, $user->user_pass, $user->ID)) {
                $this->error = __('Invalid User Credentials', 'dboard');
            } else {
                $this->error = false;
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

    public function registrationSubmit()
    {
        $login = sanitize_text_field($_POST['user_login']);
        $email = sanitize_text_field($_POST['user_email']);
        $login = addslashes_gpc($login);
        $email = addslashes_gpc($email);
        $invalidName = __('Username', 'dboard');
        if (!isset($login) || empty($login) || ($login == $invalidName)) {
            $this->error = __('Invalid Username', 'dboard');
        } elseif (!isset($email) || empty($email)) {
            $this->error = __('Empty E-Mail', 'dboard');
        } elseif (!validate_username( $login )) {
            $this->error = __('Invalid Username', 'dboard');
        } elseif (username_exists( $login )) {
            $this->error = __('Invalid Username', 'dboard');
        } elseif (!is_email($email)) {
            $this->error = __('Invalid E-mail', 'dboard');
        } elseif (email_exists($email)) {
            $this->error = __('Invalid E-mail', 'dboard');
        } else {
            $errors = register_new_user($login, $email);
            if ( !is_wp_error($errors) ) {
                Dbm::setSuccessMsg(__('User Registered Successfully. <br/> Password has been mailed to your email address', 'dboard'));
                $this->error = false;
                $this->userId = $errors;
            } else {
                $this->error =  $errors->get_error_message();
            }
        }

        if ($this->error) {
            Dbm::setErrorMsg($this->error);
            return false;
        } else {
            return $this->userId;
        }
    }

    public function forgetPasswordSubmit()
    {
        $email = sanitize_text_field($_POST['user_email']);
        $email = addslashes_gpc($email);
        if (!isset($email) || empty($email)) {
            $this->error = __('Empty E-Mail', 'dboard');
        } elseif (!is_email($email)) {
            $this->error = __('Invalid E-mail', 'dboard');
        } elseif (!email_exists($email)) {
            $this->error = __('E-mail Not Exist', 'dboard');
        } else {
            $user = get_user_by( 'email', $email );
            $user_id = $user->id;
            $password = wp_generate_password();
            wp_set_password( $password, $user_id );

            $to = $email;
            $siteName = get_bloginfo('name');
            $headers[] = 'From: '.$siteName.' <no@reply.com>';
            $subject = __('Reset Password E-Mail');
            $message = __('Your new password is:').$password;
            $sent = wp_mail( $to, $subject, $message, $headers );

            if ($sent) {
                $this->error = false;
                Dbm::setSuccessMsg(__('New Password has been mail you successfully.', 'dboard'));
            } else {
                echo $this->error = __('Unable to send mail. Your new password is:').$password;
            }
        }
        if ($this->error) {
            Dbm::setErrorMsg($this->error);
            return false;
        } else {
            return true;
        }
    }
}

?>