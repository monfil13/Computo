<?php

namespace App\Controllers;

use App\Models\ProveedorModel;

class ProveedoresController extends BaseController
{
    private $proveedorModel;

    public function __construct()
    {
        $this->proveedorModel = new ProveedorModel();
    }

    public function index()
    {
        echo view('common/navbar');
        $data['proveedores'] = $this->proveedorModel->findAll();
        return view('proveedores', $data);
    }

    public function store()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            'direccion' => $this->request->getPost('direccion')
        ];

        $this->proveedorModel->insert($data);

        return redirect()->to(base_url('proveedores'));
    }

    public function update()
    {
        $data = [
            'idProveedor' => $this->request->getPost('idProveedor'),
            'nombre' => $this->request->getPost('nombre'),
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            'direccion' => $this->request->getPost('direccion')
        ];

        $this->proveedorModel->update($data['idProveedor'], $data);

        return redirect()->to(base_url('proveedores'));
    }

    public function delete($id)
    {
        $this->proveedorModel->delete($id);

        return redirect()->to(base_url('proveedores'));
    }
}
