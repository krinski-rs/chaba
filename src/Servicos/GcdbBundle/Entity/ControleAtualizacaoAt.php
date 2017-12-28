<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ControleAtualizacaoAt
 */
class ControleAtualizacaoAt
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idCidUser;

    /**
     * @var string
     */
    private $quem;

    /**
     * @var \DateTime
     */
    private $data;


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
     * Set idCidUser
     *
     * @param integer $idCidUser
     * @return ControleAtualizacaoAt
     */
    public function setIdCidUser($idCidUser)
    {
        $this->idCidUser = $idCidUser;

        return $this;
    }

    /**
     * Get idCidUser
     *
     * @return integer 
     */
    public function getIdCidUser()
    {
        return $this->idCidUser;
    }

    /**
     * Set quem
     *
     * @param string $quem
     * @return ControleAtualizacaoAt
     */
    public function setQuem($quem)
    {
        $this->quem = $quem;

        return $this;
    }

    /**
     * Get quem
     *
     * @return string 
     */
    public function getQuem()
    {
        return $this->quem;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return ControleAtualizacaoAt
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
}
