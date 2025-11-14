<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\GalleryModel;
class Home extends BaseController
{
    public function index(): string
    {
        return view('landing');
    }

    public function landing(): string
    {
        return view('landing');
    }

    public function login(): string
    {
        return view('login');
    }

    public function about(): string
    {
        return view('about');
    }

    public function gallery(): string
    {
        $g = new GalleryModel();
        $data['gallery'] = $g->orderBy('ID','DESC')->findAll();
        return view('gallery', $data);
    }

    /**
     * Handle AJAX edit of a gallery item's title.
     */
    public function galleryEdit()
    {
        $session = session();
        if (! $session->has('Firstname')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Not authenticated'])->setStatusCode(401);
        }

        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        if (empty($id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Missing id'])->setStatusCode(400);
        }

        $g = new GalleryModel();
        $item = $g->find($id);
        if (! $item) {
            return $this->response->setJSON(['success' => false, 'message' => 'Item not found'])->setStatusCode(404);
        }

        // Minimal sanitize/limit for title length
        $title = trim((string) $title);
        if ($title === '') {
            return $this->response->setJSON(['success' => false, 'message' => 'Title cannot be empty'])->setStatusCode(400);
        }

        $update = ['Title' => $title];

        // Handle optional image upload (input name: Image)
        $image = $this->request->getFile('Image');
        if ($image && $image->isValid() && ! $image->hasMoved()) {
            // basic validation
            $allowed = [
                'image/jpg', 'image/jpeg', 'image/png', 'image/gif'
            ];
            $mime = $image->getClientMimeType();
            if (! in_array($mime, $allowed)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid image type'])->setStatusCode(400);
            }

            $uploadPath = FCPATH . 'public/img/';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // generate a safe unique filename
            $fileName = pathinfo($image->getClientName(), PATHINFO_FILENAME);
            $ext = $image->getExtension();
            $fileName = $fileName . '_' . time() . '.' . $ext;

            // delete existing file if present (and not default)
            $existing = $item['Filename'] ?? null;
            if ($existing && file_exists($uploadPath . $existing)) {
                @unlink($uploadPath . $existing);
            }

            if (! $image->move($uploadPath, $fileName)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to move uploaded file'])->setStatusCode(500);
            }

            $update['Filename'] = $fileName;
        }

        $g->update($id, $update);

        $response = ['success' => true, 'title' => $title];
        if (isset($update['Filename'])) {
            $response['filename'] = $update['Filename'];
            $response['imgSrc'] = IMG . $update['Filename'];
        }

        return $this->response->setJSON($response);
    }

    /**
     * Handle AJAX delete of a gallery item.
     */
    public function galleryDelete()
    {
        $session = session();
        if (! $session->has('Firstname')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Not authenticated'])->setStatusCode(401);
        }

        $id = $this->request->getPost('id');
        if (empty($id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Missing id'])->setStatusCode(400);
        }

        $g = new GalleryModel();
        $item = $g->find($id);
        if (! $item) {
            return $this->response->setJSON(['success' => false, 'message' => 'Item not found'])->setStatusCode(404);
        }

        // Intentionally do NOT delete the image file from disk here.
        // Only remove the database record so the gallery no longer references it.
        try {
            $filename = $item['Filename'] ?? null;
            $g->delete($id);
            return $this->response->setJSON(['success' => true, 'filename' => $filename]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete item'])->setStatusCode(500);
        }
    }
    
    /**
     * Handle AJAX add of a gallery item (title + image).
     */
    public function galleryAdd()
    {
        $session = session();
        if (! $session->has('Firstname')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Not authenticated'])->setStatusCode(401);
        }

        $title = $this->request->getPost('title');
        $title = trim((string) $title);
        if ($title === '') {
            return $this->response->setJSON(['success' => false, 'message' => 'Title cannot be empty'])->setStatusCode(400);
        }

        $image = $this->request->getFile('Image');
        $filename = null;
        if ($image && $image->isValid() && ! $image->hasMoved()) {
            $allowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            $mime = $image->getClientMimeType();
            if (! in_array($mime, $allowed)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid image type'])->setStatusCode(400);
            }

            $uploadPath = FCPATH . 'public/img/';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $fileNameBase = pathinfo($image->getClientName(), PATHINFO_FILENAME);
            $ext = $image->getExtension();
            $fileName = $fileNameBase . '_' . time() . '.' . $ext;
            if (! $image->move($uploadPath, $fileName)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to move uploaded file'])->setStatusCode(500);
            }
            $filename = $fileName;
        }

        $g = new GalleryModel();
        $data = [
            'Title' => $title,
            'Filename' => $filename,
            'Author_ID' => $session->get('ID') ?? null,
        ];

        try {
            $insertId = $g->insert($data);
            if ($insertId === false) {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to save item'])->setStatusCode(500);
            }

            $response = ['success' => true, 'id' => $insertId, 'title' => $title];
            if ($filename) {
                $response['filename'] = $filename;
                $response['imgSrc'] = IMG . $filename;
            }
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'DB error'])->setStatusCode(500);
        }
    }
    public function gameplay(): string
    {
        return view('gameplay');
    }

    public function forum(): string
    {
        return view('forum');
    }

    public function content(): string
    {
        return view('content');
    }

    public function database()
    {
        $u = new UserModel();
        $data = $u->where('status','active')->findAll();
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}