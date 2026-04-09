<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');

// Multi-page routes (PASTIKAN EJAAN 'portofolio' dengan 'o')
$routes->get('about', 'About::index');
$routes->get('resume', 'Resume::index');
$routes->get('portofolio', 'Portofolio::index');  // ← Perhatikan: 'portofolio' & 'Portofolio'
$routes->get('services', 'Services::index');
$routes->get('contact', 'Contact::index');

// 404 Handler (harus di paling bawah)
$routes->set404Override(function() {
    echo view('errors/html/error_404');
});