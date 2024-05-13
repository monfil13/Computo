<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        echo view('common/navbar');
        $data['users'] = $this->userModel->findAll();
        return view('users', $data);
    }

    public function store()
    {
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

        return redirect()->to(base_url('users'));
    }

    public function update()
    {
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

        return redirect()->to(base_url('users'));
    }

    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to(base_url('users'));
    }
}
