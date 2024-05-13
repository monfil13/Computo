<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipoModel extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'idEquipo';
    protected $allowedFields = ['nombre', 'marca', 'modelo', 'descripcion', 'tipo', 'estado'];

    public function findAllEquipos()
    {
        return $this->findAll();
    }
}
