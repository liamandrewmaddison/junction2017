<?php

namespace App\Repositories\Criteria;

use App\Repositories\Contracts\RepositoryInterface as Repository;

class OffsetLimit extends Criteria
{
    /**
     * @var $offset
     */
    private $offset;

    /**
     * @var $limit
     */
    private $limit;

    /**
     * Create a new controller instance.
     *
     * @param $companyId
     * @return void
     */
    public function __construct($offset, $limit)
    {
        $this->offset = $offset;
        $this->limit = $limit;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        if ($this->offset >= 0 && $this->limit >= 1) {
            $query = $model->offset($this->offset)->limit($this->limit);
            return $query;            
        }
        return $model;
    }
}