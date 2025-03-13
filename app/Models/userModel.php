<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 
    'Password',
    'EmailAddress',
    'PhoneNum'];

    protected $returnType = 'array';
    protected $useTimestamps = true;

    protected $table = 'userrole';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Role', 
    'WorkContacts',
    'CompanyName',
    'CompanyDescription',
    'CompanyAddress',
    'FK_ID_Users'];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    

}