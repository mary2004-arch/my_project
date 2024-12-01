<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class DasController extends BaseController
{
    public function index()
    {
        $model = new DashboardModel();

        // Fetching data from the database
        $admins = $model->countByRole('Admin');
        $users = $model->countByRole('User');
        $activeUsers = $model->countActiveUsers();

        // Pass data to the dashboard view
        return view('dashboard', [
            'admins' => $admins,
            'users' => $users,
            'activeUsers' => $activeUsers
        ]);
    }

    public function manageUsers()
    {
        $model = new DashboardModel();

        // Fetch all users
        $users = $model->findAll();

        return view('manage_users', ['users' => $users]);
    }

    public function addUser()
    {
        $model = new DashboardModel();

        $data = $this->request->getPost();
        $model->insert($data);

        return redirect()->to('/manage-users');
    }

    public function editUser($id)
    {
        $model = new DashboardModel();

        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();
            $model->update($id, $data);

            return redirect()->to('/manage-users');
        }

        $user = $model->find($id);

        return view('edit_user', ['user' => $user]);
    }

    public function deleteUser($id)
    {
        $model = new DashboardModel();
        $model->delete($id);

        return redirect()->to('/manage-users');
    }
}
