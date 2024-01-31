<?php

namespace App\Controllers;

use App\Models\Post;

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
        $post = $post->findById($id);

        // Affichage de la vue de la page détaillée de l'article
        return $this->view ('blog.show', compact ('post'));
    }
}