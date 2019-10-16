<?php

namespace Blog\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * User
 *
 * @category Blog
 * @package  Entity
 * @author   Cezar Junior de Junior <cezar08@unochapeco.edu.br>
 *
 * @ORM\Entity
 * @ORM\Table(name="post")
 *
 */

class Post extends AbstractEntity
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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
     *
     * @var User
     */
    protected $user;

    /**
     * @ORM\Column(type="string")
     * 
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=400)
     *
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="text")
     *
     * @var string
     */
    protected $text;

    /**
     * @ORM\Column(type="date")
     *
     * @var \Date
     */
    protected $date_post;

    /**
     * @ORM\ManyToMany(targetEntity="Categorie")
     * @ORM\JoinTable(name="post_categories", 
     *  joinColumns={@ORM\JoinColumn(name="id_post", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="id_categorie", 
     *  referencedColumnName="id")}
     * )
     * 
     * @var ArrayCollection
     */
    protected $categories;

    public function __construct() 
    {
        $this->categories = new ArrayCollection();
    }

    public function getArrayCopy()
    {

        $categories = [];

        foreach ($this->categories as $categorie) {
            $categories[] = $categorie->getArrayCopy();
        }

        return [
            'id' => $this->id,
            'user' => $this->user->getArrayCopy(),
            'title' => $this->title,
            'description' => $this->description,
            'text' => $this->text,
            'data_post' => $this->date_post,
            'categories' => $categories
        ];
    }

}