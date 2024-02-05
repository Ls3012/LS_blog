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

    //EN TEST 
    public function getUserWithNullRole(): array
    {
        return $this->query("SELECT * FROM {$this->table} WHERE userRole IS NULL");

    }

    public function getUserWithAdminRole(): array
    {
        return $this->query("SELECT * FROM {$this->table} WHERE userRole = 1");

    }

    public function deleteUser(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE idUser = ?", [$id]);
    }

    public function changeUserStatus(int $id): bool
    {
        $user = $this->findUserById($id);

        if ($user) {
            // Vérifiez la valeur actuelle de userRole
            $newUserRole = $user->userRole === null ? 1 : null;
    
            // Mettez à jour le champ userRole dans la base de données
            return $this->query("UPDATE {$this->table} SET userRole = ? WHERE idUser = ?", [$newUserRole, $id]);
        }
    
        return false; 
    }


}