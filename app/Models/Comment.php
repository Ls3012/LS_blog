<?php

namespace App\Models;

use PDO;
use DateTime;

class Comment extends Model
{

    protected $table = 'lt_blog_comment';


    public function getComment()
    {
        return $this->query("SELECT c.*, u.nickname, a.title FROM {$this->table} c JOIN lt_blog_user u ON c.idUser = u.idUser JOIN lt_blog_article a ON c.idArticle = a.idArticle AND c.comState IS NULL ORDER BY c.creationDate_Com DESC");
    }

    public function getCommentsByPostId(int $post_id)
    {
        return $this->query("SELECT c.*, u.nickname FROM {$this->table} c JOIN lt_blog_user u ON c.idUser = u.idUser WHERE c.idArticle = ? AND c.comState IS NOT NULL ORDER BY c.creationDate_Com DESC", [$post_id]);
        //$stmt = $this->db->getPDO()->prepare("SELECT c.*, u.nickname FROM {$this->table} c JOIN lt_blog_user u ON c.idUser = u.idUser WHERE c.idArticle = ? ORDER BY c.creationDate_Com DESC");
        //$stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        //$stmt->execute([$post_id]);
        //return $stmt ->fetchAll();
    }


    public function getCreatedAtCom(): string
    {
        return (new DateTime($this->creationDate_com))->format('d/m/Y à H:i');
    }

// EN TEST
    public function addComment(int $post_id, ?int $user_id, string $content, string $creation_date)
    {
        $data = [
            'idArticle' => $post_id,
            'idUser' => $user_id,
            'content_Com' => $content,
            'creationDate_com' => $creation_date
        ];

        return $this->create($data);
    }

    public function deleteCom(int $idComment): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE idComment = ?", [$idComment]);
    }

    public function approveCom(int $idComment): bool
    {
        return $this->query("UPDATE {$this->table} SET comState = ? WHERE idComment = ?", [1, $idComment]);
    }
}