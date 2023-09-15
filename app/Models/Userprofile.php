<?php

namespace App\Models;

use CodeIgniter\Model;

class Userprofile extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'userprofiles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['profilename','user_id'];

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
    public function getImageById($id)
    {
        return $this->where('user_id',$id)->first();
    }
    public function updateRecord($id, $data) {
        // Your update logic goes here
        // $this->db->where('user_id', $id);
        // $this->db->update('Userprofiles', $data);
        $builder = $this->db->table('Userprofiles');
        $builder->where('user_id', $id); // Replace 'user_id' and $id with your conditions
$builder->update($data);
$builder->set($data);
$result = $builder->update();
    }
    
}
