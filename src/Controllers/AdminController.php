<?php

namespace PandaAdmin\Laravel\Controllers;


use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $routes = app('admin.routes');

        return view('panda-admin::index', compact('routes'));
    }
}