<?php
namespace App\Controllers;

use App\Models\DashboardModel;

class DasController extends BaseController
{
   
    public function index()
    {
        $userModel = new DashboardModel();
        $keyword = $this->request->getGet('search'); 
        $data['users'] = $userModel->searchUsers($keyword);
        $adminCount = $userModel->where('role', 'admin')->countAllResults();
        $userCount = $userModel->where('role', 'user')->countAllResults();

    // Pass data to the view
    $data['roleData'] = [
        'admin' => $adminCount,
        'user' => $userCount,
    ];
        return view('dashboard', $data);
    }

    // Add User
    public function addUser()
    {
        $userModel = new DashboardModel();
        $userModel->save([
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'date_inscription' => date('Y-m-d H:i:s'),
            'active' => 1, // Default active status
        ]);
        return redirect()->to('/dashboard');
    }

    // Edit User
    public function editUser($id)
    {
        $userModel = new DashboardModel();
        $data['user'] = $userModel->getUserById($id);
        return view('edit_user', $data);
    }

    public function updateUser($id)
    {
        $userModel = new DashboardModel();
        $userModel->updateUser($id, [
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ]);
        return redirect()->to('/dashboard');
    }

    // Delete User
    public function deleteUser($id)
    {
        $userModel = new DashboardModel();
        $userModel->deleteUser($id);
        return redirect()->to('/dashboard');
    }
    public function updateUserRole($id)
    {
        $userModel = new DashboardModel();
        $newRole = $this->request->getPost('role');
        
        // Update the role of the user
        $userModel->update($id, ['role' => $newRole]);
        
        return $this->response->setJSON(['success' => true]);
    }
    
}

