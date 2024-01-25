<?php

namespace Router;

class Router {

    public $url; 
    public $routes = [];

    public function __construct($url) 
    {
        // Nettoie l'URL en retirant les barres obliques inutiles
        $this->url = trim($url, '/');
    }


    // Méthode pour définir une route HTTP GET
    public function get(string $path, string $action)
    {
        // Ajoute une nouvelle route GET au tableau des routes
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function run()
    {
        // Parcourt les routes correspondant à la méthode HTTP actuelle
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            // Vérifie si la route correspond à l'URL et execute la route et renvoie le resultat
            if ($route->matches($this->url))
            {
                return $route->execute();
            }

        }

        return header('HTTP/1.0 404 Not Found');
    }
}