<?php

namespace App\Controllers;

use Database\dbConnection;

abstract class Controller
{

    // Instance de la connexion à la base de données
    protected $db;

    // Constructeur qui prend une instance de dbConnection en paramètre
    public function __construct(dbConnection $db)
    {
        if(session_status() == PHP_SESSION_NONE) 
        {
        session_start();
        }
        $this->db = $db;

    }

    // Méthode pour afficher une vue
    protected function view(string $path, array $params = null)
    {
        ob_start();
        // Remplace les points dans le chemin par le séparateur de répertoire
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        // Récupère le contenu de la temporisation, puis l'efface
        $content = ob_get_clean();

        // Require du layout pour afficher la vue
        require VIEWS . 'layout.php';
    }

    protected function getDB()
    {
        return $this->db;
    }

    protected function isAdmin()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1)
        {
            return true;
        }else{
            return header ('Location : /ProjetsOC/LS_Blog/login');
        }
    }

}