<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegionalMeta
 */
class RegionalMeta
{
    /**
     * @var integer
     */
    private $regionalCodigoid;

    /**
     * @var integer
     */
    private $mes;

    /**
     * @var integer
     */
    private $ano;

    /**
     * @var integer
     */
    private $tme;

    /**
     * @var string
     */
    private $projecao;


    /**
     * Set regionalCodigoid
     *
     * @param integer $regionalCodigoid
     * @return RegionalMeta
     */
    public function setRegionalCodigoid($regionalCodigoid)
    {
        $this->regionalCodigoid = $regionalCodigoid;

        return $this;
    }

    /**
     * Get regionalCodigoid
     *
     * @return integer 
     */
    public function getRegionalCodigoid()
    {
        return $this->regionalCodigoid;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     * @return RegionalMeta
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set ano
     *
     * @param integer $ano
     * @return RegionalMeta
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return integer 
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set tme
     *
     * @param integer $tme
     * @return RegionalMeta
     */
    public function setTme($tme)
    {
        $this->tme = $tme;

        return $this;
    }

    /**
     * Get tme
     *
     * @return integer 
     */
    public function getTme()
    {
        return $this->tme;
    }

    /**
     * Set projecao
     *
     * @param string $projecao
     * @return RegionalMeta
     */
    public function setProjecao($projecao)
    {
        $this->projecao = $projecao;

        return $this;
    }

    /**
     * Get projecao
     *
     * @return string 
     */
    public function getProjecao()
    {
        return $this->projecao;
    }
}
