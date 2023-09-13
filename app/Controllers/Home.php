<?php

namespace App\Controllers;
use App\Models\user;
use CodeIgniter\Session\Session;
class Home extends BaseController
{
     
    public function index(): string
    {
        // $data['title'] = 'Home Page';

    return view('welcome_message');
    }
     public function signup(): string
    {
        // $data['title'] = 'Home Page';

    return view('signup');
    }
      public function register()
    {
        // $data['title'] = 'Home Page';
        helper(['form','url']);
        $validation = \Config\Services::validation();
        $check = $this->validate([
            'username'=>'required',
            'email'=>'required|valid_email|is_unique[users.email]',
            'password'=>'required',
            'confirm_password'=>'required|matches[password]'
        ]);
        if (!$check) {
            return view('signup',['validation'=>$this->validator]);
        }else {
           // $encrypter = \Config\Services::enctypter();
             $this->session = \Config\Services::session();
           $model = new User();
           $data = [
                'username'=> $this->request->getVar('username'),
                'email'=> $this->request->getVar('email'),
                'password'=>$this->request->getVar('password')
                // 'password'=>   $this->encrypter->encrypt($this->request->getVar('password'))         
            ];
           $model->insert($data);
               $this->session->setFlashdata('success', 'Data inserted successfully.');

            // Redirect to another page or reload the current page
            return redirect()->to('http://localhost:8080/signup');

        }
        
    }

}
