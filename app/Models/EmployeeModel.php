<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'tb_employee'; 
    protected $primaryKey = 'id_employee';   // Kolom Primary Key
    protected $allowedFields = ['username', 'email', 'jobdesk']; // Kolom yang dapat diisi

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]',
        'email'    => 'required|valid_email',
        'jobdesk'  => 'required'
    ];
    // Optional: Menambahkan fungsi untuk pencarian
    public function search($keyword)
    {
        return $this->table($this->table)->like('username', $keyword)->orLike('email', $keyword);
    }
}
