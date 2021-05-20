<?php


namespace Application\Models;


use Core\FileRequest;
use Core\Model;


class PostModel extends Model
{

    /**
     * ArticleModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->database->executeQuery('SELECT * FROM articles ORDER BY id DESC');

        return $this->database->resultSet();
    }

    public function store($title, $text, $id, $category = null)
    {
        var_dump($_POST);
        $request = new FileRequest();
        $file = $request->get('userFile')->upload();
//        $this->database->executeQuery()
        var_dump($request->get('userFile')->getName());
//        die();
        if (!empty($title) and !empty($text)) {
            $params = [
                ':user_id' => $id,
                ':title' => $title,
                ':article' => $text,
                ':path' => '/storage/' . $request->get('userFile')->getName()
            ];
            $this->database->executeQuery('INSERT INTO articles (`user_id`, `title`, `text`, `date_create`, `path`) VALUES (:user_id, :title, :article, now(), :path)',
                $params);
            var_dump($this->database->dumpErrorInfo());

            $article_id = $this->database->lastInsertId();
        }

        if (!empty($category)) {
            $this->database->query('INSERT INTO article_category VALUES (:article_id, :category_id)');
            $this->database->bind(':article_id', $article_id);
            foreach ($category as $item) {
                $this->database->bind(':category_id', $item);
                $this->database->execute();
            }
        }

    }


    public function getPostById(int $id)
    {
        $this->database->executeQuery('SELECT * FROM articles WHERE id = :id', [':id' => $id]);

        return $this->database->singleSet();
    }

    public function getPostByUserId(int $id)
    {
        $this->database->executeQuery('SELECT * FROM articles WHERE user_id = :id', [':id' => $id]);

        return $this->database->resultSet();
    }

    public function update($title, $text, $id)
    {
        $params = [':title' => $title, ':text' => $text, ':id' => $id];
        $this->database->executeQuery('UPDATE articles SET title = :title, text = :text WHERE id = :id', $params);
    }


    public function delete(int $id)
    {
        $this->database->executeQuery('DELETE FROM articles WHERE id = :id', [':id' => $id]);
    }


    public function addComment($userId, $articleId, $text, $parentId = null)
    {
        $params = [
            ':user_id' => $userId,
            ':article_id' => $articleId,
            ':text' => $text,
            ':parent_id' => $parentId
        ];
        $this->database->executeQuery('INSERT INTO comments(`user_id`, `article_id`, `comment_text`, `parent_id`, `time`) VALUES (:user_id, :article_id, :text, :parent_id, NOW())',
            $params);

        $id = ['id' => $articleId];
        $data = $this->getPostComment($articleId);

        return json_encode($data);
    }


    public function getPostComment(int $id)
    {        #echo '<pre>';
        $this->database->executeQuery('SELECT u.login, comment_text, article_id, time, parent_id, c.id FROM comments c join users u on u.id = c.user_id where article_id = :id ORDER BY time DESC',
            [':id' => $id]);
//        $this->database->query('select * from comments');
//        $this->database->execute();
        $postComment = $this->database->resultSet();

        return $this->buildTree($postComment);
    }

    private function buildTree(&$items, $parentId = null)
    {
        $treeItems = [];
        foreach ($items as $idx => $item) {
            if ((empty($parentId) && empty($item['parent_id'])) || (!empty($item['parent_id']) && !empty($parentId) && $item['parent_id'] == $parentId)) {
                $items[$idx]['children'] = $this->buildTree($items, $items[$idx]['id']);
                $treeItems [] = $items[$idx];
            }
        }

        return $treeItems;
    }

    public function commentView($arr, $level = 0)
    {
        echo '<ul>';
//        echo '<ul>', PHP_EOL;
        foreach ($arr as $comment) {
            echo '<li style="list-style-type: none;"> <span class="user">' . $comment['login'] .
                ' </span><span class="time">' . $comment['time'] . '</span> ' . '<span class="userComment">' .
                htmlentities($comment['comment_text']) . '</span>';
            echo '<div class="reply" id="' . $comment['id'] . '"><button class="btn" onclick="replyComment(' . $comment['id'] . ')">ответить</button></div>';

            if (!empty($comment['children'])) {
                $this->commentView($comment['children'], $level + 1); // recurse into the next level
            }
            echo '</li>';
        }
        echo '</ul>';

//        echo $html;
    }

    public function getCategoryPostById($id)
    {
        $this->database->executeQuery('SELECT c.title, c.id, a.id FROM article_category ac JOIN articles a ON a.id = ac.article_id JOIN category c ON c.id = ac.category_id WHERE a.id = :id',
            [':id' => $id]);

        return $this->database->resultSet();
    }

    public function getAllCategory()
    {
        $this->database->executeQuery('SELECT * FROM category');
        $array = $this->database->resultSet();

        return $this->buildTree($array);
    }

    public function getPostByCategory(int $id)
    {
        $this->database->executeQuery('SELECT * FROM article_category ac JOIN category c on c.id = ac.category_id JOIN articles a ON a.id = ac.article_id WHERE ac.category_id = :id',
            ['id' => $id]);

        return $this->database->resultSet();
    }

    public function like(int $userId, int $postId)
    {
        $params = [':post_id' => $postId, ':user_id' => $userId, ':action' => 'like'];
        $this->database->executeQuery('INSERT INTO likes(post_id, user_id, action) values (:post_id, :user_id, :action)',
            $params);
        echo($this->getLikes($postId));
    }

    public function getLikes(int $postId)
    {
        $this->database->executeQuery('SELECT COUNT(*) FROM likes WHERE post_id = :postId', [':postId' => $postId]);
        return $this->database->fetchColumn();

    }

    public function unlike(int $userId, int $postId)
    {
        $params = [':user_id' => $userId, ':post_id' => $postId,];
        $this->database->executeQuery('DELETE FROM `likes` WHERE `post_id` = :post_id AND `user_id` = :user_id',
            $params);
        echo($this->getLikes($postId));
    }

    public function isUserLiked(int $postId, int $userId): bool
    {
        $this->database->executeQuery('select count(*) from likes where post_id = :post_id and user_id = :user_id',
            [':post_id' => $postId, ':user_id' => $userId]);
        return $this->database->fetchColumn();
    }

    public function getTopPosts()
    {
        $sql = "select COUNT(l.id) AS countLike, a.title, a.id, a.date_create, a.text, a.path from likes l \n"
            . "JOIN articles a ON l.post_id = a.id\n"
            . "GROUP by l.post_id\n"
            . "ORDER BY `countLike` DESC LIMIT 4";

        $this->database->query($sql);
        $this->database->execute();
        return $this->database->resultSet();
    }

    public function getPostByText(string $text)
    {
        $sql = "select title, date_create from articles where text like :text or title like :text";
        $this->database->executeQuery($sql, [':text' => '%' . $text . '%']);

        return ($this->database->resultSet());
    }

}
