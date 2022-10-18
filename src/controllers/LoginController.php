<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHandler;
use \src\Config;

class LoginController extends Controller {
   
    public function login() {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }


        $this->render('login', [
            'flash' => $flash
        ]);
    }

    public function loginAction() {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password) {
            $token = UserHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = "Email e/ou senha incorretos";
                $this->redirect('/login');
            }
        }
    }

    public function signup() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signup', [
            'flash' => $flash
        ]);
    }

    public function signupAction() {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $admPassword = filter_input(INPUT_POST, 'admPassword');

        if($name && $email && $password && $admPassword) {
            if($admPassword !== Config::ADMIN_PASSWORD){
                $_SESSION['flash'] = "Senha de adiministrado incorreta";
                $this->redirect('/signup');
            }

            if(UserHandler::emailExists($email) === false) {
                $token = UserHandler::addAdmin($name, $email, $password);
                $_SESSION['token'] = $token;
                $this->redirect('/');

            } else {
                $_SESSION['flash'] = "Email já cadastrado!";
                $this->redirect('/signup');
            }
            
        } else {
            $this->redirect('/signup');
        }

    }

}