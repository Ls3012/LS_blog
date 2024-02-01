<?php   

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function login ()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $user = (new User($this->getDB()))->getByNickname($_POST['nickname']);

        if(password_verify($_POST['password'], $user->password)){
            
            $_SESSION['auth'] = (int)$user->userRole;
            return header('Location: /ProjetsOC/LS_Blog/admin/posts?success=true');

        }else {
            return header('Location: /ProjetsOC/LS_Blog/login');
        }
    }

    public function logout ()
    {
        session_destroy();

        return header('Location: /ProjetsOC/LS_Blog/');
    }
}