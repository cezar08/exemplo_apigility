<?php

namespace Blog\Service;

use \Blog\Entity\Post;

class PostService 
{
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {
        
        if (isset($data['id']) && $data['id'] > 0)
            $post = $this->em->find('\Blog\Entity\Post', $data['id']);
        else 
            $post = new Post();

        $user = $this->em->find('\Blog\Entity\User', $data['id_user']);
        $data['date_post'] = new \DateTime('now');
        $data['user'] = $user;
        unset($data['id_user']);
        $post->setData($data);
        $this->em->persist($post);
        $this->em->flush();

        return $post->getArrayCopy();
    }

    public function fetch($id)
    {
        $post = $this->em->find('\Blog\Entity\Post', $id);

        return $post->getArrayCopy();
    }

    public function fetchAll($params = null)
    {
        $posts = $this->em->getRepository('\Blog\Entity\Post')->findAll();
        $postsResult = [];

        foreach ($posts as $post)
            $postsResult[] = $post->getArrayCopy();

        return $postsResult;
    }

    public function delete($id) 
    {
        $post = $this->em->find('\Blog\Entity\Post', $id);
        $this->em->remove($post);
        $this->em->flush();

        return true;
    }

}