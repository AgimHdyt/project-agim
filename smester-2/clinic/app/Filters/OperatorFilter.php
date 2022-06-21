<?php


namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class OperatorFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $db = \Config\Database::connect();
        $user = $db->table('tb_user')->getWhere(['username' => session()->get('username')])->getRowObject();
        // Do something here
        if (!session()->get('username') || !$user) {
            session()->remove('username');
            return redirect()->to('/')->with('error', "Anda Harus Login Dahulu");
        } else {
            if (session()->get('level') !== 'Admin' && session()->get('level') !== 'Operator') {
                return redirect()->back()->with('error', "Invalid Credential");
            }
        }
        // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
