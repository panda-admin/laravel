<?php

return [
    'articles' => [
        'label' => 'Articles',
        'model'=> '\\App\\Article',
        'fields'=> [
            'title'=> [
                'label' => 'Title',
                'type' => 'text',
                'required' => true
            ],
            'content' => [
                'label' => 'Content',
                'type' => 'html'
            ],
            'cover' => [
                'label' => 'Cover',
                'type' => 'image'
            ]
        ]
    ]
];