<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 */
class Chat
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $recado;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Chat
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Chat
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set recado
     *
     * @param string $recado
     * @return Chat
     */
    public function setRecado($recado)
    {
        $this->recado = $recado;

        return $this;
    }

    /**
     * Get recado
     *
     * @return string 
     */
    public function getRecado()
    {
        return $this->recado;
    }
}
