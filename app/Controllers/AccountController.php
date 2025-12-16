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
        $token = $this->token(100);
        $to = $this->request->getVar('Email');
        $data = [
            'Firstname'=>$this->request->getVar('Firstname'),
            'Middlename'=>$this->request->getVar('Middlename'),
            'Lastname'=>$this->request->getVar('Lastname'),
            'Birthdate'=>$this->request->getVar('Birthdate'),
            'Email'=>$to,
            'Contactno'=>$this->request->getVar('Contactno'),
            'Password'=>password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
            'Accesslevel'=>'User',
            'Status'=>'disabled',
            'Token'=>$token
        ];
        $u->save($data);
        $subject = 'Account Verification - Eden Island Frontier';
        $verifyLink = base_url('verifyToken')."?email=".$to."&token=".$token;
        $message = "Dear ".$this->request->getVar('Firstname').",<br><br>";
        $message .= "Thank you for registering at Eden Island Frontier. Please click the link below to verify your account:<br><br>";
        $message .= "<a href=\"".$verifyLink."\">Verify your account</a><br><br>";
        $message .= "If you did not register for an account, please ignore this email.<br><br>";
        $message .= "Best regards,<br>Eden Island Frontier Team";

        $this->sendMail($to, $subject, $message);
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

    public function verifyToken()
    {
        $session = session();
        $u = new UserModel();

        // Get email and token from query parameters
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        // Validate that both parameters exist
        if (!$email || !$token) {
            $session->setFlashdata('error', 'Invalid verification link.');
            return redirect()->to(base_url('login'));
        }

        // Find user by email and token
        $data = $u->where('Email', $email)
                   ->where('Token', $token)
                   ->first();

        if ($data) {
            // Check if already active
            if ($data['Status'] == 'active') {
                $session->setFlashdata('info', 'Your account is already verified. Please login.');
                return redirect()->to(base_url('login'));
            }

            // Update status to active and clear token
            $updateData = [
                'Status' => 'active',
                'Token' => null
            ];
            $u->update($data['ID'], $updateData);

            $session->setFlashdata('success', 'Account verified successfully! You can now login.');
            return redirect()->to(base_url('login'));
        } else {
            $session->setFlashdata('error', 'Invalid or expired verification link.');
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

    public function sendMail($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setMailType('html');

        // Use configured sender to avoid SMTP provider rejection
        $fromEmail = config('Email')->fromEmail ?: config('Email')->SMTPUser;
        $fromName  = config('Email')->fromName ?: 'Eden Island Frontier';

        $email->setFrom($fromEmail, $fromName);
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            // Show more details to diagnose issues during development
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            print_r($data);
        }
    }

    public function token($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length);
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('landing'));
    }
}
