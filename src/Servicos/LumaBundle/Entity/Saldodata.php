<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saldodata
 */
class Saldodata
{
    /**
     * @var integer
     */
    private $saldodataCodigoid;

    /**
     * @var \DateTime
     */
    private $saldodataData;

    /**
     * @var string
     */
    private $saldodataSaldo;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoque
     */
    private $estoCodigoid;


    /**
     * Get saldodataCodigoid
     *
     * @return integer 
     */
    public function getSaldodataCodigoid()
    {
        return $this->saldodataCodigoid;
    }

    /**
     * Set saldodataData
     *
     * @param \DateTime $saldodataData
     * @return Saldodata
     */
    public function setSaldodataData($saldodataData)
    {
        $this->saldodataData = $saldodataData;

        return $this;
    }

    /**
     * Get saldodataData
     *
     * @return \DateTime 
     */
    public function getSaldodataData()
    {
        return $this->saldodataData;
    }

    /**
     * Set saldodataSaldo
     *
     * @param string $saldodataSaldo
     * @return Saldodata
     */
    public function setSaldodataSaldo($saldodataSaldo)
    {
        $this->saldodataSaldo = $saldodataSaldo;

        return $this;
    }

    /**
     * Get saldodataSaldo
     *
     * @return string 
     */
    public function getSaldodataSaldo()
    {
        return $this->saldodataSaldo;
    }

    /**
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoCodigoid
     * @return Saldodata
     */
    public function setTipoCodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoCodigoid = null)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }

    /**
     * Set estoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Estoque $estoCodigoid
     * @return Saldodata
     */
    public function setEstoCodigoid(\Servicos\LumaBundle\Entity\Estoque $estoCodigoid = null)
    {
        $this->estoCodigoid = $estoCodigoid;

        return $this;
    }

    /**
     * Get estoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Estoque 
     */
    public function getEstoCodigoid()
    {
        return $this->estoCodigoid;
    }
}
