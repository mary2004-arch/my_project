<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TestController extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();  

       
        $query = $db->query('SELECT VERSION()'); 

      
        $row = $query->getRow(); 

        if ($row) {
          
            echo "La connexion à la base de données est réussie. Version : " ;
        } else {
            
            echo "La connexion à la base de données a échoué.";
        }
    }
}
