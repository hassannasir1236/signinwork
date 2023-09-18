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
        $imageModel = new Userprofile();
        $imageData = $imageModel->getImageById(session('user_id'));
       
        $userModel = new User();
        $userdata = $userModel->findAll();
        // Load a view to display the users
       
        return view('/dashboard', ['imageData' => $imageData,'userdata'=>$userdata]);
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
        // $validation = \Config\Services::validation();
        helper(['form','url']);
        $validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        // $check = $this->validate([
        //     'myPhoto'=>'required',
        // ]);
        $validationRules = [
            'myPhoto' => [
                'uploaded[myPhoto]',
                'max_size[myPhoto,2048]', // 2MB
                'mime_in[myPhoto,image/jpeg,image/png,image/gif]', // Allowed MIME types
            ],
        ];
        
        $validate=$validation->setRules($validationRules);
        $imageModel = new Userprofile();
        $imageData = $imageModel->getImageById(session('user_id'));
        $this->session->setFlashData('success', 'Sign-up successful!');
        // $this->validation->setRules($validationRules);
        if ($validation->withRequest($this->request)->run()) {
            // Validation passed, the uploaded file is valid.
                       
            $file = $this->request->getFile('myPhoto');

            // Check if the file was uploaded successfully
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a unique name for the file
                $newName = $file->getRandomName();
                // Move the uploaded file to a directory
                $file->move(ROOTPATH . 'public/assets/uploads', $newName);
                 // Check image exist then update image name
                 if(isset($imageData['profilename'])){
                    // $this->load->model('UserProfile');
                    $file_path = 'assets/Uploads/'.$imageData['profilename']; 
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    $id = session('user_id'); 
                    $data = [
                        'user_id'=> $id,
                        'profilename' => $newName, 
                    ]; 
                   $updatedata= $imageModel->updateRecord($id, $data);
                 }else{
                       // Save image information in the database
                $imageModel = new Userprofile();
                $data = [
                    'user_id' => session('user_id'),
                    'profilename' => $newName,
                ];
                $imageModel->insert($data);
                 }
              
               
               // return view('/dashboard', ['imageData' => $imageData]);
               return redirect()->to('/dashboard');
            } else {
                // Handle file upload error
                echo "fail test ";
                return redirect()->to('/dashboard');
            }
        } else {
            // Validation failed, handle errors here.
            echo "lkasjflkj";
            $errors = $validation->getErrors();
            $this->session->setFlashdata('errors', $errors);
           // return view('/dashboard',['validation'=>$validate,'error'=>$errors,'imageData' => $imageData]);
            return redirect()->to('/dashboard');
        }
     
    }
    public function delete($id){
        $this->session = \Config\Services::session();
        $userModel =new User();
        $userModel->delete($id);
        $this->session->setFlashData('success', 'Sign-up successful!');
        return redirect()->to('/dashboard');
    }
    public function editpageshow($id)
    {
        $user_id = session('user_id');
        if($user_id){
            $userRecord = new User();
          $data=  $userRecord->where('id',$id)->first();
             $imageModel = new Userprofile();
        $imageData = $imageModel->getImageById(session('user_id'));
       // $image = $imageData['profilename'];
            return view('/Usereditpage',['data'=>$data,'imageData'=>$imageData,'user_id'=>$user_id]);
        }else{
    return redirect('/');
        }
        
    }
    public function EditRecord($id){
         helper(['form','url']);
        $validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $check = $this->validate([
            'username'=>'required',
            'email'=>'required|valid_email',
            'password'=>'required',
              // 'myPhoto' => 'required|uploaded[myPhoto]|max_size[myPhoto,2048]|mime_in[myPhoto,image/jpeg,image/png,image/gif]'
        ]);
          $validationRules = [
            'myPhoto' => [
                'uploaded[myPhoto]',
                'max_size[myPhoto,2048]', // 2MB
                'mime_in[myPhoto,image/jpeg,image/png,image/gif]', // Allowed MIME types
            ],
        ];
        if (!$check) {
            $dataRecord['username'] =  $this->request->getVar('username');
            $dataRecord['email'] =  $this->request->getVar('email');
            $dataRecord['password'] =  $this->request->getVar('password');
       
             // return view('Usereditpage',['validation'=>$this->validator,'data'=>$data]);
                 $userRecord = new User();
          $data=  $userRecord->where('id',$id)->first();
             $imageModel = new Userprofile();
        $imageData = $imageModel->getImageById(session('user_id'));
       // $image = $imageData['profilename'];
            // return view('/Usereditpage',['data'=>$data,'imageData'=>$imageData,'validation'=>$this->validator]);
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }else {
           // $encrypter = \Config\Services::enctypter();
        //    $data['username'] = "";
        //     $data['email'] =  "";
        //     $data['password'] =  "";
        //     $data['confirm_password'] =  "";
    
           $model = new User();
           $data = [
                'username'=> $this->request->getVar('username'),
                'email'=> $this->request->getVar('email'),
                'password'=>md5($this->request->getVar('password'))
                 //'password'=>   $this->encrypter->encrypt($this->request->getVar('password'))         
            ];
           $model->update($id,$data);
           // $model->where('id', $id);
           //  $model->update($data);
        $validate=$validation->setRules($validationRules);
        $imageModel = new Userprofile();
        $imageData = $imageModel->getImageById(session('user_id'));
        $this->session->setFlashData('success', 'Sign-up successful!');
           if ($validation->withRequest($this->request)->run()) {
            // Validation passed, the uploaded file is valid.
                       
            $file = $this->request->getFile('myPhoto');

            // Check if the file was uploaded successfully
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a unique name for the file
                $newName = $file->getRandomName();
                // Move the uploaded file to a directory
                $file->move(ROOTPATH . 'public/assets/uploads', $newName);
                 // Check image exist then update image name
                 if(isset($imageData['profilename'])){
                    // $this->load->model('UserProfile');
                    $file_path = 'assets/Uploads/'.$imageData['profilename']; 
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    $id = session('user_id'); 
                    $data = [
                        'user_id'=> $id,
                        'profilename' => $newName, 
                    ]; 
                   $updatedata= $imageModel->updateRecord($id, $data);
                 }
             }
         }else{
             $errors = $validation->getErrors();
             $this->session->setFlashdata('errors', $errors);
         }
            
             $this->session->setFlashData('success', 'Sign-up successful!');
        //   $this->session->set_flashdata('success', 'Signup successful! You can now log in.');
        //   $this->session->set_flashdata('message', 'Your form was successfully submitted!');
        //   Redirect to another page or reload the current page
      
             return redirect('dashboard');


           //return redirect();

        }
    }
     public function fetch_data() {
        // Fetch data from the database
        $userModel = new User();
        $data['students']= $userModel->findAll();
        // $data['jsonData'] = json_encode($data);
        // $data = $this->DataModel->get_data();

        // // Return the data as JSON
        // header('Content-Type: application/json');
        // echo json_encode($data);
    //    return  $this->response->setJSON($data);
        // Print_r($data);
        // $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($data));
        return $this->response->setJSON($data);
    }
}
