<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel(); // Charger le modèle UserModel
    }

    // Afficher la page d'authentification (login/signup)
    public function index()
    {
        return view('auth'); // La vue avec les deux formulaires
    }

    // Valider le login de l'utilisateur
    public function validate_login()
    {
        // Récupérer les données du formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Vérifier les informations de l'utilisateur
        $user = $this->userModel->validateUser($email, $password);

        if ($user) {
            // L'utilisateur est authentifié, on le redirige vers l'admin
            session()->set('user', $user); // Stocke les données de l'utilisateur dans la session
            return redirect()->to('/da'); // Rediriger vers la page admin
        } else {
            // Si l'email ou le mot de passe est incorrect
            session()->setFlashdata('error', 'Email ou mot de passe incorrect');
            return redirect()->to('/da'); // Rediriger vers la page d'authentification
        }
    }

    // Valider l'inscription de l'utilisateur
    public function validate_register()
    {
        // Récupérer les données du formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        
        // Vérifier si l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            session()->setFlashdata('error', 'L\'email n\'est pas valide');
            return redirect()->to('/auth'); // Rediriger vers la page d'inscription
        }

        // Vérifier si les mots de passe correspondent
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Les mots de passe ne correspondent pas');
            return redirect()->to('/auth'); // Rediriger vers la page d'inscription
        }

        // Vérifier la longueur du mot de passe
        if (strlen($password) > 10) {
            session()->setFlashdata('error', 'Le mot de passe ne doit pas dépasser 10 caractères');
            return redirect()->to('/auth'); // Rediriger vers la page d'inscription
        }

        // Vérifier si l'email existe déjà dans la base de données
        if ($this->userModel->emailExists($email)) {
            session()->setFlashdata('error', 'Cet email est déjà utilisé');
            return redirect()->to('/auth'); // Rediriger vers la page d'inscription
        }

        // Enregistrer l'utilisateur dans la base de données
        $this->userModel->registerUser($email, $password);

        // Enregistrement réussi, rediriger vers la page de login
        session()->setFlashdata('success', 'Inscription réussie, vous pouvez maintenant vous connecter');
        return redirect()->to('/auth'); // Rediriger vers la page de login
    }
}

?>
