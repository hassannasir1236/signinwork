<?php

namespace App\Controllers;
use App\Models\user;
use App\Models\Userprofile;
use CodeIgniter\Session\Session;
class Home extends BaseController
{
     
    public function index()
    {
        // $data['title'] = 'Home Page';
        $title['title'] = 'Signin page';
        $user_id = session('user_id');
        if($user_id){
            return redirect()->to('/dashboard');
        }else{
    return view('welcome_message',$title);
        }
    }
     public function signup(): string
    {
        // $data['title'] = 'Home Page';
        $title['title'] = 'Signup page';
    return view('signup',$title);
    }
      public function register()
    {
        // $data['title'] = 'Home Page';
        $title['title'] = 'Signup page';
        helper(['form','url']);
        $validation = \Config\Services::validation();
        $check = $this->validate([
            'username'=>'required',
            'email'=>'required|valid_email|is_unique[users.email]',
            'password'=>'required',
            'confirm_password'=>'required|matches[password]'
        ]);
        if (!$check) {
            $data['username'] =  $this->request->getVar('username');
            $data['email'] =  $this->request->getVar('email');
            $data['password'] =  $this->request->getVar('password');
       
             return view('signup',['validation'=>$this->validator,'data'=>$data]);
        }else {
           // $encrypter = \Config\Services::enctypter();
        //    $data['username'] = "";
        //     $data['email'] =  "";
        //     $data['password'] =  "";
        //     $data['confirm_password'] =  "";
             $this->session = \Config\Services::session();
           $model = new User();
           $data = [
                'username'=> $this->request->getVar('username'),
                'email'=> $this->request->getVar('email'),
                'password'=>md5($this->request->getVar('password'))
                 //'password'=>   $this->encrypter->encrypt($this->request->getVar('password'))         
            ];
           $model->insert($data);
             $this->session->setFlashData('success', 'Sign-up successful!');
        //   $this->session->set_flashdata('success', 'Signup successful! You can now log in.');
        //   $this->session->set_flashdata('message', 'Your form was successfully submitted!');
        //   Redirect to another page or reload the current page
      
             return redirect('signup');


           //return redirect();

        }
        
    }
    public function authenticate()
    {
        helper(['form','url']);
        $validation = \Config\Services::validation();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $check = $this->validate([
            'email'=>'required|valid_email',
            'password'=>'required',
        ]);
        if (!$check) {
       
        return view('welcome_message',['validation'=>$this->validator]);
        }else{
            $userModel = new User();
            $user = $userModel->authenticate($email, $password);
    
            if ($user) {
                // User is authenticated, set user session
                $session = session();
                $session->set(['user_id' => $user['id'], 'email' => $user['email'],'username' => $user['username']]);
                return redirect()->to('/dashboard');
            } else {
                // Authentication failed, show error
                $data['error'] = 'Invalid email or password';
                return view('welcome_message', $data);
            }
        }
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/');
        }

        // User is authenticated, load the dashboard view
        return view('/dashboard');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function toaster(){
        return view('toaster');
    }
    public function upload()
    {
        $file = $this->request->getFile('myPhoto');

        // Check if the file was uploaded successfully
        if ($file->isValid() && !$file->hasMoved()) {
            // Generate a unique name for the file
            $newName = $file->getRandomName();

            // Move the uploaded file to a directory
            $file->move(ROOTPATH . 'public/assets/uploads', $newName);

            // Save image information in the database
            $imageModel = new Userprofile();
            $data = [
                'user_id' => session('user_id'),
                'profilename' => $newName,
            ];
            $imageModel->insert($data);
            echo "pass test";
            return redirect()->to('/dashboard');
        } else {
            // Handle file upload error
            echo "fail test ";
            return redirect()->to('/dashboard');
        }
    }

}
