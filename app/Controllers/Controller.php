<?php

namespace App\Controllers;

use Database\dbConnection;

class Controller
{

    // Instance de la connexion à la base de données
    protected $db;

    // Constructeur qui prend une instance de dbConnection en paramètre
    public function __construct(dbConnection $db)
    {
        $this->db = $db;

    }

    // Méthode pour afficher une vue
    public function view(string $path, array $params = null)
    {
        ob_start();
        // Remplace les points dans le chemin par le séparateur de répertoire
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        if ($params)
        {
            $params = extract($params);
        }
        // Récupère le contenu de la temporisation, puis l'efface
        $content = ob_get_clean();
        
        // Require du layout pour afficher la vue
        require VIEWS . 'layout.php';
    }

}