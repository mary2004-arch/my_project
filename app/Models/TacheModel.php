<?php

namespace App\Models;

use CodeIgniter\Model;

class TacheModel extends Model
{
    protected $table      = 'taches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['utilisateur_id', 'titre', 'description', 'statut', 'type', 'date_creation', 'date_modification'];

}
