<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {
        $usuario = "felipe";
        $password = password_hash("123felipe", PASSWORD_DEFAULT);
        $type="lectura";
        $data = [
            'usuario' => $usuario,
            'password'    => $password,
            'type' =>$type
        ];
        // Using Query Builder
        $this->db->table('t_usuario')->insert($data);
    }
}
