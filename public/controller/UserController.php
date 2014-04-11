<?php

class UserController extends Dbm
{
    use UserHelper; # user for the purpose of multiple inheritance;
    public function action()
    {
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
        switch($action)
        {
            case 'login':
                echo $this->login();
                break;
            case 'registration':
                echo $this->registration();
                break;
            case 'forget_password':
                echo $this->forgetPassword();
                break;
            case 'reset_password':
                echo $this->resetPassword();
                break;
            case 'error':
                echo $this->error();
                break;
            default:
                echo $this->welcome();
                break;
        }
    }

    public function welcome()
    {
        $menu = $this->UserMenu();
        return $this->render(
            'welcome',
            array(
                'menu' => $menu
            )
        );
    }

    public function login()
    {
        if (isset($_POST['wp-submit'])) {
            $this->loginSubmit();
        }

        $url = $this->getUrl('login');
        $menu = $this->UserMenu();
        return $this->render(
            'login',
            array(
                'menu' => $menu,
                'actionUrl' => $url
            )
        );
    }

    public function registration()
    {
        $menu = $this->UserMenu();
        return $this->render(
            'registration',
            array(
                'menu' => $menu
            )
        );
    }

    public function UserMenu()
    {
        if ( ! is_user_logged_in() ) {
            return $this->render('login-user-menu');
        } else {
            return $this->render('logged-user-menu');
        }
    }
}
