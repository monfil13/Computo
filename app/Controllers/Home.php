<?php

namespace App\Controllers;

use App\Models\Usuarios;

class Home extends BaseController
{
    public function inicio(): string
    {
        $mensaje = session('mensaje');
        return view('login', ['mensaje' => $mensaje]);
    }

    public function ingresar() {
        echo view('common/navbar2');
        return view('admin/inicio');
    }

    public function login(){
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
    
            if ($tipoUsuario === 'admin') {
                return redirect()->to(base_url('admin/inicio'));
            } else if ($tipoUsuario === 'lectura') {
                return redirect()->to(base_url('lectura/inicioL'));
            }
        } else {
            return redirect()->to(base_url('/'))->with('error', 'Datos incorrectos, intenta de nuevo.');
        }
    }
    

    public function salir(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
