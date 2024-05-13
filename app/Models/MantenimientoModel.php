<?php

namespace App\Models;

use CodeIgniter\Model;

class MantenimientoModel extends Model
{
    protected $table = 'mantenimiento';
    protected $primaryKey = 'idMantenimiento';
    protected $allowedFields = ['idEquipo', 'tipo', 'fechaMantenimiento', 'fechaSalida', 'fechaIngreso', 'descripcion'];

    public function getMantenimientosWithEquipo()
    {
        return $this->db->table('mantenimiento')
            ->select('mantenimiento.*, equipos.nombre AS nombreEquipo')
            ->join('equipos', 'equipos.idEquipo = mantenimiento.idEquipo')
            ->get()
            ->getResultArray();
    }

    public function findAllWithEquipo()
    {
        return $this->db->table('mantenimiento')
            ->select('mantenimiento.*, equipos.nombre AS nombreEquipo')
            ->join('equipos', 'equipos.idEquipo = mantenimiento.idEquipo')
            ->get()
            ->getResultArray();
    }
}
