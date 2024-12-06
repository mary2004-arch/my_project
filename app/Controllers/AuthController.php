<?php

namespace App\Controllers;

use App\Models\UserModel;


class AuthController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel(); 
    }

   
    public function index()
    {
        return view('auth'); 
    }


   
    public function validate_login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
       
        $user = $this->userModel->validateUser($email, $password);
    
        if ($user) {
        
            if (password_verify($password, $user['mot_de_passe'])) {  
             
                session()->set('user', [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role'], 
                    'is_logged_in' => true,
                ]);
    
    
                if ($user['role'] === 'admin') {
                    return redirect()->to('/da');
                } elseif ($user['role'] === 'user') {
                    return redirect()->to('/Tache'); 
                } else {
                    return redirect()->to('/auth')->with('error', 'Rôle utilisateur invalide.');
                }
            } else {
                session()->setFlashdata('error', 'Email ou mot de passe incorrect');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email ou mot de passe incorrect');
            return redirect()->back();
        }
    }
    


    
    public function validate_register()
    {
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        
       
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            session()->setFlashdata('error', 'L\'email n\'est pas valide');
            return redirect()->to('/auth'); 
        }

      
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Les mots de passe ne correspondent pas');
            return redirect()->to('/auth');
        }

       
        if (strlen($password) > 10) {
            session()->setFlashdata('error', 'Le mot de passe ne doit pas dépasser 10 caractères');
            return redirect()->to('/auth');
        }


        if ($this->userModel->emailExists($email)) {
            session()->setFlashdata('error', 'Cet email est déjà utilisé');
            return redirect()->to('/auth'); 
        }

       
        $this->userModel->registerUser($email, $password);

        session()->setFlashdata('success', 'Inscription réussie, vous pouvez maintenant vous connecter');
        return redirect()->to('/auth'); 
    }
}

?>
