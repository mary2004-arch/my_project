<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'utilisateurs'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = [
        'email',
        'mot_de_passe',
        'role', 
        'deleted_at',
        'date_inscription']; 

    
    public function validateUser($email, $password)
{
    $user = $this->where('email', $email)->first();
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        return $user; 
    }
    return null;
}


  
    public function emailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0; 
    }

    
    public function registerUser($email, $password)
    {
        $data = [
            'email' => $email,
            'mot_de_passe' => password_hash($password, PASSWORD_DEFAULT), 
            'role' => 'user', 
            'date_inscription' => date('Y-m-d H:i:s')
        ];
    
        return $this->insert($data);
    }
    

}
?>
