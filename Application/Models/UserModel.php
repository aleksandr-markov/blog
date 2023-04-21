<?php

namespace Application\Models;

use Core\FileRequest;
use Core\Mailer;
use Core\Model;

class UserModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function signup($login, $email, $password)
    {
        if (!empty($login) && !empty($email) && !empty($password)) {
            if ($this->isNotBusy($email) && $this->isNotBusy($login)) {
                $hash = md5($login);
                $this->addUser($email, $login, $password, $hash);
                echo 'Welcome:)';

                return $this->sendSecurityCode($email, $login, $hash);
            } else {
                return 'User with this login/email already exists';
            }
        } else {
            return 'All fields must be filled';
        }
    }

    private function isNotBusy($parameter)
    {
        $this->database->executeQuery('SELECT COUNT(*)FROM users WHERE login =:parameter',
            [':parameter' => $parameter]);
        $countRecords = $this->database->fetchColumn();

        return $countRecords == 0;
    }

    private function addUser($email, $login, $password, $hash)
    {
        $params = [
            ':login' => $login,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            'hash' => $hash
        ];
        $this->database->executeQuery('INSERT INTO users(login, email, password, hash) VALUES (:login, :email, :password, :hash)',
            $params);
    }

    public function sendSecurityCode($user_email, $name, $hash)
    {
        $mailer = new Mailer();
        $hash = 'blog.com:8080/user/accountActivation/' . $hash;
        return $mailer->sendSecurityCodeEmail($user_email, $name, $hash);
    }

    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            return 'All fields must be filled';
        }
        
        if (!$this->isNotBusy($email)) {
            return 'There is no such user';
        }
        
        $this->database->executeQuery('SELECT * FROM `users` WHERE email=:email', [':email' => $email]);
        $userData = $this->database->singleSet();
        
        if (!password_verify($password, $userData['password'])) {
            return 'You entered an incorrect password';
        }
        
        $_SESSION['user'] = [
            'id'     => $userData['id'],
            'admin'  => $userData['admin'],
            'active' => $userData['active'],
            'avatar' => $userData['avatar']
        ];
        if ($userData['admin'] == 1) {
            return 'Welcome';
        }
        
        return "/posts/user/{$_SESSION['user']['id']}";   
    }

    public function activation($hash)
    {
        $this->database->executeQuery("SELECT * FROM `users` WHERE `hash` = :hash", [':hash' => $hash]);
        $info = $this->database->singleSet();
        if ($info) {
            $this->database->executeQuery('UPDATE `users` SET `active`= 1 WHERE id = :id', [':id' => $info['id']]);
            $this->database->execute();
        }

    }

    public function getAllUserPost()
    {
        $this->database->executeQuery('SELECT u.login, a.title, a.text, a.date_create FROM users u JOIN articles a ON u.id = a.user_id');

        return $this->database->resultSet();
    }

    public function getUser(int $userId)
    {
        $this->database->executeQuery('select * from users where id = :user_id', [':user_id' => $userId]);
       
        return $this->database->singleSet();
    }

    public function getUserLastCommentActivity(int $userId)
    {
        $sql = "SELECT a.id, a.title, c.comment_text \n"
            . "FROM `comments` c \n"
            . "JOIN users u ON u.id = c.user_id \n"
            . "JOIN articles a ON a.id = c.article_id\n"
            . "WHERE u.id = :userId";
        $this->database->executeQuery($sql, [':userId' => $userId]);
        
        return $this->database->resultSet();
    }

    public function getUserLastLikeActivity(int $userId)
    {
        $sql = "SELECT a.title FROM `likes` l \n"
            . "JOIN users u ON u.id = l.user_id\n"
            . "JOIN articles a ON a.id = l.post_id\n"
            . "WHERE l.user_id = :userId";
        $this->database->executeQuery($sql, [':userId' => $userId]);
        
        return $this->database->resultSet();
    }

    public function changeUserPhoto(int $id)
    {
        $request = new FileRequest();
        $file = $request->get('userFile')->upload();

        $params = [
            ':id'   => $id,
            ':path' => '/storage/' . $request->get('userFile')->getName()
        ];
        $this->database->executeQuery('UPDATE `users` SET `avatar`= :path WHERE id = :id', $params);
    }
}
