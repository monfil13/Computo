<?php

namespace App\Models;

use CodeIgniter\Model;

class MobiliarioModel extends Model
{
    protected $table = 'mobiliario';
    protected $primaryKey = 'idMobiliario';
    protected $allowedFields = ['nombre', 'cantidad', 'tipo', 'idProveedor'];

    public function findAllWithProveedor()
    {
        return $this->db->table('mobiliario')
            ->select('mobiliario.*, proveedores.nombre AS nombreProveedor')
            ->join('proveedores', 'proveedores.idProveedor = mobiliario.idProveedor')
            ->get()
            ->getResultArray();
    }
}
