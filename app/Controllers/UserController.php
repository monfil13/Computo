<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $this->userModel = new UserModel();
    }

    public function index()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        echo view('common/navbar');
        $data['users'] = $this->userModel->findAll();
        return view('admin/users', $data);
    }

    public function store()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            'usuario' => $this->request->getPost('usuario'),
            'contraseña' => $this->request->getPost('contraseña'),
            'rol' => $this->request->getPost('rol')
        ];

        $this->userModel->insert($data);

        return redirect()->to(base_url('admin/users'));
    }

    public function update()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $data = [
            'idUsuario' => $this->request->getPost('idUsuario'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            'usuario' => $this->request->getPost('usuario'),
            'contraseña' => $this->request->getPost('contraseña'),
            'rol' => $this->request->getPost('rol')
        ];

        $this->userModel->update($data['idUsuario'], $data);

        return redirect()->to(base_url('admin/users'));
    }

    public function delete($id)
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $this->userModel->delete($id);

        return redirect()->to(base_url('admin/users'));
    }
}