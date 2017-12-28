<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicosLimiteBanda
 */
class ServicosLimiteBanda
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $servicoid;

    /**
     * @var boolean
     */
    private $bandaLimitada;


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
     * Set servicoid
     *
     * @param integer $servicoid
     * @return ServicosLimiteBanda
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
     * Set bandaLimitada
     *
     * @param boolean $bandaLimitada
     * @return ServicosLimiteBanda
     */
    public function setBandaLimitada($bandaLimitada)
    {
        $this->bandaLimitada = $bandaLimitada;

        return $this;
    }

    /**
     * Get bandaLimitada
     *
     * @return boolean 
     */
    public function getBandaLimitada()
    {
        return $this->bandaLimitada;
    }
}
