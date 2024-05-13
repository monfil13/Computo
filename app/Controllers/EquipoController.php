<?php

namespace App\Controllers;

use App\Models\EquipoModel;
use App\Models\MobiliarioModel;
use App\Models\ProveedorModel;

class EquipoController extends BaseController
{
    private $equipoModel;

    public function __construct()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $this->equipoModel = new EquipoModel();
        $this->mobiliarioModel = new MobiliarioModel();
        $this->proveedorModel = new ProveedorModel();
    }

    public function index()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        echo view('common/navbar');

        $data['equipos'] = $this->equipoModel->findAllEquipos();

        return view('admin/equipos', $data);
    }


    public function indexL()
    {
        $this->equipoModel = new EquipoModel();
        $this->mobiliarioModel = new MobiliarioModel();
        $this->proveedorModel = new ProveedorModel();
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'lectura') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        echo view('common/navbar3');

        $data['equipos'] = $this->equipoModel->findAllEquipos();

        return view('lectura/equiposL', $data);
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
            'marca' => $this->request->getPost('marca'),
            'modelo' => $this->request->getPost('modelo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo' => $this->request->getPost('tipo'),
            'estado' => $this->request->getPost('estado')
        ];

        $this->equipoModel->insert($data);
        return redirect()->to(base_url('admin/equipos'));
    }

    public function update()
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

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
        return redirect()->to(base_url('admin/equipos'));
    }

    public function delete($id)
    {
            // Verificar si el usuario tiene permisos de administrador
    if (session('type') != 'admin') {
        // Mostrar un mensaje de error o redirigir a la página de inicio
        return redirect()->to(base_url('/'));
    }

        $this->equipoModel->delete($id);
        return redirect()->to(base_url('admin/equipos'));
    }
}
