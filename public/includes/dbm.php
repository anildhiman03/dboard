<?php

class Dbm
{

    private function sessionStart()
    {

        /*if (session_status() == PHP_SESSION_NONE) {
            ob_start();
            session_start();
        }*/
    }

    public static function getUrl($action = null)
    {
        global $post;
        return add_query_arg( array('action' => $action), get_permalink($post->ID));
    }

    public function render($file, $variables = array()) {
        extract($variables);
        $filePath = plugin_dir_path( dirname( __FILE__ ) )."views/".$file.".php";
        if (!file_exists($filePath)) {
            die( __("view not exist"));
        }

        ob_start();
        include $filePath;
        $renderedView = ob_get_clean();
        return $renderedView;
    }

    public static function setMsg($key = null, $message = null)
    {
        if ($key == null || $message == null) {
            return false;
        }

        self::sessionStart();

        $_SESSION[$key] = $message;
        if (self::getMsg($key)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getMsg($key = null)
    {
        if ($key == null) {
            return false;
        }

        self::sessionStart();

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function setSuccessMsg($message = null)
    {
        if ($message == null) {
            return false;
        }
        $key = 'dbSuccess';
        $successMessage = "<div class='db-success-msg' id='db-success'><label>$message</label></div>";
        return self::setMsg($key, $successMessage);
    }

    public static function setErrorMsg($message = null)
    {
        if ($message == null) {
            return false;
        }
        $key = 'dbError';
        $errorMessage = "<div class='db-error-msg' id='db-error'><label>$message</label></div>";
        return self::setMsg($key, $errorMessage);
    }

    public static function getValue($key = null)
    {
        if ($key == null) {
            return false;
        }
        return (isset($_POST[$key]) && !empty($_POST[$key])) ? $_POST[$key] : '';
    }
}
?>