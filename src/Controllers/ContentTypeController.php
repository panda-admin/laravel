<?php

namespace PandaAdmin\Core\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PandaAdmin\Core\Content\ContentTypeFactory;

class ContentTypeController extends Controller
{
    public function index()
    {

    }

    public function store()
    {

    }

    public function create()
    {

    }

    public function show($type, ContentTypeFactory $factory)
    {
        return new JsonResponse($factory->build($type)->getFormDefinition());
    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {

    }
}