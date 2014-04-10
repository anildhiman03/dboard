<?php

class UserController extends Dbm{

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
        $menu = $this->UserMenu();
        return $this->render(
            'login',
            array(
                'menu' => $menu
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
        return $this->render('logged-user-menu');
        return $this->render('login-user-menu');
    }
} 