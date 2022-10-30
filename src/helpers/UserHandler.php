<?php 
namespace src\helpers;

use \src\models\Admin;


class UserHandler {
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = Admin::select()->where('token', $token)->one();
            if($data !== '' || null) {
                $loggedUser = new Admin();
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->email = $data['email'];

                return $loggedUser;
            }
        }

        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = Admin::select()->where('email', $email)->one();
        
        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0, 9999).time());
                Admin::update()->set('token', $token)->where('email', $email)->execute();
                return $token;
            }
        }
        return false;
    }

    public function addAdmin($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token =  md5(time().rand(0,9999).time());

        Admin::insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'token' => $token
        ])->execute();
        
        return $token;
    }

    public function emailExists($email) {
        $admin = Admin::select()->where('email', $email)->one();

        return $admin ? true : false;
    }
}