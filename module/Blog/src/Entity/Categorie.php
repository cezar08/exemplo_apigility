<?php

namespace Blog\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="categorie")
 * 
 */
class Categorie extends AbstractEntity
{

     /** 
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * 
     * @var string
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="categories")
     * 
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = ArrayCollection();
    }

    public function getArrayCopy()
    {
        $posts = [];

        foreach ($this->posts as $post) {
            $posts[] = ['id' => $post->id, 'title' => $post->title, 'description' => $post->description];
        }

        return [
            'id' => $this->id,
            'description' => $this->description,
            'posts' => $posts
        ];
    }
}