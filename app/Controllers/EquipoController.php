<?php

namespace App\Controllers;

use App\Models\EquipoModel;

class EquipoController extends BaseController
{
    private $equipoModel;

    public function __construct()
    {
        $this->equipoModel = new EquipoModel();
    }

    public function index()
    {
        echo view('common/navbar');

        $data['equipos'] = $this->equipoModel->findAllEquipos();

        return view('equipos', $data);
    }

    public function store()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo' => $this->request->getPost('tipo'),
            'estado' => $this->request->getPost('estado')
        ];

        $this->equipoModel->insert($data);
        return redirect()->to(base_url('equipos'));
    }

    public function update()
    {
        $data = [
            'idEquipo' => $this->request->getPost('idEquipo'),
            'nombre' => $this->request->getPost('nombre'),
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo' => $this->request->getPost('tipo'),
            'estado' => $this->request->getPost('estado')
        ];

        $this->equipoModel->update($data['idEquipo'], $data);
        return redirect()->to(base_url('equipos'));
    }

    public function delete($id)
    {
        $this->equipoModel->delete($id);
        return redirect()->to(base_url('equipos'));
    }
}
