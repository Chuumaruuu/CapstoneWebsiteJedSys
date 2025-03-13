<?php

namespace App\Controllers;

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
        return view('gallery');
    }
    public function gameplay(): string
    {
        return view('gameplay');
    }

    public function content(): string
    {
        return view('content');
    }

    public function registration(): string
    {
        return view('registration');
    }
}