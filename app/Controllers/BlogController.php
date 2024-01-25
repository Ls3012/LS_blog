<?php

namespace App\Controllers;

// Import de la classe Controller
class BlogController extends Controller{

    public function index()
    {
        // Méthode pour afficher la page d'accueil du blog
        return $this->view ('blog.index');

    }

    public function show(int $id)
    {
        // Récupération de tous les articles depuis la base de données
        $req = $this->db->getPDO()->query('SELECT * FROM lt_blog_article');
        $posts = $req->fetchAll();
        // Affichage du titre de chaque article
        foreach ($posts as $post) {
            echo $post->title;
        }
        // Affichage de la vue de la page détaillée de l'article
        return $this->view ('blog.show', compact ('id'));
    }
}