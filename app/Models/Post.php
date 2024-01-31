<?php

namespace App\Models;

use DateTime;

class Post extends Model{
    
    protected $table = 'lt_blog_article';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->creationDate_Art))->format('d/m/Y à H:i');
    }

    public function getExcerpt(): string
    {
        return substr($this->content_Art, 0, 200) . '...';

    }

    public function getButton(): string
    {
        return <<<HTML
        <a href="/ProjetsOC/LS_Blog/posts/$this->idArticle" class="btn btn-primary">Lire l'article</a>
HTML;
    }

}