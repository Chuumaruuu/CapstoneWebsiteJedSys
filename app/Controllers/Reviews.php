<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use App\Models\UserModel;

class Reviews extends BaseController
{
    public function store()
    {
        $session = session();

        // Require logged-in user
        if (! $session->has('Firstname')) {
            return redirect()->to('/login');
        }

        $rules = [
            'rating' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'comment' => 'required|string|max_length[2000]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $firstname = $session->get('Firstname');
        $lastname = $session->get('Lastname');
        $email = $session->get('Email');

        $displayName = trim(($firstname ?? '') . ' ' . ($lastname ?? ''));
        if (empty($displayName)) {
            $displayName = $email ?? 'Anonymous';
        }

        // Prefer the user's avatar stored in the users table (by session ID).
        $userImage = null;
        $userId = $session->get('ID');
        if ($userId) {
            $uModel = new UserModel();
            $user = $uModel->find($userId);
            if ($user) {
                if (is_array($user) && ! empty($user['Image'])) {
                    $userImage = $user['Image'];
                } elseif (is_object($user) && ! empty($user->Image)) {
                    $userImage = $user->Image;
                }
            }
        }
        // Fallback to any session-stored image
        if (empty($userImage)) {
            $userImage = $session->get('Image') ?? null;
        }

        $model = new ReviewModel();
        $data = [
            'username' => $displayName,
            'rating'   => (int) $this->request->getPost('rating'),
            'comment'  => $this->request->getPost('comment'),
            'image'    => $userImage,
        ];

        $model->insert($data);

        $session->setFlashdata('success', 'Review submitted. Thank you!');

        return redirect()->to('/forum');
    }

    /**
     * Delete a review (admin only)
     */
    public function delete($id = null)
    {
        $session = session();

        // must be logged in
        if (! $session->has('ID')) {
            return redirect()->to('/login');
        }

        // check user access level from users table
        $userId = $session->get('ID');
        $uModel = new UserModel();
        $user = $uModel->find($userId);
        $access = null;
        if ($user) {
            if (is_array($user) && isset($user['Accesslevel'])) {
                $access = $user['Accesslevel'];
            } elseif (is_object($user) && isset($user->Accesslevel)) {
                $access = $user->Accesslevel;
            }
        }

        if (empty($access) || strtolower($access) !== 'admin') {
            $session->setFlashdata('error', 'You are not authorized to perform that action.');
            return redirect()->to('/forum');
        }

        // perform delete
        $model = new ReviewModel();
        if ($model->find($id)) {
            $model->delete($id);
            $session->setFlashdata('success', 'Review deleted.');
        } else {
            $session->setFlashdata('error', 'Review not found.');
        }

        return redirect()->to('/forum');
    }
}
