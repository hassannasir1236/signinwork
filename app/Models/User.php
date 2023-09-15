<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','email','password'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function authenticate($email, $password)
    {
        // return $this->where('email', $email)
        //     ->where('password', $password)
        //     ->first();
        
        $user = $this->where('email', $email)->first();

        if (!$user) {
            return false; // User not found
        }

        // Compare the input password (after MD5 hashing) with the stored password
        if (md5($password) === $user['password']) {
            return $user; // Authentication successful, return user data
        }

        return false; // Authentication failed
    }
    public function get_all_users() {
        // Replace 'users' with your actual database table name
        $query = $this->db->get('users');
        return $query->result(); // Return the result as an array of objects
    }
}
