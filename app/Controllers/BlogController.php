<?php

namespace App\Controllers;

use Database\dbConnection;

class BlogController extends Controller{

    public function index()
    {
        return $this->view ('blog.index');

    }

    public function show(int $id)
    {
        $db = new dbConnection('lt_blog_php','localhost','root','root');
        $req = $db->getPDO()->query('SELECT * FROM lt_blog_article');
        $posts = $req->fetchAll();
        var_dump($posts);

        return $this->view ('blog.show', compact ('id'));
    }
}