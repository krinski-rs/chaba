<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logbiometria
 */
class Logbiometria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $usuario;

    /**
     * @var string
     */
    private $acesso;

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
     * Set usuario
     *
     * @param integer $usuario
     * @return Logbiometria
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set acesso
     *
     * @param string $acesso
     * @return Logbiometria
     */
    public function setAcesso($acesso)
    {
        $this->acesso = $acesso;

        return $this;
    }

    /**
     * Get acesso
     *
     * @return string 
     */
    public function getAcesso()
    {
        return $this->acesso;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Logbiometria
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
