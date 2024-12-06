<?php
namespace App\Controllers;

use App\Models\TacheModel;

class TacheController extends BaseController
{
    public function index()
    {
        $tacheModel = new TacheModel();
        $data['personalTaches'] = $tacheModel->where('type', 'personal')->findAll();
        $data['groupTaches'] = $tacheModel->where('type', 'group')->findAll(); 
    
        
        if ($this->request->getVar('edit_id')) {
            $task = $tacheModel->find($this->request->getVar('edit_id')); 
            if ($task) {
                $data['task'] = $task;
            }
        }
    
        return view('Tache', $data); 
    }
    

    public function createTask()
    {
        $userId = session()->get('user')['id'] ?? null;

        if (!$userId) {
            session()->setFlashdata('error', 'Vous devez être connecté pour créer une tâche');
            return redirect()->to('/auth');
        }

        $tacheModel = new TacheModel();
        $tacheModel->save([
            'utilisateur_id' => $userId,
            'titre' => $this->request->getVar('titre'),
            'description' => $this->request->getVar('description'),
            'type' => $this->request->getVar('type'),
            'statut' => 'en cours', 
            'date_creation' => date('Y-m-d H:i:s'),
            'date_modification' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/Tache');
    }

    public function deleteTask($id)
    {
        $tacheModel = new TacheModel();
        $tacheModel->delete($id);
        return redirect()->to('/Tache');
    }
    public function updateTask($id)
    {
        $tacheModel = new TacheModel();
        
        
        if ($this->validate([
            'titre' => 'required|min_length[3]',
            'description' => 'required|min_length[3]'
        ])) {
           
            $tacheModel->update($id, [
                'titre' => $this->request->getVar('titre'),
                'description' => $this->request->getVar('description'),
                'statut' => $this->request->getVar('statut'),
                'date_modification' => date('Y-m-d H:i:s')
            ]);
            
            return redirect()->to('/Tache'); 
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
    
    
    public function editTask($id)
    {
        $userId = session()->get('user')['id'] ?? null;
    
        if (!$userId) {
            session()->setFlashdata('error', 'Vous devez être connecté pour éditer une tâche');
            return redirect()->to('/auth');
        }
    
        $tacheModel = new TacheModel();
        $task = $tacheModel->find($id); 
        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Tâche non trouvée");
        }
    
        return view('Tache', ['task' => $task]);
    }
    
    
    public function logout()
    {
        session()->remove('user');
        return redirect()->to('/login');
    }
}



