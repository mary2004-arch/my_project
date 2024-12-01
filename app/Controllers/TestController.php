<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TestController extends Controller
{
    public function index()
    {
        // Charger le modèle de la base de données
        $db = \Config\Database::connect();  // Se connecter à la base de données

        // Essayer de récupérer la version de la base de données (juste un test simple)
        $query = $db->query('SELECT VERSION()');  // Requête pour obtenir la version de la base de données

        // Vérifier si la connexion a réussi
        $row = $query->getRow();  // Récupérer la première ligne du résultat

        if ($row) {
            // Si la requête réussit, afficher la version de la base de données
            echo "La connexion à la base de données est réussie. Version : " ;
        } else {
            // Si la requête échoue, afficher un message d'erreur
            echo "La connexion à la base de données a échoué.";
        }
    }
}
