<?php
namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email',
        'role',
        'date_inscription',
        'active',
        'mot_de_passe',
        'deleted_at',
    ];

    protected $useSoftDeletes = true; // Enable Soft Deletes
    protected $deletedField = 'deleted_at';

    // Fetch all users or search by keyword
    public function searchUsers($keyword = null)
    {
        if ($keyword) {
            return $this->like('email', $keyword)
                        ->orLike('role', $keyword)
                        ->findAll();
        }
        return $this->findAll();
    }

    // Get user by ID
    public function getUserById($id)
    {
        return $this->find($id);
    }

    // Update user
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    // Delete user (Soft Delete)
    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
