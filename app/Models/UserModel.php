<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'utilisateurs'; // Nom de la table
    protected $primaryKey = 'id'; // Clé primaire
    protected $allowedFields = ['email', 'mot_de_passe', 'role', 'deleted_at', 'date_inscription']; // Champs autorisés pour l'insertion

    // Validation des utilisateurs pour le login
    public function validateUser($email, $password)
{
    $user = $this->where('email', $email)->first();
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        return $user; // Retourne l'utilisateur si le mot de passe est valide
    }
    return null; // Retourne null si l'utilisateur n'est pas trouvé ou le mot de passe est incorrect
}


    // Vérifier si l'email existe déjà dans la base de données
    public function emailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0; // Vérifie si un utilisateur avec cet email existe
    }

    // Enregistrer un nouvel utilisateur
   public function registerUser($email, $password)
{
    $data = [
       
        'email' => $email,
        'mot_de_passe' => $password, // Hashage du mot de passe
        'role' => 'user', // Par défaut, l'utilisateur a le rôle "user"
        'date_inscription' => date('Y-m-d H:i:s') // Date d'inscription
    ];

    // Insertion de l'utilisateur dans la base de données
    return $this->insert($data);
}

}
?>
