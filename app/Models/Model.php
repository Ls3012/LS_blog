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
        return $this->query("SELECT * FROM {$this->table} ORDER BY creationDate_Art DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE idArticle = ?", [$id], true);
    }

    public function create(array $data, ?array $relations = null)
    {

        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;

        foreach ($data as $key => $value) 
        {
            $comma = $i === count($data) ? "" : ", ";
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES($secondParenthesis)", $data);

    }




    public function update(int $id, array $data)
    {
        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $value) 
        {
            $comma = $i === count($data) ? "" : ', ';
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }


        $data['idArticle'] = $id;

        // Modification ici : convertir les paramètres en tableau associatif
        $params = array_map(function ($key) use ($data) {
            return ":{$key} = {$data[$key]}";
        }, array_keys($data));
    
        $params['idArticle'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE idArticle = :idArticle", $data);
    }

    public function destroy(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE idArticle = ?", [$id]);

    }

    public function query(string $sql, array $param = null, bool $single = null)
    {

        $method = is_null($param) ? 'query' : 'prepare';

        if (strpos($sql, 'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'CREATE') === 0) 
        {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else 
        {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }

    
}