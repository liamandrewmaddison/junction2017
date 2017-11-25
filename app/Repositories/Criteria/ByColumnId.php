<?php

namespace App\Repositories\Criteria;

use App\Repositories\Contracts\RepositoryInterface as Repository;

class ByColumnId extends Criteria
{
    /**
     * @var $column
     */
    private $column;

    /**
     * @var $id
     */
    private $id;

    /**
     * Create a new controller instance.
     *
     * @param $companyId
     * @return void
     */
    public function __construct($column, $id)
    {
        $this->column = $column;
        $this->id = $id;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where($this->column, $this->id);
        return $query;
    }
}