<?php
namespace BlogApi\V1\Rest\Users;

class UsersResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('Doctrine\ORM\EntityManager');

        return new UsersResource($em);
    }
}
