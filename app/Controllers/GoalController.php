<?php

namespace App\Controllers;

use App\Models\GoalModel;

class GoalController extends BaseController
{
    public function __construct()
    {
        $this->goalModel = new GoalModel();
    }


    public function index()
    {
        $userId = session()->get('user')['id']; 
    
        if (!$userId) {
            return redirect()->to('/auth')->with('error', 'You need to be logged in to view your goals.');
        }
    
        $goals = $this->goalModel->getUserGoals($userId);
        $goals = $this->goalModel->where('user_id', $userId)->findAll();

    

        log_message('debug', 'Fetched goals: ' . print_r($goals, true));
    
        return view('Goal', ['goals' => $goals]); 
    }
    
   
    public function createGoal()
    {
    $userId = session()->get('user')['id']; 
    if (!$userId) {
        return redirect()->to('/auth')->with('error', 'You need to be logged in to create a goal.');
    }
    $data = [
        'user_id'    => $userId,
        'text'       => $this->request->getPost('text'),
        'completed'  => false, 
    ];
    if ($this->goalModel->createGoal($data)) {
        return redirect()->to('/goal')->with('message', 'Goal added successfully!');
    } else {
        return redirect()->to('/goal')->with('error', 'Failed to add goal.');
    }
}


    public function toggleCompletion($id)
    {
        $goal = $this->goalModel->find($id); 
        $newStatus = ($goal['completed'] == 1) ? 0 : 1; 
    
        if ($this->goalModel->toggleCompletion($id, $newStatus)) {
            return redirect()->to('/goal')->with('message', 'Goal status updated!');
        } else {
            return redirect()->to('/goal')->with('error', 'Failed to update goal status.');
        }
    }
    


    public function deleteGoal($id)
    {
        if ($this->goalModel->deleteGoal($id)) {
            return redirect()->to('/goal')->with('message', 'Goal deleted successfully!');
        } else {
            return redirect()->to('/goal')->with('error', 'Failed to delete goal.');
        }
    }
}
