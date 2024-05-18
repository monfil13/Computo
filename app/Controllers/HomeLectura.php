<?php

namespace App\Controllers;

use App\Models\Usuarios;

class HomeLectura extends BaseController
{

    public function inicio(): string
    {
        $mensaje = session('mensaje');
        return view('login', ['mensaje' => $mensaje]);
    }

    public function ingresar()
    {
        // Verificar si el usuario tiene permisos de lectura
        if (session('type') != 'lectura') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }
        echo view('common/navbar2');
        return view('lectura/inicioL');
    }

    public function login()
    {
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');
        $Usuario = new Usuarios();

        $datosUsuario = $Usuario->obtenerUsuario(['usuario' => $usuario]);

        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {
            $tipoUsuario = $datosUsuario[0]['type'];
            $data = [
                "usuario" => $datosUsuario[0]['usuario'],
                "type" => $tipoUsuario
            ];

            $session = session();
            $session->set($data);

            if ($tipoUsuario === 'lectura') {
                return redirect()->to(base_url('lectura/inicioL'));
            } else if ($tipoUsuario === 'admin') {
                return redirect()->to(base_url('admin/inicio'));
            }
        } else {
            return redirect()->to(base_url('/'))->with('error', 'Datos incorrectos, intenta de nuevo.');
        }
    }


    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
