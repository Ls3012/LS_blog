<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller{
    public function index(){

        $this->isAdmin();

        $posts = (new Post($this->getDB()))->all();
        
        return $this->view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $this->isAdmin();

        return $this ->view('admin.post.form');
    }

    public function createPost()
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $result = $post->create($_POST);

        //if ($result) {
            return header('Location: /ProjetsOC/LS_Blog/admin/posts');
        //}
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $post = (new Post($this->getDB()))->findById($id);

        return $this->view('admin.post.form', compact('post'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $result = $post->update($id, $_POST);

        if ($result) {
            return header('Location: /ProjetsOC/LS_Blog/admin/posts');
        }

    } 

    public function destroy(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if ($result) {
            return header('Location: /ProjetsOC/LS_Blog/admin/posts');
        }
    }

}