<?php

namespace App\Controllers;

use App\Models\MantenimientoModel;
use App\Models\EquipoModel;

class MantenimientoController extends BaseController
{
    private $mantenimientoModel;
    private $equipoModel;

    public function __construct()
    {
        $this->mantenimientoModel = new MantenimientoModel();
        $this->equipoModel = new EquipoModel();
    }

    public function index()
    {
        echo view('common/navbar');
        $data['mantenimiento'] = $this->mantenimientoModel->findAllWithEquipo();
        $data['equipos'] = $this->equipoModel->findAll();
        return view('mantenimiento', $data);
    }

    public function store()
    {
        $data = [
            'idEquipo' => $this->request->getPost('idEquipo'),
            'tipo' => $this->request->getPost('tipo'),
            'fechaMantenimiento' => $this->request->getPost('fechaMantenimiento'),
            'fechaSalida' => $this->request->getPost('fechaSalida'),
            'fechaIngreso' => $this->request->getPost('fechaIngreso'),
            'descripcion' => $this->request->getPost('descripcion')
        ];

        $this->mantenimientoModel->insert($data);
        return redirect()->to(base_url('mantenimiento'));
    }

    public function update()
    {
        $data = [
            'idMantenimiento' => $this->request->getPost('idMantenimiento'),
            'idEquipo' => $this->request->getPost('idEquipo'),
            'tipo' => $this->request->getPost('tipo'),
            'fechaMantenimiento' => $this->request->getPost('fechaMantenimiento'),
            'fechaSalida' => $this->request->getPost('fechaSalida'),
            'fechaIngreso' => $this->request->getPost('fechaIngreso'),
            'descripcion' => $this->request->getPost('descripcion')
        ];

        $this->mantenimientoModel->update($data['idMantenimiento'], $data);
        return redirect()->to(base_url('mantenimiento'));
    }

    public function delete($id)
    {
        $this->mantenimientoModel->delete($id);
        return redirect()->to(base_url('mantenimiento'));
    }
}
