<?php

namespace PandaAdmin\Laravel\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PandaAdmin\Core\Content\ContentTypeFactoryInterface;
use PandaAdmin\Core\Content\Form\FormBuilder;
use PandaAdmin\Core\Form\FormFactoryInterface;

class ContentController extends Controller
{
    protected $contentType;

    public function __construct(Request $request, ContentTypeFactoryInterface $factory)
    {
        if($request->route('content')) {
            $this->contentType = $factory->make($request->route('content'));
        }
    }

    public function index()
    {

    }

    public function create(FormFactoryInterface $factory)
    {
        $modelClass = $this->contentType->getOptions()['model'];

        /** @var \PandaAdmin\Laravel\BaseModel $cr */
        $cr = new $modelClass;

        $cr->title = 'asd';

        $form = $factory->make($this->contentType->getName(), $cr);

        return new JsonResponse($form);
    }

    public function store()
    {

    }

    public function show($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }

    public function edit($id)
    {

    }
}