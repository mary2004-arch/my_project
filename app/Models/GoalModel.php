<?php

namespace App\Models;

use CodeIgniter\Model;

class GoalModel extends Model
{
    protected $table      = 'goals'; 
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',  
        'text',     
        'completed',
        'created_at', 
    ];

    
    public function getUserGoals($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
    
   
    public function createGoal($data)
    {
        return $this->insert($data);
    }

   
    public function toggleCompletion($id, $status)
    {
        return $this->update($id, ['completed' => $status]);
    }

    
    public function deleteGoal($id)
    {
        return $this->delete($id);
    }
}
