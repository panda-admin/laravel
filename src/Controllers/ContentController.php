<?php

namespace PandaAdmin\Core\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PandaAdmin\Core\Content\Form\FormBuilder;

class ContentController extends Controller
{
    protected $contenttype;

    public function __construct(Request $request)
    {
        $this->contenttype = $request->route('contenttype');
    }

    public function index()
    {
        return new JsonResponse([
            [
                'title' => 'Some title',
                'content' => '<p>HTML Content!</p>',
                'cover' => 'content/some-image.png'
            ],
            [
                'title' => 'Some title 2',
                'content' => '<p>HTML Content!</p>',
                'cover' => 'content/some-image.png'
            ],
            [
                'title' => 'Some title 3',
                'content' => '<p>HTML Content!</p>',
                'cover' => 'content/some-image.png'
            ],
        ]);
    }

    public function create(FormBuilder $builder)
    {
        dump($builder->build([
            [
                'type' => 'text'
            ]
        ]));
        $contenttype = [
            'contenttype' => 'testtype',
            'fields' => [
                'name' => 'asdad',
                'type' => 'text',
                'component' => 'text-component',
                'value' => 'asdas',
                'label' => 'Asdad',
            ],
        ];

        return new JsonResponse($contenttype);
    }

    public function store()
    {

    }

    public function show()
    {

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