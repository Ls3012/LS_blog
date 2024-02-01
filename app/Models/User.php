<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'lt_blog_user';

    public function getByNickname(string $nickname): ?User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE nickname = ?", [$nickname], true);

        if ($result) {
            return $result;
        } else {
            return null; // Aucun utilisateur trouvé avec le surnom donné
        }
    }
}