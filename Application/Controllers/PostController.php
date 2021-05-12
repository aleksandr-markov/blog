<?php


namespace Application\Controllers;


use Application\Models\PostModel;
use Core\Controller;
use Core\FileRequest;

class PostController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new PostModel();
    }

    public function index()
    {
        $this->view->generate('mainView.php', 'templateView.php', $this->model->index(),
            $this->model->getAllCategory());
    }

    public function store()
    {
        var_dump($_POST);
        var_dump($_FILES);

//        var_dump($file);
//        die();
        $category = isset($_POST['category']) ? $_POST['category'] : null;
        $title = $_POST['title'];
        $text = $_POST['text'];

        $this->model->store($title, $text, $_SESSION['user']['id'], $category);
    }

    public function create()
    {
//        var_dump($_POST);
//        $data = ['count' => $this->model->countUserPosts($_SESSION['user']['id']), 'category' => $this->model->getPostByUserId($_SESSION['user']['id'])];
        $this->view->generate("create-view.php", 'templateView.php', $this->model->getAllCategory());
    }

    public function posts(int $id)
    {
        $data = [
            'post' => $this->model->getPostById($id),
            'isLiked' => $this->model->isUserLiked($id, $_SESSION['user']['id']),
            'getLikes' => $this->model->getLikes($id)
        ];
        $this->view->generate('article-view.php', 'templateView.php', $data,
            $this->model->getCategoryPostById($id));
    }

    public function edit(int $id)
    {
        $this->view->generate('edit-view.php', 'templateView.php', $this->model->getPostById($id));
    }


    public function update(int $id)
    {
        $this->model->update($_POST['title'], $_POST['text'], $id);
        header("Location: /posts/$id/show");
    }


    public function delete(int $id)
    {
        $this->model->delete($id);
        header("Location: /");
    }


    public function addComment()
    {
//        var_dump($_POST);
        echo($this->model->addComment($_SESSION['user']['id'], $_POST['articleId'], trim($_POST['comment_content']),
            isset($_POST['parentId']) ? $_POST['parentId'] : 0));
    }


    public function userPosts(int $id)
    {
        $this->view->generate('user-article-view.php', 'templateView.php', $this->model->getPostByUserId($id));
    }

    public function fetchComments(int $id)
    {
        echo $this->model->commentView($this->model->getPostComment($id));
    }

    public function getPostByCategory(int $id)
    {
        $this->view->generate('category-view.php', 'templateView.php', $this->model->getPostByCategory($id));
    }

    public function like()
    {
        switch ($_POST['action']) {
            case('like'):
                return $this->model->like($_SESSION['user']['id'], $_POST['postId']);
//                break;
            case ('unlike'):
                return $this->model->unlike($_SESSION['user']['id'], $_POST['postId']);
//                break;
            default:
                break;
        }
    }

}
