<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portas
 */
class Portas
{
    /**
     * @var integer
     */
    private $idporta;

    /**
     * @var string
     */
    private $porta;

    /**
     * @var string
     */
    private $adminStatus;

    /**
     * @var string
     */
    private $operacao;

    /**
     * @var string
     */
    private $autoneg;

    /**
     * @var string
     */
    private $speed;

    /**
     * @var string
     */
    private $duplex;

    /**
     * @var string
     */
    private $flowctrl;

    /**
     * @var string
     */
    private $modo;

    /**
     * @var string
     */
    private $vlanbase;

    /**
     * @var string
     */
    private $destino;

    /**
     * @var integer
     */
    private $idswitch;


    /**
     * Get idporta
     *
     * @return integer 
     */
    public function getIdporta()
    {
        return $this->idporta;
    }

    /**
     * Set porta
     *
     * @param string $porta
     * @return Portas
     */
    public function setPorta($porta)
    {
        $this->porta = $porta;

        return $this;
    }

    /**
     * Get porta
     *
     * @return string 
     */
    public function getPorta()
    {
        return $this->porta;
    }

    /**
     * Set adminStatus
     *
     * @param string $adminStatus
     * @return Portas
     */
    public function setAdminStatus($adminStatus)
    {
        $this->adminStatus = $adminStatus;

        return $this;
    }

    /**
     * Get adminStatus
     *
     * @return string 
     */
    public function getAdminStatus()
    {
        return $this->adminStatus;
    }

    /**
     * Set operacao
     *
     * @param string $operacao
     * @return Portas
     */
    public function setOperacao($operacao)
    {
        $this->operacao = $operacao;

        return $this;
    }

    /**
     * Get operacao
     *
     * @return string 
     */
    public function getOperacao()
    {
        return $this->operacao;
    }

    /**
     * Set autoneg
     *
     * @param string $autoneg
     * @return Portas
     */
    public function setAutoneg($autoneg)
    {
        $this->autoneg = $autoneg;

        return $this;
    }

    /**
     * Get autoneg
     *
     * @return string 
     */
    public function getAutoneg()
    {
        return $this->autoneg;
    }

    /**
     * Set speed
     *
     * @param string $speed
     * @return Portas
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return string 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set duplex
     *
     * @param string $duplex
     * @return Portas
     */
    public function setDuplex($duplex)
    {
        $this->duplex = $duplex;

        return $this;
    }

    /**
     * Get duplex
     *
     * @return string 
     */
    public function getDuplex()
    {
        return $this->duplex;
    }

    /**
     * Set flowctrl
     *
     * @param string $flowctrl
     * @return Portas
     */
    public function setFlowctrl($flowctrl)
    {
        $this->flowctrl = $flowctrl;

        return $this;
    }

    /**
     * Get flowctrl
     *
     * @return string 
     */
    public function getFlowctrl()
    {
        return $this->flowctrl;
    }

    /**
     * Set modo
     *
     * @param string $modo
     * @return Portas
     */
    public function setModo($modo)
    {
        $this->modo = $modo;

        return $this;
    }

    /**
     * Get modo
     *
     * @return string 
     */
    public function getModo()
    {
        return $this->modo;
    }

    /**
     * Set vlanbase
     *
     * @param string $vlanbase
     * @return Portas
     */
    public function setVlanbase($vlanbase)
    {
        $this->vlanbase = $vlanbase;

        return $this;
    }

    /**
     * Get vlanbase
     *
     * @return string 
     */
    public function getVlanbase()
    {
        return $this->vlanbase;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Portas
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set idswitch
     *
     * @param integer $idswitch
     * @return Portas
     */
    public function setIdswitch($idswitch)
    {
        $this->idswitch = $idswitch;

        return $this;
    }

    /**
     * Get idswitch
     *
     * @return integer 
     */
    public function getIdswitch()
    {
        return $this->idswitch;
    }
}
