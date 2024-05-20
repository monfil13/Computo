<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Users';
    protected $primaryKey = 'idUsuario';
    protected $allowedFields = ['nombre', 'apellido', 'telefono', 'correo', 'usuario', 'rol'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
