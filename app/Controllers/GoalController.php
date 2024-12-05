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
        $userId = session()->get('user')['id']; // Get the user_id from the session
    
        if (!$userId) {
            return redirect()->to('/auth')->with('error', 'You need to be logged in to view your goals.');
        }
    
        // Fetch goals from the database
        $goals = $this->goalModel->getUserGoals($userId);
    
        // Log the goals to check if they are being fetched properly
        log_message('debug', 'Fetched goals: ' . print_r($goals, true));
    
        return view('Goal', ['goals' => $goals]); 
    }
    
   
    public function createGoal()
{
    $userId = session()->get('user')['id']; // Get the 'id' from the 'user' session array


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


    // Marquer un objectif comme complété ou non
    public function toggleCompletion($id)
    {
        $goal = $this->goalModel->find($id); // Trouver l'objectif
        $newStatus = ($goal['completed'] == 1) ? 0 : 1; // Inverser le statut (complété ou non)
    
        if ($this->goalModel->toggleCompletion($id, $newStatus)) {
            return redirect()->to('/goal')->with('message', 'Goal status updated!');
        } else {
            return redirect()->to('/goal')->with('error', 'Failed to update goal status.');
        }
    }
    

    // Supprimer un objectif
    public function deleteGoal($id)
    {
        if ($this->goalModel->deleteGoal($id)) {
            return redirect()->to('/goal')->with('message', 'Goal deleted successfully!');
        } else {
            return redirect()->to('/goal')->with('error', 'Failed to delete goal.');
        }
    }
}
