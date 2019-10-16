<?php
namespace BlogApi\V1\Rest\Users;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use \Blog\Entity\User;

class UsersResource extends AbstractResourceListener
{

    protected $em;

    public function __construct($em) 
    {
        $this->em = $em;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $user = new User();
        $filter = $this->getInputFilter()
            ->setData((array) $data);
        $data = $filter->getValues();
        $user->setData((array) $data) ;
        $this->em->persist($user);
        $this->em->flush();

        return $user->getArrayCopy();
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $user = $this->em->find(User::class, $id);
        $this->em->remove($user);
        $this->em->flush();

        return true;
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $user = $this->em->find(User::class, $id);

        return $user ? $user->getArrayCopy() : [];
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $users = $this->em->getRepository(User::class)
            ->findAll();
        $usersArray = [];
        
        foreach ($users as $user)
            $usersArray[] = $user->getArrayCopy();

        return $usersArray;
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
        $user = $this->em->find(User::class, $id);
        $user->setData((array) $data);
        $this->em->persist($user);
        $this->em->flush();

        return $user->getArrayCopy();
    }
}
