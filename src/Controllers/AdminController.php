<?php

namespace PandaAdmin\Laravel\Controllers;


use Illuminate\Routing\Controller;
use PandaAdmin\Core\Storage\EntityManagerInterface;

class AdminController extends Controller
{
    public function index()
    {
        $routes = app('admin.routes');

        return view('panda-admin::index', compact('routes'));
    }
}