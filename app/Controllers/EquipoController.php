<?php

namespace App\Controllers;

use App\Models\EquipoModel;
use App\Models\MobiliarioModel;
use App\Models\ProveedorModel;

class EquipoController extends BaseController
{
    private $equipoModel;
    private $mobiliarioModel;
    private $proveedorModel;

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

        $pager = \Config\Services::pager();
        $data = [
            'equipos' => $this->equipoModel->paginate(6), // 6 registros por página
            'pager' => $this->equipoModel->pager,
        ];
        echo view('common/navbar');

        $data['equipos'] = $this->equipoModel->findAllEquipos();

        return view('admin/equipos', $data);
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

    public function search()
    {
        $searchTerm = $this->request->getVar('search'); // Obtener el término de búsqueda del formulario

        // Realizar la búsqueda en el modelo y configurar la paginación
        $data['equipos'] = $this->equipoModel
            ->like('nombre', $searchTerm)
            ->orLike('marca', $searchTerm)
            ->orLike('modelo', $searchTerm)
            ->orLike('descripcion', $searchTerm)
            ->orLike('tipo', $searchTerm)
            ->orLike('estado', $searchTerm)
            ->paginate(10);

        // Pasar los resultados paginados a la vista
        $data['pager'] = $this->equipoModel->pager;

        // Pasar los resultados a la vista
        echo view('common/navbar');
        echo view('admin/equipos', $data);
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
        $pager = \Config\Services::pager();
        $data = [
            'equipos' => $this->equipoModel->paginate(6), // 6 registros por página
            'pager' => $this->equipoModel->pager,
        ];

        echo view('common/navbar3');
        $data['equipos'] = $this->equipoModel->findAllEquipos();
        return view('lectura/equiposL', $data);
    }

    public function searchL()
    {
        $searchTerm = $this->request->getVar('search'); // Obtener el término de búsqueda del formulario
        $this->equipoModel = new EquipoModel();
        // Realizar la búsqueda en el modelo y configurar la paginación
        $data['equipos'] = $this->equipoModel
            ->like('nombre', $searchTerm)
            ->orLike('marca', $searchTerm)
            ->orLike('modelo', $searchTerm)
            ->orLike('descripcion', $searchTerm)
            ->orLike('tipo', $searchTerm)
            ->orLike('estado', $searchTerm)
            ->paginate(10);

        // Pasar los resultados paginados a la vista
        $data['pager'] = $this->equipoModel->pager;

        echo view('common/navbar3');
        return view('lectura/equiposL', $data);
    }

}
