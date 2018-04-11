<?php

namespace PandaAdmin\Laravel;

use \Illuminate\Database\Eloquent\Model;
use PandaAdmin\Core\Content\ContentRecordInterface;

class BaseModel extends Model implements ContentRecordInterface
{
    public function getFieldValue(string $field)
    {
        return $this->$field;
    }
}