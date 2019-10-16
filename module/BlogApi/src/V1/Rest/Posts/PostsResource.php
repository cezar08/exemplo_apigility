<?php
namespace BlogApi\V1\Rest\Posts;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class PostsResource extends AbstractResourceListener
{

    protected $service;

    public function __construct(\Blog\Service\PostService $service) 
    {
        $this->service = $service;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $data = (array) $data;
        $filter = $this->getInputFilter()->setData($data);
        $data = $filter->getValues();

        return $this->service->save($data);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return $this->service->delete($id);
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->service->fetch($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return $this->service->fetchAll();
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $data = (array) $data;
        $filter = $this->getInputFilter()->setData($data);
        $data = $filter->getValues();
        $data['id'] = $id;

        return $this->service->save($data);
    }
}
