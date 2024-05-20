<?php

namespace App\Controllers;
use TCPDF;
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

    public function generarReportePDF()
    {
    // Obtén los datos de mantenimiento, por ejemplo, desde el modelo
    $mantenimientoModel = new MantenimientoModel();
    $data['mantenimiento'] = $mantenimientoModel->findAll(); // Esto es un ejemplo, ajusta según sea necesario

    $equipoModel = new EquipoModel();
    $data['equipos'] = $equipoModel->findAll(); // Esto es un ejemplo, ajusta según sea necesario

    // Carga la vista del reporte en PDF en una variable
$content = view('admin/reporte_mantenimiento_pdf', $data);


        // Carga la biblioteca TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
        // Establece el nombre del archivo PDF
        $pdf->SetTitle('Reporte de Mantenimiento');
    
        // Agrega una página al PDF
        $pdf->AddPage();
    
        // Carga la vista del reporte en PDF en una variable
        $content = view('admin/reporte_mantenimiento_pdf');
    
        // Agrega el contenido de la vista al PDF
        $pdf->writeHTML($content, true, false, true, false, '');
    
        // Genera el PDF y lo muestra en el navegador
        $pdf->Output('reporte_mantenimiento.pdf', 'I');
    }

}
