<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'rating', 'comment', 'image', 'created_at'];
    protected $useTimestamps = false; // we'll set created_at manually or via DB default
}
