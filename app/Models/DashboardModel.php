<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'role', 'active'];

    // Count users by role
    public function countByRole($role)
    {
        return $this->where('role', $role)->countAllResults();
    }

    // Count active users
    public function countActiveUsers()
    {
        return $this->where('active', 1)->countAllResults();
    }
}
