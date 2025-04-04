<?php
namespace App\Filters;
use CodeIgniter\Autoloader\FileLocatorInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn') || !session()->get('ID')) {
            return redirect()->to(base_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}