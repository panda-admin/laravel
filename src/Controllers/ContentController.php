<?php

namespace PandaAdmin\Laravel\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PandaAdmin\Core\Content\ContentTypeFactoryInterface;
use PandaAdmin\Core\Content\Form\FormBuilder;
use PandaAdmin\Core\Form\FormFactoryInterface;
use PandaAdmin\Core\Storage\EntityManagerInterface;

class ContentController extends Controller
{
    protected $contentType;

    protected $repo;

    public function __construct(Request $request, ContentTypeFactoryInterface $factory, EntityManagerInterface $manager)
    {
        $contentType = $request->route('content');

        if($contentType) {
            $this->contentType = $factory->make($contentType);
            $this->repo = $manager->getRepository($contentType);
        }
    }

    public function index()
    {
        return new JsonResponse($this->repo->findAll());
    }

    public function create(FormFactoryInterface $factory)
    {
        $form = $factory->make($this->contentType->getName());

        return new JsonResponse($form);
    }

    public function store()
    {

    }

    public function show($content, $id)
    {
        $contentRecord = $this->repo->find($id);

        if(!$contentRecord) {
            return new JsonResponse(null, JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse($contentRecord);
    }

    public function update($content, $id)
    {

    }

    public function destroy($content, $id)
    {

    }

    public function edit($content, $id, FormFactoryInterface $factory)
    {
        $cr = $this->repo->find($id);

        $form = $factory->make($this->contentType->getName(), $cr);

        return new JsonResponse($form);
    }
}