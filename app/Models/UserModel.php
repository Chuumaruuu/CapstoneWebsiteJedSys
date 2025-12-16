<?php

namespace App\Models;
use CodeIgniter\Model;

//Model for users table
class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Firstname',
        'Middlename',
        'Lastname',
        'Contactno',
        'Email',
        'Birthdate',
        'Password',
        'Accesslevel',
        'Status',
        'Image',
        'Token'
    ];
}
