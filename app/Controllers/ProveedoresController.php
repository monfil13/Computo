<?php

namespace App\Controllers;

use App\Models\ProveedorModel;

class ProveedoresController extends BaseController
{
    private $proveedorModel;

    public function __construct()
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

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
            'proveedores' => $this->proveedorModel->paginate(6), // 6 registros por página
            'pager' => $this->proveedorModel->pager,
        ];
        echo view('common/navbar');
        $data['proveedores'] = $this->proveedorModel->findAll();
        return view('admin/proveedores', $data);
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
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            'direccion' => $this->request->getPost('direccion')
        ];

        $this->proveedorModel->insert($data);

        return redirect()->to(base_url('admin/proveedores'));
    }

    public function update()
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

        $data = [
            'idProveedor' => $this->request->getPost('idProveedor'),
            'nombre' => $this->request->getPost('nombre'),
            'telefono' => $this->request->getPost('telefono'),
            'correo' => $this->request->getPost('correo'),
            'direccion' => $this->request->getPost('direccion')
        ];

        $this->proveedorModel->update($data['idProveedor'], $data);

        return redirect()->to(base_url('admin/proveedores'));
    }

    public function delete($id)
    {
        // Verificar si el usuario tiene permisos de administrador
        if (session('type') != 'admin') {
            // Mostrar un mensaje de error o redirigir a la página de inicio
            return redirect()->to(base_url('/'));
        }

        $this->proveedorModel->delete($id);

        return redirect()->to(base_url('admin/proveedores'));
    }

    public function search()
    {
        $searchTerm = $this->request->getVar('search'); // Obtener el término de búsqueda del formulario

        // Realizar la búsqueda en el modelo y configurar la paginación
        $data['proveedores'] = $this->proveedorModel
            ->like('nombre', $searchTerm)
            ->orLike('telefono', $searchTerm)
            ->orLike('correo', $searchTerm)
            ->orLike('direccion', $searchTerm)
            ->paginate(10);

        // Pasar los resultados paginados a la vista
        $data['pager'] = $this->proveedorModel->pager;

        // Pasar los resultados a la vista
        echo view('common/navbar');
        echo view('admin/proveedores', $data);
    }
}
