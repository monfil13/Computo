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
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

        $this->mantenimientoModel = new MantenimientoModel();
        $this->equipoModel = new EquipoModel();
    }

    public function index()
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }
        $pager = \Config\Services::pager();
        $data = [
            'mantenimiento' => $this->mantenimientoModel->paginate(6), // 6 registros por página
            'pager' => $this->mantenimientoModel->pager,
        ];
        echo view('common/navbar');
        $data['mantenimiento'] = $this->mantenimientoModel->findAllWithEquipo();
        $data['equipos'] = $this->equipoModel->findAll();
        return view('admin/mantenimiento', $data);
    }

    public function store()
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

        $data = [
            'idEquipo' => $this->request->getPost('idEquipo'),
            'tipo' => $this->request->getPost('tipo'),
            'fechaMantenimiento' => $this->request->getPost('fechaMantenimiento'),
            'fechaSalida' => $this->request->getPost('fechaSalida'),
            'fechaIngreso' => $this->request->getPost('fechaIngreso'),
            'descripcion' => $this->request->getPost('descripcion')
        ];

        $this->mantenimientoModel->insert($data);
        return redirect()->to(base_url('admin/mantenimiento'));
    }

    public function update()
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

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
        return redirect()->to(base_url('admin/mantenimiento'));
    }

    public function delete($id)
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

        $this->mantenimientoModel->delete($id);
        return redirect()->to(base_url('admin/mantenimiento'));
    }

    public function search()
    {
        $searchTerm = $this->request->getVar('search'); // Obtener el término de búsqueda del formulario

        // Realizar la búsqueda en el modelo y configurar la paginación
        $data['mantenimiento'] = $this->mantenimientoModel
            ->select('mantenimiento.*, equipos.nombre AS nombreEquipo')
            ->join('equipos', 'equipos.idEquipo = mantenimiento.idEquipo')
            ->like('equipos.nombre', $searchTerm)
            ->orLike('mantenimiento.tipo', $searchTerm)
            ->orLike('mantenimiento.fechaMantenimiento', $searchTerm)
            ->orLike('mantenimiento.fechaSalida', $searchTerm)
            ->orLike('mantenimiento.fechaIngreso', $searchTerm)
            ->orLike('mantenimiento.descripcion', $searchTerm)
            ->orLike('equipos.nombre', $searchTerm)
            ->paginate(10);

        // Pasar los resultados paginados a la vista
        $data['pager'] = $this->mantenimientoModel->pager;
        $data['equipos'] = $this->equipoModel->findAll();

        // Pasar los resultados a la vista
        echo view('common/navbar');
        echo view('admin/mantenimiento', $data);
    }
}
