<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\Comment;

// Import de la classe Controller
class BlogController extends Controller{

    public function homepage()
    {
        return $this->view('blog.homepage');
    }
    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->all();

        return $this->view ('blog.index', compact('posts'));

    }

    public function show(int $id)
    {
        $post = new Post($this->getDB());
        $commentModel = new Comment($this->getDB());

        $post = $post->findById($id);
        $comments = $commentModel->getCommentsByPostId($id);

        // Affichage de la vue de la page détaillée de l'article
        return $this->view ('blog.show', compact ('post', 'comments'));
    }


    // EN TEST 


    public function addComment(int $post_id)
    {

        if (isset($_SESSION['auth']) && ($_SESSION['auth'] === 0 || $_SESSION['auth'] === 1))
        {
            $commentModel = new Comment($this->getDB());
            $userId = $this->getUserIdFromSession();
            $content = $_POST['comment'];
            $currentDate = date('Y-m-d H:i:s');

            $result = $commentModel->addComment($post_id, $userId, $content, $currentDate);

            // Redirige vers la page de l'article après l'ajout du commentaire
            if ($result) {
                return header("Location: /ProjetsOC/LS_Blog/posts/{$post_id}");
            }
        }

        // Redirige vers la page de l'article si la session n'est pas ouverte
        return header("Location: /ProjetsOC/LS_Blog/posts/{$post_id}");
    }


    protected function getUserIdFromSession() 
    {
        // Vérifiez si l'utilisateur est connecté
        if (isset($_SESSION['auth']) && ($_SESSION['auth'] === 0 || $_SESSION['auth'] === 1)) {
            // Récupérez l'ID de l'utilisateur connecté
            return $_SESSION['user_id'];
        }

        // Retournez une valeur par défaut ou lancez une exception selon vos besoins
        return null;
    }
}