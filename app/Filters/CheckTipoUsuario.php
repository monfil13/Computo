<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CheckTipoUsuario implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $tipoUsuario = $session->get('type');

        if ($tipoUsuario === 'admin' && strpos($request->uri->getPath(), 'inicioL') !== false) {
            // Redirige al admin desde la página inicioL
            return redirect()->to(base_url('/inicio'));
        } else if ($tipoUsuario === 'lectura' && strpos($request->uri->getPath(), 'inicio') !== false) {
            // Redirige al usuario de lectura desde la página inicio
            return redirect()->to(base_url('/inicioL'));
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
