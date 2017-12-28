<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semanaturno
 */
class Semanaturno
{
    /**
     * @var integer
     */
    private $sematurnCodigoid;

    /**
     * @var integer
     */
    private $semaCodigoid;

    /**
     * @var integer
     */
    private $turnCodigoid;

    /**
     * @var boolean
     */
    private $sematurnDiasemana;

    /**
     * @var boolean
     */
    private $sematurnAtivo;


    /**
     * Get sematurnCodigoid
     *
     * @return integer 
     */
    public function getSematurnCodigoid()
    {
        return $this->sematurnCodigoid;
    }

    /**
     * Set semaCodigoid
     *
     * @param integer $semaCodigoid
     * @return Semanaturno
     */
    public function setSemaCodigoid($semaCodigoid)
    {
        $this->semaCodigoid = $semaCodigoid;

        return $this;
    }

    /**
     * Get semaCodigoid
     *
     * @return integer 
     */
    public function getSemaCodigoid()
    {
        return $this->semaCodigoid;
    }

    /**
     * Set turnCodigoid
     *
     * @param integer $turnCodigoid
     * @return Semanaturno
     */
    public function setTurnCodigoid($turnCodigoid)
    {
        $this->turnCodigoid = $turnCodigoid;

        return $this;
    }

    /**
     * Get turnCodigoid
     *
     * @return integer 
     */
    public function getTurnCodigoid()
    {
        return $this->turnCodigoid;
    }

    /**
     * Set sematurnDiasemana
     *
     * @param boolean $sematurnDiasemana
     * @return Semanaturno
     */
    public function setSematurnDiasemana($sematurnDiasemana)
    {
        $this->sematurnDiasemana = $sematurnDiasemana;

        return $this;
    }

    /**
     * Get sematurnDiasemana
     *
     * @return boolean 
     */
    public function getSematurnDiasemana()
    {
        return $this->sematurnDiasemana;
    }

    /**
     * Set sematurnAtivo
     *
     * @param boolean $sematurnAtivo
     * @return Semanaturno
     */
    public function setSematurnAtivo($sematurnAtivo)
    {
        $this->sematurnAtivo = $sematurnAtivo;

        return $this;
    }

    /**
     * Get sematurnAtivo
     *
     * @return boolean 
     */
    public function getSematurnAtivo()
    {
        return $this->sematurnAtivo;
    }
}
