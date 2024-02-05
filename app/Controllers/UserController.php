<?php   

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {

        $this->isAdmin();

        $users = (new User($this->getDB()))->getUserWithNullRole();

        $adminUsers = (new User($this->getDB()))->getUserWithAdminRole();

            
        return $this->view('admin.user.index', compact('users', 'adminUsers'));


    }
    public function login ()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $user = (new User($this->getDB()))->getByNickname($_POST['nickname']);

        if(password_verify($_POST['password'], $user->password)){
            
            $_SESSION['auth'] = (int)$user->userRole;
            //EN TEST LIGNE
            $_SESSION['user_id'] = $user->idUser;

                return header('Location: /ProjetsOC/LS_Blog/?success=true');
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

    public function delete(int $id)
    {
        $this->isAdmin();

        $user = new User($this->getDB());
        $result = $user->deleteUser($id);

        if ($result) {
            return header('Location: /ProjetsOC/LS_Blog/admin/users');
        }
    }

    public function changeStatus(int $id)
    {
        $this->isAdmin();

        $user = new User($this->getDB());
        $result = $user->changeUserStatus($id);

        if ($result) {
            return header('Location: /ProjetsOC/LS_Blog/admin/users');
        }
    }
}