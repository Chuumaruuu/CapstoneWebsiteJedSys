<?php

namespace App\Models;
use CodeIgniter\Model;

//Model for users table
class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'Name',
        'Firstname',
        'Lastname',
        'Contactno',
        'Email',
        'Birthdata',
        'Username',
        'Password',
        'Accesslevel',
        'Status',
        'Image'];
}
