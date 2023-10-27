<?php

namespace App\Models;

use CodeIgniter\Model;

class Posts extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id_post';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_post',
        'title',
        'slug',
        'body',
        'created_at',
        'updated_at',
    ];

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

    public function getPosts()
    {
        return $this->findAll();
    }

    public function getPost($id_post)
    {
        return $this->find($id_post);
    }

    public function getPostBySlug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function addPost($data)
    {
        return $this->insert($data);
    }

    public function updatePost($id_post, $data)
    {
        return $this->update($id_post, $data);
    }

    public function deletePost($id_post)
    {
        return $this->delete($id_post);
    }
}
