<?php

namespace Blog\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

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

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'user' => $this->user->getArrayCopy(),
            'title' => $this->title,
            'description' => $this->description,
            'text' => $this->text,
            'data_post' => $this->date_post
        ];
    }

}