<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountsTrafego
 */
class AccountsTrafego
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var integer
     */
    private $servicoid;

    /**
     * @var integer
     */
    private $tipoServicoid;

    /**
     * @var string
     */
    private $volumeTrafego;

    /**
     * @var string
     */
    private $trafegoExtra;

    /**
     * @var string
     */
    private $tipoMedida;


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
     * Set accountid
     *
     * @param integer $accountid
     * @return AccountsTrafego
     */
    public function setAccountid($accountid)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return integer 
     */
    public function getAccountid()
    {
        return $this->accountid;
    }

    /**
     * Set servicoid
     *
     * @param integer $servicoid
     * @return AccountsTrafego
     */
    public function setServicoid($servicoid)
    {
        $this->servicoid = $servicoid;

        return $this;
    }

    /**
     * Get servicoid
     *
     * @return integer 
     */
    public function getServicoid()
    {
        return $this->servicoid;
    }

    /**
     * Set tipoServicoid
     *
     * @param integer $tipoServicoid
     * @return AccountsTrafego
     */
    public function setTipoServicoid($tipoServicoid)
    {
        $this->tipoServicoid = $tipoServicoid;

        return $this;
    }

    /**
     * Get tipoServicoid
     *
     * @return integer 
     */
    public function getTipoServicoid()
    {
        return $this->tipoServicoid;
    }

    /**
     * Set volumeTrafego
     *
     * @param string $volumeTrafego
     * @return AccountsTrafego
     */
    public function setVolumeTrafego($volumeTrafego)
    {
        $this->volumeTrafego = $volumeTrafego;

        return $this;
    }

    /**
     * Get volumeTrafego
     *
     * @return string 
     */
    public function getVolumeTrafego()
    {
        return $this->volumeTrafego;
    }

    /**
     * Set trafegoExtra
     *
     * @param string $trafegoExtra
     * @return AccountsTrafego
     */
    public function setTrafegoExtra($trafegoExtra)
    {
        $this->trafegoExtra = $trafegoExtra;

        return $this;
    }

    /**
     * Get trafegoExtra
     *
     * @return string 
     */
    public function getTrafegoExtra()
    {
        return $this->trafegoExtra;
    }

    /**
     * Set tipoMedida
     *
     * @param string $tipoMedida
     * @return AccountsTrafego
     */
    public function setTipoMedida($tipoMedida)
    {
        $this->tipoMedida = $tipoMedida;

        return $this;
    }

    /**
     * Get tipoMedida
     *
     * @return string 
     */
    public function getTipoMedida()
    {
        return $this->tipoMedida;
    }
}
