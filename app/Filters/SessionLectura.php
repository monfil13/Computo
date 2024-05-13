<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionLectura implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario está autenticado y es de tipo lectura
        if (session('type') == 'lectura') {
            // Si es de tipo lectura, permite el acceso normalmente
            return $request;
        } else {
            // Si no es de tipo lectura, redireccionar a la página de inicio de sesión
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario hacer nada después de la solicitud
    }
}
