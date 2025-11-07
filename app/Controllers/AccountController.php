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
                    'ID' => $data['ID'],
                    'Firstname' => $data['Firstname'],
                    'Middlename' => $data['Middlename'],
                    'Lastname' => $data['Lastname'],
                    'Email' => $data['Email'],
                    'Contactno' => $data['Contactno'],
                    'Birthdate' => $data['Birthdate'],
                    'Image' => $data['Image'] ?? null,
                    'isLoggedIn' => TRUE
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
    public function updateProfile()
    {
        helper(['form', 'filesystem']);
        $session = session();
        $u = new UserModel();

        // Validation rules
        $rules = [
            'Firstname' => 'required|min_length[3]|max_length[50]',
            'Lastname' => 'required|min_length[3]|max_length[50]',
            'Email' => 'required|valid_email',
            'Contactno' => 'required|numeric|min_length[10]|max_length[15]',
            'Birthdate' => 'required|valid_date'
        ];

        // Add profile image validation if uploaded
        $profileImage = $this->request->getFile('ProfileImage');
        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            $rules['ProfileImage'] = 'uploaded[ProfileImage]|max_size[ProfileImage,2048]|is_image[ProfileImage]|mime_in[ProfileImage,image/jpg,image/jpeg,image/png]';
        }

        // If user entered a new password, add validation rules for it
        $newPassword = $this->request->getPost('NewPassword');
        if (! empty($newPassword)) {
            $rules['NewPassword'] = 'min_length[8]|max_length[255]';
            $rules['ConfirmPassword'] = 'matches[NewPassword]';
        }

        // Check validation
        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        // Prepare data to update
        $data = [
            'Firstname' => $this->request->getPost('Firstname'),
            'Middlename' => $this->request->getPost('Middlename'),
            'Lastname' => $this->request->getPost('Lastname'),
            'Email' => $this->request->getPost('Email'),
            'Contactno' => $this->request->getPost('Contactno'),
            'Birthdate' => $this->request->getPost('Birthdate')
        ];

        // Handle profile image upload
        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            // Create uploads/avatars directory if it doesn't exist
            $uploadPath = FCPATH . 'uploads/avatars/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Generate unique filename
            $fileName = $session->get('ID') . '_' . time() . '.' . $profileImage->getExtension();
            
            // Delete old image if exists
            $existingImage = $this->request->getPost('ExistingImage');
            if ($existingImage && file_exists($uploadPath . $existingImage)) {
                unlink($uploadPath . $existingImage);
            }

            // Move uploaded file
            if ($profileImage->move($uploadPath, $fileName)) {
                $data['Image'] = $fileName;
            } else {
                return redirect()->back()->with('error', 'Failed to upload profile image.');
            }
        }

        // Update database
        $userId = $session->get('ID');

        // If password change requested, hash and include in update
        if (! empty($newPassword)) {
            $data['Password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $u->update($userId, $data);

        // Update session data
        foreach ($data as $key => $value) {
            // never store raw password in session
            if ($key === 'Password') {
                continue;
            }
            $session->set($key, $value);
        }

        return redirect()->to(base_url())->with('success', 'Profile updated successfully!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
