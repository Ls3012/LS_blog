<?php

namespace Router;

use Database\dbConnection;


class Route
{
    public $path;
    public $action;
    public $matches;

    public function __construct($path,$action)
    {
        // Nettoie le chemin en retirant les barres obliques inutiles
        $this->path = trim($path, '/');
        $this->action = $action;

    }

    // Vérifie si la route correspond à l'URL fournie
    public function matches(string $url)
    {
        // Convertit le chemin en une expression régulière
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMutch = "#^$path$#";

        // Vérifie si l'URL correspond à la route
        if (preg_match($pathToMutch, $url, $matches)) 
        {
            // Stocke les correspondances
            $this->matches = $matches;
            return true;
        } else
        {
            return false;
        }
    }

    // Exécute la route, instancie le contrôleur et appelle la méthode associée
    public function execute()
    {
        // Sépare le nom du contrôleur et le nom de la méthode à partir de l'action
        $params = explode('@', $this->action);
        // Instancie le contrôleur avec une nouvelle connexion à la base de données
        $controller = new $params[0](new dbConnection(DB_NAME,DB_HOST,DB_USER,DB_PSW));
        $method = $params[1];
        // Appelle la méthode du contrôleur avec ou sans paramètre
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }

}