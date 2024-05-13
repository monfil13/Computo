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
    }

    public function index()
    {
        echo view('common/navbar');
        $data['mobiliario'] = $this->mobiliarioModel->findAllWithProveedor();
        $data['proveedores'] = $this->proveedorModel->findAll();
        return view('mobiliario', $data);
    }

    public function store()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'cantidad' => $this->request->getPost('cantidad'),
            'tipo' => $this->request->getPost('tipo'),
            'idProveedor' => $this->request->getPost('idProveedor')
        ];

        $this->mobiliarioModel->insert($data);
        return redirect()->to(base_url('mobiliario'));
    }

    public function update()
    {
        $data = [
            'idMobiliario' => $this->request->getPost('idMobiliario'),
            'nombre' => $this->request->getPost('nombre'),
            'cantidad' => $this->request->getPost('cantidad'),
            'tipo' => $this->request->getPost('tipo'),
            'idProveedor' => $this->request->getPost('idProveedor')
        ];

        $this->mobiliarioModel->update($data['idMobiliario'], $data);
        return redirect()->to(base_url('mobiliario'));
    }

    public function delete($id)
    {
        $this->mobiliarioModel->delete($id);
        return redirect()->to(base_url('mobiliario'));
    }
}
