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
        $post = new Post();
        $posts = $post->all();
        
        // Méthode pour afficher la page d'accueil du blog
        $stmt = $this->db->getPDO()->query('SELECT * FROM lt_blog_article ORDER BY creationDate_Art DESC');
        $posts = $stmt ->fetchAll();

        return $this->view ('blog.index', compact('posts'));

    }

    public function show(int $id)
    {
        $stmt = $this->db->getPDO()->prepare('SELECT * FROM lt_blog_article WHERE idArticle = ?');
        $stmt->execute([$id]);
        $post = $stmt->fetch();

        // Affichage de la vue de la page détaillée de l'article
        return $this->view ('blog.show', compact ('post'));
    }
}