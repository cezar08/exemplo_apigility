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
 * @ORM\Table(name="usuario")
 *
 */

class User extends AbstractEntity
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
    protected $login;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $senha;

       /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $perfil;

}