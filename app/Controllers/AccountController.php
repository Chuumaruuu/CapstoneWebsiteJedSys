<?php

namespace App\Controllers;
use App\Models\UserModel;
class AccountController extends BaseController
{
    public function registration()
    {
        helper(['form']);
        $data = [];
        return view('registration', $data);
    }
    public function store()
    {
        helper(['form']);
    $rules =[
        'Firstname'=>'required|min_length[5]|max_length[50]',
        'Middlename'=>'required|min_length[5]|max_length[50]',
        'Lastname'=>'required|min_length[5]|max_length[50]',
        'Birthdate'=>'required',
        'Email'=>'required|min_length[12]|max_length[100]|valid_email|is_unique[users.Email]',
        'Contactno'=>'required|min_length[11]|max_length[11]',
        'Password'=>'required|min_length[8]|max_length[255]',
        'ConfirmPassword'=>'matches[Password]'
    ];
    if($this->validate($rules)){
        $u = new UserModel();
        $data = [
            'Firstname'=>$this->request->getVar('Firstname'),
            'Middlename'=>$this->request->getVar('Middlename'),
            'Lastname'=>$this->request->getVar('Lastname'),
            'Birthdate'=>$this->request->getVar('Birthdate'),
            'Email'=>$this->request->getVar('Email'),
            'Contactno'=>$this->request->getVar('Contactno'),
            'Password'=>password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
            'Accesslevel'=>'User',
            'Status'=>'Active'
        ];
        $u->save($data);
        return redirect()->to('/login');
    }else{
        $data['validation'] = $this->validator;
        echo view('registration', $data);
    }
    }
}