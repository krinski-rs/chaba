<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Online
 */
class Online
{
    /**
     * @var integer
     */
    private $onliCodigoid;

    /**
     * @var integer
     */
    private $usuariosId;

    /**
     * @var \DateTime
     */
    private $onliDatainc;

    /**
     * @var string
     */
    private $onliIp;

    /**
     * @var string
     */
    private $onliPagina;

    /**
     * @var boolean
     */
    private $onliDisponivel;


    /**
     * Get onliCodigoid
     *
     * @return integer 
     */
    public function getOnliCodigoid()
    {
        return $this->onliCodigoid;
    }

    /**
     * Set usuariosId
     *
     * @param integer $usuariosId
     * @return Online
     */
    public function setUsuariosId($usuariosId)
    {
        $this->usuariosId = $usuariosId;

        return $this;
    }

    /**
     * Get usuariosId
     *
     * @return integer 
     */
    public function getUsuariosId()
    {
        return $this->usuariosId;
    }

    /**
     * Set onliDatainc
     *
     * @param \DateTime $onliDatainc
     * @return Online
     */
    public function setOnliDatainc($onliDatainc)
    {
        $this->onliDatainc = $onliDatainc;

        return $this;
    }

    /**
     * Get onliDatainc
     *
     * @return \DateTime 
     */
    public function getOnliDatainc()
    {
        return $this->onliDatainc;
    }

    /**
     * Set onliIp
     *
     * @param string $onliIp
     * @return Online
     */
    public function setOnliIp($onliIp)
    {
        $this->onliIp = $onliIp;

        return $this;
    }

    /**
     * Get onliIp
     *
     * @return string 
     */
    public function getOnliIp()
    {
        return $this->onliIp;
    }

    /**
     * Set onliPagina
     *
     * @param string $onliPagina
     * @return Online
     */
    public function setOnliPagina($onliPagina)
    {
        $this->onliPagina = $onliPagina;

        return $this;
    }

    /**
     * Get onliPagina
     *
     * @return string 
     */
    public function getOnliPagina()
    {
        return $this->onliPagina;
    }

    /**
     * Set onliDisponivel
     *
     * @param boolean $onliDisponivel
     * @return Online
     */
    public function setOnliDisponivel($onliDisponivel)
    {
        $this->onliDisponivel = $onliDisponivel;

        return $this;
    }

    /**
     * Get onliDisponivel
     *
     * @return boolean 
     */
    public function getOnliDisponivel()
    {
        return $this->onliDisponivel;
    }
}
