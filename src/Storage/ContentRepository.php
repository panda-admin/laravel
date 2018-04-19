<?php

namespace PandaAdmin\Laravel\Storage;


use PandaAdmin\Core\Content\ContentRecordInterface;
use PandaAdmin\Core\Storage\ContentRepositoryInterface;

class ContentRepository implements ContentRepositoryInterface
{
    /**
     * @var string
     */
    protected $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    /**
     * @param $id
     * @return \PandaAdmin\Core\Content\ContentRecordInterface|null
     */
    public function find($id): ?ContentRecordInterface
    {
        return ($this->class)::find($id);
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var \Illuminate\Database\Query\Builder $query */
        $query = ($this->class)::query();

        foreach ($criteria as $key => $criterion) {
            $query->where($key, $criterion);
        }

        $orderBy ? $query->orderBy($orderBy[0], $orderBy[1]) : false;

        $limit ? $query->limit($limit) : false;

        $offset ? $query->offset($offset) : false;

        return $query->get();
    }

    /**
     * @param array $criteria
     * @return \PandaAdmin\Core\Content\ContentRecordInterface|null
     */
    public function findOneBy(array $criteria): ?ContentRecordInterface
    {
        /** @var \Illuminate\Database\Query\Builder $query */
        $query = ($this->class)::query();

        foreach ($criteria as $key => $criterion) {
            $query->where($key, $criterion);
        }

        return $query->limit(1)->first();
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return ($this->class)::all();
    }
}