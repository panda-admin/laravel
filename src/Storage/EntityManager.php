<?php

namespace PandaAdmin\Laravel\Storage;


use PandaAdmin\Core\Config\ConfigInterface;
use PandaAdmin\Core\Storage\ContentRepositoryInterface;
use PandaAdmin\Core\Storage\EntityManagerInterface;

class EntityManager implements EntityManagerInterface
{
    /**
     * @var \PandaAdmin\Core\Config\ConfigInterface
     */
    private $config;

    public function __construct(ConfigInterface $config)
    {

        $this->config = $config;
    }

    public function getRepository($contentType): ContentRepositoryInterface
    {
        $options = $this->config->getContentTypeOptions($contentType);

        return new ContentRepository($options['model']);
    }
}