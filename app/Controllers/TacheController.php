<?php

namespace App\Controllers;

use App\Models\TacheModel;

class TacheController extends BaseController
{
    public function index()
    {
        $tacheModel = new TacheModel();
        $data['personalTaches'] = $tacheModel->where('type', 'personal')->findAll(); // Personal tasks
        $data['groupTaches'] = $tacheModel->where('type', 'group')->findAll(); // Group tasks
        return view('Tache', $data); // Pass both categories to the view
    }

    public function createTask()
    {
        // Vérifiez si l'utilisateur est connecté
        $userId = session()->get('user')['id'] ?? null;
    
        if (!$userId) {
            // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            session()->setFlashdata('error', 'Vous devez être connecté pour créer une tâche');
            return redirect()->to('/auth');
        }
    
        // Initialisation du modèle
        $tacheModel = new TacheModel();
        
        // Enregistrer la tâche
        $tacheModel->save([
            'utilisateur_id' => $userId, // Utilisez l'ID de l'utilisateur connecté
            'titre' => $this->request->getVar('titre'),
            'description' => $this->request->getVar('description'),
            'type' => $this->request->getVar('type'), // personal or group
            'statut' => 'en attente', // Default status
            'date_creation' => date('Y-m-d H:i:s'),
            'date_modification' => date('Y-m-d H:i:s')
        ]);
    
        // Redirection vers la page des tâches
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
        $tacheModel->update($id, [
            'titre' => $this->request->getVar('titre'),
            'description' => $this->request->getVar('description'),
            'statut' => $this->request->getVar('statut'),
            'type' => $this->request->getVar('type'),
            'date_modification' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/Tache');
    }
    public function logout()
    {
        // Supprime toutes les données de l'utilisateur de la session
        session()->remove('user');
    
        // Redirige vers la page de connexion
        return redirect()->to('/login');
    }
    

}