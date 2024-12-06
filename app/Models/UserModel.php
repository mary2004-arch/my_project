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
        'date_inscription',
        'reset_token', 
        'token_expiry'
    ];

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

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function storePasswordResetToken($email, $token)
    {
        $this->where('email', $email)->set([
            'reset_token' => $token, 
            'token_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ])->update();
    }

    public function getUserByResetToken($token)
    {
        return $this->where('reset_token', $token)
                    ->where('token_expiry >=', date('Y-m-d H:i:s'))
                    ->first();
    }

    public function updatePassword($email, $hashedPassword)
    {
        $this->where('email', $email)->set(['mot_de_passe' => $hashedPassword])->update();
    }

    public function clearResetToken($token)
    {
        $this->where('reset_token', $token)->set([
            'reset_token' => null,
            'token_expiry' => null
        ])->update();
    }
}
