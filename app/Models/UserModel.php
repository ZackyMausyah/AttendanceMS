<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_login'; 
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'email', 'password', 'reset_token']; // Tambahkan field lainnya jika perlu

    public function getUserByEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return null; // Return null jika email tidak valid
    }
    return $this->where('email', $email)->first();
}




}
