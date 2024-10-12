<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_login'; 
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'email', 'password', 'reset_token']; // Tambahkan field lainnya jika perlu

    public function getUserByLogin($loginField)
    {
        // Mencari pengguna berdasarkan email atau username
        return $this->where('email', $loginField)->orWhere('username', $loginField)->first();
    }
}

