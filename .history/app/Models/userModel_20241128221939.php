<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_promotional';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'created_at'];

    protected $returnType = 'array';
    protected $useTimestamps = true;

}