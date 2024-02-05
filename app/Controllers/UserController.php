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
            
            $_SESSION['auth'] = (int)$user->idUser;
            //EN TEST LIGNE
            $_SESSION['user_id'] = $user->idUser;

            if ($user->userRole !== null) {
                // Utilisateur admin
                return header('Location: /ProjetsOC/LS_Blog/admin/posts?success=true');
            } else {
                // Utilisateur non admin
                return header('Location: /ProjetsOC/LS_Blog/?success=true');
            }

        }else {
            return header('Location: /ProjetsOC/LS_Blog/login');
        }
    }


    //EN TEST 
    public function registerForm()
    {
        return $this->view('auth.register');
    }

    public function registerPost()
    {
        $userData = [
            'nickname' => $_POST['nickname'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
        ];

        $userModel = new User($this->getDB());
        $userModel->create($userData);

        // Redirigez l'utilisateur vers la page de connexion après l'inscription
        return header('Location: /ProjetsOC/LS_Blog/login?success=true');
    }


    public function logout ()
    {
        session_destroy();

        return header('Location: /ProjetsOC/LS_Blog/');
    }
}