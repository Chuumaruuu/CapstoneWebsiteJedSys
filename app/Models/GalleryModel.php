<?php
namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'galleries';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Title', 'Filename', 'Author_ID'
    ];
    protected $returnType = 'array';
}
