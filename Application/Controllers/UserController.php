<?php


namespace Application\Controllers;

use Application\Models\UserModel;
use Core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function admin()
    {
        $this->view->generate('admin-view.php', 'templateView.php', $this->model->getAllUserPost());
    }

    public function profile()
    {
        $userId = $_SESSION['user']['id'];
        $data = [
            'user' => $this->model->getUser($userId),
            'commentActivity' => $this->model->getUserLastCommentActivity($userId),
            'likeActivity' => $this->model->getUserLastLikeActivity($userId)
        ];
        $this->view->generate('userPage-view.php', 'templateView.php', $data);
    }

    public function join()
    {
        $this->view->generate('sign-view.php');
    }

    public function login()
    {
        $this->view->generate('login-view.php');
    }

    public function signup()
    {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo($this->model->signup($login, $email, $password));
    }


    public function authorize()
    {
        echo $this->model->login($_POST['email'], $_POST['password']);

    }

    public function logout()
    {
        unset($_SESSION['session_username']);
        session_destroy();
        header("location: /");
    }

    public function userActivation(string $hash)
    {
        var_dump($hash);
        var_dump($this->model->activation($hash));
//        header();
    }

    public function settings()
    {
        $this->view->generate('settings-view.php', 'templateView.php');
    }

    public function changeUserPhoto()
    {
//        var_dump($_REQUEST);
        $this->model->changeUserPhoto($_SESSION['user']['id']);
        header('Location: /user/profile');
    }


}