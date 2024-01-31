<?php

namespace App\Models;

use Database\dbConnection;

abstract class Model{

    protected $bd;

    public function __construct(dbConnection $bd)
    {
        $this->bd = $bd;
    }
}