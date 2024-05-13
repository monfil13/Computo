<?php

namespace App\Models;

use CodeIgniter\Model;

class ProveedorModel extends Model
{
    protected $table = 'Proveedores';
    protected $primaryKey = 'idProveedor';
    protected $allowedFields = ['nombre', 'telefono', 'correo', 'direccion'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
