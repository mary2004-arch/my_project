<?php

namespace App\Controllers;

use App\Models\UserModel;

class DasController extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    // Add user handling
    public function addUser()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ]);
        return redirect()->to('/dashboard');
    }

    // Get all users
    public function getUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('users', $data);
    }



}
