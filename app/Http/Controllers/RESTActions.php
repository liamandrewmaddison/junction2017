<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Container\Container as App;

use App\Repositories\Criteria\ByColumnId;
use App\Repositories\Criteria\OffsetLimit;

abstract class RESTActions extends Controller
{
    /**
     * @var $repository
     */
    public $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeRespository();
    }

    /**
     * Specify Respository class name
     *
     * @return mixed
     */
    public abstract function repository();

    /**
     * SET REPOSITORY
     *
     * Set the repository for class
     * @return void
     */
    public function makeRespository()
    {
        $this->repository = $this->app->make($this->repository());
    }

    /**
     * GET ALL RESOURCES
     * 
     * Return all resources by company id
     * @param Request $request - Accepts Limit and Offset from GET request
     * @return Response - JSON
     */
    public function all(Request $request)
    {
        $companyId = $request->user()->company_id;
        $this->repository->pushCriteria(new ByColumnId('company_id', $companyId));
        $this->repository->pushCriteria(new OffsetLimit($request->input('offset'), $request->input('limit')));
        $collection = $this->repository->all();
        return $this->respond($collection, [
            'offset' => $request->input('offset'),
            'limit' => $request->input('limit'),
            'count' => count($collection),
        ]);
    }

    /**
     * GET A RESOURCE
     *
     * Return one resource depending on ID
     * @param $id for search
     * @return Response - JSON
     */
    public function getById(Request $request, $id)
    {
        $companyId = $request->user()->company_id;
        $this->repository->pushCriteria(new ByColumnId('company_id', $companyId));
        $name = $this->repository->getModel()->name;
        $model = $this->repository->find($id);
        if (!$model) {
            return $this->error("Couldn't find {$name} to update, ID is most likely wrong");
        }
        return $this->respond($model);
    }

    /**
     * UPDATE A RESOURCE
     *
     * Update resource depending on ID
     * @param $id for search
     * @return $this->getById($id)
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();
        $key = $this->repository->getModel()->key;
        $name = $this->repository->getModel()->name;
        $model = $this->repository->findBy($key, $id);
        if ($user->cannot('manipulate', $model)) {
            return $this->error("Couldn't find {$name} to update, ID is most likely wrong");
        }
        $this->repository->update($request->input('data'), $id, $key);
        return $this->getById($request, $id);
    }

    /**
     * CREATE A RESOURCE
     *
     * Create resource
     * @param Request $request
     * @return Response - JSON
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $data = array_merge($request->input('data'), ['company_id' => $user->company_id]);
        $model = $this->repository->create($data);
        return $this->respond($model);
    }

    /**
     * DELETE A RESOURCE
     *
     * Delete resource depending on ID
     * @param $id for search
     * @return Response - JSON
     */
    public function delete(Request $request, $id)
    {
        $user = $request->user();
        $key = $this->repository->getModel()->key;
        $name = $this->repository->getModel()->name;
        $model = $this->repository->findBy($key, $id);
        $modelName = $model["{$name}_name"];
        if (!$model) {
            return $this->error("Couldn't find {$name} to delete, ID is most likely wrong");
        }
        if ($user->cannot('manipulate', $model)) {
            return $this->error('You are are not permitted to delete this {$name}');
        }
        $model->delete($id);
        return $this->respond(null, [
            'message' => "{$modelName} has been removed successfully",
            "{$name}_removed" => $model["{$name}_removed"],
        ]);
    }

}
