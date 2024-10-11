<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'reset_token']; // Tambahkan field lainnya jika perlu

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }



}
