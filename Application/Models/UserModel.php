<?php

namespace Application\Models;

use Core\Database;
use Core\Mailer;
use Core\Model;
use PDO;

class UserModel extends Model
{
    private $database;

    public function __construct()
    {
        parent::__construct();
        $this->database = new Database();
    }

    public function signup($login, $email, $password)
    {
        if (!empty($login) && !empty($email) && !empty($password)) {
            $validationEmail = $this->dataConnect->prepare('SELECT COUNT(*)FROM users WHERE email=:email');
            $validationEmail->bindParam(":email", $email);
            $validationEmail->execute();
            $validationLogin = $this->dataConnect->prepare('SELECT COUNT(*)FROM users WHERE login =:login');
            $validationLogin->bindParam(":login", $login);
            $validationLogin->execute();
            if ($validationEmail->fetchColumn() == '0') {
                if ($validationLogin->fetchColumn() == '0') {
                    $hash = md5($login);
                    $insertRegistrationData = $this->dataConnect->prepare('INSERT INTO users(login, email, password, hash) VALUES (:login, :email, :password, :hash)');
                    $insertRegistrationData->bindParam(":email", $email);
                    $insertRegistrationData->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));
                    $insertRegistrationData->bindParam(':login', $login);
                    $insertRegistrationData->bindParam(':hash', $hash);
                    $insertRegistrationData->execute();
                    echo 'Поздравляю с успешной регистрацией';

                    return $this->sendSecurityCode($email, $login, $hash);
                } else {
                    return 'Пользователь с таким логином уже существует.';
                }
            } else {
                return 'Пользователь с такой почтой уже существует.';
            }
        } else {
            return 'Все поля должны быть заполнены';
        }
    }


    public function login($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            $existenceUser = $this->dataConnect->prepare('SELECT COUNT(*) FROM users WHERE email=:email');
            $existenceUser->bindParam(":email", $email);
            $existenceUser->execute();
            if ($existenceUser->fetchColumn() != 0) {
                $userInfo = $this->dataConnect->prepare('SELECT * FROM `users` WHERE email=:email');
                $userInfo->bindParam(":email", $email);
                $userInfo->execute();
                $userInfo = $userInfo->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $userInfo['password'])) {
                    $_SESSION['user'] = ['id' => $userInfo['id'], 'admin' => $userInfo['admin'], 'active' => $userInfo['active']];
                    if ($userInfo['admin'] == 1) {
                        return 'Добро пожаловать';
                    } else {
                        return "/posts/user/{$_SESSION['user']['id']}";
                    }
                } else {
                    return 'Вы ввели не правильный пароль';
                }
            } else {
                return 'Такого пользователя нет';
            }
        } else {
            return 'Заполните все поля чтобы зайти';
        }
    }

    public function activation($hash)
    {
        $this->database->query("SELECT * FROM `users` WHERE `hash` = :hash");
        $this->database->bind(':hash', $hash);
        $info = $this->database->singleSet();
        if ($info) {
            $this->database->query('UPDATE `users` SET `active`= 1 WHERE id = :id');
            $this->database->bind(':id', $info['id']);
            $this->database->execute();
            return $this->database->error();
        }

    }

    public function sendSecurityCode($user_email, $name, $hash)
    {
        $mailer = new Mailer();
        $hash = 'blog.com:8080/user/accountActivation/' . $hash;
        $send = $mailer->sendSecurityCodeEmail($user_email, $name, $hash);
    }

    /*
     * In post model
     */
    public function getAllUserPost()
    {
        $this->database->query('SELECT u.login, a.title, a.text, a.date_create FROM users u JOIN articles a ON u.id = a.user_id');

        return $this->database->resultSet();
    }
//

}