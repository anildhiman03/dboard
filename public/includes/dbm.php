<?php

class Dbm {

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
}
