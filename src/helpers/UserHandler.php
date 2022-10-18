<?php 
namespace src\helpers;

use \src\models\Admin;
use \core\Database;


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
        $pdo = Database::getInstance();
        $sql = $pdo->prepare("SELECT * FROM `admin` WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        $user = $sql->fetchAll(\PDO::FETCH_ASSOC);

        if($user) {
            if(password_verify($password, $user[0]['password'])) {
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

        $pdo = Database::getInstance();
        $sql = $pdo->prepare("INSERT INTO `admin` (`name`, `email`, `password`, `token`) VALUES (:name, :email, :password, :token)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $hash);
        $sql->bindValue(':token', $token);
        $sql->execute();
        return $token;
    }

    public function emailExists($email) {
        $pdo = Database::getInstance();
        $sql = $pdo->prepare("SELECT * FROM `admin` WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        $admin = $sql->fetchAll(\PDO::FETCH_ASSOC);

        return $admin ? true : false;
    }
}