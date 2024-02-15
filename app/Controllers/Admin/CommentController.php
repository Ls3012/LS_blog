<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller{

    public function index(){

        $this->isAdmin();

        $invalidComments = (new Comment($this->getDB()))->getComment();
        
        return $this->view('admin.comment.index', compact('invalidComments'));
    }

    // Dans le contrôleur CommentController (CommentController.php)
public function deleteComment(int $commentId)
{
    $this->isAdmin();

    $commentModel = new Comment($this->getDB());

    // Appeler la méthode deleteCom pour supprimer le commentaire
    $result = $commentModel->deleteCom($commentId);

    if ($result) {
        return header('Location: /ProjetsOC/LS_Blog/admin/comments');
    }  
}

public function approveComment(int $commentId)
{
    $this->isAdmin();
    
    $commentModel = new Comment($this->getDB());

    // Appeler la méthode deleteCom pour supprimer le commentaire
    $result = $commentModel->approveCom($commentId);

    if ($result) {
        return header('Location: /ProjetsOC/LS_Blog/admin/comments');
    } 


}

}