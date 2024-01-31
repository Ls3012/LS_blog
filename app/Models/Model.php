<?php

namespace App\Models;

use Database\dbConnection;
use PDO;

abstract class Model{

    protected $db;
    protected $table;

    public function __construct(dbConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY creationDate_Art DESC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $stmt ->fetchAll();
    }

    public function findById(int $id): Model
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE idArticle = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);  
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}