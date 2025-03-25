<?php

namespace App\Controllers;
use App\Models\UserModel;
class AccountController extends BaseController
{

    public function index()
    {
        $session = session();
        if($session->has('Firstname')){
            return redirect()->to(base_url());
        }else{
            return view(base_url('login'));
        }
    }
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
            'Status'=>'active'
        ];
        $u->save($data);
        return redirect()->to(base_url('login'));
    }else{
        $data['validation'] = $this->validator;
        echo view('registration', $data);
    }
    }
    public function verify()
    {
        $session = session();
        $u = new UserModel();
        $email = $this->request->getVar('Email');
        $password = $this->request->getVar('Password');
        $data = $u->where('Email', $email)->first();
        if($data){
            $pass = $data['Password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                if($data['Status']=='active'):
                $session_data =[
                    'ID'=>$data['ID'],
                    'Firstname'=>$data['Firstname'],
                    'Email'=>$data['Email'],
                    'isLoggedIn'=> TRUE
                ];
                $session->set($session_data);
                return redirect()->to(base_url());
                else:
                    $session->setFlashdata('error', 'Account is not active. Please contact the administrator.');
                    return redirect()->to(base_url('login'));
                endif;
            }else{
                $session->setFlashdata('error', 'Invalid Password. Please Try Again.');
                return redirect()->to(base_url('login'));
            }
        }else{
            $session->setFlashdata('error', 'Email not found. Please Register First.');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
