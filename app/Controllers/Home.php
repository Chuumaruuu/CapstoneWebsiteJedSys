<?php

namespace App\Controllers;
use App\Models\UserModel;
class Home extends BaseController
{
    public function index(): string
    {
        $session = session();
        if($session->has('Firstname')){
            return view('landing');
        }else{
            return view('login');
        }
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
        $session = session();
        if($session->has('Firstname')){
            return view('about');
        }else{
            return view('login');
        }
    }

    public function gallery(): string
    {
        $session = session();
        if($session->has('Firstname')){
            return view('gallery');
        }else{
            return view('login');
        }
    }
    public function gameplay(): string
    {
        $session = session();
        if($session->has('Firstname')){
            return view('gameplay');
        }else{
            return view('login');
        }
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