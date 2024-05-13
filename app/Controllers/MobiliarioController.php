<?php

namespace App\Controllers;

use App\Models\MobiliarioModel;
use App\Models\ProveedorModel;

class MobiliarioController extends BaseController
{
    private $mobiliarioModel;
    private $proveedorModel;

    public function __construct()
    {
        $this->mobiliarioModel = new MobiliarioModel();
        $this->proveedorModel = new ProveedorModel();
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }
    }

    public function index()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        echo view('common/navbar');
        $data['mobiliario'] = $this->mobiliarioModel->findAllWithProveedor();
        $data['proveedores'] = $this->proveedorModel->findAll();
        return view('admin/mobiliario', $data);
    }

    public function indexL()
    {
        $this->mobiliarioModel = new MobiliarioModel();
        $this->proveedorModel = new ProveedorModel();
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'lectura') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        echo view('common/navbar3');
        $data['mobiliario'] = $this->mobiliarioModel->findAllWithProveedor();
        $data['proveedores'] = $this->proveedorModel->findAll();
        return view('lectura/mobiliarioL', $data);
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
            'cantidad' => $this->request->getPost('cantidad'),
            'tipo' => $this->request->getPost('tipo'),
            'idProveedor' => $this->request->getPost('idProveedor')
        ];

        $this->mobiliarioModel->insert($data);
        return redirect()->to(base_url('admin/mobiliario'));
    }

    public function update()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $data = [
            'idMobiliario' => $this->request->getPost('idMobiliario'),
            'nombre' => $this->request->getPost('nombre'),
            'cantidad' => $this->request->getPost('cantidad'),
            'tipo' => $this->request->getPost('tipo'),
            'idProveedor' => $this->request->getPost('idProveedor')
        ];

        $this->mobiliarioModel->update($data['idMobiliario'], $data);
        return redirect()->to(base_url('admin/mobiliario'));
    }

    public function delete($id)
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $this->mobiliarioModel->delete($id);
        return redirect()->to(base_url('admin/mobiliario'));
    }
}
